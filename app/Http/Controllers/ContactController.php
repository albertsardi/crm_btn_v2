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

class ContactController extends MainController {

    //form edit
    function edit($id='') {
        $data = [
            'id'        => $id,
            'caption'   => 'Contact > '. (($id=='')? 'create':'edit'),
            'select'    => $this->selectData(['common:gender', 'common:salutation_name', 'common:customer_category', 'common:id_type', 'common:fbi_percentage', 'common:probability', 'common:lead_source']),
            'lookup'    => $this->lookData(['user']),
            'data'      => []
        ];
        $data['modal'] = (object)[
            'email' =>  $this->api('GET', "api/email_address/" . $id),
            'phone' =>  $this->api('GET', "api/phone_number/" . $id),
        ];

        //get data
        $res = $this->api('GET', "api/lead/$id");
        if(!empty($res)) {
            $data['data'] = $res;
        }
        dump($data);
    
        return view('contact-edit', $data);
    }


}
