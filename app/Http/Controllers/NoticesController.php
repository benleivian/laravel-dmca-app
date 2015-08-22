<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Provider;

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

    public function confirm(Requests\PrepareNoticeRequest $request)
    {
        // Review the form data.
        return $request->all();
    }

}