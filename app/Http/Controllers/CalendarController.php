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

class CalendarController extends MainController {

    //form edit
    function edit($id='') {
        $data = [
            'id'        => $id,
            'captions'   => 'Calender > '. (($id=='')? 'create':'edit'),
            'caption'   => 'Calendar Edit',
            'select'    => $this->selectData(['common:gender']),
            'data'      => []
        ];

        //get data
        //dd('ddd');
        //$res = $this->api('GET', "api/calendar/$id");
        //dd($res);
        /*if(!empty($res)) {
            $data['data'] = $res;
        }*/
    
        $data = [];
        return view('calendar-edit', $data);
    }


}
