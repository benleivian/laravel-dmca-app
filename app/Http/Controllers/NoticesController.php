<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Provider;
use \App\Http\Requests\PrepareNoticeRequest;
use \App\Notice;
use Auth;

class NoticesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
        $notices = Auth::user()->notices;

    	return view('notices.index', compact('notices'));
    }

    public function create()
    {
    	// Get list of providers.
        $providers = Provider::lists('name', 'id');

    	// Load a view to create a new notice.
    	return view('notices.create', compact('providers'));
    }

    /**
     * Ask the user to confirm the DMCA that will be delivered.
     *
     * @param  PrepareNoticeRequest $request
     * @param  Guard $auth
     * @return
     */
    public function confirm(PrepareNoticeRequest $request, Guard $auth)
    {
        $template = $this->compileDmcaTemplate($data = $request->all(), $auth);

        session()->flash('dmca', $data);

        return view('notices.confirm', compact('template'));
    }

    /**
     * Store a new DMCA notice.
     *
     * @param  Request $request
     */
    public function store(Request $request)
    {
        $notice = $this->createNotice($request);

        // Send the DMCA email.
        Mail::queue('emails.dmca', compact('notice'), function ($message) use ($notice) {
            $message
                ->from($notice->getOwnerEmail())
                ->to($notice->getRecipientEmail())
                ->subject('DMCA Notice');
        });

        return redirect('notices');
    }

    /**
     * Compile the DMCA template from the form data.
     *
     * @param  $data
     * @param  Guard $auth
     * @return
     */
    public function compileDmcaTemplate($data, Guard $auth)
    {
        $data = $data + [
            'name'  => $auth->user()->name,
            'email' => $auth->user()->email,
        ];

        return view()->file(app_path('Http/Templates/dmca.blade.php'), $data);
    }

    /**
     * Create and save a new DMCA notice.
     *
     * @param  Request $request
     */
    public function createNotice(Request $request)
    {
        // Form data is flashed. Get the original form fields.
        $data = session()->get('dmca');

        // Template is in request. Get the template text.
        $template = $request->input('template');

        // Add template to data array.
        $data['template'] = $template;

        // Build a Notice object.
        $notice = Notice::open($data);

        // Add the user id to data and save.
        $notice = Auth::user()->notices()->save($notice);

        return $notice;
    }

}