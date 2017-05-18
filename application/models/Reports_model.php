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

}

/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */