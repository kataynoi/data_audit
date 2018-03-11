<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //if (!$this->session->userdata("username"))
            //redirect(site_url('users/login'));
        $this->load->model('Base_data_model', 'base_data');
        $this->load->model('Reports_model', 'reports');
        $this->prov_code=get_provcode();
    }

    public function index()
    {

        $data['percent_audit'] = number_format($this->reports->get_percent_audit(), 2);
        $data['percent_audit_true'] = number_format($this->reports->get_percent_audit_true(), 2);
        $data['percent_audit_icd10'] = number_format($this->reports->get_percent_audit_icd10(), 2);;
        $data['percent_audit_icd10_true'] = number_format($this->reports->get_percent_audit_icd10_true(), 2);;
        $this->layout->view('pages/index_view', $data);
        $this->load->view('download/index_view');
        /*
        $data['offline_msq'] = 'ปิดปรับปรุงระบบ ถึง 22 พ.ค. 60 11.00 น.';
        $this->load->view('pages/offline_view',$data);*/
    }
    public  function  get_success_by_amp (){
        $note=$this->input->post('note');
        $rs = $this->reports->get_success_by_amp ($this->prov_code);
        $rows = json_encode($rs);

        $json = '{"success": true, "rows": '.$rows.'}';
        render_json($json);
    }

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */