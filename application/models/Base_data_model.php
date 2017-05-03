<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 18/11/2556
 * Time: 11:10 น.
 * To change this template use File | Settings | File Templates.
 */

class Base_data_model extends CI_Model
{
    public function get_person_by_amp($amp)
    {
        $sql=" SELECT a.HOSPCODE as id,b.off_name as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" WHERE b.distid='".$amp."' AND a.NATION in ('99','099') ";
        $sql.=" GROUP BY a.HOSPCODE";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    public function get_person()
    {
        $sql=" SELECT c.distid as id,c.distname as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" join co_district c ON b.distid=c.distid";
        $sql."  WHERE a.NATION in ('99','099') ";
        $sql.=" GROUP BY b.distid";
        $rs = $this->db->query($sql)->result();
        //echo $this->provis->last_query();
        return $rs;
    }
    public function get_person_by_birthdate($s,$e)
    {
        $sql=" SELECT c.distid as id,c.distname as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" JOIN co_district c ON b.distid=c.distid";
        $sql.=" WHERE DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e  AND a.NATION in ('99','099') ";
        $sql.=" GROUP BY b.distid";
        $rs = $this->db->query($sql)->result();
        //echo $this->provis->last_query();
        return $rs;
    }
    public function get_person_by_birthdate_amp($s,$e,$amp)
    {
        $sql=" SELECT a.HOSPCODE as id,b.off_name as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" WHERE b.distid='".$amp."' AND DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e  AND a.NATION in ('99','099') ";
        $sql.=" GROUP BY a.HOSPCODE";
        $rs = $this->db->query($sql)->result();
        return $rs;

    }
    public function get_person_by_hospcode($hospcode)
    {
        $sql=" SELECT c.villname as name,a.* FROM (SELECT CONCAT(b.CHANGWAT,b.AMPUR,b.TAMBON,b.VILLAGE) as id,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM  person_target a JOIN home b ON a.HOSPCODE=b.HOSPCODE AND a.HID=b.HID ";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."'  AND a.NATION in ('99','099') GROUP BY b.VILLAGE) a";
        $sql.=" JOIN co_village c ON a.id=c.villid";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }
    public function get_person_by_hospcode_birthdate($hospcode,$s,$e)
    {

        $sql=" SELECT c.villname as name,a.* FROM (SELECT CONCAT(b.CHANGWAT,b.AMPUR,b.TAMBON,b.VILLAGE) as id,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM  person_target a JOIN home b ON a.HOSPCODE=b.HOSPCODE AND a.HID=b.HID ";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."' AND DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e  AND a.NATION in ('99','099')  GROUP BY b.VILLAGE ) a";
        $sql.=" JOIN co_village c ON a.id=c.villid";
        $rs = $this->db->query($sql)->result();
        return $rs;

    }


    public function get_person_by_age($as,$ae)
    {


        //$birth="BIRTH BETWEEN '".$birth_start."0701' AND '".$birth_end."0630'";
        $sql=" SELECT c.distid as id,c.distname as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" JOIN co_district c ON b.distid=c.distid";
        $sql.=" WHERE a.AGE BETWEEN ".$as." AND ".$ae."  AND a.NATION in ('99','099') ";
        $sql.=" GROUP BY b.distid";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    public function get_person_by_age_amp($as,$ae,$amp)
    {

        $sql=" SELECT a.HOSPCODE as id,b.off_name as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" WHERE b.distid='".$amp."' AND a.AGE BETWEEN ".$as." AND ".$ae."   AND a.NATION in ('99','099') ";
        $sql.=" GROUP BY a.HOSPCODE";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    public function get_person_by_age_hospcode($as,$ae,$hospcode)
    {

        $sql=" SELECT c.villname as name,a.* FROM (SELECT CONCAT(b.CHANGWAT,b.AMPUR,b.TAMBON,b.VILLAGE) as id,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM  person_target a JOIN home b ON a.HOSPCODE=b.HOSPCODE AND a.HID=b.HID ";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."' AND a.AGE BETWEEN ".$as." AND ".$ae."   AND a.NATION in ('99','099') GROUP BY b.VILLAGE) a";
        $sql.=" JOIN co_village c ON a.id=c.villid";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }
    #####################  ต่างด้าว
    public function get_person_foreign_by_amp($amp)
    {
        $sql=" SELECT a.HOSPCODE as id,b.off_name as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" WHERE b.distid='".$amp."'";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" GROUP BY a.HOSPCODE";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    public function get_person_foreign()
    {
        $sql=" SELECT c.distid as id,c.distname as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" join co_district c ON b.distid=c.distid";
        $sql.=" WHERE a.NATION NOT in ('99','099') ";
        $sql.=" GROUP BY b.distid";
        $rs = $this->db->query($sql)->result();
        //echo $this->provis->last_query();
        return $rs;
    }
    public function get_person_foreign_by_birthdate($s,$e)
    {
        $sql=" SELECT c.distid as id,c.distname as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id ";
        $sql.=" JOIN co_district c ON b.distid=c.distid";
        $sql.=" WHERE DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e ";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" GROUP BY b.distid";
        $rs = $this->db->query($sql)->result();
        //echo $this->provis->last_query();
        return $rs;
    }
    public function get_person_foreign_by_birthdate_amp($s,$e,$amp)
    {
        $sql=" SELECT a.HOSPCODE as id,b.off_name as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" WHERE b.distid='".$amp."' AND DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e ";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" GROUP BY a.HOSPCODE";
        $rs = $this->db->query($sql)->result();
        return $rs;

    }
    public function get_person_foreign_by_hospcode($hospcode)
    {
        $sql=" SELECT c.villname as name,a.* FROM (SELECT CONCAT(b.CHANGWAT,b.AMPUR,b.TAMBON,b.VILLAGE) as id,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM  person_target a JOIN home b ON a.HOSPCODE=b.HOSPCODE AND a.HID=b.HID ";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."' GROUP BY b.VILLAGE) a";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" JOIN co_village c ON a.id=c.villid";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }
    public function get_person_foreign_by_hospcode_birthdate($hospcode,$s,$e)
    {

        $sql=" SELECT c.villname as name,a.* FROM (SELECT CONCAT(b.CHANGWAT,b.AMPUR,b.TAMBON,b.VILLAGE) as id,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM  person_target a JOIN home b ON a.HOSPCODE=b.HOSPCODE AND a.HID=b.HID ";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."' AND DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e GROUP BY b.VILLAGE) a";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" JOIN co_village c ON a.id=c.villid";
        $rs = $this->db->query($sql)->result();
        return $rs;

    }


    public function get_person_foreign_by_age($as,$ae)
    {

        $now_year=year();
        //echo $now_year;
        $birth_start=(($now_year-1)-$ae);
        $birth_end=($now_year-$as);
        $s="'".$birth_start."0701'";
        $e="'".$birth_end."0630'";
        //$birth="BIRTH BETWEEN '".$birth_start."0701' AND '".$birth_end."0630'";
        $sql=" SELECT c.distid as id,c.distname as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" JOIN co_district c ON b.distid=c.distid ";
        $sql.=" WHERE a.AGE BETWEEN ".$as." AND ".$ae."  ";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" GROUP BY b.distid";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    public function get_person_foreign_by_age_amp($as,$ae,$amp)
    {
        $now_year=year();
        //echo $now_year;
        $birth_start=(($now_year-1)-$ae);
        $birth_end=($now_year-$as);
        $s="'".$birth_start."0701'";
        $e="'".$birth_end."0630'";
        $sql=" SELECT a.HOSPCODE as id,b.off_name as name,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM person_target a JOIN co_office b on a.hospcode=b.off_id";
        $sql.=" WHERE b.distid='".$amp."' AND DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e ";
        $sql.=" AND a.NATION NOT in ('99','099') ";
        $sql.=" GROUP BY a.HOSPCODE";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }

    public function get_person_foreign_by_age_hospcode($as,$ae,$hospcode)
    {
        $now_year=year();
        //echo $now_year;
        $birth_start=(($now_year-1)-$ae);
        $birth_end=($now_year-$as);
        $s="'".$birth_start."0701'";
        $e="'".$birth_end."0630'";
        $sql=" SELECT c.villname as name,a.* FROM (SELECT CONCAT(b.CHANGWAT,b.AMPUR,b.TAMBON,b.VILLAGE) as id,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='1',1,0)) as type1_m,";
        $sql.=" SUM(IF(a.TYPEAREA='1' AND a.SEX='2',1,0)) as type1_f,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='1',1,0)) as type2_m,";
        $sql.=" SUM(IF(a.TYPEAREA='2' AND a.SEX='2',1,0)) as type2_f,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='1',1,0)) as type3_m,";
        $sql.=" SUM(IF(a.TYPEAREA='3' AND a.SEX='2',1,0)) as type3_f,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='1',1,0)) as type4_m,";
        $sql.=" SUM(IF(a.TYPEAREA='4' AND a.SEX='2',1,0)) as type4_f,";
        $sql.=" SUM(IF(a.SEX='1',1,0)) as total_m,SUM(IF(a.SEX='2',1,0)) as total_f,COUNT(*) as total";
        $sql.=" FROM  person_target a JOIN home b ON a.HOSPCODE=b.HOSPCODE AND a.HID=b.HID ";
        $sql.=" WHERE a.HOSPCODE='".$hospcode."' AND DATE_FORMAT(a.birth,'%Y%m%d') BETWEEN $s AND $e AND a.NATION NOT in ('99','099')  GROUP BY b.VILLAGE) a";
        $sql.=" JOIN co_village c ON a.id=c.villid";
        $rs = $this->db->query($sql)->result();
        return $rs;
    }
    public function get_ampur_list($prov_id)
    {


        $rs = $this->db
            ->where('provid',$prov_id)
            ->get('co_district')
            ->result();

        return $rs;
    }

    public function get_office_total(){
        $rs=$this->db
            ->select('b.distname as name,COUNT(*) as total')
            ->where('a.provid',provid())
            ->group_by('a.distid')
            //->order_by('total','DESC')
            ->join('co_district b','a.distid=b.distid')
            ->get('co_office a')
            ->result();
        return $rs;
    }
}

/* End of file base_data_model.php */