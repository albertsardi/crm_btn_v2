<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'case';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
					'name',
					'number',
					'status',
					'priority',
					'type',
					'description',
					'created_at',
					'modified_at',
					'account_id',
					'lead_id',
					'contact_id',
					'inbound_email_id',
					'created_by_id',
					'modified_by_id',
					'assigned_user_id',
					'deleted',
	];

}







