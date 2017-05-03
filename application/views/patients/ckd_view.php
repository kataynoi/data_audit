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
    <li><a href="<?php echo site_url()."/reports/"?>">รายงาน</a></li>
    <li class="active">จำนวนผู้ป่วย  CKD<span class='badge alert-danger'>แฟ้ม  </span> <span class='badge alert-success'>ประมวล</span></li>
</ul>
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

        <select id="cupcode" style="width: 180px;" class="form-control">
            <option value="">Cup [ทั้งหมด] </option>
            <?php
            foreach($cup as $r) {
                echo '<option value="' . $r->off_id . '">'.''.$r->off_id. ' : '. $r->off_name .'</option>';
            } ?>
        </select>
<span id='age' class=""> หน่วยบริการ
              <select id="sl_office" style="width: 180px;" class="form-control">
                  <option value=""> หน่วยบริการ </option>

              </select>
<label> วันรับบริการ</label>
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
<table class="table table-bordered " id='tbl_ckd_list'>
    <thead>
    <tr>
        <th >#</th>
        <th >รหัส</th>
        <th >ชื่อหน่วย</th>
        <th >จำนวนผู้ป่วย CKD </th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td colspan="5">...</td>
    </tr>
    </tbody>
</table>
<ul class="pagination" id="main_paging"></ul>
<script type="text/javascript">
    $(function () {
        $('th').addClass('text-center');
    });
</script>
<script src="<?php echo base_url()?>assets/apps/js/ckd.index.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
