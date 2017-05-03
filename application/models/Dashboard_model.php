<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 18/11/2556
 * Time: 11:10 น.
 * To change this template use File | Settings | File Templates.
 */

class Dashboard_model extends CI_Model
{
    public function get_meter_ncdscreen($year)
    {
        $rs = $this->db
        ->select('year,target,result,(result*100/target) as percent')
        ->where('year',$year)
        ->where('prc_name','ncd_screen')
        ->get('dashboard')
        ->result();
        return $rs;
    }
    public function get_meter_z133($year)
    {
        $rs = $this->db
        ->select('year,target,result,(result*100/target) as percent')
        ->where('year',$year)
        ->where('prc_name','z133')
        ->get('dashboard')
        ->result();
        return $rs;
    } public function get_meter_z131($year)
    {
        $rs = $this->db
        ->select('year,target,result,(result*100/target) as percent')
        ->where('year',$year)
        ->where('prc_name','z131')
        ->get('dashboard')
        ->result();
        return $rs;
    } public function get_meter_z136_z138($year)
    {
        $rs = $this->db
        ->select('year,target,result,(result*100/target) as percent')
        ->where('year',$year)
        ->where_in('prc_name','z136_z138')
        ->get('dashboard')
        ->result();
        return $rs;
    }

}

/* End of file base_data_model.php */