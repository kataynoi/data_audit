<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patient model
 *

 *
*/
class Reports_model extends CI_Model {

    public $note='1/2560';

    public function get_percent_audit(){
        $rs = $this->db
            ->select('SUM(IF(b.percent IS NOT NULL,1,0))*100/COUNT(*) as percent_audit')
            ->where('a.note','1/2560')
            ->join('audit b','a.id=b.data_audit_id','left')
            ->get('data_audit a')
            ->row();
        return $rs->percent_audit;
    }
    public function get_percent_audit_true(){
        $rs = $this->db
            ->select('SUM(IF(b.percent >=75,1,0))*100/SUM(IF(b.percent IS NOT NULL,1,0)) as percent_audit_true')
            ->where('a.note','1/2560')
            ->join('audit b','a.id=b.data_audit_id','left')
            ->get('data_audit a')
            ->row();
        return $rs->percent_audit_true;
    }

    public function get_percent_audit_icd10(){
        $rs = $this->db
            ->select('SUM(IF(AUDIT_ICD10 IS NOT NULL,1,0))*100/COUNT(*) as percent_audit_icd10')
            //->where('a.note','1/2560')
            //->join('audit b','a.id=b.data_audit_id','left')
            ->get('diagnosis_opd a')
            ->row();
        return $rs->percent_audit_icd10;
    }
    public function get_percent_audit_icd10_true(){
        $rs = $this->db
           // ->select('SUM(IF(b.percent >=75,1,0))*100/SUM(IF(b.percent IS NOT NULL,1,0)) as percent_audit_true')
            ->select('SUM(IF(AUDIT_ICD10="Y",1,0))*100/SUM(IF(AUDIT_ICD10 IS NOT NULL,1,0)) as percent_audit_icd10_true')
            //->where('a.note','1/2560')
            //->join('audit b','a.id=b.data_audit_id','left')
            ->get('diagnosis_opd a')
            ->row();
        return $rs->percent_audit_icd10_true;
    }
    public  function get_success_by_amp ($note){
        $sql="SELECT b.ampurname,ROUND(a.percent_success,2) as success FROM (SELECT c.distcode,
                SUM(IF(b.percent is not null,1,0))*100/count(*) as percent_success
                FROM data_audit a
                LEFT JOIN audit b ON a.id = b.data_audit_id
                LEFT JOIN chospital c ON a.hospcode = c.hoscode
                GROUP BY a.hospcode) a
                JOIN (SELECT * from campur where changwatcode='44') b ON a.distcode = b.ampurcode
                GROUP BY a.distcode
                ORDER BY a.percent_success DESC";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

}

/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */