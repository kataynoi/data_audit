<?php
if ( ! function_exists('render_json'))
{
    function render_json($json)
    {
        ini_set('display_errors', 0);
        //header('Content-Type: application/json');
        echo $json;
    }

}
/**
* Get current date
*
* @return   string  
**/
if ( ! function_exists('get_current_thai_date'))
{
    function get_current_thai_date()
    {
        $d = explode('/', date('d/m/Y'));
        $day = $d[0];
        $month = $d[1];
        $year = (int) $d[2] + 543;

        $current_thai_date = $day . '/' . $month . '/' . $year;

        return $current_thai_date;

    }

}
if ( ! function_exists('prov_server'))
{
    function prov_server($provcode)
    {
        $url="";
        switch ($provcode) {
            case 44:
                //$url='http://203.157.185.15/dpc_service/';
                $url='http://localhost/dpc_service/';
                break;
            case 40:
                $url='http://203.157.185.15/dpc_service_kk/';
                break;
            case 45:
                $url='http://203.157.184.15/kpi7/';
                break;
            case 46:
                $url='http://203.157.185.18/mis/kpi7ks/';
                break;
        }
        return $url;

    }
}
if ( ! function_exists('version'))
{
    function version()
    {
        $version=' ระบบรายงานการป่วยด้วยโรคจากการประกอบอาชีพ สคร.6 ขอนแก่น';

        return $version;

    }

}
if ( ! function_exists('sys_id'))
{
    function sys_id()
    {
        $sys_id='2';

        return $sys_id;

    }

}
if ( ! function_exists('area'))
{
    function area()
    {
        $area='07';

        return $area;

    }

}
/**
 * Generate serial
 *
 * @param   string  $t Type of serial
 * @return  string
 */
if ( ! function_exists('year'))
{
    function year()
    {
        $year='2015';

        return $year;

    }

}
if ( ! function_exists('provid'))
{
    function provid()
    {
        $provid='44';

        return $provid;

    }

}
if ( ! function_exists('provname'))
{
    function provname()
    {
        $provname='มหาสารคาม';

        return $provname;

    }

}

if(!function_exists('to_thai_date'))
{
    function to_thai_date($eng_date)
    {
        if(strlen($eng_date) != 10)
        {
            return ' ';
        }
        else
        {
            $new_date = explode('-', $eng_date);

            $new_y = (int) $new_date[0] + 543;
            $new_m = $new_date[1];
            $new_d = $new_date[2];

            $thai_date = $new_d . '/' . $new_m . '/' . $new_y;

            return $thai_date;
        }
    }
}

if(!function_exists('to_thai_month'))
{
    function to_thai_month($eng_date)
    {
        if(strlen($eng_date) != 7)
        {
            return ' ';
        }
        else
        {
            $new_date = explode('-', $eng_date);

            $new_y = (int) $new_date[0] + 543;
            $new_m = $new_date[1];

            $thai_date =  $new_m . '/' . $new_y;

            return $thai_date;
        }
    }
}
if(!function_exists('to_thai_date_time'))
{
    function to_thai_date_time($eng_date_time)
    {
        if(strlen($eng_date_time) == 0)
        {
            return null;
        }
        else
        {
            $new_date = explode('-', $eng_date_time);
            $new_y = (int) $new_date[0] + 543;
            $new_m = $new_date[1];
            $new_d = substr($new_date[2],0,2);
            $new_time=substr($new_date[2],3,5);
            $thai_date = $new_d . '/' . $new_m . '/' . $new_y.' '.$new_time;

            return $thai_date;
        }
    }
}
if(!function_exists('to_mysql_date'))
{
    function to_mysql_date($thai_date)
    {
        if(strlen($thai_date) != 10)
        {
            return null;
        }
        else
        {
            $new_date = explode('/', $thai_date);

            $new_y = (int)$new_date[2] - 543;
            $new_m = $new_date[1];
            $new_d = $new_date[0];

            $mysql_date = $new_y . '-' . $new_m . '-' . $new_d;

            return $mysql_date;
        }
    }
}
if(!function_exists('to_mysql_date_without'))
{
    function to_mysql_date_without($thai_date)
    {
        if(strlen($thai_date) != 10)
        {
            return null;
        }
        else
        {
            $new_date = explode('/', $thai_date);

            $new_y = (int)$new_date[2] - 543;
            $new_m = $new_date[1];
            $new_d = $new_date[0];

            $mysql_date = $new_y . $new_m . $new_d;

            return $mysql_date;
        }
    }
}
if(!function_exists('to_mysql_date_dash'))
{
    function to_mysql_date_dash($thai_date)
    {
        if(strlen($thai_date) != 10)
        {
            return null;
        }
        else
        {
            $new_date = explode('/', $thai_date);

            $new_y = (int)$new_date[2] - 543;
            $new_m = $new_date[1];
            $new_d = $new_date[0];

            $mysql_date = $new_y ."-". $new_m ."-". $new_d;

            return $mysql_date;
        }
    }
}

