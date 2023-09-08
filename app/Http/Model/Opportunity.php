<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $table = 'opportunity';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
	const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
					'name',
					'amount',
					'stage',
					'last_stage',
					'probability',
					'lead_source',
					'close_date',
					'description',
					'created_at',
					'modified_at',
					'amount_currency',
					'account_id',
					'contact_id',
					'campaign_id',
					'created_by_id',
					'modified_by_id',
					'assigned_user_id',
					'opportunity_type',
					'next_step',
					'sales_stage',
					'status',
					'tag_set_name',
					'duration',
					'source',
					'opportunity_id',
					'product_category',
					'deleted',
	];

}







