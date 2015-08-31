<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{

	protected $fillable = [
		'infringing_title',
		'infringing_link',
		'original_link',
		'original_description',
		'template',
		'content_removed',
		'provider_id',
	];

	/**
	 * Open a new notice.
	 *
	 * @param  array $attributes
	 * @return static
	 */
    public static function open(array $attributes)
    {
    	// new Notice(array)
    	return new static($attributes);
    }

}
