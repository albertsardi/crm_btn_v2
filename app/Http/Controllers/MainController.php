<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
//use Illuminate\Support\Facades\Input;
//use App\Http\Model\CustomerSupplier;
//use App\Http\Model\Warehouse;
//use App\Http\Model\Common;
//use App\Http\Model\Salesman;
//use App\Http\Model\Account;
//use App\Http\Model\Order;
//use App\Http\Model\Invoice;

class MainController extends Controller {

	function fUnixDate($date='') {
		if ($date=='') return date('Y-m-d');
		$date=explode('/',$date);
		return date('Y-m-d', mktime(0,0,0,$date[1],$date[0],$date[2]));
	}

	function fnum($num) {
		$num=intval($num);
		return number_format($num,0);	
	}

	function fdate($dts) {
		//  yyyy-mm-dd -> dd/mm/yyyy 
		$dt = strtotime($dts);
		return date('d/m/Y', $dt);
	}
	
	function space($num) {
		return str_repeat(' ',$num);	
	}

	public function api($type='GET', $url, $defValue=[]) {
		try {
			$client = new Client();
			//$url    = !empty($api['url']) ? $api['url'] : $this->cpm_uri();
			//$api    = $client->request($method, env('API_LUMEN') . $url, $param);
			//$res    = json_decode($api->getBody());
					
			/*$api = $client->request('GET',"http://localhost:8000/ajax_getCustomer/C-0166", [
				'auth' => ['user', 'pass']
			]);*/
			//$api = $client->request('GET',"http://localhost:500/ajax_getCustomer/C-0163"); //ini yang jalan
			//$base_url='http://localhost:500/';
			$base_url=env('API_URL');
			if(substr($base_url,-1)!='/') $base_url.='/';
			//dd( $base_url.$url);

			$api = $client->request($type, $base_url.$url); //ini yang jalan
			//return dd($base_url.$url);
			$res    = json_decode($api->getBody());

			//$client = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8000']);
			//$api = $client->request('GET', "/ajax_getCustomer/C-0166", ['allow_redirects' => false]);
			//return $api->getBody();
			//return $api->getStatusCode();
			return $res;

			/*if ( $res->success ) {
					return $res->data;
			} else  {
				switch ( $res->errors->error_code )
				{
					case 401 : header('Location: '. url('logout')); exit;
					case 422 :
					case 500 : return $res;
					default  : return abort($api->getStatusCode());
				}
			}*/
		}
		catch (GuzzleException $e) {
			return !empty($e->getResponse()->getStatusCode()) ? view()->exists('errors.'.$e->getResponse()->getStatusCode()) ? abort($e->getResponse()->getStatusCode()) : abort(404) : abort(500);
		}
	}

	public static function _api($api) {
		$base_url = env('API_URL');
		if(substr($base_url,-1)!='/') $base_url.='/';
		return $base_url.$api;
	}
	
	function lookData($arr) {
		$out = [];
		foreach($arr as $r) {
			$res = $this->api('GET', "api/" . $r);
			if(!empty($res)) {
				$out[$r] = $this->createLookGrid($res, '', '', 'user', 'table table-dark');
			} else {
				$out[$r] = '[no data]';
			}
		}
		return $out;		
	}

	// function modalData($modal) {
	// 	$data = [];
	// 	if(in_array('mCat', $modal)) $data['mCat'] = $this->DB_list('masterproductcategory', 'Category');
	// 	if(in_array('mCustomer', $modal)) $data['mCustomer'] = DB::table('masteraccount')->where('AccType', 'C')->get();
	// 	if(in_array('mSupplier', $modal)) $data['mSupplier'] = DB::table('masteraccount')->select('AccCode','AccName','Category')->where('AccType', 'S')->get();
	// 	if(in_array('mProduct', $modal)) $data['mProduct'] = json_encode(DB::table('masterproduct')->select('Code','Name','Category')->where('ActiveProduct',1)->get());
	// 	if(in_array('mPurchaseQuotation', $modal)) $data['mPurchaseQuotation'] = ['Raw material','Finish good'];
	// 	if(in_array('mWarehouse', $modal)) $data['mWarehouse'] = $this->DB_list('masterwarehouse', ['warehouse','warehousename']); //DB::table('masterwarehouse')->select('warehouse','warehousename')->get(),
	// 	// if(in_array('mPayType', $modal)) $data['mPayType'] =  $this->DB_list('common',['id','name1'], "category='Payment' "); //Common::getData('Payment')->data,
	// 	if(in_array('mPayType', $modal)) $data['mPayType'] =  DB::table('common')->select('id','name1')->where('category','Payment')->get(); //Common::getData('Payment')->data,
	// 	//if(in_array('mSalesman', $modal)) $data['mSalesman'] = $this->DB_list('mastersalesman', 'Name');
	// 	if(in_array('mSalesman', $modal)) $data['mSalesman'] = DB::table('mastersalesman')->select('Code','Name')->get();
	// 	if(in_array('mAddr', $modal)) $data['mAddr'] = []; //json_encode(DB::table('masteraccount')->where('AccCode', 'C')->get() ),
	// 	if(in_array('mCat', $modal)) $data['mCat'] = $this->DB_list('masterproductcategory', 'Category');
	// 	if(in_array('mAccount', $modal)) $data['mAccount'] = json_encode(db::table('mastercoa')->select('AccNo','AccName','CatName')->get() );
	// 	if(in_array('mDO', $modal)) $data['mDO'] = [];
	// 	if(in_array('mSO', $modal)) $data['mSO'] = DB::table('orderhead')->select('TransNo','TransDate','Total','AccCode','AccName','DeliveryTo')
	// 					->whereRaw("left(TransNo,2)='SO' ")->where("Status", "1")
	// 					->orderBy('TransDate', 'desc')->get();
	// 	if(in_array('mInvUnpaid', $modal)) $data['mInvUnpaid'] = json_encode(Invoice::select('TransNo','TransDate')->get() );
					
	// 	return $data;
	// }

	// function selectData($arr) {
	// 	$out = [];
	// 	foreach($arr as $r) {
	// 		switch($r) {
	// 			case 'selPayment':
	// 				$cat = substr($r, 3);
	// 				$dat= Common::select('name2','name1')->where('category',$cat)->get();
	// 				break;
	// 			case 'selProduct':
	// 				$dat= Product::select('Code','Name')->get();
	// 				break;
	// 			case 'selCustomer':
	// 				$dat= CustomerSupplier::select('AccCode','AccCode','AccName')->where('AccType','C')->get();
	// 				break;
	// 			case 'selSupplier':
	// 				$dat= CustomerSupplier::select('AccCode','AccName')->where('AccType','S')->get();
	// 	break;
	// 			case 'selSalesman':
	// 				$dat= Salesman::select('Code','Name')->get();
	// 				break;
	// 			case 'selWarehouse':
	// 				$dat= Warehouse::select('warehouse','warehousename')->get();
	// 				break;
	// 	case 'selAccount':
	// 	$dat= Account::select('id','AccNo','AccName')->get();
	// 	break;
	// 	case 'selBankAccount':
	// 	$dat= Account::select('id','AccNo','AccName')->where('CatName','Cash & Bank')->get();
	// 	break;
	// 		}
	// 		$dat = $dat->toArray();
	// 		$dat2=[];
	// 		foreach($dat as $dt) {
	// 			$key = array_keys($dt);
	// 	if (!isset($key[2])) {
	// 			//$dat2[] = ['id'=>$dt[$key[0]], 'text'=>$dt[$key[1]] ];
	// 	$dat2[] = ['id'=>$dt[$key[0]], 'text'=>$dt[$key[0]].'|'.$dt[$key[1]] ];
	// 	} else {
	// 	$dat2[] = ['id'=>$dt[$key[0]], 'text'=>$dt[$key[1]].'|'.$dt[$key[2]] ];
	// 	}
	// 		}
	// 		$out[$r] = $dat2;
	// 	}
	// 	return (object)$out;
	// }
	function selectData($arr) {
		$out = [];
		foreach($arr as $r) {
			switch($r) {
				case 'selCustomer':
					$dat = CustomerSupplier::select('AccCode','AccCode','AccName')->where('AccType','C')->get();
					break;
				default:
					if (str_contains($r,'common:')) {
						$rr = explode(':', $r); 
						$type = $rr[1];
						$dat = [];
						$res = $this->api('GET', "api/common/$type");
						if(!empty($res)) {
							foreach($res as $r) {
								$dat[] = ['id'=>$r->opttext, 'text'=>$r->opttext];
							}
						}
						$r = $type;
					}
			}
			$out[$r] = $dat;
		}
		return (object)$out;		
	}

	function createListGrid($data, $gridcol, $gridcaption, $jr, $class='') {
        if ($class!='') $class="class='$class' ";

        $caption = '<tr>';
        foreach($gridcaption as $col) {
            $caption.= "<th>".($col??'')."</th>";
        }
        $caption.= "</tr>";

        if (!empty($data)) {
            $tdata = '';
            foreach($data as $r) {
                $tdata.= '<tr>';
                $r = (array)$r; 
                foreach($gridcol as $idx=>$c) {
                    $v = $r[$c]??'';
                    $id = $r['id']??'';
                    if($idx==0) $v = "<a href='".url('/'."$jr/$id")."'>$v</a>";
                    if($c=='#assigned_user') $v = "<a href='".($r['assigned_user_id']??'')."'>".($r['assigned_user_name']??'')."</a>";
                    if($c=='#account') $v = "<a href='".url('account').'/'.($r['account_id']??'')."'>".($r['account_name']??'')."</a>";
                    $tdata.= "<td>".$v."</td>";
                }
                $btn = "<button type='button' class='btn btn-dropdown dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-expanded='false' data-reference='parent'></button>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='".url('/')."/account/$r[id]'>Edit</a>
                                <button class='dropdown-item cmDel' data-id='$r[id]' href='".url('/')."/account/delete/$r[id]'>Delete</button>
                            </div>    ";
                $tdata.= "<td> $btn </td>";
                $tdata.= '</tr>';
            }
        } else {
            $tdata = "<tr><td class='text-center' colspan='".count($gridcol)."'>no data</td></tr>";
        }

        $out = "<table id='list-table' $class>
                <thead>
                $caption
                </thead>
                <tbody>
                $tdata
                </tbody>
                </table>";
        return $out;
    }

	function createLookGrid($data, $gridcol='', $gridcaption='', $jr, $class='') {
        if ($class!='') $class="class='$class' ";
		$gridcaption    = ['Name', 'User Name','Email', 'Roles'];
        $gridcol        = ['name', 'user_name','email', 'role_name'];

        $caption = '<tr>';
        foreach($gridcaption as $col) {
            $caption.= "<th>".($col??'')."</th>";
        }
        $caption.= "</tr>";

        if (!empty($data)) {
            $tdata = '';
            foreach($data as $r) {
                $tdata.= '<tr>';
                $r = (array)$r; 
                foreach($gridcol as $idx=>$c) {
                    $v = $r[$c]??'';
                    $id = $r['id']??'';
					if($idx==0) $v = "<a href='' data-item='$r[id]|$r[name]' class='lookup_item'>$v</a>";
                    $tdata.= "<td>".$v."</td>";
                }
                $tdata.= '</tr>';
            }
        } else {
            $tdata = "<tr><td class='text-center' colspan='".count($gridcol)."'>no data</td></tr>";
        }

        $out = "<table id='list-table' $class>
                <thead>
                $caption
                </thead>
                <tbody>
                $tdata
                </tbody>
                </table>";
        return $out;
    }
	
	//func image
	function profile_image($img) {
		$blank_image = 'assets/images/avatar_2x.png';
		$image = 'assets/images/profile-img/'.$img;
		return (file_exists($image))? $image : $blank_image;
	}

}
