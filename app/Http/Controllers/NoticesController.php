<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Provider;
use \App\Http\Requests\PrepareNoticeRequest;

class NoticesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	return view('notices.index');
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

    public function store()
    {
        // Get the original form fields.
        $data = session()->get('dmca');

        // Get the template text.
        $template = \Request::input('template');
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

}