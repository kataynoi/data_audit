<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 30/5/2556
 * Time: 13:52 น.
 * To change this template use File | Settings | File Templates.
 */


class Settings extends CI_Controller {
    public $hospcode;
    public $hserv;
    public $amp_code;
    public $user_level;
    public $provid;
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('default_layout');

        //load model
        $this->load->model('Setting_model', 'setting');
        $this->load->model('Basic_model', 'basic');
        $this->prov_code='44';
    }
    public function index()
    {
        $this->layout->view('settings/index_view');
    }

    public function save_village_base(){
        //$password = $this->encode($this->input->post('password'));
        //$id=$this->session->userdata('user_id');
        $data=$this->input->post('items');
        $rs=$this->setting->save_village_base($data);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    } public function del_village_base(){
        //$password = $this->encode($this->input->post('password'));
        //$id=$this->session->userdata('user_id');
        $villid=$this->input->post('villid');
        $rs=$this->setting->del_village_base($villid);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public function set_village()
    {
        $data['amp']=$this->basic->get_amp($this->prov_code);
        $this->layout->view('settings/set_village_view',$data);
    }
 }
