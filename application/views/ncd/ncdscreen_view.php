<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/ncd/"?>">NCD </a></li>
    <li class="active"> ข้อมูลการคัดกรองผู้ป่วยเรื้องรัง NCDscreen ( 43 แฟ้ม) <span class='badge alert-success'>ประมวลผลล่าสุด :<?php echo to_thai_date_time($last_prc);?></span></li>
</ul>
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">


        <select id="year" style="width: 180px;" class="form-control">
         <?php
            $year=year();
            for($i=$year-5;$i<=$year;$i++){
                if($i==$year){
                    echo "<option value=".$i." selected=selected> ".($i+543)." </option>";
                }else{
                    echo "<option value=".$i."> ".($i+543)." </option>";
                }

            }
         ?>

        </select>
        <select id="distid" style="width: 180px;" class="form-control">
            <option value="">อำเภอ [ทั้งหมด] </option>
            <?php
            foreach($amp as $r) {
                echo '<option value="' . $r->distid . '">'.''.$r->distid. ' : '. $r->distname .'</option>';
            } ?>
        </select>
              <span id='age' class=""> อายุ
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
            <button type="button" class="btn btn-primary" data-name="btn_show_ncdscreen">
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
</div>
<table class="table table-bordered" id='tbl_ncd_list'>
    <thead>
    <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">รหัส</th>
        <th rowspan="2">ชื่อหน่วย</th>
        <th colspan="3" id='year1'><?php echo (year()+543)-1;?></th>
        <th colspan="9"  id='year2'><?php echo (year()+543);?></th>
        <th rowspan="2">รวม</th>
    </tr>
        <tr>
        <th>ต.ค</th>
        <th>พ.ย</th>
        <th>ธ.ค</th>
        <th>ม.ค</th>
        <th>ก.พ</th>
        <th>มี.ค</th>
        <th>เม.ษ</th>
        <th>พ.ค</th>
        <th>มิ.ย</th>
        <th>ก.ค</th>
        <th>ส.ค</th>
        <th>ก.ย.</th>
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
<script src="<?php echo base_url()?>assets/apps/js/ncd.ncdscreen.js" charset="utf-8"></script>
<!--<script src="<?/*=base_url()*/?>assets/apps/js/basic.js" charset="utf-8"></script>-->
