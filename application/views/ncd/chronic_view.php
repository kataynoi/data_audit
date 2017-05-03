<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/ncd/"?>">NCD </a></li>
    <li class="active"> ข้อมูลผู้ป่วยเรื้อรัง 43   <span class='badge alert-danger'>แฟ้ม Chronic  <span class='badge alert-success'>ประมวลผลล่าสุด :<?php echo to_thai_date_time($last_prc);?></span></li>
</ul>
<div class="alert alert-warning">
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong> <span class='glyphicon glyphicon-question-sign'> </span> หมายเหตุ</strong>
    <ul class="nav ">
        <li> กลุ่มผู้ป่วยเรื้อรังนับเฉพาะคนที่ยังมีชีวิต (DISCHAR=9) และคนในเขตรับผิดชอบ (TypeArea in 1,3) และวินิจฉัยที่อยู่ในกลุ่มโรคเรื้อรัง 16 กลุ่ม</li>
 </ul>
</div>
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">


        <select id="distid" style="width: 180px;" class="form-control">
            <option value="">อำเภอ [ทั้งหมด] </option>
            <?php
            foreach($amp as $r) {
                echo '<option value="' . $r->distid . '">'.''.$r->distid. ' : '. $r->distname .'</option>';
            } ?>
        </select>
        <select id="sl_office" style="width: 180px;" class="form-control">
            <option value=""> หน่วยบริการ </option>

        </select>
        <select id="group_id" style="width: 180px;" class="form-control">
            <option value=""> กลุ่มโรคเรื้อรัง  </option>
            <?php
            foreach($chronic as $r) {
                echo '<option value="' . $r->groupcode . '">'.'[ '.$r->diseasecodeinterval. ' ] '. $r->groupname .'</option>';
            } ?>
        </select>
        <span id='age' class=""> อายุ
             <select id="age_start" style="width: 120px;" class="form-control">
                 <option value="0"> อายุเริ่มต้น </option>
                 <?php
                 for($i=0;$i<=100;$i++) {
                     echo '<option value="' . $i. '">'. $i .'</option>';
                 } ?>
             </select> ถึงอายุ
        -  <select id="age_end" style="width: 120px;" class="form-control">
                <option value="120"> อายุสิ้นสุด </option>
                <?php
                for($i=0;$i<=100;$i++) {
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
<table class="table table-bordered" id='tbl_list'>
    <thead>
    <tr>
        <th >#</th>
        <th >รหัส</th>
        <th >ชื่อหน่วย</th>
        <th>ชาย</th>
        <th>หญิง</th>
        <th>รวม</th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td colspan="11">...</td>
    </tr>
    </tbody>
</table>
<ul class="pagination" id="main_paging"></ul>
<script type="text/javascript">
    $(function () {
      $('th').addClass('text-center');
    });
</script>
<script src="<?php echo base_url()?>assets/apps/js/ncd.chronic.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
