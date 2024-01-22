<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
//use App\Http\Model\Transaction;

class ApiController extends Controller {
	
	// api for read data from database
	function getdata($db, $id='', Request $req) {
		try {
			if (!empty($id)) {
				$data = DB::table($db)
						->where('id', $id)
						->first();
				return response()->json($data, Response::HTTP_OK);
			} else {
				//jika ada parameter
				$opt = $req->all();
				$data = DB::table($db);
				if(empty($opt)) {
					$data = $data->get();
				} else {
					if(isset($opt['category'])) $data = $data->where('category',$opt['category'])->get();
				}
				return response()->json($data, Response::HTTP_OK);
				//return 'All';
			}
		} catch(QueryException $e) {
			$error = [ 'error'=>$e->getMessage() ];
			return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	// api for savedata to database
	function savedata($db, $id='') {
	}

	// api for deltedata to database
	function deletedata($db, $id='') {
		return response()->json('data','deleteData');
		$db='contact';
		$dat = DB::table($db)
					->where('id', $id)
					->first();
		if(empty($dat)) return responeError([data=>"Error::$db id $id not found"]);

	}

}
