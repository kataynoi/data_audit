<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 12/11/2556
 * Time: 0:31 น.
 * To change this template use File | Settings | File Templates.
 */

class Setting_model extends CI_Model
{
    public $hospcode;
    public $hserv;
    public function save_edit_hserv($data)
    {
        $rs = $this->db
            ->set('off_name',$data['name'])
            ->set('off_name2',$data['title'])
            ->set('hserv', $data['hserv'])
            ->set('amphur', $data['amp_code'])
            ->where('off_id',$data['hospcode'])
            ->update('co_office');

        return $rs;
    }
    public function save_village_base($data)
    {
        $rs = $this->db
            ->set('hospcode',$data['hospcode'])
            ->where('villid',$data['villid'])
            ->update('co_village');

        return $rs;
    }public function del_village_base($villid)
    {
        $rs = $this->db
            ->set('hospcode','')
            ->where('villid',$villid)
            ->update('co_village');

        return $rs;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */