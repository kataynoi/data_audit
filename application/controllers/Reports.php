<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patients Controller
 *

 *
 */

class Reports extends CI_Controller
{

    public $area;
    public $cup_code;
    public $provcode;
    public $user_level;
    public $year;




    public function __construct()
    {
        parent::__construct();

       /* if(!$this->session->userdata("username")
            redirect(site_url('users/login'));*/

        $this->hospcode = $this->session->userdata('hospcode');
        $this->cup_code = $this->session->userdata('cup_code');
        $this->provcode = $this->session->userdata('provcode');
        $this->amp_code = $this->session->userdata('amp_code');
        $this->user_level = $this->session->userdata('user_level');
        $this->year=$this->session->userdata('year');
        $this->area=area();
       /* if($this->user_level == '0')
            redirect(site_url('admin'));*/


        $this->load->model('Patient_model', 'patient');
        $this->load->model('Basic_model', 'basic');
        $this->load->model('Reports_model', 'reports');

        $this->patient->hospcode = $this->hospcode;
        $this->patient->cup_code = $this->cup_code;
        $this->patient->provid = $this->provcode;
        $this->patient->year = $this->year;

    }

    public function index()
    {
        $this->basic->set_page_view('reports/index');
        $this->session->set_userdata('status','online', 1);
        $data['reports_item']  = $this->reports->get_reports_list('1');
        $this->layout->view('reports/index_view', $data);
    }
    public function y96()
    {
        $this->basic->set_page_view('reports/screen_ckd');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/y96_view', $data);
    }

