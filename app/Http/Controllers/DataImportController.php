<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataImportController extends Controller
{
    public function index()
    {
        return view('admin.import_data.index');
    }
    public function get_expired_users(){

        // $query = 'SELECT mdl_user.firstname, mdl_course.fullname,mdl_certificates.cert_no,mdl_certificates.path,
        // mdl_certificates.issue_date,mdl_certificates.expiration_date
        // FROM mdl_certificates
        // JOIN mdl_user ON mdl_certificates.userid = mdl_user.id
        // JOIN mdl_course ON mdl_certificates.courseid = mdl_course.id
        // ORDER BY issue_date asc
        // limit 500
        // ';

        $table_data = DB::table('mdl_certificates')
        ->join('mdl_user', 'mdl_certificates.userid', '=', 'mdl_user.id')
        ->join('mdl_course', 'mdl_certificates.courseid', '=', 'mdl_course.id')
        ->select(
            'mdl_certificates.userid',
            'mdl_course.fullname as course',
            'mdl_certificates.courseid',
        'mdl_user.firstname as student', 'mdl_course.fullname','mdl_certificates.cert_no','mdl_certificates.path',
         'mdl_certificates.issue_date','mdl_certificates.expiration_date'
        )
        ->where('mdl_certificates.expiration_date','<',time())
        ->where('mdl_certificates.expiration_date','!=','n/a')
        ->orderby('mdl_certificates.issue_date','desc')
        // ->limit(500)
        ->get();


        $users_data = [];
        $certificates = [];
        foreach ($table_data as $key => $data) {
            if(!isset($users_data[$data->userid][$data->courseid])){
                // /var/www/public_html/lms/custom/certificates/20484/45/certificate.pdf
                $data->path = str_replace('/home/cnausa/public_html','https://medical2.com',$data->path);
                $data->path = str_replace('/var/www/public_html','https://medical2.com',$data->path);
                $data->ceritificate_issue_date = '';
                $data->ceritificate_expire_date = '';
                if(is_numeric($data->issue_date)){
                    $data->ceritificate_issue_date = date('Y-M-d',$data->issue_date);
                }
                
                if(is_numeric($data->expiration_date)){
                    $data->ceritificate_expire_date = date('Y-M-d',$data->expiration_date);
                }
                $users_data[$data->userid][$data->courseid] = $data;
                
                $certificates[] = $data;
            }
            
        }

        $certificates = collect($certificates);
        // dd(time());
        // dd($certificates );

        // /home/cnausa/public_html/lms/custom/certificates/3784/certificate.pdf
        // https://medical2.com/lms/custom/certificates/15543/56/certificate.pdf


       
        // $group = Group::with('courses', 'teacher','group_exams')->orderby('id', 'desc')->select('*')->get();
        $import_data['data'] = $certificates;
        echo json_encode($import_data);
       
    }
    public function index_all_certificates()
    {
        return view('admin.all_certificates.index');
    }
    public function get_all_certificates(){

        // $query = 'SELECT mdl_user.firstname, mdl_course.fullname,mdl_certificates.cert_no,mdl_certificates.path,
        // mdl_certificates.issue_date,mdl_certificates.expiration_date
        // FROM mdl_certificates
        // JOIN mdl_user ON mdl_certificates.userid = mdl_user.id
        // JOIN mdl_course ON mdl_certificates.courseid = mdl_course.id
        // ORDER BY issue_date asc
        // limit 500
        // ';

        $table_data = DB::table('mdl_certificates')
        ->join('mdl_user', 'mdl_certificates.userid', '=', 'mdl_user.id')
        ->join('mdl_course', 'mdl_certificates.courseid', '=', 'mdl_course.id')
        ->select(
            'mdl_certificates.userid',
            'mdl_course.fullname as course',
            'mdl_certificates.courseid',
        'mdl_user.firstname as student', 'mdl_course.fullname','mdl_certificates.cert_no','mdl_certificates.path',
         'mdl_certificates.issue_date','mdl_certificates.expiration_date'
        )
        // ->where('mdl_certificates.expiration_date','<',time())
        // ->where('mdl_certificates.expiration_date','!=','n/a')
        ->orderby('mdl_certificates.issue_date','desc')
        // ->limit(500)
        ->get();


        $users_data = [];
        $certificates = [];
        foreach ($table_data as $key => $data) {
            if(!isset($users_data[$data->userid][$data->courseid])){
                // /var/www/public_html/lms/custom/certificates/20484/45/certificate.pdf
                $data->path = str_replace('/home/cnausa/public_html','https://medical2.com',$data->path);
                $data->path = str_replace('/var/www/public_html','https://medical2.com',$data->path);
                $data->ceritificate_issue_date = '';
                $data->ceritificate_expire_date = '';
                if(is_numeric($data->issue_date)){
                    $data->ceritificate_issue_date = date('Y-M-d',$data->issue_date);
                }
                
                if(is_numeric($data->expiration_date)){
                    $data->ceritificate_expire_date = date('Y-M-d',$data->expiration_date);
                }
                $users_data[$data->userid][$data->courseid] = $data;
                
                $certificates[] = $data;
            }
            
        }

        $certificates = collect($certificates);
        // dd(time());
        // dd($certificates );

        // /home/cnausa/public_html/lms/custom/certificates/3784/certificate.pdf
        // https://medical2.com/lms/custom/certificates/15543/56/certificate.pdf


       
        // $group = Group::with('courses', 'teacher','group_exams')->orderby('id', 'desc')->select('*')->get();
        $import_data['data'] = $certificates;
        echo json_encode($import_data);
       
    }
  
    

    public function view_table(Request $request){
        $page_no = $request->page_no ?? 1;
        $table_name = $request->table;
        // $table_data = DB::table($table_name)->orderby('id','desc')->paginate(100);
        $table_data = DB::table($table_name)->orderby('id','desc')->get();
        // dd($table_data);
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
        return redirect('migrate/table/view?table=users');

    }

    public function course_import(){
        $table_map = [
            'mdl_course.id'=>'courses.id',
            'mdl_course.uid'=>'courses.uid',
            'mdl_course.installment'=>'courses.installment',
            'mdl_course.num_payments'=>'courses.num_payments',
            'mdl_course.category'=>'courses.category_id',
            'mdl_course.sortorder'=>'courses.sortorder',
            'mdl_course.fullname'=>'courses.full_name',
            'mdl_course.shortname'=>'courses.short_name',
            'mdl_course.idnumber'=>'courses.id_number',
            'mdl_course.summary'=>'courses.description',
            'mdl_course.format'=>'courses.format',
            'mdl_course.showgrades'=>'courses.showgrades',
            'mdl_course.newsitems'=>'courses.newsitems',
            'mdl_course.startdate'=>'courses.start_date',
            'mdl_course.marker'=>'courses.marker',
            'mdl_course.maxbytes'=>'courses.maxbytes',
            'mdl_course.legacyfiles'=>'courses.legacyfiles',
            'mdl_course.showreports'=>'courses.showreports',
            'mdl_course.visible'=>'courses.visible',
            'mdl_course.visibleold'=>'courses.visibleold',
            'mdl_course.groupmode'=>'courses.groupmode',
            'mdl_course.groupmodeforce'=>'courses.groupmodeforce',
            'mdl_course.defaultgroupingid'=>'courses.defaultgroupingid',
            'mdl_course.lang'=>'courses.lang',
            'mdl_course.calendartype'=>'courses.calendartype',
            'mdl_course.theme'=>'courses.theme',
            'mdl_course.timecreated'=>'courses.timecreated',
            'mdl_course.timemodified'=>'courses.timemodified',
            'mdl_course.requested'=>'courses.requested',
            'mdl_course.enablecompletion'=>'courses.enablecompletion',
            'mdl_course.completionnotify'=>'courses.completionnotify',
            'mdl_course.cacherev'=>'courses.cacherev',
            'mdl_course.discount_status'=>'courses.discount_status',
            'mdl_course.discount_size'=>'courses.discount_size',
            'mdl_course.cost'=>'courses.cost',
            'mdl_course.taxes'=>'courses.taxes',
            'mdl_course.expired'=>'courses.expired',
            'mdl_course.autopass'=>'courses.autopass',
        ];

        $this->import_data('mdl_course','courses',$table_map); 
        return redirect('migrate/table/view?table=courses');

    }
    public function course_category_import(){
        $table_map = [
            'mdl_course_categories.id'=>'category.id',
            'mdl_course_categories.name'=>'category.name',
            'mdl_course_categories.idnumber'=>'category.idnumber', 
            'mdl_course_categories.descriptionformat'=>'category.descriptionformat',
            'mdl_course_categories.parent'=>'category.parent',
            'mdl_course_categories.sortorder'=>'category.sortorder',
            'mdl_course_categories.coursecount'=>'category.coursecount',
            'mdl_course_categories.visible'=>'category.visible',
            'mdl_course_categories.visibleold'=>'category.visibleold',
            'mdl_course_categories.timemodified'=>'category.timemodified',
            'mdl_course_categories.depth'=>'category.depth',
            'mdl_course_categories.path'=>'category.path',
            'mdl_course_categories.theme'=>'category.theme',
        ];

        $this->import_data('mdl_course_categories','category',$table_map); 
        return redirect('migrate/table/view?table=category');

    }
    public function enroll_group_import(){
        $table_map = [
            'mdl_enrol.id'=>'group.id',
            'mdl_enrol.enrol'=>'group.enrol',
            'mdl_enrol.status'=>'group.status',
            'mdl_enrol.courseid'=>'group.courses_id',
            'mdl_enrol.sortorder'=>'group.sortorder', 
            'mdl_enrol.name'=>'group.name',
            'mdl_enrol.enrolstartdate'=>'group.start_date',
            'mdl_enrol.enrolenddate'=>'group.end_date',
            'mdl_enrol.expirynotify'=>'group.expirynotify',
            'mdl_enrol.expirythreshold'=>'group.expirythreshold',
            'mdl_enrol.roleid'=>'group.roleid',
            'mdl_enrol.customint1'=>'group.customint1',
            'mdl_enrol.customint2'=>'group.customint2',
            'mdl_enrol.customint3'=>'group.customint3',
            'mdl_enrol.customint4'=>'group.customint4',
            'mdl_enrol.customint5'=>'group.customint5',
            'mdl_enrol.customint6'=>'group.customint6',
            'mdl_enrol.timecreated'=>'group.timecreated',
            'mdl_enrol.timemodified'=>'group.timemodified',
        ];

        $this->import_data('mdl_enrol','group',$table_map); 
        return redirect('migrate/table/view?table=group');

    }

    public function enroll_group_users_import(){
        $table_map = [
            'mdl_user_enrolments.id'=>'course_register.id',
            'mdl_user_enrolments.status'=>'course_register.status', 
            'mdl_user_enrolments.enrolid'=>'course_register.group_id', 
            'mdl_user_enrolments.userid'=>'course_register.user_id', 
            // 'mdl_user_enrolments.'=>'course_register.courses_id', 
            'mdl_user_enrolments.timestart'=>'course_register.start_date',
            'mdl_user_enrolments.timeend'=>'course_register.end_date',
            'mdl_user_enrolments.modifierid'=>'course_register.modifierid',
            'mdl_user_enrolments.timecreated'=>'course_register.timecreated',
            'mdl_user_enrolments.timemodified'=>'course_register.timemodified',
        ];

        $this->import_data('mdl_user_enrolments','course_register',$table_map); 
        return redirect('migrate/table/view?table=course_register');

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
