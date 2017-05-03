<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Report model
 *

 *
 */

class Board_model extends CI_Model
{
    public $hospcode;
    public $year;



    public function get_board($sys_id)
    {

        $rs = $this->user_db
            ->where('sys_id',$sys_id)
            ->order_by('date_add','DESC')
            ->limit('20')
            ->get('board_topic')
            ->result();
        return $rs;
    }
    public function get_topic($id)
    {

        $rs = $this->user_db
            ->where('id',$id)
            ->get('board_topic')
            ->row();
        return $rs;
    }
    public function get_last_reply($id)
    {

        $rs = $this->user_db
            ->select('MAX(a.date_reply) as date_reply,b.name',false)
            ->where('topic_id',$id)
            ->join('mas_users b ','a.user_id=b.id')
            ->get('board_reply a')
            ->row();
        return count($rs) > 0 ? $rs->name ." ".to_thai_date_time($rs->date_reply) : '-';
    }
    public function get_user($id){
        $rs = $this->user_db
            ->where('id',$id)
            ->get('mas_users')
            ->row();
        return $rs;
    }
}
/* End of file basic_model.php */
/* Location: ./application/models/basic_model.php */