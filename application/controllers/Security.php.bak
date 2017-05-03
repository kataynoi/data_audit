<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patients Controller
 *

 *
 */

class Security extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

       /* if(!$this->session->userdata("username_".sys_id()))
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
        $this->session->set_userdata('status','online', 1);
        $data['reports_item']  = $this->reports->get_reports_list('1');
        $this->layout->view('reports/index_view', $data);
    }
    public function en_sc_code()
    {
        $code2=mktime();
        $code2=substr($code2,5,5).substr($code2,0,5);
        $code2=base64_encode(base64_encode($code2));
        return $code2;
    }
        public function de_sc_code($code2)
    {
        $code2=base64_decode(base64_decode($code2));
        $code2=substr($code2,5,5).substr($code2,0,5);
        return $code2;
}


    public function new_ckd()
    {
        echo mktime();
        echo "<br>".$this->en_sc_code();
        echo "<br>";
        echo $this->de_sc_code($this->en_sc_code());
    }

}

/* End of file patients.php */
/* Location: ./application/controllers/patients.php */