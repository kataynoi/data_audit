<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patient model \*\n\n \*
 *

 *
*/
class Patient_model extends CI_Model {

    public $hospcode;
    public $cup_code;
    public $provcode;
    public $year;


    public function get_dm_total_by_prov($provid){
        $rs = $this->db
            ->select('COUNT(DISTINCT a.CID)AS total',false)
            ->where('b.provid',$provid)
            ->where('a.DIAGCODE BETWEEN'," 'E10' AND 'E149'",false)
            ->join('co_office b','a.hospcode=b.off_id')
            ->get('person_service_diag_chronic a')
            ->row();
        return $rs;
    }

    public function get_ht_total_by_prov($provid){
        $rs = $this->db
            ->select('COUNT(DISTINCT a.CID)AS total',false)
            ->where('b.provid',$provid)
            ->where('a.DIAGCODE BETWEEN'," 'I10' AND 'I159'",false)
            ->join('co_office b','a.hospcode=b.off_id')
            ->get('person_service_diag_chronic a')
            ->row();
        return $rs;
    }
    public function get_ckd_total_by_prov($provid){
        $rs = $this->db
            ->select('COUNT(DISTINCT a.CID)AS total',false)
            ->where('b.provid',$provid)
            ->where('a.DIAGCODE BETWEEN'," 'N17' AND 'N199'",false)
            ->join('co_office b','a.hospcode=b.off_id')
            ->get('person_service_diag_chronic a')
            ->row();
        return $rs;
    }
    public function get_ckd_dmht_total_by_prov($provid){
        $rs = $this->db
            ->select('COUNT(DISTINCT a.CID) AS total',false)
            ->where('b.provid',$provid)
            ->where('a.DIAGCODE BETWEEN'," 'N17' AND 'N199'",false)
            ->join('co_office b','a.hospcode=b.off_id')
            ->join("(SELECT CID FROM person_service_diag_chronic WHERE (DIAGCODE BETWEEN 'E10' AND 'E149') OR (DIAGCODE BETWEEN 'I10' AND 'I159')) as c",'a.CID=c.CID')
            ->get('person_service_diag_chronic a')
            ->row();
        return $rs;
    }
    public function get_service($cid,$s,$e){
        $rs = $this->db
            ->select("a.HOSPCODE,a.DATE_SERV",false)
            ->where('a.CID',$cid)
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->group_by('a.DATE_SERV')
            ->order_by('a.DATE_SERV','ASC')
            ->get('person_service_diag a')
            ->result();
        return $rs;

}
}
/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */