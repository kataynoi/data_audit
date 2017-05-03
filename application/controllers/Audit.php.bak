<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 13/11/2556
 * Time: 11:20 น.
 * To change this template use File | Settings | File Templates.
 */


class Audit extends CI_Controller {
    public $hospcode;
    public $amp_code;
    public $user_level;
    public $prov_code;
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('audit_layout');

        //load model
        $this->load->model('audit_model', 'audit');
        $this->load->model('Basic_model', 'basic');
        $this->hospcode = $this->session->userdata('hospcode');
        $this->amp_code = $this->session->userdata('amp_code');
        $this->user_level = $this->session->userdata('user_level');
        $this->hdc = $this->load->database('hdc', true);
        $this->db = $this->load->database('default', true);
        $this->prov_code='44';

        if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));
    }



    public function index()
    {
        $this->basic->set_page_view('Audit_index');
        $data['audit']=$this->audit->get_audit57();
        $this->layout->view('audit/index_view',$data);
    }
    public function audit_hosp()
    {
        $this->basic->set_page_view('Audit_hosp');
        $data['audit']=$this->audit->get_audit57();
        $this->layout->view('audit/audit_hosp_view',$data);
    }
    public function audit2(){
        $this->basic->set_page_view('Audit2');
        $data['audit']=$this->audit->get_audit57();
        $this->layout->view('audit/audit2_view',$data);

    }
    public function audit4(){
        $this->basic->set_page_view('Audit3');
        $data['audit']=$this->audit->get_audit57();
        $this->layout->view('audit/audit4_view',$data);

    }
    public function get_audit_hosp (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);
        $type=$this->input->post('type');
        if($type=='op'){
            $rs = $this->audit->get_audit_hosp_op($hospcode,$s,$e);
        }else if($type=='dent'){
            $rs = $this->audit->get_audit_hosp_dent($hospcode,$s,$e);
        }else if($type=='dm'){
            $rs = $this->audit->get_audit_hosp_dm($hospcode,$s,$e);
        }else if($type=='ht'){
            $rs = $this->audit->get_audit_hosp_ht($hospcode,$s,$e);
        }else if($type=='thaimed'){
            $rs = $this->audit->get_audit_hosp_thaimed($hospcode,$s,$e);
        }else if($type=='thaidrug'){
            $rs = $this->audit->get_audit_hosp_thaidrug($hospcode,$s,$e);
        }else if($type=='epi1'){
            $rs = $this->audit->get_audit_hosp_epi1($hospcode,$s,$e);
        }else if($type=='epi2'){
            $rs = $this->audit->get_audit_hosp_epi2($hospcode,$s,$e);
        }else if($type=='epi3'){
            $rs = $this->audit->get_audit_hosp_epi3($hospcode,$s,$e);
        }else if($type=='epi5'){
            $rs = $this->audit->get_audit_hosp_epi5($hospcode,$s,$e);
        }


        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->ptname = $r->PTNAME;
            $obj->off_name = $this->basic->get_off_name($r->HOSPCODE);
            $obj->cid = $r->CID;
            $obj->birth =to_thai_date($r->BIRTH);
            $obj->pid =$r->pid;
            $obj->sex =get_sex($r->SEX);
            $obj->age =$r->AGE;
            $obj->address =$this->basic->get_address($r->HOSPCODE,$obj->cid);
            $obj->total =$r->total_service;
            $obj->type =$type;

            $arr_result[] = $obj;
        }

        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function get_audit_ur (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);

        $rs = $this->audit->get_audit_ur($hospcode,$s,$e);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->month = to_thai_month($r->M);
            $obj->total =$r->op_service;
            $obj->all_service=$r->all_service;
            $obj->price_op=$r->price_op;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_audit_top_service (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);

        $rs = $this->audit->get_audit_top_service($hospcode,$s,$e);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->date_serv = to_thai_date($r->DATE_SERV);
            $obj->total =$r->total_service;
            $obj->op =$r->op;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_audit_top_diag (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);

        $rs = $this->audit->get_audit_top_diag($hospcode,$s,$e);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->icd10 = $r->ICD10;
            $obj->diseasename = $this->basic->get_diseasename($r->ICD10);
            $obj->total =$r->total_service;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_audit_top_proced (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);

        $rs = $this->audit->get_audit_top_proced($hospcode,$s,$e);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->icd9 = $r->ICD9;
            $obj->procedname = $this->basic->get_procedname($r->ICD9);
            $obj->total =$r->total_service;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function get_audit_top_drug (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);

        $rs = $this->audit->get_audit_top_drug($hospcode,$s,$e);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->drugcode = $r->DIDSTD;
            $obj->drugname = $r->DNAME;
            $obj->total_drug =$r->total_drug;
            $obj->total =$r->total;
            $obj->price =$r->PRICE;
            $obj->cost =$r->COST;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function get_audit_disease_group (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);

        $rs = $this->audit->get_audit_disease_group($hospcode,$s,$e);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->group_code = $r->des_code;
            $obj->group_name = $r->group_name;
            $obj->time =$r->total_time;
            $obj->total =$r->total_service;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_service (){
        $items=$this->input->post('items');
        $hospcode=$items['hospcode'];
        $cid=$items['cid'];
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);
        $op=$items['op'];
        if($op=='1'){
            $rs = $this->audit->get_service_op($hospcode,$cid,$s,$e);
        }else{
            $rs = $this->audit->get_service($hospcode,$cid,$s,$e);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->date_serv= to_thai_date($r->DATE_SERV);
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function get_visit_list (){
        $items=$this->input->post('items');
        $cid=$items['cid'];
        $visit_date=to_mysql_date_dash($items['visit_date']);


        $rs = $this->audit->get_visit_list($cid,$visit_date);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->date_serv= to_thai_date($r->DATE_SERV);
            $obj->off_name = $this->basic->get_off_name($r->HOSPCODE);
            $obj->age = $r->AGE." ปี ".$r->month." เดือน";
            $obj->seq = $r->SEQ;
            $obj->diagcode=$r->DIAGCODE;
            $obj->diseasename = $this->basic->get_diseasename($r->DIAGCODE);
            $obj->diag=$this->basic->get_diag_visit($r->HOSPCODE,$r->SEQ);
            $obj->drug=$this->basic->get_drug_visit($r->HOSPCODE,$r->SEQ);
            $obj->proced=$this->basic->get_proced_visit($r->HOSPCODE,$r->SEQ);
            $obj->bp1 = $r->SBP."/".$r->DBP;
            $obj->price=$r->PRICE;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
public function check_person_audit(){
    $cid=$this->input->post('cid');
    $hospcode=$this->input->post('hospcode');

    $rs=$this->audit->get_person_audit($cid,$hospcode);
    if($rs){
        $json = '{"success": true,"check":true}';
    }else{
        $json = '{"success": true,"check":false}';
    }
    render_json($json);
}

    //################# End Labor


}
