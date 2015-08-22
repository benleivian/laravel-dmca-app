<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

	/**
	 * No timestamps required for a provider.
	 *
	 * @var boolean
	 */
    public $timestamps = false;

    /**
     * Fillable fields for a provider.
     * @var [type]
     */
    protected $fillable = [
    	'name',
    	'copyright_email'
    ];

}