if(! function_exists('count_age'))
{
    function count_age($date)
    {
        $c_y = (int) date('Y');
        $o_y = explode('-', $date);
        $n_y = (int) $o_y[0];

        $age = $c_y - $n_y;

        return $age;
    }
}

if(!function_exists('to_string_date'))
{
    function to_string_date($date)
    {
        if(empty($date))
        {
            return null;
        }
        else
        {
            $d = explode('/', $date);
            // $d[0] = d, $d[1] = m, $d[2] = y
            $new_date = (int)$d[2] - 543 . $d[1] . $d[0];
            return $new_date;
        }
    }
}

if(!function_exists('get_ptstatus_name'))
{
    function get_ptstatus_name($id)
    {
        if(!empty($id))
        {
            if($id == '1') return 'หาย';
            else if($id == '2') return 'ตาย';
            else if($id == '3') return 'ยังรักษาอยู่';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_sex'))
{
    function get_sex($id)
    {
        if(!empty($id))
        {
            if($id == '1') return 'ชาย';
            else if($id == '2') return 'หญิง';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
#### ข้อมูลการคลอด
if(!function_exists('get_btype'))
{
    function get_btype($id)
    {
// 1  = NORMAL, 2 = CESAREAN, 3 = VACUUM, 4 = FORCEPS, 5 = ท่าก้น
        if(!empty($id))
        {

            if($id == '1') return 'NORMAL';
            else if($id == '2') return 'CESAREAN';
            else if($id == '3') return 'VACUUM';
            else if($id == '4') return 'FORCEPS';
            else if($id == '5') return 'ท่าก้น';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_bdoctor'))
{
    function get_bdoctor($id)
    {
// 1 = แพทย์, 2 = พยาบาล, 3 = จนท.สาธารณสุข (ที่ไม่ใช่แพทย์ พยาบาล), 4 = ผดุงครรภ์โบราณ, 5 = คลอดเอง, 6 = อื่นๆ
        if(!empty($id))
        {
            if($id == '1') return 'แพทย์';
            else if($id == '2') return 'พยาบาล';
            else if($id == '3') return 'จนท.สาธารณสุข  (ที่ไม่ใช่แพทย์ พยาบาล)';
            else if($id == '4') return 'ผดุงครรภ์โบราณ';
            else if($id == '5') return 'คลอดเอง';
            else if($id == '6') return 'อื่นๆ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_bplace'))
{
    function get_bplace($id)
    {
// 1=โรงพยาบาล, 2=สถานีอนามัย, 3=บ้าน, 4=ระหว่างทาง, 5=อื่นๆ
        if(!empty($id))
        {
            if($id == '1') return 'โรงพยาบาล';
            else if($id == '2') return 'สถานีอนามัย';
            else if($id == '3') return 'บ้าน';
            else if($id == '4') return 'ระหว่างทาง';
            else if($id == '5') return 'อื่นๆ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_birthno'))
{
    function get_birthno($id)
    {
// ลำดับที่ของการคลอด 1 = คลอดเดี่ยว, 2 = เป็นเด็กแฝดลำดับที่ 1, 3 = เป็นเด็กแฝดลำดับที่ 2, 4 = เป็นเด็กแฝดลำดับที่ 3, 5 = เป็นเด็กแฝดลำดับที่ 4
        if(!empty($id))
        {
            if($id == '1') return 'คลอดเดี่ยว';
            else if($id == '2') return 'เป็นเด็กแฝดลำดับที่ 1';
            else if($id == '3') return 'เป็นเด็กแฝดลำดับที่ 2';
            else if($id == '4') return 'เป็นเด็กแฝดลำดับที่ 3';
            else if($id == '5') return 'เป็นเด็กแฝดลำดับที่ 4';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('asphyxia'))
{
    function get_asphyxia($id)
    {
// 1 = ขาด , 2 = ไม่ขาด, 9 = ไม่ทราบ
        if(!empty($id))
        {
            if($id == '1') return 'ขาด';
            else if($id == '2') return 'ไม่ขาด';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_vitk'))
{
    function get_vitk($id)
    {
// 1 = ได้รับ , 2 = ไม่ได้รับ, 9 = ไม่ทราบ
        if(!empty($id))
        {
            if($id == '1') return 'ได้รับ';
            else if($id == '2') return 'ไมได้รับ';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_tsh'))
{
    function get_tsh($id)
    {
// 1 = ได้รับการตรวจ , 2 = ไม่ได้ตรวจ, 9 = ไม่ทราบ
        if(!empty($id))
        {
            if($id == '1') return 'ได้รับการตรวจ';
            else if($id == '2') return 'ไมได้ตรวจ';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_vdrl'))
{
    function get_vdrl($id)
    {
 //       1 = ปกติ, 2 = ผิดปกติ,  3=ไม่ตรวจ, 4=รอผลตรวจ, 9 =ไม่ทราบราบ
        if(!empty($id))
        {
            if($id == '1') return 'ปกติ';
            else if($id == '2') return 'ผิดปกติ';
            else if($id == '3') return 'ไม่ตรวจ';
            else if($id == '4') return 'รอผลตรวจ';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_hb'))
{
    function get_hb($id)
    {
 //       1 = ปกติ, 2 = ผิดปกติ,  3=ไม่ตรวจ, 4=รอผลตรวจ, 9 =ไม่ทราบราบ
        if(!empty($id))
        {
            if($id == '1') return 'ปกติ';
            else if($id == '2') return 'ผิดปกติ';
            else if($id == '3') return 'ไม่ตรวจ';
            else if($id == '4') return 'รอผลตรวจ';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_ppresult'))
{
    function get_ppresult($id)
    {
 //  1=ปกติ, 2=ผิดปกติ, 9 = ไม่ทราบบ
        if(!empty($id))
        {
            if($id == '1') return 'ปกติ';
            else if($id == '2') return 'ผิดปกติ';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_bcareresult'))
{
    function get_bcareresult($id)
    {
 //  1=ปกติ, 2=ผิดปกติ, 9 = ไม่ทราบ
        if(!empty($id))
        {
            if($id == '1') return 'ปกติ';
            else if($id == '2') return 'ผิดปกติ';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}
if(!function_exists('get_food'))
{
    function get_food($id)
    {
 //  1 = นมแม่อย่างเดียว, 2 = นมแม่และน้ำ, 3 = นมแม่และนมผสม, 4 = นมผสมอย่างเดียว
        if(!empty($id))
        {
            if($id == '1') return 'นมแม่อย่างเดียว';
            else if($id == '2') return 'นมแม่และน้ำ';
            else if($id == '3') return 'นมแม่และนมผสม';
            else if($id == '4') return 'นมผสมอย่างเดียว';
            else if($id == '9') return 'ไม่ทราบ';
            else return 'ไม่ระบุ';
        }
        else
        {
            return '-';
        }
    }
}



#### สิ้นสุดข้อมูลการคลอด
if(!function_exists('get_address'))
{
    /**
     * @param $addr_code    Address code in ccaattmm
     *
     * @return string
     */
    function get_address($addr_code)
    {
        $ci =& get_instance();
        $ci->load->model('Basic_model', 'basic');

        $chw = substr($addr_code, 0, 2);
        $amp = substr($addr_code, 2, 2);
        $tmb = substr($addr_code, 4, 2);
        $moo = substr($addr_code, 6, 2);

        $chw_name = $ci->basic->get_province_name($chw);
        $amp_name = $ci->basic->get_ampur_name($chw, $amp);
        $tmb_name = $ci->basic->get_tmb_name($chw, $amp, $tmb);
        $moo_name = $ci->basic->get_moo_name($chw, $amp, $tmb, $moo);

        $address = 'หมู่ ' . $moo . ' '. $moo_name . ' ต.' . $tmb_name . ' อ.' . $amp_name . ' จ.' . $chw_name;

        return $address;
    }
}

if(!function_exists('get_diag_name'))
{
    function get_diag_name($code)
    {
        $ci =& get_instance();
        $rs = $ci->db
            ->where(array('code' => $code))
            ->get('ref_icd10')
            ->row();
        return $rs ? $rs->name : '-';
    }

}

if(!function_exists('get_hospital_name'))
{
    function get_hospital_name($code)
    {
        $ci =& get_instance();
        $rs = $ci->db
            ->where(array('hospcode' => $code))
            ->get('ref_hospital')
            ->row();
        return $rs ? $rs->name : '-';
    }
}
if(!function_exists('get_nation_nhso_name'))
{
    function get_nation_nhso_name($code)
    {
        $ci =& get_instance();
        $rs = $ci->db
            ->where(array('code' => $code))
            ->get('ref_nhso_nation')
            ->row();
        return $rs ? $rs->name : '-';
    }
}
if(!function_exists('get_nation_506_name'))
{
    function get_nation_506_name($code)
    {
        $ci =& get_instance();
        $rs = $ci->db
            ->where(array('code' => $code))
            ->get('ref_nation')
            ->row();
        return $rs ? $rs->name : '-';
    }
}
/**
* Get current age
*
* @param    date    yyyy-mm-dd
* @return   array
**/
if(!function_exists('get_current_age')) 
{
    function get_current_age($birth)
    {
        $birth = explode('-', $birth);
        $year = (int) $birth[0];
        $month = (int) $birth[1];
        $day = (int) $birth[2];

        $cyear = (int) date('Y');
        $cmonth = (int) date('m');
        $cday = (int) date('d');
        
        $age = array();

        if($cday < $day)
        {
            $cday = $cday + 30;
            $cmonth--;
            $age['day'] = $cday - $day;
        }
        else 
        {
            $age['day'] = $cday - $day;
        }
        
        if($cmonth < $month)
        {
            $cmonth = $cmonth + 12;
            $cyear--;
            $age['month'] = $cmonth - $month;
        }
        else 
        {
            $age['month'] = $cmonth - $month;
        }

        $age['year'] = $cyear - $year;


        return $age;
    } 
}

if(!function_exists('DateTimeDiff'))
{

    function DateTimeDiff($strDateTime1, $strDateTime2) {
        if (strtotime ( $strDateTime1 ) > strtotime ( $strDateTime2 )) {
            $second = strtotime ( $strDateTime1 ) - strtotime ( $strDateTime2 );
        } else {
            $second = strtotime ( $strDateTime2 ) - strtotime ( $strDateTime1 );
        }
        return $second;
    }
}

if(!function_exists('DateFormatDiff'))
{

    function DateFormatDiff($second) {
/*        if (strtotime ( $strDateTime1 ) > strtotime ( $strDateTime2 )) {
            $second = strtotime ( $strDateTime1 ) - strtotime ( $strDateTime2 );
            echo "เหลือเวลา : ";
        } else {
            $second = strtotime ( $strDateTime2 ) - strtotime ( $strDateTime1 );
            echo "ผ่านมาแล้ว : ";
        }*/
        $re=array();
        	/*if($second>60){
        		$re[]=($second%60)." วินาที ";}*/
        if ($second >= 60) {
            $re [] = (floor ( $second / 60 ) % 60) . " นาที ";
        }
        if ($second >= 3600) {
            $re [] = (floor ( $second / 3600 ) % 24) . " ชั่วโมง ";
        }
        if ($second >= 86400) {
            $re [] = (floor ( $second / 86400 ) % 30.5) . " วัน ";
        }
        if ($second >= 2592000) {
            $re [] = (floor ( $second / 2592000 ) % 12) . " เดือน ";
        }
        if ($second >= 31536000) {
            $re [] = floor ( $second / 31536000 ) . " ปี ";
        }
        $text='';
        for($i = sizeof ( $re ); $i > 0; $i --) {
            $text.= $re [$i - 1];
        }
        return $text;
    }
}

/* End of file epidem_helper.php */
/* Location: ./application/helpers/epidem_helper.php */