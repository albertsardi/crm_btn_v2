<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meeting';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
					'name',
					'status',
					'date_start',
					'date_end',
					'is_all_day',
					'description',
					'created_at',
					'modified_at',
					'date_start_date',
					'date_end_date',
					'duration',
					'parent_id',
					'parent_type',
					'account_id',
					'created_by_id',
					'modified_by_id',
					'assigned_user_id',
					'location',
					'repeat',
					'cif',
					'deleted',
	];

}







