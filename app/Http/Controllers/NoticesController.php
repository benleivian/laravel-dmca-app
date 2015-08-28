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

    public function confirm(PrepareNoticeRequest $request, Guard $auth)
    {
        $data = $request->all() + [
            'name'  => $auth->user()->name,
            'email' => $auth->user()->email,
        ];

        $template = view()->file(app_path('Http/Templates/dmca.blade.php'), $data);

        return view('notices.confirm', compact('template'));
    }

}