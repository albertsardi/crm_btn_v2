<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    // protected $primaryKey = '';
    // protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
					'name',
					'deleted', 
					'salutation_name', 
					'first_name',  
					'last_name',                      
					'description',                    
					'do_not_call',   
					'address_street', 
					'address_city',  
					'address_state',  
					'address_country',  
					'address_postal_code', 
					'created_at',  
					'modified_at',                               
					'middle_name',
					'account_id', 
					'campaign_id',  
					'created_by_idx',  
					'created_by_id',  
					'modified_by_id', 
					'assigned_user_id',
					'lead_source',
					'c_i_f_number', 
					'i_d_type',   
					'i_d_number',
					'i_d_expired',                               
					'gender',
					'birth_date',                                
					'alternate_address_street',
					'alternate_address_city',
					'alternate_address_state', 
					'alternate_address_country', 
					'alternate_address_postal_code',
					's_m_s_opt_in',
					'call_opt_in',
					'assitant_name',                  
					'assitant_phone',
					'test_number_only', 
					'office_address_street',
					'office_address_city',
					'office_address_state', 
					'office_address_country',
					'office_address_postal_code',
					'cif',
					'sms_opt_in', 
					'data_source',     
					'deleted',
	];

}







