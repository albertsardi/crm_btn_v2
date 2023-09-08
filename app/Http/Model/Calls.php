<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $table = 'call';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
				'name',
				'status',
				'date_start',
				'date_end',
				'direction',
				'description',
				'created_at',
				'modified_at',
				'parent_id',
				'parent_type',
				'account_id',
				'created_by_id',
				'modified_by_id',
				'assigned_user_id',
				'repeat',
				'c_i_f',
				'deleted',
	];

}







