<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email_address';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
	public $timestamps = false;
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    //const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
				'name',
				'lower',
				'invalid',
				'opt_out',
				'id',
				'email_type',
				'primary',
				'deleted',
	];

}







