<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
					'name',
					'status',
					'priority',
					'date_start',
					'date_end',
					'date_start_date',
					'date_end_date',
					'date_completed',
					'description',
					'created_at',
					'modified_at',
					'parent_id',
					'parent_type',
					'account_id',
					'contact_id',
					'created_by_id',
					'modified_by_id',
					'assigned_user_id',
					'email_id',
					'deleted',
	];

}







