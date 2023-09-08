<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phone_number';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    public $timestamps = false;
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    //const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
				'name',
                'type',
                'numeric',
                'invalid',
                'opt_out',
                'id',
                'phone_type',
                'primary',
				'deleted',
	];

}







