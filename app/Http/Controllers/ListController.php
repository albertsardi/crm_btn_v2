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

    //data list
    function datalist($jr) {
        $data = [
            'jr'        => $jr,
        ];

        switch($jr) {
            case 'account':
                $data['caption']    = 'Accounts';
                $gridcaption        = ['Name', 'Segmentation', 'ID Number', 'No CIF', 'Branch Name', 'Controling Branch Name'];
                $gridcol            = ['name', 'segmentation_upgrade_id', 'id_number', 'cif', 'branch_name', 'branch_control_name'];
                break;
            case 'contact':
                $data['caption']    = 'Contacts';
                $gridcaption        = ['Name', 'Account', 'Email', 'Phone'];
                $gridcol          = ['name', 'Account', 'Email', 'Phone'];
                break;
            case 'lead':
                $data['caption']    = 'Leads';
                $gridcaption        = ['Name', 'Status', 'Assigned User', 'Create At', 'Lead Age'];
                $gridcol            = ['name', 'status', 'assigned_user_id', 'created_at', 'modified_at'];
                break;
            case 'opportunity':
                $data['caption']    = 'Opportunities';
                $gridcaption        = ['Opportunity', 'Account ID', 'Sales Stage', 'Opportunity ID', 'Assigned User', 'Amount', 'Created At', 'Duration'];
                $gridcol            = ['name', 'account_id', 'aales_stage', 'opportunity_id', 'assigned_user_id', 'amount', 'created_at', 'modified_at'];
                break;
            case 'case':
                $data['caption']    = 'Cases';
                $gridcaption        = ['Name', 'Number', 'Status', 'Priority', 'Account', 'Assigned User'];
                $gridcol            = ['name', 'number', 'status', 'priority', 'account_id', 'assigned_user_id'];
                break;
            //case 'email':
                //$caption        = 'Emails';
                //$gridcaption    = [];
                //break;
            //case 'calendar':
                //$caption        = 'Calendar';
                //$gridcaption    = [];
                //break;
            case 'meeting':
                $data['caption']    = 'Meetings';
                $gridcaption        = ['Subject Name', 'Parent', 'Status', 'Date Start', 'Assigned User'];
                $gridcol            = ['name', 'parent_id', 'status', 'date_start', 'assigned_user_id'];
                break;
            case 'call':
                $data['caption']    = 'Calls';
                $gridcaption        = ['Subject Name', 'Parent', 'Status', 'Date Start', 'Assigned User'];
                $gridcol            = ['name', 'parent_id', 'status', 'date_start', 'assigned_user_id'];
                break;
            case 'task':
                $data['caption']    = 'Tasks';
                $gridcaption        = ['Name', 'Status', 'Priority', 'Date Due', 'Assigned User', 'Created At'];
                $gridcol            = ['name', 'status', 'priority', 'date_start', 'assigned_user_id', 'created_at'];
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
        }
        
        //get data
        $grid = [];
        $res = $this->api('GET', "api/$jr");
        $data['grid'] = $this->createGrid($res, $gridcol, $gridcaption, $jr, 'table table-dark table-datalist');
    
        return view('datalist', $data);
    }

    function createGrid($data, $gridcol, $gridcaption, $jr, $class='') {
        if ($class!='') $class="class='$class' ";

        $caption = '<tr>';
        foreach($gridcaption as $col) {
            $caption.= "<th>".($col??'')."</th>";
        }
        $caption.= "</tr>";

        dump($jr);
        if (!empty($data)) {
            $tdata = '';
            foreach($data as $r) {
                $tdata.= '<tr>';
                $r = (array)$r; 
                foreach($gridcol as $idx=>$c) {
                    $v = $r[$c]??'';
                    $id = $r['id']??'';
                    if($idx==0) $v="<a href='".url('/'."$jr/$id")."'>$v</a>";
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

}
