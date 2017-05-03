<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 13/11/2556
 * Time: 11:20 น.
 * To change this template use File | Settings | File Templates.
 */


class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }



    public function index()
    {

        $this->layout->view('about/index_view');
    }


}
