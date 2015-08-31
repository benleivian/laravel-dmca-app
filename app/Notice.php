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
	 * @param  array  $attributes
	 * @return
	 */
	public static function open(array $attributes)
	{
		// new Notice(array)
		return new static($attributes);
	}

	/**
	 * A notice belongs to a single recipient/provider.
	 *
	 * @return
	 */
	public function provider()
	{
		return $this->belongsTo('App\Provider');
	}

	/**
	 * A notice is created by a single user.
	 *
	 * @return
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the email address for the recipient of the DMCA.
	 *
	 * @return string
	 */
	public function getRecipientEmail()
	{
		return $this->provider->copyright_email;
	}

	/**
	 * Get the email address of the notice owner.
	 *
	 * @return string
	 */
	public function getOwnerEmail()
	{
		return $this->user->email;
	}
}
