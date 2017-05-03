<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/reports/"?>">รายงาน </a></li>
    <li class="active"> ข้อมูลประชากร (Person 43 แฟ้ม)</li>
</ul>
<div class="navbar navbar-default" id='barform'>
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
        <span>
            <select id='search_by' class="form-control" style="width: 180px;">
                <option value="1" selected="selected"> ค้นหาตามช่วงอายุ </option>
                <option value="2"> ค้นหาตามวันเดือนปีเกิด </option>
            </select>
        </span>
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
        <span id='birth' class="">
            <label>ตั้งแต่วันที่</label>
        <input type="text" id="birth_start" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">

        <label>ถึงวันที่</label>
        <input type="text" id="birth_end" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
        </span>
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-name="btn_show_person">
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
</div>
<div class="alert alert-success">
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    <strong>TypeArea</strong>
    <ul class="nav ">
        <li> 1=มีชื่ออยู่ตามทะเบียนบ้านในเขตรับผิดชอบและอยู่จริง</li>
        <li> 2= มีชื่ออยู่ตามทะเบีบนบ้านในเขตรับผิดชอบแต่ตัวไม่อยู่จริง</li>
        <li> 3= มาอาศัยอยู่ในเขตรับผิดชอบ(ตามทะเบียนบ้านในเขตรับผิดชอบ)แต่ทะเบียนบ้านอยู่นอกเขตรับผิดชอบ</li>
        <li> 4= ที่อาศัยอยู่นอกเขตรับผิดชอบและทะเบียนบ้านไม่อยู่ในเขตรับผิดชอบ เข้ามารับบริการหรือเคยอยู่ในเขตรับผิดชอบ</li>
        <li> 5=มาอาศัยในเขตรับผิดชอบแต่ไม่ได้อยู่ตามทะเบียนบ้านในเขตรับผิดชอบ เช่น คนเร่ร่อน ไม่มีที่พักอาศัย เป็นต้น</li>
    </ul>
   <br>
    เป้าหมายในการทำงานคือ TypeArea 1+3
</div>
<table class="table table-bordered" id='tbl_person_amp_list'>
    <thead>
    <tr>
        <th rowspan="3">#</th>
        <th rowspan="3">รหัส</th>
        <th rowspan="3">ชื่อหน่วย</th>
        <th colspan="8">Type Area</th>
        <th rowspan="2" colspan="3">รวมType 1,3</th>
        <th rowspan="2" colspan="2">รวม</th>
    </tr>
    <tr>
        <th colspan="2">1</th>
        <th colspan="2">2</th>
        <th colspan="2">3</th>
        <th colspan="2">4</th>
    </tr>
    <tr>
        <th>ชาย</th>
        <th>หญิง</th>
        <th>ชาย</th>
        <th>หญิง</th>
        <th>ชาย</th>
        <th>หญิง</th>
        <th>ชาย</th>
        <th>หญิง</th>
        <th>ชาย</th>
        <th>หญิง</th>
        <th>รวม</th>
        <th>ชาย</th>
        <th>หญิง</th>
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
<script src="<?php echo base_url()?>assets/apps/js/base_data.person.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
