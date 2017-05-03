<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imports40 extends CI_Controller {


    public $prov_server;
    public $prov_code;

    public function __construct()
    {
        parent::__construct();
       /* if(!$this->session->userdata("username_".sys_id()))
            redirect(site_url('users/login'));*/
        $this->load->model('Base_data_model', 'base_data');
        $this->load->model('Import_model', 'import');
        //$this->get_import();
        $this->prov_code='40';
        $this->prov_server=prov_server($this->prov_code);
   /*     for($i=2553;$i<2559;$i++){
            $this->get_import_hcup_ckd_01_01($i);
        }*/
    }
	public function index()
	{
		$this->layout->view('pages/index_view');
	}

    public function get_import()
    {
        $record_per_import=1000;
        $start=0;
        $rows_import=0;
        $last=0;
        //echo date('Y-m-d h:m:s');

        $key=$this->key->create_api_key();
        $url_total = $this->prov_server."index.php?key=".$key."&module=data_total_by_flag&flag=1";
        $data_total = file_get_contents($url_total);
        echo $url_total;
        $rows_total = json_decode($data_total);
        echo "<br> Total :".$rows_total->total;
        if($rows_total->total==0){
            exit();
        }
        if($rows_total->total > $record_per_import){
            $loop=ceil($rows_total->total/$record_per_import);
            $last=$rows_total->total % $record_per_import;
        }else{
            $loop=1;
        }
        //echo "<br> loop :".$loop;
        //exit();
        for ($i = 0; $i < $loop; $i++) {
            $packet_id=$this->key->get_packet_id();
            $start_time=date('Y-m-d H:m:s');
            if($i==$loop){ $record_per_import=$last;}
            $url = $this->prov_server . "index.php?packet_id=".$packet_id."&key=" . $key . "&start=" . $start . "&limit=" . $record_per_import . "&flag=1";
            echo "<br>".$url; //exit();
            $data = file_get_contents($url);
            if ($data) {
                $num_rows = 0;
                $rows = json_decode($data);
                foreach ($rows->rows as $r) {
                    if($this->import->import_data($r, $this->prov_code,$packet_id)){
                        $num_rows++;
                    };

                }
                //echo "<br>Imports Loop".$i." Start ".$start." Numrows" . $num_rows;
            }
            echo "<br>".$num_rows." R ".$record_per_import;
            $end_time=date('Y-m-d H:m:s');
            if($num_rows==$record_per_import){
                $key=$this->key->create_api_key();
                $url_success = $this->prov_server."index.php?packet_id=".$packet_id."&key=".$key."&module=success_packet";
                $data = file_get_contents( $url_success);
            }
            //$rows = json_decode($data);
            $this->import->set_import_log($this->prov_code,$packet_id,$start_time,$end_time,$num_rows);
            //if($i==5){ exit();}
            //$start=$start+$record_per_import;
            $rows_import=$rows_import+$num_rows;

        }
        echo "All_recode ".$rows_total->total." Imports Success : ".$rows_import." record";
    }
}
/* End of file pages.php */
/* Location: ./application/controllers/pages.php */