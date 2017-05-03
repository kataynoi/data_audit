<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Patient model
 *

 *
*/
class Import_model extends CI_Model {


    public function import_data($data,$prov_code,$packet_id)
    {
       $rs = $this->db
        ->set('hospcode',$data->hospcode)
        ->set('prov_code',$prov_code)
        ->set('cid',$data->cid)
        ->set('pid',$data->pid)
        ->set('ptname',$data->ptname)
        ->set('sex',$data->sex)
        ->set('birth',$data->birth)
        ->set('age',$data->age)
        ->set('month',$data->month)
        ->set('nation',$data->nation)
        ->set('occupa',$data->occupa)
        ->set('discharge',$data->discharge)
        ->set('house_no',$data->house_no)
        ->set('village',$data->village)
        ->set('subdistrict',$data->subdistrict)
        ->set('district',$data->district)
        ->set('province',$data->province)
        ->set('typearea',$data->typearea)
        ->set('instype',$data->instype)
        ->set('insid',$data->insid)
        ->set('main',$data->main)
        ->set('seq',$data->seq)
        ->set('cc',$data->cc)
        ->set('date_serv',$data->date_serv)
        ->set('sbp',$data->sbp)
        ->set('dbp',$data->dbp)
        ->set('pr',$data->pr)
        ->set('rr',$data->rr)
        ->set('diagtype',$data->diagtype)
        ->set('diagcode',$data->diagcode)
        ->set('diag_principle',$data->diag_principle)
        ->set('flag_auto','3')
        ->set('date_import',DATE('Y-m-d H:m:s'))
        ->set('packet_id',$packet_id)

        ->replace('person_service_diag');
        return $rs;

    }
    public function set_import_log($prov_code,$packet_id,$start_time,$end_time,$num_rows)
    {
        $rs = $this->db
            ->set('prov_code',$prov_code)
            ->set('packet_id',$packet_id)
            ->set('start_time',$start_time)
            ->set('end_time',$end_time)
            ->set('num_rows',$num_rows)
            ->insert('import_log');
        return $rs;
    }

}
/* End of file patient_model.php */
/* Location: ./applcation/models/patient_model.php */