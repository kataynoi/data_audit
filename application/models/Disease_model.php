<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Report model
 *

 *
 */

class Disease_model extends CI_Model
{
    public $hospcode;
    public $year;


    public function get_disease_opd($s,$e,$icd10)
    {
        $rs = $this->db
            ->select('c.distid as id,c.distname as name,count(*) as time,COUNT(DISTINCT CID) as total ')
            ->where("a.DIAGCODE in (".$icd10.")")
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->join('co_office b','a.HOSPCODE=b.off_id')
            ->join('co_district c','b.distid=c.distid')
            ->group_by('c.distid')
            ->get('person_service_diag a')
            ->result();
        //echo $this->provis->last_query();
        return $rs;
    }
 public function get_disease_opd_by_amp($s,$e,$icd10,$amp)
    {
        $rs = $this->db
            ->select('a.HOSPCODE as id,b.off_name as name,count(*) as time,COUNT(DISTINCT CID) as total ')
            ->where("a.DIAGCODE in (".$icd10.")")
            ->where(array('b.distid'=>$amp))
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->join('co_office b','a.HOSPCODE=b.off_id')
            ->group_by('a.HOSPCODE')
            ->get('person_service_diag a')
            ->result();
        //echo $this->provis->last_query();
        return $rs;
    }
public function get_disease_opd_by_hospcode($s,$e,$icd10,$hospcode,$start,$limit)
    {
        $rs = $this->db
            ->select('a.cid as id,a.PTNAME as name,count(*) as time,COUNT(DISTINCT CID) as total ')
            ->where("a.DIAGCODE in (".$icd10.")")
            ->where(array('a.HOSPCODE'=>$hospcode))
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            ->group_by('a.CID')
            ->limit( $limit,$start)
            ->get('person_service_diag a')
            ->result();
        //echo $this->provis->last_query();
        return $rs;
    }
    public function get_disease_opd_by_hospcode_total($s,$e,$icd10,$hospcode)
    {
        $rs = $this->db
            ->where("a.DIAGCODE in (".$icd10.")")
            ->where(array('a.HOSPCODE'=>$hospcode))
            ->where("DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '".$s."' AND '".$e."'",'',FALSE)
            //->group_by('a.CID')
            ->count_all_results('person_service_diag a');
        //echo $this->provis->last_query();
        return $rs ? $rs : 0;
    }

}

/*SELECT c.distid as id,c.distname as NAME,count(*) as time,COUNT(DISTINCT CID) as total
FROM person_service_diag a
JOIN co_office b ON a.HOSPCODE=b.off_id
JOIN co_district c ON b.distid=c.distid
WHERE a.DIAGCODE='Z133' AND DATE_FORMAT(a.DATE_SERV,'%Y-%m-%d') BETWEEN '2013-10-01' AND '2013-12-31'
GROUP BY c.distid*/
