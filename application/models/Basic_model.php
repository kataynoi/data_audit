<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Basic model
 *

 *
 */

class Basic_model extends CI_Model
{
    public function get_province_area($area)
    {
        $rs = $this->db
            ->where('zonecode',$area)
            ->get('cchangwat')
            ->result();

        return $rs;
    }
    public function get_office_list_by_amp($provcode, $amp)
    {
        $rs = $this->db
            ->where('provcode',$provcode)
            ->where('distcode',$amp)
            ->get('chospital')
            ->result();
        return $rs;
    }
    public function get_office_list_by_cup($id)
    {
        $rs = $this->db
            ->where('cup_code',$id)
            ->get('co_office')
            ->result();

        return $rs;
    }
public function get_chronic_group()
    {
        $rs = $this->db
            ->get('co_diseasechronic')
            ->result();

        return $rs;
    }


    public function encode($txt){
        $en=base64_encode(md5(md5($txt).'84c9aef34f7bc237'));
        return $en;
    }
    public function get_cup()
    {   $arr_in=array('05','06','07');
        $rs = $this->db
            ->where_in('off_type',$arr_in)
            ->get('co_office')
            ->result();
        return $rs;
    }
    public function get_ampur_list($prov_code){
        $rs = $this->db
            ->where('changwatcode', $prov_code)
            ->get('campur')
            ->result();
        return $rs;
    }
    public function get_what_new()
    {
        $rs = $this->db
            ->limit(25)
            ->order_by('create_date','DESC')
            ->get('what_new')
            ->result();

        return $rs;
    }
    public function get_vaccine()
    {
        $rs = $this->db
            ->order_by('vaccode')
            ->get('co_vaccine')
            ->result();

        return $rs;
    }
    public function get_last_prc($prc){
        $rs=$this->db
            ->select('MAX(date_time) as max',false)
            ->where('prc_name',$prc)
            ->get('prc_run_time')
            ->row();
        return $rs->max;
}
    public function get_subdistrict_list($amp)
    {

        $rs = $this->db
            ->where('distid',$amp)
            ->get('co_subdistrict')
            ->result();

        return $rs;
    }
    public function get_village_list($tmb)
    {

        $rs = $this->db
            ->where('subdistid',$tmb)
            ->get('co_village')
            ->result();

        return $rs;
    }
    public function get_village_base($hospcode)
    {

        $rs = $this->db
            ->select('a.*,b.subdistname,c.distname')
            ->where('a.hospcode',$hospcode)
            ->join('co_subdistrict b ' ,'a.subdistid = b.subdistid')
            ->join('co_district c ' ,'a.distid = c.distid')
            ->get('co_village a')
            ->result();

        return $rs;
    }

    public function get_person($cid){
        $rs = $this->db
            ->select('a.*')
            ->where('a.cid',$cid)
            ->get('person a')
            ->result();

        return $rs;
    }
    public  function get_off_name($id){
        $rs = $this->db
            ->where('off_id',$id)
            ->get('co_office')
            ->row();

        return count($rs) > 0 ? $rs->off_name : '-';
    }
    public  function get_cid($hospcode,$pid){
        $rs = $this->hdc
            ->where('HOSPCODE',$hospcode)
            ->where('PID',$pid)
            ->get('person')
            ->row();

        return count($rs) > 0 ? $rs->CID : '';
    }
    public  function get_person_off_id($cid,$hospcode){
        $rs = $this->hdc
            ->where('HOSPCODE',$hospcode)
            ->where('CID',$cid)
            ->get('person')
            ->row();

        return count($rs) > 0 ? true : false;
    }
    public  function get_vaccine_name($id){
        $rs = $this->db

            ->where('vaccode',$id)
            ->get('co_vaccine')
            ->row();

        return count($rs) > 0 ? $rs->vacname : '-';
    }public  function get_person_name($id){
        $rs = $this->db

            ->where('cid',$id)
            ->get('person')
            ->row();

        return count($rs) > 0 ? $rs->PTNAME : '-';
    } public  function set_page_view($pagename){
        $user_id=$this->session->userdata('user_id');
        $rs = $this->db
            ->set('user_id',$user_id)
            ->set('date_view',date('Y-m-d H:i:s'))
            ->set('page_name',$pagename)
            ->insert('page_view');
        return $rs;
    }
    public function get_address($hospcode,$cid){
        $rs= $this->db
            ->select('CHANGWAT,AMPUR,TAMBON,VILLAGE,HOUSE_NO')
            ->where('HOSPCODE',$hospcode)
            ->where('cid',$cid)
            ->get('person')
            ->row();
        $tam_name=$this->get_subdist_name($rs->CHANGWAT.$rs->AMPUR.$rs->TAMBON);
        $address=count($rs) > 0 ? $rs->HOUSE_NO.' ม.'.$rs->VILLAGE.' ต.'.$tam_name : '-';
        return $address;
    }
    public function get_subdist_name($id){
        $rs= $this->db
            ->where('subdistid',$id)
            ->get('co_subdistrict')
            ->row();
    return count($rs) > 0 ? $rs->subdistname : '-';

    }
    public function get_diseasename($icd10){
        $rs= $this->db
            ->where('diagcode',$icd10)
            ->get('cdisease')
            ->row();
    return count($rs) > 0 ? $rs->disease .'<br>['.$rs->diseasethai.']' : '-';

    }

