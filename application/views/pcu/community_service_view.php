<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/pcu/"?>">PCU </a></li>
    <li class="active"> ข้อมูลการเยี่ยมบ้าน Community Service ( 43 แฟ้ม) </li>
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
        <label> หน่วยบริการ </label>
              <select id="sl_office" style="width: 180px;" class="form-control" disabled>
                  <option value=""> หน่วยบริการ </option>

              </select>
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

<div class="alert alert-success">
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>อ่านนิดนึงนะ รหัสเยี่ยมบ้าน 7 หลักที่ใช้นับจำนวนครับ .. </strong>
    <ul class="nav ">
        <li>HT  -> 1A01101</li>
        <li>DM  -> 1A01102</li>
        <li>TB  -> 1A01204</li>
        <li>PSY -> 1A01301,1A01302,1A01303,1A01306,1A01308</li>
        <li>ANC -> 1A03101,1A03102,1A03103,1A03104,1A03108</li>
    </ul>
    <br>
</div>
<table class="table table-bordered" id='tbl_list'>
    <thead>
    <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">รหัส</th>
        <th rowspan="2">ชื่อหน่วย</th>
        <th colspan="6">กลุ่มที่ได้รับการเยี่ยมบ้าน (คน)</th>
    </tr>
    <tr>

        <th>ความดัน</th>
        <th>เบาหวาน</th>
        <th>วัณโรค</th>
        <th>จิตเวช</th>
        <th>หญิงตั้งครรภ์</th>
        <th>กลุ่มอื่นๆ (ไม่มีจ่ายตาม QOF)</th>
        <th>รวม</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td colspan="15">...</td>
    </tr>
    </tbody>
</table>
<script src="<?php echo base_url()?>assets/apps/js/pcu.community_service.js" charset="utf-8"></script>
<script src="<?=base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>