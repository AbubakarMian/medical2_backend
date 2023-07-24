<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataImportController extends Controller
{
    public function index(){
        return view('import.index');
    }

    public function view_table(Request $request){
        $table_name = $request->table;
        $table_data = DB::table($table_name)->orderby('id','desc')->get();
        $columns = \Schema::getColumnListing($table_name);// ->select('name', 'surname')   ->selectRaw("(CASE WHEN (gender = 1) THEN 'M' ELSE 'F' END) as gender_text")
        return view('import.view_table',compact('table_name','columns','table_data'));
    }

    public function user_import(){
        $table_map = [
                'mdl_user.id'=>'users.id',
                'mdl_user.uid'=>'users.uid',
                'mdl_user.slotid'=>'users.slotid',
                'mdl_user.auth'=>'users.auth',
                'mdl_user.email'=>'users.email',
                'mdl_user.confirmed'=>'users.confirmed',
                'mdl_user.policyagreed'=>'users.policyagreed',
                'mdl_user.deleted'=>'users.deleted',
                'mdl_user.suspended'=>'users.suspended',
                'mdl_user.username'=>'users.name',
                'mdl_user.password'=>'users.password',
                'mdl_user.purepwd'=>'users.purepwd',
                'mdl_user.idnumber'=>'users.idnumber',
                'mdl_user.firstname'=>'users.firstname',
                'mdl_user.lastname'=>'users.last_name',
                'mdl_user.email'=>'users.email',
                'mdl_user.emailstop'=>'users.emailstop',
                'mdl_user.skype'=>'users.skype',
                'mdl_user.yahoo'=>'users.yahoo',
                'mdl_user.aim'=>'users.aim',
                'mdl_user.msn'=>'users.msn',
                'mdl_user.phone1'=>'users.phone_no',
                'mdl_user.phone2'=>'users.phone_no2',
                'mdl_user.institution'=>'users.institution',
                'mdl_user.department'=>'users.department',
                'mdl_user.address'=>'users.address',
                'mdl_user.city'=>'users.city',
                'mdl_user.country'=>'users.country',
                'mdl_user.lang'=>'users.lang',
                'mdl_user.calendartype'=>'users.calendartype',
                'mdl_user.theme'=>'users.theme',
                'mdl_user.timezone'=>'users.timezone',
                'mdl_user.firstaccess'=>'users.firstaccess',
                'mdl_user.lastaccess'=>'users.lastaccess',
                'mdl_user.lastlogin'=>'users.lastlogin',
                'mdl_user.currentlogin'=>'users.currentlogin',
                'mdl_user.lastip'=>'users.lastip',
                'mdl_user.secret'=>'users.secret',
                'mdl_user.picture'=>'users.picture',
                'mdl_user.url'=>'users.url',
                'mdl_user.description'=>'users.description',
                'mdl_user.descriptionformat'=>'users.descriptionformat',
                'mdl_user.mailformat'=>'users.mailformat',
                'mdl_user.maildigest'=>'users.maildigest',
                'mdl_user.maildisplay'=>'users.maildisplay',
                'mdl_user.autosubscribe'=>'users.autosubscribe',
                'mdl_user.trackforums'=>'users.trackforums',
                'mdl_user.timecreated'=>'users.timecreated',
                'mdl_user.timemodified'=>'users.timemodified',
                'mdl_user.trustbitmask'=>'users.trustbitmask',
                'mdl_user.imagealt'=>'users.imagealt',
                'mdl_user.lastnamephonetic'=>'users.lastnamephonetic',
                'mdl_user.firstnamephonetic'=>'users.firstnamephonetic',
                'mdl_user.middlename'=>'users.middlename',
                'mdl_user.alternatename'=>'users.alternatename',
                'mdl_user.business'=>'users.business',
                'mdl_user.zip'=>'users.zip_code',
                'mdl_user.state'=>'users.state',
                'mdl_user.come_from'=>'users.come_from',
                'mdl_user.inst'=>'users.inst',
                'mdl_user.inst_sum'=>'users.inst_sum',
                'mdl_user.inst_num'=>'users.inst_num',
                'mdl_user.opt_in'=>'users.opt_in',
                'mdl_user.unsubscribed'=>'users.unsubscribed',
        ];



        $this->import_data('mdl_user','users',$table_map);
        // $this->import_data($import_table,$insert_table,$table_map);
 
        return redirect('migrate/table/view?table=users');

    }

    public function import_data($import_table,$insert_table,$table_map){
        $table_data = DB::table($import_table)->get();
        $bulk_insert_arr = [];
        $insert_user = [];

        foreach ($table_map as $key => $column) {
            $insert_user[explode('.',$column)[1]] = ''; 
        }
        $insert_user_values = $insert_user;
        foreach ($table_data as $key => $row_data) {
            $insert_user_values = $insert_user;
            foreach ($row_data as $row_column_key => $row_column_value) {
                if(!isset($table_map[$import_table.'.'.$row_column_key])){
                    continue;
                }
                $user_column_key = $table_map[$import_table.'.'.$row_column_key];
                $user_column_name = explode('.',$user_column_key)[1];
                $insert_user_values[$user_column_name] = $row_column_value;
            }
            $bulk_insert_arr[] = $insert_user_values;
        }

        foreach(array_chunk($bulk_insert_arr,1000) as $arr_chunck){
            DB::table($insert_table)->insert($arr_chunck);
        }
    }
}
