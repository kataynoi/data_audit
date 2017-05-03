<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 13/11/2556
 * Time: 11:20 น.
 * To change this template use File | Settings | File Templates.
 */


class Download extends CI_Controller {
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
    }

    public function index()
    {
        //$data['audit']=$this->audit->get_hospaudit($this->amp_code);
        $this->layout->view('download/index_view');
    }

}
