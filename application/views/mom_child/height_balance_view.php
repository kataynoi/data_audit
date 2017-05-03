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
    <li><a href="<?php echo site_url()."/thaimed/"?>">แม่และเด็ก</a></li>
    <li class="active"> จำนวนเด็กที่ รูปร่างสูงสมส่วน (HDC 43 แฟ้ม) <span class='badge alert-danger'>แฟ้ม Nutrition  <span class='badge alert-success'>ประมวลผลล่าสุด :<?php echo to_thai_date_time($last_prc);?></span> </span></li>
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
                 for($i=0;$i<=20;$i++) {
                     echo '<option value="' . $i. '">'. $i .'</option>';
                 } ?>
             </select> ถึงอายุ
        -  <select id="age_end" style="width: 120px;" class="form-control">
                          <option value=""> อายุสิ้นสุด </option>
                          <?php
                          for($i=0;$i<=20;$i++) {
                              echo '<option value="' . $i. '">'. $i .'</option>';
                          } ?>
                      </select> ปี
        </span>
<label> ตั้งแต่วันที่</label>
        <input type="text" id="date_start" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">

        <label>ถึงวันที่</label>
        <input type="text" id="date_end" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-name="btn_show">
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
    </div>
    <table class="table table-bordered" id='tbl_list'>
        <thead>
        <tr>
            <th > #</th>
            <th > รหัส</th>
            <th > ชื่อหน่วย</th>
            <th > จำนวนทั้งหมด</th>
            <th > รูปร่างดี สมส่วน</th>
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
<script src="<?php echo base_url()?>assets/apps/js/mom.height_balance.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
