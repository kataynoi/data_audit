<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Basic model
 *

 *
 */

class Audit_model extends CI_Model
{
    public function get_hospaudit($code)
    {
        $rs = $this->db
            ->select("a.hospcode,CONCAT(a.hospcode,':',b.hosname) as hospname,count(*) as total ",false)
            ->select("SUM(IF(a.diag_group=1,1,0)) as g_1",false)
            ->select("SUM(IF(a.diag_group=2,1,0)) as g_2",false)
            ->select("SUM(IF(a.diag_group=3,1,0)) as g_3",false)
            ->select("SUM(IF(a.diag_group=4,1,0)) as g_4",false)
            ->select("SUM(IF(a.diag_group=5,1,0)) as g_5",false)
            ->select("SUM(IF(a.diag_group=6,1,0)) as g_6",false)
            ->select("SUM(IF(a.diag_group=7,1,0)) as g_7",false)
            ->select("SUM(IF(a.diag_group=8,1,0)) as g_8",false)
            ->select("SUM(IF(a.diag_group=9,1,0)) as g_9",false)
            ->select("SUM(IF(a.diag_group=10,1,0)) as g_10",false)
            ->select("SUM(IF(a.diag_group=11,1,0)) as g_11",false)
            ->select("SUM(IF(a.diag_group=12,1,0)) as g_12",false)
            ->join('chospital b ','a.hospcode = b.hoscode')
            ->join('campur c ','CONCAT("44",b.distcode) = c.ampurcodefull')
            ->where('c.ampurcodefull',$code)
            ->group_by('a.hospcode')
            ->get('data_audit a')

            ->result();

        return $rs;

    }
    public  function get_audit_hosp($hospcode){
        $rs = $this->db
            ->where('hospcode',$hospcode)
            ->order_by('date_serve')
            ->get('data_audit ')
            ->result();
        return $rs;
    }
    public  function get_audit_info($id){
        $rs = $this->db
            ->where('id',$id)
            ->get('data_audit ')
            ->row();
        return $rs;
    }
    public function save_audit($data)
    {
        $rs = $this->db

            ->set('data_audit_id',$data['data_audit_id'])
            ->set('hospcode', $data['hospcode'])
            ->set('seq', $data['seq'])
            ->set('max_score', $data['max_score'])
            ->set('score', $data['score'])
            ->set('percent', $data['percent'])
            ->set('cc', $data['cc'])
            ->set('datetime', $data['datetime'])
            ->set('history', $data['history'])
            ->set('phy_ex', $data['phy_ex'])
            ->set('diag_text', $data['diag_text'])
            ->set('treatment', $data['treatment'])
            ->set('date_audit', date('Y-m-d'))
            ->set('date_record', date('Y-m-d H:i:s'))
            ->insert('audit');

        return $rs;
    }
}

/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */