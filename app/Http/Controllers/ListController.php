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

class ListController extends MainController {
    var $cur = 'Rp';

    //data list
    function datalist($jr) {
        $data = [
            'jr'        => $jr,
        ];
        $view = 'datalist';

        switch($jr) {
            case 'account':
                $data['caption']    = 'Accounts';
                $gridcaption        = ['Name', 'Segmentation', 'ID Number', 'No CIF', 'Branch Name', 'Controling Branch Name'];
                $gridcol            = ['name', 'segmentation_upgrade_id', 'id_number', 'cif', 'branch_name', 'branch_control_name'];
                break;
            case 'contact':
                $data['caption']    = 'Contacts';
                $gridcaption        = ['Name', 'Account', 'Email', 'Phone'];
                $gridcol          = ['name', 'account', 'email_address', 'phone_number'];
                break;
            case 'lead':
                $data['caption']    = 'Leads';
                $gridcaption        = ['Name', 'Status', 'Assigned User', 'Create At', 'Lead Age'];
                $gridcol            = ['name', 'status', '#assigned_user', 'created_at', 'lead_age'];
                break;
            case 'opportunity':
                $data['caption']    = 'Opportunities';
                $gridcaption        = ['Opportunity', 'Account ID', 'Sales Stage', 'Opportunity ID', 'Assigned User', 'Amount', 'Created At', 'Duration'];
                $gridcol            = ['name', '#account', 'stage', 'opportunity_id', '#assigned_user', 'amount', 'created_at', 'modified_at'];
                break;
            case 'case':
                $data['caption']    = 'Cases';
                $gridcaption        = ['Name', 'Number', 'Status', 'Priority', 'Account', 'Assigned User'];
                $gridcol            = ['name', 'number', 'status', 'priority', 'account_id', '#assigned_user'];
                break;
            //case 'email':
                //$caption        = 'Emails';
                //$gridcaption    = [];
                //break;
            case 'calendar':
                $caption        = 'Calendar';
                $gridcaption    = [];
                $view = 'calendar-edit';
                break;
            case 'meeting':
                $data['caption']    = 'Meetings';
                $gridcaption        = ['Subject Name', 'Parent', 'Status', 'Date Start', 'Assigned User'];
                $gridcol            = ['name', 'parent', 'status', 'date_start', '#assigned_user'];
                break;
            case 'call':
                $data['caption']    = 'Calls';
                $gridcaption        = ['Subject Name', 'Parent', 'Status', 'Date Start', 'Assigned User'];
                $gridcol            = ['name', 'parent_id', 'status', 'date_start', '#assigned_user'];
                break;
            case 'task':
                $data['caption']    = 'Tasks';
                $gridcaption        = ['Name', 'Status', 'Priority', 'Date Due', 'Assigned User', 'Created At'];
                //$gridcol            = ['name', 'status', 'priority', 'date_start', 'assigned_user_name', 'created_at'];
                $gridcol            = ['name', 'status', 'priority', 'date_start', '#assigned_user', 'created_at'];
                break;
            //case 'stream':
                //$caption = 'Stream';
                //$gridcaption    = [];
                //break;
            case 'report':
                $data['caption']    = 'Reports';
                $gridcaption        = ['Name', 'Enity Type', 'Type'];
                $gridcol            = ['name', 'enity_type', 'type'];
                break;
            default:
                return view($jr.'-edit', ['caption'=>'Stream']);
        }
        
        if($view=='datalist') {
            //get data
            $grid = [];
            $res = $this->api('GET', "api/account");
            $res = $this->gridModifiedValue($jr, $res);
            $data['grid'] = $this->createListGrid($res, $gridcol, $gridcaption, $jr, 'table table-dark table-datalist');
        
            
        } else {
            //return view
        }
        return view($view, $data);
    }

    function gridModifiedValue($jr, $res) {
        if (empty($res)) return $res;
        
        foreach($res as $r) {
            $r->created_at = date('d M Y h:i', strtotime($r->created_at));

            if ($jr=='lead') {
                $r->lead_age = $r->lead_age.' day(s)';
            }
            if ($jr=='opportunity') {
                $r->amount = $this->cur . number_format($r->amount,2);
            }
        }
        
        return $res;
    }

}
