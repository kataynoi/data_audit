<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 25/11/2556
 * Time: 10:21 น.
 * To change this template use File | Settings | File Templates.
 */?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/ncd/"?>">โรคไม่ติดต่อเรื้อรัง</a></li>
    <li class="active"> รายงาน ปิงปอง 7 สี โรคเบาหวาน (HDC 43 แฟ้ม) <span class='badge alert-danger'>แฟ้ม Ncdscreen+chronic+labfu  <span class='badge alert-success'>ประมวลผลล่าสุด :<?php echo to_thai_date_time($last_prc);?></span> </span></li>
</ul>
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

<select id="distid" style="width: 180px;" class="form-control">
    <option value="">อำเภอ [ทั้งหมด] </option>
    <?php
    foreach($amp as $r) {
        echo '<option value="' . $r->distid . '">'.''.$r->distid. ' : '. $r->distname .'</option>';
    } ?>
</select>
<span id='age' class=""> หน่วยบริการ
             <select id="age_start" style="width: 120px;" class="form-control">
                 <option value=""> อายุเริ่มต้น </option>
                 <?php
                 for($i=0;$i<=120;$i++) {
                     echo '<option value="' . $i. '">'. $i .'</option>';
                 } ?>
             </select> ถึงอายุ
        -  <select id="age_end" style="width: 120px;" class="form-control">
                          <option value=""> อายุสิ้นสุด </option>
                          <?php
                          for($i=0;$i<=120;$i++) {
                              echo '<option value="' . $i. '">'. $i .'</option>';
                          } ?>
                      </select> ปี
        </span>
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-name="btn_show">
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
    </div>
<div class="alert alert-success">
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>อ่านนิดนึงนะ </strong>
    <ul class="nav ">
        <li> จำนวนกลุ่ม คัดกรอง (1,2) คือผู้ที่ได้รับบริการคัดกรอง ใน NCD SCREEN นะครับ(และต้องลง ระดับน้ำตาลด้วยนะ) </li>
        <li> จำนวนกลุ่ม ป่วย (3,4,5,6) คือผู้ป่วยในแฟ้ม Chronic E10-E14 ที่ได้รับการตรวจ Lab ใน Labfu นะครับ (ต้องมีชื่อใน  Chronic แลได้รับตรวจ lab ระดับน้ำตาลด้วยนะครับ)</li>
        <li> จำนวนกลุ่ม ป่วยโรคแทรกซ้อน (7) คือผู้ป่วยในแฟ้ม Chronic  วินิจฉัย เป็นโรคย่อย เช่น E142 DM With renal complications คือ แทรกซ้อนทางไต</li>
</ul>
    <br>
</div>
    <table class="table table-bordered" id='tbl_list'>
        <thead>
        <tr >
            <th rowspan='2'> #</th>
            <th rowspan='2'> รหัส</th>
            <th rowspan='2'> ชื่อหน่วย</th>
            <th rowspan='2'> จำนวนทั้งหมด</th>
            <th colspan='2'> ปิงปอง 7 สี กลุ่มเสี่ยง คัดกรอง  NCDscreen </th>
            <th colspan='5'> ปิงปอง 7 สี กลุ่มป่วย Chronic</th>

        </tr>
        <tr>
            <th> <span class='btn btn-default' > <=100</span></th>
            <th>  <span class='btn btn-success' >100-125</span></th>
            <th> <span class='btn ' style="color: #000000;background-color: #009900;border-color: #FF9900;" > <=125 </span></th>
            <th> <span class='btn ' style="color: #000000;background-color: #FFFF00;border-color: #FF9900;" >125-154 </span></th>
            <th> <span class='btn btn-warning' >155-182 </span></th>
            <th> <span class='btn btn-danger' >>=182 </span></th>
            <th> <span class='btn ' style="color: #ffffff;background-color: #000000;border-color: #FF9900;" >โรคแทรกซ้อน </span></th>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td colspan="15">...</td>
        </tr>
        </tbody>
    </table>
<ul class="pagination" id="main_paging"></ul>
<script type="text/javascript">
    $(function () {
        $('th').addClass('text-center');
    });
</script>
<script src="<?php echo base_url()?>assets/apps/js/ncd.pingpong_dm.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
