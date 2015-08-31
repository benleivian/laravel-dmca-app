<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * The authenticated user.
     *
     * @var \App\User|null
     */
    protected $user;

    /**
     * [$signedIn description]
     *
     * @var \App\User|null
     */
    protected $signedIn;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    	$this->user = $this->signedIn = Auth::user();
    }
}