    public function get_y96 (){
        $year=$this->input->post('year');
        $prov=$this->input->post('prov');
        $amp=$this->input->post('amp');
        $code='y96';

        if(!empty($year) && empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_y_by_year($year,$code);
        }else if(!empty($year) && !empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_y_by_prov($year,$code,$prov);
        }else if(!empty($year) && !empty($prov)&& !empty($amp)){
            $rs = $this->reports->get_disease_y_by_amp($year,$code,$prov,$amp);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->code      = $r->code;
            //$obj->pname     = $this->basic->get_prov_name($r->code);
            $obj->name      =$r->name;
            $obj->total     =$r->total;
            $obj->male      =$r->male;
            $obj->female    =$r->female;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function y97()
    {
        $this->basic->set_page_view('reports/screen_ckd');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/y97_view', $data);
    }

    public function get_y97 (){
        $year=$this->input->post('year');
        $prov=$this->input->post('prov');
        $amp=$this->input->post('amp');
        $code='y97';

        if(!empty($year) && empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_y_by_year($year,$code);
        }else if(!empty($year) && !empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_y_by_prov($year,$code,$prov);
        }else if(!empty($year) && !empty($prov)&& !empty($amp)){
            $rs = $this->reports->get_disease_y_by_amp($year,$code,$prov,$amp);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->code      = $r->code;
            //$obj->pname     = $this->basic->get_prov_name($r->code);
            $obj->name      =$r->name;
            $obj->total     =$r->total;
            $obj->male      =$r->male;
            $obj->female    =$r->female;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
        public function principle_y96()
    {
        //$this->basic->set_page_view('reports/screen_ckd');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/principle_y96_view', $data);
    }

    public function get_principle_y96 (){
        $year=$this->input->post('year');
        $prov=$this->input->post('prov');
        $amp=$this->input->post('amp');
        $code='y96';

        if(!empty($year) && empty($prov)&& empty($amp)){
            $rs = $this->reports->get_principle_y_by_year($year,$code);
        }else if(!empty($year) && !empty($prov)&& empty($amp)){
            $rs = $this->reports->get_principle_y_by_prov($year,$code,$prov);
        }else if(!empty($year) && !empty($prov)&& !empty($amp)){
            $rs = $this->reports->get_disease_y_by_amp($year,$code,$prov,$amp);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->code      = $r->code;
            $obj->name     = $this->basic->get_diseasename($r->code);
            $obj->total     =$r->total;
            $obj->male      =$r->male;
            $obj->female    =$r->female;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function principle_y97()
    {
        //$this->basic->set_page_view('reports/screen_ckd');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/principle_y97_view', $data);
    }

    public function get_principle_y97 (){
        $year=$this->input->post('year');
        $prov=$this->input->post('prov');
        $amp=$this->input->post('amp');
        $code='y97';

        if(!empty($year) && empty($prov)&& empty($amp)){
            $rs = $this->reports->get_principle_y_by_year($year,$code);
        }else if(!empty($year) && !empty($prov)&& empty($amp)){
            $rs = $this->reports->get_principle_y_by_prov($year,$code,$prov);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->code      = $r->code;
            $obj->pname     = $this->basic->get_diseasename($r->code);
            $obj->name      =$r->name;
            $obj->total     =$r->total;
            $obj->male      =$r->male;
            $obj->female    =$r->female;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function individual()
    {
        /*if(!$this->session->userdata("username"))
            redirect(site_url('users/login'));*/
        //$this->basic->set_page_view('reports/screen_ckd');
        //$this->session->set_userdata('status','online', 1);
        //$data['cup']=$this->basic->get_cup($this->provcode);
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/individual_view', $data);
    }

    public function get_individual (){

        $items=$this->input->post('items');
        $s=to_mysql_date_dash($items['date_start']);
        $e=to_mysql_date_dash($items['date_end']);
        $hospcode=$items['hospcode'];

        $rs = $this->reports->get_individual_hospcode($hospcode,$s,$e);


        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->hospname  = $r->hospcode;
            $obj->ptname    =$r->ptname;
            $obj->hn    =$r->pid;
            //$obj->pname     = $this->basic->get_diseasename($r->code);
            $obj->date_serv      =to_thai_date($r->date_serv);
            $obj->disease = $this->basic->get_diseasename($r->diag_principle);
            $obj->disease_env = $r->diagcode;
            $obj->occ = $this->basic->get_occupa($r->occupa);
            $obj->age = $r->age;
            $obj->sex = $r->sex;

            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

// ผู้ป่วยแยกเพศ
    public function y96_sex()
    {
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/y96_sex_view', $data);
    }
public function y97_sex()
    {
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/y97_sex_view', $data);
    }

public function get_y96_sex (){
        $year=$this->input->post('year');
        $prov=$this->input->post('prov');
        $amp=$this->input->post('amp');
        $code='y96';

        if(!empty($year) && empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_sex_by_year($year,$code);
        }else if(!empty($year) && !empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_sex_by_prov($year,$code,$prov);
        }else if(!empty($year) && !empty($prov)&& !empty($amp)){
            $rs = $this->reports->get_disease_sex_by_amp($year,$code,$prov,$amp);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->code      = $r->code;
            $obj->name     = $this->basic->get_diseasename($r->code);
            $obj->total     =$r->total;
            $obj->male      =$r->male;
            $obj->female    =$r->female;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function y96_age()
    {
        $data['prov']=$this->basic->get_province_area($this->area);
        //$data='';
        $this->layout->view('reports/y97_age_view', $data);
    }

    public function get_y96_age (){
        $year=$this->input->post('year');
        $prov=$this->input->post('prov');
        $amp=$this->input->post('amp');
        $code='y96';

        if(!empty($year) && empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_age_by_year($year,$code);
        }else if(!empty($year) && !empty($prov)&& empty($amp)){
            $rs = $this->reports->get_disease_age_by_prov($year,$code,$prov);
        }else if(!empty($year) && !empty($prov)&& !empty($amp)){
            $rs = $this->reports->get_disease_age_by_amp($year,$code,$prov,$amp);
        }

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->code      = $r->code;
            $obj->name     = $this->basic->get_diseasename($r->code);
            $obj->total     =$r->total;
            $obj->male      =$r->male;
            $obj->female    =$r->female;
            $arr_result[] = $obj;
        }
        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }





}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */