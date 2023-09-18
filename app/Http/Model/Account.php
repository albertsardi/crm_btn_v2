<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Account extends Model
{
    protected $table = 'account';
	public $timestamps = false; //disable time stamp
    // protected $primaryKey = '';
    protected $keyType = 'string';
    //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    //const UPDATED_AT = 'Modified_at'; //change laravel creator stamp
    protected $fillable = [
					'id',
					'name',
					'cif',
					'segmentation',
					'email',
					'phone',
					'id_type',
					'id_number',
					'id_lifetime',
					'id_expiration',
					'tax_id_number',
					'tax_id_registration',
					'birth_date',
					'birth_place',
					'education',
					'gender',
					'marital_status',
					'nationality',
					'occupation',
					'position',
					'religion',
					'risk_profile',
					'address_street',
					'address_city',
					'address_state',
					'address_postal_code',
					'alternate_address_country',
					'alternate_address_street',
					'alternate_address_city',
					'alternate_address_state',
					'alternate_address_postal_code',
					'alternate_address_country',
					'source_income',
					'source_income_additional',
					'gross_income_yearly',
					'expense_monthly',
					'objective_investment',
					'objective_other', 
	];

	protected static function boot() {
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

}







