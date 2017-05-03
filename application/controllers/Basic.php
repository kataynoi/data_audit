<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 19/11/2556
 * Time: 11:38 น.
 * To change this template use File | Settings | File Templates.
 */

class Basic extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Basic_model', 'basic');
        //$this->db = $this->load->database('default', true);
    }

    public function get_ampur_list()
    {
        $chw = $this->input->post('provcode');

        $rs = $this->basic->get_ampur_list($chw);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }



    public function get_tambon_list()
    {
        $chw = $this->input->post('chw');
        $amp = $this->input->post('amp');

        $rs = $this->basic->get_tambon_list($chw, $amp);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_subdistrict_list()
    {
        $amp = $this->input->post('amp');

        $rs = $this->basic->get_subdistrict_list($amp);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_village_list()
    {
        $tmb = $this->input->post('tmb');

        $rs = $this->basic->get_village_list($tmb);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_village_base()
    {
        $hospcode = $this->input->post('hospcode');

        $rs = $this->basic->get_village_base($hospcode);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

    public function get_moo_list()
    {
        $chw = $this->input->post('chw');
        $amp = $this->input->post('amp');
        $tmb = $this->input->post('tmb');

        $rs = $this->basic->get_moo_list($chw, $amp, $tmb);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }
    public function get_office_list_by_amp()
    {
        $provcode=$this->input->post('provcode');
        $amp=$this->input->post('amp');

        $rs = $this->basic->get_office_list_by_amp($provcode, $amp);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';

        render_json($json);
    }
    public function get_office_list_by_cup()
    {
        $cup=$this->input->post('cup');

        $rs = $this->basic->get_office_list_by_cup($cup);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';

        render_json($json);
    }

    public function what_new (){
        $this->basic->set_page_view('member');
        $rs=$this->basic->get_what_new();
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->create_date = to_thai_date_time($r->create_date);
            $obj->version=$r->version;
            $obj->what_new=$r->what_new;
            $obj->memo=$r->memo;
            $obj->link=$r->link;
            $arr_result[] = $obj;
        }
        $data['what_new']=$arr_result;
        $this->layout->setLayout('default_layout');
        $this->layout->view('about/what_new_view',$data);
    }
    public function search_icd_ajax()
    {
        $q = $this->input->post('query');
        $rs = $this->basic->search_icd_ajax($q);

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->name = $r->desc_r;
            $arr_result[] = $obj;
        }

        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';

        render_json($json);
    }
    public function get_person(){
        $cid = $this->input->post('cid');
        $rs=$this->basic->get_person($cid);
        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->name = $r->PTNAME;
            $obj->off_name = $this->basic->get_off_name($r->HOSPCODE);
            $obj->typearea = $r->TYPEAREA;
            $obj->cid       =$r->CID;
            $obj->address= $this->basic->get_address($r->HOSPCODE,$obj->cid);
            $obj->birth = to_thai_date($r->BIRTH);
            $obj->age   =$r->AGE;
            $arr_result[] = $obj;
        }

        $rows = json_encode($arr_result);
        $json = '{"success": true, "rows": '.$rows.'}';

        render_json($json);

    }
public function check_person_off_id(){
        $cid = $this->input->post('cid');
        $off_id = $this->input->post('off_id');
        $rs=$this->basic->get_person_off_id($cid,$off_id);
       if($rs){
           $json = '{"success": true,"check":true}';
       }else{
           $json = '{"success": true,"check":false}';
       }
        render_json($json);
    }
}
/* End of file basic.php */
/* Location: ./application/controlers/basic.php */