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
        if(!$this->session->userdata("username")){
            redirect(site_url('users/login'));
        }
        //load model
        $this->load->model('audit_model', 'audit');
        $this->load->model('Basic_model', 'basic');
        $this->amp_code = $this->session->userdata('amp_code');
        $this->db = $this->load->database('default', true);
        $this->prov_code='44';


    }

    public function index()
    {
        $data['audit']=$this->audit->get_hospaudit($this->amp_code);
        $this->layout->view('audit/index_view',$data);
    }
    public function audit_hosp($hospcode)
    {
        $data['hospcode']=$hospcode;
        $data['sl_datetime'] = $this->basic->get_sl_datetime();
        $data['sl_cc'] = $this->basic->get_sl_cc();
        $data['sl_history'] = $this->basic->get_sl_history();
        $data['sl_phy_ex'] = $this->basic->get_sl_phy_ex();
        $data['sl_diag_text'] = $this->basic->get_sl_diag_text();
        $data['sl_treatment'] = $this->basic->get_sl_treatment();
        $this->layout->view('audit/audit_hosp_view',$data);
    }
    public function get_audit_hosp (){
        $hospcode=$this->input->post('hospcode');

        $rs = $this->audit->get_audit_hosp($hospcode);

        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    }
    public function get_audit_info (){
        $id=$this->input->post('id');

        $rs = $this->audit->get_audit_info($id);

        if($rs)
        {
            $rows = json_encode($rs);
            $json = '{"success": true, "rows": '.$rows.'}';
        }
        else
        {
            $json = '{"success": false, "msg": "ไม่มีข้อมูล."}';
        }

        render_json($json);
    }

    public function save_audit(){
        //$id=$this->session->userdata('user_id');
        $data=$this->input->post('items');
        $rs=$this->audit->save_audit($data);
        if($rs){
            $json = '{"success": true}';
            //$json = '{"success": true,"msg":"ท่านสามารถเข้าสู่ระบบได้ทันที"}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public function edit_audit(){
        //$id=$this->session->userdata('user_id');
        $data=$this->input->post('items');
        $rs=$this->audit->update_audit($data);
        if($rs){
            $json = '{"success": true}';
            //$json = '{"success": true,"msg":"ท่านสามารถเข้าสู่ระบบได้ทันที"}';
        }else{
            $json = '{"success": false}';
        }

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
