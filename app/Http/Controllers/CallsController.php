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

class CallsController extends MainController {

    //form edit
    function edit($id='') {
        $data = [
            'id'        => $id,
            'caption'   => 'Calls > '. (($id=='')? 'create':'edit'),
            'select'    => $this->selectData(['common:call_status', 'common:direction', 'common:duration', 'common:repeat_type']),
            'lookup'    => $this->lookData(['user']),
            'data'      => []
        ];

        //get data
        $res = $this->api('GET', "api/call/$id");
        if(!empty($res)) {
            $data['data'] = $res;
        }
    
        return view('calls-edit', $data);
    }


}
