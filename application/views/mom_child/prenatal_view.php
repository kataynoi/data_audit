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
    <li class="active"> จำนวนหญิงตั้งครรภ์ (HDC 43 แฟ้ม) <span class='badge alert-danger'>แฟ้ม Prenatal </span></li>
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
              <select id="sl_office" style="width: 180px;" class="form-control">
                  <option value=""> หน่วยบริการ </option>

              </select>
<label> LMP. ตั้งแต่วันที่</label>
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
            <th rowspan="2">#</th>
            <th rowspan="2">รหัส</th>
            <th rowspan="2">ชื่อหน่วย</th>
            <th rowspan="2">จำนวน</th>
            <th colspan="5">ครรภ์ที่</th>
            <th colspan="5">ได้รับการตรวจ Lab</th>
        </tr>
        <tr>
            <th >1</th>
            <th >2</th>
            <th >3</th>
            <th >4</th>
            <th >5+</th>
            <th >VDRL</th>
            <th >HB</th>
            <th >HIV</th>
            <th >HCT</th>
            <th >THALASSEMIA</th>
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
<script src="<?php echo base_url()?>assets/apps/js/mom.prenatal.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
