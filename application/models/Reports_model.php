<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patient model
 *

 *
*/
class Reports_model extends CI_Model {

    public $hospcode;
    public $cup_code;
    public $provcode;
    public $year;

    public function get_reports_list($id){
        $rs = $this->db
            ->where('a.group',$id)
            ->get('reports a')
            ->result();
        return $rs;
    }
    public function get_ckd($id){
        $rs = $this->db
            ->where('a.group',$id)
            ->get('reports a')
            ->result();
        return $rs;
    }
    public function get_disease_by_year($year){
        $sql="SELECT a.m_id,a.fullname,b.total_44,b.total_40,b.total_45,b.total_46 FROM co_month a ";
        $sql.=" LEFT JOIN ";
        $sql.=" (SELECT DATE_FORMAT(a.date_serv,'%m') as M,SUM(IF(province='44',1,0)) as total_44,SUM(IF(province='40',1,0)) as total_40,SUM(IF(province='45',1,0)) as total_45,SUM(IF(province='46',1,0)) as total_46  FROM person_service_diag a WHERE DATE_FORMAT(a.date_serv,'%Y')='".$year."' GROUP BY M) b ON a.m_id=b.M";
        $rs=$this->db->query($sql)->result();

        return $rs;

    }
    public function get_top10($year,$code){
        $rs=$this->db
            ->select('a.diag_principle as disease,b.diseasethai as name,COUNT(*) as total')
            ->where("DATE_FORMAT(a.date_serv,'%Y')",$year)
            ->where('a.diagcode',$code)
            ->group_by('a.diag_principle')
            ->order_by('total','DESC')
            ->join('cdisease b','a.diag_principle=b.diagcode')
            ->limit('10')
            ->get('person_service_diag a')
            ->result();
        return $rs;
    }
    public function get_disease_y_by_year($year,$code){
        $rs=$this->db
            ->select('b.changwatname as name,a.prov_code as code,COUNT(*) as total,SUM(IF(a.sex=1,1,0)) male,,SUM(IF(a.sex=2,1,0)) female',false)
            ->where("DATE_FORMAT(a.date_serv,'%Y')",$year)
            ->where('a.diagcode',$code)
            ->group_by('a.prov_code')
            ->join('cchangwat b ','a.prov_code=b.changwatcode')
            ->get('person_service_diag a')
            ->result();
        return $rs;
    }
    public function get_disease_y_by_prov($year,$code,$prov){
        $rs=$this->db
            ->select('c.ampurcode AS code,c.ampurname AS name ,COUNT(*) as total,SUM(IF(a.sex=1,1,0)) male,,SUM(IF(a.sex=2,1,0)) female',false)
            ->where("DATE_FORMAT(a.date_serv,'%Y')",$year)
            ->where('prov_code',$prov)
            ->where('a.diagcode',$code)
            ->group_by('c.ampurcode')
            ->join('chospital b','a.hospcode=b.hoscode','LEFT')
            ->join('campur c ','b.provcode=c.changwatcode AND b.distcode = c.ampurcode','LEFT')
            ->get('person_service_diag a')
            ->result();
        return $rs;
    }
    public function get_disease_y_by_amp($year,$code,$prov,$amp){
        $sql=" SELECT b.hoscode AS code,b.hosname AS name,COUNT(*) AS total,SUM(IF(a.sex = 1, 1, 0))male,SUM(IF(a.sex = 2, 1, 0))female";
        $sql.=" FROM person_service_diag a
                LEFT JOIN chospital b ON a.hospcode=b.hoscode ";
         $sql.=" WHERE DATE_FORMAT(a.date_serv, '%Y')= ".$year."
                AND prov_code = ".$prov."
                AND b.distcode=".$amp."
                AND a.diagcode = '".$code."'
                GROUP BY b.hoscode";

        $rs=$this->db->query($sql)->result();
        return $rs;
    }
    public function get_principle_y_by_year($year,$code){
            $sql="SELECT SUBSTR(a.diag_principle FROM 1 FOR 3) as code, b.diseasethai as name, count(*) as total,SUM(IF(a.sex='1' , 1, 0)) as male,SUM(IF(a.sex='2' , 1, 0)) as female
    FROM person_service_diag a
    LEFT JOIN cdisease b ON SUBSTR(a.diag_principle FROM 1 FOR 3) = b.diagcode
    WHERE DATE_FORMAT(a.date_serv,'%Y')='".$year."' AND a.diagcode='".$code."'
    AND a.error IS NULL
    GROUP BY SUBSTR(a.diag_principle FROM 1 FOR 3)
    ORDER BY total DESC LIMIT 50";

            $rs=$this->db->query($sql)->result();
        return $rs;
    }
    public function get_principle_y_by_prov($year,$code,$prov){
        $sql="SELECT SUBSTR(a.diag_principle FROM 1 FOR 3) as code, b.diseasethai as name, count(*) as total,SUM(IF(a.sex='1' , 1, 0)) as male,SUM(IF(a.sex='2' , 1, 0)) as female
    FROM person_service_diag a
    LEFT JOIN cdisease b ON SUBSTR(a.diag_principle FROM 1 FOR 3) = b.diagcode
    WHERE DATE_FORMAT(a.date_serv,'%Y')='".$year."' AND a.diagcode='".$code."' AND prov_code='".$prov."'
    AND a.error IS NULL
    GROUP BY SUBSTR(a.diag_principle FROM 1 FOR 3)
    ORDER BY total DESC LIMIT 50";

        $rs=$this->db->query($sql)->result();
        return $rs;
}
    public function get_principle_y_by_amp($year,$code,$prov,$amp){
        $sql="SELECT SUBSTR(a.diag_principle FROM 1 FOR 3) as code, b.diseasethai as name, count(*) as total,SUM(IF(a.sex='1' , 1, 0)) as male,SUM(IF(a.sex='2' , 1, 0)) as female
    FROM person_service_diag a
    LEFT JOIN cdisease b ON SUBSTR(a.diag_principle FROM 1 FOR 3) = b.diagcode
    WHERE DATE_FORMAT(a.date_serv,'%Y')='".$year."' AND a.diagcode='".$code."' AND prov_code='".$prov."'
    AND a.error IS NULL
    GROUP BY SUBSTR(a.diag_principle FROM 1 FOR 3)
    ORDER BY total DESC LIMIT 50";

        $rs=$this->db->query($sql)->result();
        return $rs;
}
    public  function get_individual_hospcode ($hospcode,$s, $e){
            $rs=$this->db
                ->where('hospcode',$hospcode)
                ->where(" date_serv between '".$s."' and '".$e."' ",'',false)
                ->get('person_service_diag')
                ->result();
            return $rs;
    }
}

/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */