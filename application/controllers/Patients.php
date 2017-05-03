<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patients Controller
 *

 *
 */

class Patients extends CI_Controller
{
    public $hospcode;
    public $cup_code;
    public $provcode;
    public $amp_code;
    public $user_level;
    public $year;




    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata("username")
            redirect(site_url('users/login'));

        $this->hospcode = $this->session->userdata('hospcode');
        $this->cup_code = $this->session->userdata('cup_code');
        $this->provcode = $this->session->userdata('provcode');
        $this->amp_code = $this->session->userdata('amp_code');
        $this->user_level = $this->session->userdata('user_level');
        $this->year=$this->session->userdata('year');
       /* if($this->user_level == '0')
            redirect(site_url('admin'));*/


        $this->load->model('Patient_model', 'patient');
        $this->load->model('Basic_model', 'basic');

        $this->patient->hospcode = $this->hospcode;
        $this->patient->cup_code = $this->cup_code;
        $this->patient->provid = $this->provcode;
        $this->patient->year = $this->year;

    }

    public function index()
    {
        $this->session->set_userdata('status','online', 1);
        $data['hospital_type']  = $this->basic->get_hospital_type_list();

        $this->layout->view('patients/index_view', $data);
    }


    public function get_dm_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_dm_total_by_prov($this->provcode);
    }else if($this->user_level=='2'){
        $rs = $this->patient->get_dm_total_by_cup($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);
    }

    public function get_ht_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_ht_total_by_prov($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);

    }
    public function get_ckd_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_ckd_total_by_prov($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);
    }
    public function get_ckd_dmht_total()
    {
    if($this->user_level=='1'){
        $rs = $this->patient->get_ckd_dmht_total_by_prov($this->provcode);
    }
    $json = '{"success": true, "total": '.$rs->total.'}';
        render_json($json);
    }
    public function ckd()
    {
        $this->session->set_userdata('status','online', 1);
        $data['cup']=$this->basic->get_cup($this->provcode);
        $this->layout->view('patients/ckd_view', $data);
    }
    public function pt_service(){

        $this->layout->view('patients/pt_service_view');

    }
    public function get_service (){
        $items=$this->input->post('items');
        $cid=$items['cid'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);
        $op=$items['op'];

            $rs = $this->patient->get_service($cid,$s,$e);


        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->date_serv= to_thai_date($r->DATE_SERV);
            $obj->hospname=$this->basic->get_off_name($r->HOSPCODE);
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */