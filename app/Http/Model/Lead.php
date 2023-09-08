<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'lead';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
				'salutation_name',
				'first_name',
				'last_name',
				'title',
				'status',
				'source',
				'industry',
				'opportunity_amount',
				'website',
				'address_street',
				'address_city',
				'address_state',
				'address_country',
				'address_postal_code',
				'do_not_call',
				'converted_at',
				'created_at',
				'modified_at',
				'middle_name',
				'opportunity_amount_currency',
				'created_by_id',
				'modified_by_id',
				'assigned_user_id',
				'campaign_id',
				'created_account_id',
				'created_contact_id',
				'created_opportunity_id',
				'gender',
				'religion',
				'nationality',
				'education',
				'birth_place',
				'occupation',
				'lead_source',
				'status_description',
				'call_opt_in',
				'alternate_address_street',
				'alternate_address_city',
				'alternate_address_state',
				'alternate_address_country',
				'alternate_address_postal_code',
				'address_description',
				'tags',
				'office_address_street',
				'office_address_city',
				'office_address_state',
				'office_address_country',
				'office_address_postal_code',
				'agree_to_open_an_account',
				'lead_status_description',
				'lead_age',
				'lead_age_category',
				'birth_date',
				'branch_code',
				'objective_investment',
				'branch_name',
				'branch_control_code',
				'branch_control_name',
				'cif',
				'expense_monthly',
				'gross_income_yearly',
				'id_expiration',
				'id_number',
				'id_type',
				'marital_status',
				'objective_other',
				'sms_opt_in',
				'source_income',
				'source_income_additional',
				'tax_id_number',
				'tax_id_registration',
				'email_opt_in',
				'screening_media_name',
				'screening_media_result',
				'recommend_marketing',
				'recommend_branch_manager',
				'recommend_marketing_recomendation',
				'recommend_marketing_description',
				'recommend_branch_manager_description',
				'description',
				'account_name',
				'position',
				'lead_source_description',
				'data_source',
				'customer_category',
				'nominal',
				'fbi_percentage',
				'fbi_estimation',
				'probability',
				'product_category',
				'mobile',
				'deleted',
	];

}







