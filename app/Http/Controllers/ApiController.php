<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Model\Account;
use App\Http\Model\Contact;
use App\Http\Model\Call;
use App\Http\Model\Cases;
use App\Http\Model\Lead;
use App\Http\Model\Meeting;
use App\Http\Model\Opportunity;
use App\Http\Model\Task;
use App\Http\Model\Email;
use App\Http\Model\Phone;

class ApiController extends Controller {
	
	// api for read data from database
	function getdata($db,  $id='', Request $req) {
		$opt = $req->all();
		if($db=='common') {
			$data = DB::table($db);
			$key = array_keys($opt); 
			$v = $opt->$key; return $v;
			$data = $data->where($key, $v)->get();
			return response()->json($data, Response::HTTP_OK);
		}
		switch($db) {
			case 'lead':
			case 'call':
			case 'task':
				$data = $data->select("$db.*",'user.name as assigned_user_name');
				$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");
				break;
			case 'contact':
				$data = $data->select("$db.*", 'ea.name AS email_address', 'pn.name AS phone_number');
				$data = $data->leftJoin('email_address as ea', 'ea.id', '=', 'contact.id');
				$data = $data->leftJoin('phone_number as pn', 'pn.id', '=', 'contact.id');
				$data = $data->where('ea.primary',1)->where('pn.primary',1);
				break;
			case 'opportunity':
				$data = $data->select('opportunity.*','user.name as assigned_user_name','account.name as account_name');
				$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");
				$data = $data->leftJoin('account', 'account.id', '=', "$db.account_id");
				break;
			case 'case':
				$data = $data->select('case.*','user.name as assigned_user_name','account.name as account_name');
				$data = $data->leftJoin('user', 'user.id', '=', 'case.assigned_user_id');
				$data = $data->leftJoin('account', 'account.id', '=', 'case.account_id');
				break;
			case 'meeting':
				$data = $data->select("$db.*",'user.name as assigned_user_name','lead.name AS parent');
				$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");
				$data = $data->leftJoin('lead', 'lead.idx', '=', "$db.parent_idx");
				break;
			default:
				$data = DB::table($db);	
				
		}

		if (empty($id)) {//alldata
			$data = DB::table($db);
			
		} else { //selected data
			$data = DB::table($db)->where('id', $id);
		}

		$data = $data->where('deleted',0)->orderBy('created_at','desc');
		$data = (empty($id))? $data->get() : $data->first();
		//return $data->toSql();
		//dd($data);

		return response()->json($data, Response::HTTP_OK);
	}

	function getCommon($id) {
		$data = DB::table('common');
		$data = $data->where('category', $id)->get();
		return response()->json($data, Response::HTTP_OK);
	}

	function getdata_lama($db,  Request $req) {
		//return 'getdata';
		//return json_encode($db);
		//return ($id)."-XXX";
		try {
			if (!empty($id)) {
				if (in_array($db, ['email_address', 'phone_number'])) {
					$data = DB::table($db)
							->where("$db.id", $id)
							->first();
					return response()->json($data, Response::HTTP_OK);
				} else {
					$data = DB::table($db)
							->select("$db.*", 'u1.name as created_by_name', 'u2.name as assigned_user_name')
							->leftJoin('user as u1', 'u1.id', '=', "$db.created_by_id") //created by name
							->leftJoin('user as u2', 'u2.id', '=', "$db.assigned_user_id") //assigned by name
							->where("$db.id", $id)
							->first();
					return response()->json($data, Response::HTTP_OK);
				}
			} else {
				//list all
				//jika ada parameter
				$opt = $req->all();
				$data = DB::table($db);
				/*
				if ($db!='common') $data = $data->where('deleted',0)->orderBy('created_at','desc');
				if(empty($opt)) {
					$data = $data->get();
				} else {
					if(isset($opt['category'])) $data = $data->where('category',$opt['category'])->get();
				}
				*/
				if ($db!='common') {
					$data = $data->where('deleted',0)->orderBy('created_at','desc');
					//$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");

					switch($db) {
						case 'lead':
						case 'call':
						case 'task':
							$data = $data->select("$db.*",'user.name as assigned_user_name');
							$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");
							break;
						case 'contact':
							$data = $data->select("$db.*", 'ea.name AS email_address', 'pn.name AS phone_number');
							$data = $data->leftJoin('email_address as ea', 'ea.id', '=', 'contact.id');
							$data = $data->leftJoin('phone_number as pn', 'pn.id', '=', 'contact.id');
							$data = $data->where('ea.primary',1)->where('pn.primary',1);
							break;
						case 'opportunity':
							$data = $data->select('opportunity.*','user.name as assigned_user_name','account.name as account_name');
							$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");
							$data = $data->leftJoin('account', 'account.id', '=', "$db.account_id");
							break;
						case 'case':
							$data = $data->select('case.*','user.name as assigned_user_name','account.name as account_name');
							$data = $data->leftJoin('user', 'user.id', '=', 'case.assigned_user_id');
							$data = $data->leftJoin('account', 'account.id', '=', 'case.account_id');
							break;
						case 'meeting':
							$data = $data->select("$db.*",'user.name as assigned_user_name','lead.name AS parent');
							$data = $data->leftJoin('user', 'user.id', '=', "$db.assigned_user_id");
							
							$data = $data->leftJoin('lead', 'lead.idx', '=', "$db.parent_idx");
							break;
						default:
							$data = DB::table($db);
					}
					
				}
				//have option
				if(!empty($opt)) {
					if(isset($opt['category'])) $data = $data->where('category',$opt['category']);
				}
				$data = $data->get();
				//return $data->toSql();
				//dd($data);

				return response()->json($data, Response::HTTP_OK);
			}
		} catch(QueryException $e) {
			$error = [ 'error'=>$e->getMessage() ];
			return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
		}    
	}

	// api for savedata to database
	function savedata($db, $id='', Request $req) {
		// master data save 
		//return 'save ...';
		//return $this->responseOk(['data'=>'savedata','post'=>'$req']);    
		$save = $req->all();
		//$save = $this->alterDateFormat($save);
		//unset($save['id']);
		//return dd($save);
		
		if ($db == 'account') $model = new Account;
		if ($db == 'contact') {
			$model = new Contact;
			//$save['phone'] = join('|', $save['phone']);
			//$save['email'] = join('|', $save['email']);
			//dd('save option');
			$this->save_option('phone', $id, $save);
		}
		if ($db == 'case') $model = new Cases;
		if ($db == 'lead') {
			$model = new Lead;
			$save['name'] = $save['first_name']." ".$save['last_name'];
		}
		if ($db == 'meeting') {
			$model = new Meeting;
			$save['date_start'] = date('Y-m-d H:i:s', strtotime($save['date_start'].' '.$save['time_start']));
			$save['date_end'] = $this->date_add( $save['date_start'], $save['duration'] );
		}
		if ($db == 'calls') {
			$model = new Call;
			$save['date_start'] = date('Y-m-d H:i:s', strtotime($save['date_start'].' '.$save['time_start']));
			$save['date_end'] = $this->date_add( $save['date_start'], $save['duration'] );
		}
		if ($db == 'opportunity') $model = new Opportunity;
		if ($db == 'task') {
			$model = new Task;
			$save['date_start'] = date('Y-m-d H:i:s', strtotime($save['date_start'].' '.$save['time_start']));
			$save['date_end'] = date('Y-m-d H:i:s', strtotime($save['date_end'].' '.$save['time_end']));
		}
		if(!isset($model)) return $this->responseError(['error'=>"no save jr from $db "]);

		try {
			if (empty($req->id) ) {
				// create new
				$save['id'] = (string) Str::uuid();
				//dd($save);
				$data = $model->create($save);
				// $save['id'] = $data->id;
			} else {
				// update
				//if($save['birth_date']=='') $save['birth_date']=NULL;
				$data = $model->find($req->id)->update($save);
			}
			return $this->responseOk(['data'=>$save]);
		}
		catch (Exception $e) {
			//return response()->json(['error'=>$e->getMessage()]);
			return $this->responseError(['error'=>$e->getMessage()]);
		}
	}

	function deletedata($db, $id, Request $req) {
		// master data save     
		$save = $req->all();
		//$save=['body'=>'body','save'=>$save]
		//return json_encode($save);
		//return $this->responseOk(['data'=>'deletedata']);
		//return $this->responseOk(['data'=>'$id']);
		//$save = $this->alterDateFormat($save);
		//unset($save['id']);
		
		if ($db == 'account') $model = new Account;
		if ($db == 'contact') $model = new Contact;
		if ($db == 'case') $model = new Cases;
		if ($db == 'lead') $model = new Lead;
		if ($db == 'meeting') $model = new Meeting;
		if ($db == 'calls') $model = new Calls;
		if ($db == 'opportunity') $model = new Opportunity;
		if ($db == 'task') $model = new Task;
		//return "hallo";
		
		if(!isset($model)) return $this->responseError(['error'=>"no delete jr from $db "]);

		$db= $model->where('id',$id)->first();

		if (!empty($db)) {
			try {
				$data = $model->where('id',$id)->update(['deleted'=>1]);
				return $this->responseOk(['data'=>$save]);
			}
			catch (Exception $e) {
				return $this->responseError(['error'=>$e->getMessage()]);
			}
		} else return $this->responseError(['error'=>"no id $id from $db "]);
	}

