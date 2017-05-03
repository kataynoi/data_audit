<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       if(!$this->session->userdata("username"))
            redirect(site_url('users/login'));
        $this->load->model('Base_data_model', 'base_data');
        $this->load->model('Reports_model', 'reports');
    }
	public function index()
	{
		$this->layout->view('download/index_view');
	}

    public function get_disease(){
        $year=$this->input->post('year');
        $rs     =$this->reports->get_disease_by_year($year);

        $arr_result = array();
        foreach($rs as $r)
        {
            $obj = new stdClass();
            $obj->m_id      = $r->m_id;
            $obj->fullname  =$r->fullname;
            $obj->total_44     =$r->total_44;
            $obj->total_40     =$r->total_40;
            $obj->total_45     =$r->total_45;
            $obj->total_46     =$r->total_46;
            //$obj->median    =$this->report->get_median_month($year,$code506,$r->m_id);
            $arr_result[] = $obj;
        }
        $json = $rs ? '{"success": "true", "rows": ' . json_encode($arr_result) . '}' : '{"success": false, "msg": "ไม่พบข้อมูล"}';
        render_json($json);
    }
    public function get_top10(){
        $year=$this->input->post('year');
        $code=$this->input->post('code');
        $rs     =$this->reports->get_top10($year,$code);
        $json = '{"success": true, "rows": '.json_encode($rs).'}';
        render_json($json);
    }
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */