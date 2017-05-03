<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Report model
 *

 *
 */

class Dental_model extends CI_Model
{
    public $hospcode;
    public $year;


 //##############  หัตถการแพทย์แผนไทย
    public function get_procedure($year)
    {
        $sql = "SELECT b.distid as id,c.distname as name ";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."10',1,0)) as m10";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."11',1,0)) as m11";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."12',1,0)) as m12";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."01',1,0)) as m01";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."02',1,0)) as m02";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."03',1,0)) as m03";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."04',1,0)) as m04";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."05',1,0)) as m05";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."06',1,0)) as m06";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."07',1,0)) as m07";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."08',1,0)) as m08";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."09',1,0)) as m09";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m') BETWEEN '".($year-1)."10' AND '".($year)."09',1,0)) as total";
        $sql .= " FROM (SELECT * FROM procedure_opd WHERE DATE_FORMAT(date_serv,'%Y-%m') BETWEEN '".($year-1)."-10' AND '".($year)."-09' AND PROCEDCODE in( SELECT icd10TM FROM ref_icd10_dent) ) as a";
        $sql .=" LEFT JOIN ex_co_office b ON  a.HOSPCODE=b.off_id";
        $sql .=" LEFT JOIN ex_co_district c ON b.distid=c.distid";
        $sql .=" GROUP BY b.distid";
        $rs = $this->hdc->query($sql)->result();
        return $rs;
    }
    public function get_procedure_by_amp($year,$amp)
    {
        $sql = "SELECT a.HOSPCODE as id,b.off_name as name ";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."10',1,0)) as m10";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."11',1,0)) as m11";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."12',1,0)) as m12";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."01',1,0)) as m01";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."02',1,0)) as m02";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."03',1,0)) as m03";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."04',1,0)) as m04";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."05',1,0)) as m05";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."06',1,0)) as m06";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."07',1,0)) as m07";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."08',1,0)) as m08";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."09',1,0)) as m09";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m') BETWEEN '".($year-1)."10' AND '".($year)."09',1,0)) as total";
        $sql .= " FROM (SELECT * FROM procedure_opd WHERE DATE_FORMAT(date_serv,'%Y%m') BETWEEN '".($year-1)."10' AND '".($year)."09' AND PROCEDCODE in( SELECT icd10TM FROM ref_icd10_dent) ) as a";
        $sql .=" LEFT JOIN ex_co_office b ON  a.HOSPCODE=b.off_id";
        $sql .=" LEFT JOIN ex_co_district c ON b.distid=c.distid";
        $sql.=" WHERE b.distid='".$amp."' ";
        $sql .=" GROUP BY a.HOSPCODE";
        $rs = $this->hdc->query($sql)->result();
        return $rs;
    }

    public function get_procedure_by_hospcode($year,$hospcode)
    {
        $sql = "SELECT a.PROCEDCODE as id,c.icd10_name as name ";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."10',1,0)) as m10";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."11',1,0)) as m11";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year-1)."12',1,0)) as m12";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."01',1,0)) as m01";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."02',1,0)) as m02";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."03',1,0)) as m03";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."04',1,0)) as m04";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."05',1,0)) as m05";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."06',1,0)) as m06";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."07',1,0)) as m07";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."08',1,0)) as m08";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m')='".($year)."09',1,0)) as m09";
        $sql .= ",SUM(IF(DATE_FORMAT(a.date_serv,'%Y%m') BETWEEN '".($year-1)."10' AND '".($year)."09',1,0)) as total";
        $sql .= " FROM (SELECT * FROM procedure_opd WHERE DATE_FORMAT(date_serv,'%Y%m') BETWEEN '".($year-1)."10' AND '".($year)."09' AND PROCEDCODE in( SELECT icd10TM FROM ref_icd10_dent) ) as a";
        $sql .=" LEFT JOIN ex_co_office b ON  a.HOSPCODE=b.off_id";
        $sql .=" LEFT JOIN ref_icd10_dent c ON a.PROCEDCODE=c.icd10TM";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."' ";
        $sql .=" GROUP BY a.PROCEDCODE ORDER BY total DESC";
        $rs = $this->hdc->query($sql)->result();
        return $rs;
    }


    //###############  มูลค่ายาแพทย์แผนไทย /แผนปัจจุบัน
    public function get_drug_cost($s,$e)
    {
        $rs=$this->hdc
            ->select('c.didtid as id,c.distname as name,COUNT(*) as total')
            ->where("DATE_FORMAT(a.date_serv,'%Y%m%d') BETWEEN '".$s."' AND '".$e."' ",'',false)
            ->where("a.didstd LIKE '4%'",'',false)
            ->join('ex_co_office b','a.HOSPCODE=b.off_id')
            ->join('ex_co_district c' ,'b.distid=c.distid')
            ->group_by('c.distid')
            ->order_by('total DESC')
            ->get('drug_opd a')

            ->result();
        return $rs;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */