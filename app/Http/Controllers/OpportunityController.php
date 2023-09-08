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
// use App\Http\Model\Product;
use Session;

class OpportunityController extends MainController {

    //form edit
    function edit($id='') {
        $data = [
            'id'        => $id,
            'caption'   => 'Opportunity > '. (($id=='')? 'create':'edit'),
            'select'    => $this->selectData(['common:gender', 'common:product_category', 'common:opportunity_type', 'common:sales_stage', 'common:probability', 'common:opportunity_status'  ]),
            'lookup'    => $this->lookData(['user']),
            'data'      => []
        ];

        //get data
        $res = $this->api('GET', "api/opportunity/$id");
        if(!empty($res)) {
            $data['data'] = $res;
        }
    
        return view('opportunity-edit', $data);
    }


}
