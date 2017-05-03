<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 31/12/2556
 * Time: 12:15 น.
 * To change this template use File | Settings | File Templates.
 */
?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li ><a href="<?php echo site_url()."/audit/"?>">Audit </a></li>
   <li class="active"><a href="<?php echo site_url()."/audit/audit_hosp/"?>">Audit57 </a></li>
   </ul>
รายชื่อสถานบริการที่ได้รับ การ Audit 2557
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">
        <select id="sl_office" style="width: 180px;" class="form-control">
            <option value=""> หน่วยบริการ </option>
            <?php
            foreach($audit as $r) {
                echo '<option value="' . $r->off_id . '">'.''.$r->off_id. ' : '. $r->off_name .'</option>';
            } ?>
        </select>
        <label> ตั้งแต่วันที่</label>
        <input type="text" id="date_start" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">
        <label>ถึงวันที่</label>
        <input type="text" id="date_end" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
        <span>
          เลขบัตรประชาชน  <input class='form-control' type='text' id='cid' value="<?php echo @$cid?>" style="width:200px">
        </span>
        <div class="checkbox">
            <label>
                <input type="checkbox"  id="op" checked="checked" value="1"> เฉพาะผู้ป่วยOP
            </label>
        </div>
        <button class='btn btn-info ' id='btn_search'><span class="glyphicon glyphicon-search"></span> ค้นหา </button>
    </form>
</div>

<div class='well'>
    <table class='table' id='tbl_person_list'>
        <thead>
        <tr>
            <td>#</td>
            <td> หน่วยบริการ</td>
            <td> ชื่อ นามสกุล</td>
            <td> เลขบัตรประชาชน</td>
            <td> ที่อยู่ </td>
            <td> วันเดือนปีเกิด</td>
            <td> อายุ </td>
            <td> Type Area</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="10">....</td>
        </tr>
        </tbody>
    </table>
</div>
<div class='row'>
  <div class='col col-lg-3'>
      <div class='panel panel-default'>
       <div class='panel-heading'> วันที่รับบริการ </div>
          <ul class="list-group list-group-flush" id='service_list' style="height: 350px; overflow-y: scroll; scrollbar-arrow-color:blue;">
           </ul>
      </div>
  </div>
  <div class='col col-lg-9 col-offset-1'>
      <div class='panel panel-default'>
          <div class='panel-heading'> ราบละเอียดการรับบริการ </div>
          <div class='panel-body'>
              <ul class="list-group list-group-flush" id='visit_list'>

              </ul>
          </div>
      </div>
  </div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/audit.audit4.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>