    public function get_occupa($code){
        $rs= $this->db
            ->where('id_occupation_new',$code)
            ->get('coccupation_new')
            ->row();
    return count($rs) > 0 ? $rs->occupation_new : '-';

    }

    public function get_procedname($icd9){
        $rs= $this->db
            ->where('diseasecode',$icd9)
            ->get('co_diseaseproced')
            ->row();
    return count($rs) > 0 ? $rs->diseasename_en .'<br>['.$rs->diseasefullname.']' : '-';

    }
    public function get_diag_visit($hospcode,$seq){
        $rs= $this->db
            ->select('a.DIAGCODE,b.diseasename,a.DIAGTYPE,b.diseasenamethai')
            ->where('HOSPCODE',$hospcode)
            ->where('SEQ',$seq)
            ->order_by('a.DIAGTYPE')
            ->join('co_disease b','a.DIAGCODE=b.mapdisease')
            ->get('person_service_diag a')

            ->result();
        return $rs;
    }
    public function get_drug_visit($hospcode,$seq){
        $rs= $this->db
            //->select('a.DIAGCODE,b.diseasename,a.DIAGTYPE,b.diseasenamethai')
            ->where('HOSPCODE',$hospcode)
            ->where('SEQ',$seq)
            ->get('person_service_drug_opd a')

            ->result();
        return $rs;
    }
    public function get_proced_visit($hospcode,$seq){
        $rs= $this->db
            ->select('a.PROCED,b.diseasefullname')
            ->where('HOSPCODE',$hospcode)
            ->where('SEQ',$seq)
            ->join('co_diseaseproced b','a.PROCED=b.diseasecode','LEFT')
            ->get('person_service_proced_opd a')

            ->result();
        return $rs;
    }

    public  function get_prov_name($id){
        $rs = $this->db

            ->where('changwatcode',$id)
            ->get('cchangwat')
            ->row();

        return count($rs) > 0 ? $rs->changwatname : '-';
    } public  function get_distname($id){
        $rs = $this->db

            ->where('distid',$id)
            ->get('co_district')
            ->row();

        return count($rs) > 0 ? $rs->disttname : '-';
    }
    public function get_sl_datetime()
    {
        $rs = $this->db
            ->get('c_datetime')
            ->result();
        return $rs;
    }
    public function get_sl_cc()
    {
        $rs = $this->db
            ->get('c_cc')
            ->result();
        return $rs;
    }
    public function get_sl_history()
    {
        $rs = $this->db
            ->get('c_history')
            ->result();
        return $rs;
    }
    public function get_sl_phy_ex()
{
    $rs = $this->db
        ->get('c_phy_ex')
        ->result();
    return $rs;
}    public function get_sl_diag_text()
{
    $rs = $this->db
        ->get('c_diag_text')
        ->result();
    return $rs;
}

    public function get_sl_treatment()
{
    $rs = $this->db
        ->get('c_treatment')
        ->result();
    return $rs;
}
    public  function get_provode(){
        $rs = $this->db
            ->limit(1)
            ->get('config')
            ->row();

        return count($rs) > 0 ? $rs->provcode : '0';
    }
}

/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */