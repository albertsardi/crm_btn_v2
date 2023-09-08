<?php
namespace App\Http\Controllers;
//use GuzzleHttp\Client;
// use GuzzleHttp\Exception\RequestException;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
//use \koolreport\cloudexport\Exportable;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Http;
//use HTML;
// use Validator;
// use SSP;
// use Illuminate\Support\Facades\Input;
use App\Http\Model\Product;
use Session;

class AccountController extends MainController {

    //form edit
    function edit($id='') {
        /*
        $lookup = [];
        $res = $this->api('GET', "api/user");
        if(!empty($res)) {
            $lookup['user'] = $this->createLookGrid($res, '', '', 'user', 'table table-dark');
        } else {
            $lookup['user'] = [];
        }
        */
        
        $data = [
            'id'        => $id,
            'caption'   => 'Account > '. (($id=='')? 'create':'edit'),
            'select'    => $this->selectData(['common:education', 'common:gender', 'common:religion', 'common:occupation', 'common:maritalstatus', 'common:source_income', 'common:source_income_additional', 'common:gross_income_yearly', 'common:expense_monthly', 'common:objective_investment' ]),
            'lookup'    => $this->lookData(['user']),
        ];

        //get data
        $res = $this->api('GET', "api/account/$id");
        if(!empty($res)) {
            $data['data'] = $res;
        }
    
        return view('account-edit', $data);
    }

}
