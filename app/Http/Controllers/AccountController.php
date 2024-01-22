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
        //$data['modal']= ''; $data['jsmodal']= '';
        //require 'helper_database.php';
        //require 'helper_table.php';
        //require 'helper_formjq.php';
        //require 'helper_lookup.php';
        //$cn=db_connect();
        //$id=isset($_GET['id'])?$_GET['id']:'BENANG-KARET';
        //dd($_SERVER);
        $data = [
            'id'        => $id,
            'caption'   => ($id=='')? 'Account > create':'Account > edit',
            'select'    => $this->selectData(['common:education', 'common:gender', 'common:religion', 'common:occupation', 'common:maritalstatus']),
            'data'      => []
        ];
        //dd($data);

        //get data
        $res = $this->api('GET', "api/account/$id");
        //$res = $this->api('GET', "api/account/63eaf2ae8b449b42b");
        if(!empty($res)) {
            $data['data'] = $res;
            //$data['mOrder'] = Order::where('AccCode',$res->data->AccCode)->get();
        }
    
        return view('account-edit', $data);
    }


}