	function save_option($db, $id, $save) {
		if ($db == 'email') $model = new Email;
		if ($db == 'phone') $model = new Phone;
		$primary = $save[$db.'-primary'];
		$dt = $save[$db]; 
		$idx=0;
		foreach($dt as $name ) {
			if($db=='email') $save2 = [
								'name'		=>$name,
								'deleted'	=>0,
								'lower'		=>strtolower($name),
								'opt_out'	=>0,
								'id'		=>$id,
								'email_type'=>'Contact',
								'primary'	=>(($primary==$idx)? 1:0),
							];
			if($db=='phone') $save2 = [
							'idx'			=> 'test',
								'name'		=> $name,
								'deleted'	=> 0,
								'type'		=> 'MobileX',
								'numeric'	=> preg_replace("/[^A-Za-z0-9]/", "",$name),
								'invalid'	=> 0,
								'opt_out'	=> 0,
								'id'		=> $id,
								'phone_type'=> 'Contact',
								'primary'	=> (($primary==$idx)? 1:0),
			];
			//if($name!='') {
				$data = $model->where('id',$id)->where('numeric',strtolower($name))->first();
				if(empty($data->name)) { 
					$model->insert($save2);
					//dd($save2);
				} else {
					$data->update($save2);
				}
			//}
			$idx++;
		}
	}

	function reportsummaryopportunity() {
		// return dd('hoho..');
		try {
			$data = DB::table('common')
				->leftJoin('opportunity', 'opportunity.stage', '=', 'common.opttext')
				->where('category', 'sales_stage') 
				->whereRaw('ABS(DATEDIFF(close_date, NOW()))>90')
				->selectRaw('opttext,COUNT(stage) as tot')
				->groupBy('opttext')->get();
			return response()->json($data, Response::HTTP_OK);

		} catch(QueryException $e) {
			$error = [ 'error'=>$e->getMessage() ];
			return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function reportsummarylead() {
		// return dd('hoho..');
		try {
			/*$data = DB::table('common')
				->leftJoin('opportunity', 'opportunity.stage', '=', 'common.opttext')
				->where('category', 'sales_stage') 
				->whereRaw('ABS(DATEDIFF(close_date, NOW()))>90')
				->selectRaw('opttext,COUNT(stage) as tot')
				->groupBy('opttext')->get(); */
			$data = DB::table('lead')
					->selectRaw('STATUS,COUNT(STATUS)as tot')
					->where('lead_age_category', '1 - 3 month(s)')
					->groupBy('Status')->get();
			return response()->json($data, Response::HTTP_OK);

		} catch(QueryException $e) {
			$error = [ 'error'=>$e->getMessage() ];
			return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function alterDateFormat($arr) {
		foreach($arr as $key => $val) {
			if (!str_contains(strtolower($key),'date')) continue;
			if($val!='') {
				$arr[$key] = substr($val,6).'-'.substr($val,3,2).'-'.substr($val,0,2);
			} else {
				$arr[$key] = NULL;
			}
		}
		return $arr;
	}

	function unixdate($date='', $time='') {
		//  dd/mm/yyyy -> yyyy-mm-dd 
		if ($date=='') return date('Y-m-d');
		$date = explode('/',$date);
		if($time=='') return date('Y-m-d', mktime(0,0,0,$date[1],$date[0],$date[2]));
		// HH:mm
		$time = explode(':',$time);
		return date('Y-m-d H:i:s', mktime($time[0],$time[1],0,$date[1],$date[0],$date[2]));
	}

	function date_add($date, $duration) {
		$duration = str_replace('m', ' minutes', $duration);
		$duration = str_replace('h', ' hour', $duration);
		$duration = str_replace('d', ' days', $duration);
		return date('Y-m-d H:i:s', strtotime($date. ' +'.$duration ));
	}

	function responseOk($resp) {
		return response()->json(['status' => 'OK','data' => $resp['data']??'']);
	}

	function responseError($resp) {
		return response()->json(['status' => 'Error','message' => $resp['error']??'']);
	}

}

