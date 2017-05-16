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
            ->select("SUM(IF(d.percent IS NOT NULL, 1, 0))*100/count(*) AS percent_input ")
            ->select("AVG(d.percent) as percent_avg")
            ->select("e.icd_total,e.percent_icd,e.percent_icd_avg")
            ->join('chospital b ','a.hospcode = b.hoscode')
            ->join('campur c ','CONCAT("44",b.distcode) = c.ampurcodefull')
            ->join('audit d','a.id=d.data_audit_id','left')
            ->join('(select hospcode,count(*) as icd_total,SUM(IF(AUDIT_ICD10 IS NOT NULL,1,0))*100/count(*) as percent_icd,SUM(IF(AUDIT_ICD10 ="Y",1,0))*100/SUM(IF(AUDIT_ICD10 IS NOT NULL,1,0)) as percent_icd_avg from diagnosis_opd group by hospcode) e ','a.hospcode = e.hospcode ','left')
            ->where(' c.ampurcodefull',$code)
            ->group_by('a.hospcode')
            ->get('data_audit a')

            ->result();
       // echo $this->db->last_query();
        return $rs;

    }
    public  function get_audit_hosp($hospcode){
        $rs = $this->db
            ->select('a.* ,b.date_audit,b.percent,b.score,b.max_score')

            ->where('a.hospcode',$hospcode)
            ->join('audit b','a.id=b.data_audit_id','left')
            ->order_by('a.date_serve')
            ->get('data_audit a ')
            ->result();
        return $rs;
    }
    public  function get_audit_info($id){
        $rs = $this->db
            ->select('a.*,b.data_audit_id,b.date_audit, b.percent, b.score, b.max_score')
            ->select('b.datetime, b.cc as a_cc, b.history, b.phy_ex,b.treatment, b.diag_text')
            ->where('a.id',$id)
            ->join('audit b','a.id=b.data_audit_id','left')
            ->get('data_audit a')
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

    public function update_audit($data)
    {
        $rs = $this->db
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
            ->where('data_audit_id',$data['data_audit_id'])
            ->update('audit');

        return $rs;
    }

    public  function get_audit_icd($hospcode,$seq){
        $rs = $this->db
            ->select('a.*,b.diseasethai')
            //->select('b.datetime, b.cc as a_cc, b.history, b.phy_ex,b.treatment, b.diag_text')
            ->where('a.seq',$seq)
            ->where('a.hospcode',$hospcode)
            ->join('cdisease b','a.diagcode=b.diagcode','left')
            ->order_by('a.diagtype')
            ->get('diagnosis_opd a')
            ->result();
        return $rs;
    }
    public function save_audit_icd($data)
    {
        $rs = $this->db

            ->set('AUDIT_ICD10',$data['txt_auditicd'])
            ->where('HOSPCODE',$data['hospcode'])
            ->where('SEQ',$data['seq'])
            ->where('DIAGCODE',$data['diagcode'])
            ->update('diagnosis_opd');
        //echo $this->db->last_query();
        return $rs;
    }

    public function update_audit_icd($data)
    {
        $rs = $this->db
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
            ->where('data_audit_id',$data['data_audit_id'])
            ->update('audit');

        return $rs;
    }
    public function get_audit_icd10_status ($hospcode,$seq){
        $rs = $this->db
            ->select('GROUP_CONCAT(AUDIT_ICD10) as AUDIT_ICD10',false)
            ->where('seq',$seq)
            ->where('hospcode',$hospcode)
            ->get('diagnosis_opd')
            ->row();

        return $rs->AUDIT_ICD10;
    }
}

/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */