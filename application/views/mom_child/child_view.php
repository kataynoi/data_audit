<div class="navbar navbar-default">
    <form action="#" class="navbar-form">
        <span>
          เลขบัตรประชาชน  <input class='form-control' type='text' id='cid' value="<?php echo $cid?>" style="width:200px">
        </span>
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
<div class="modal-body">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_newborn" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> ข้อมูลการคลอดเด็ก</a></li>
    <li><a href="#tab_newborncare" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> ข้อมูลการเยี่ยมเด็ก</a></li>
    <li><a href="#tab_epi" data-name='anc' data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> การฉีดวัคซีน </a></li>
    <li><a href="#tab_childdevelop" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> พัฒนาการ </a></li>
    <li><a href="#tab_nutrition" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> ภาวะโภชนาการ </a></li>

</ul>
<div class="tab-content">

<div class="tab-pane active" id="tab_newborn">

</div>
<div class="tab-pane" id="tab_newborncare">
<table class='table' id='tbl_newborncare_list'>
    <thead>
    <tr>
        <td>#</td>
        <td> หน่วยที่บันทึกข้อมูล</td>
        <td> หน่วยที่รับบริการ</td>
        <td> วันที่รับบริการ</td>
        <td> วันเดือนปีเกิด</td>
        <td> การดื่มนมแม่</td>
        <td> ผลการเยี่ยม</td>
        <td> วันที่ปรับปรุงข้อมูล</td>
    </tr>
    </thead>
    <tbody>
    <tr><td colspan="4">.....</td></tr>
    </tbody>
</table>

</div>
<div class="tab-pane" id="tab_epi">
    <table class='table' id='tbl_epi_list'>
        <thead>
        <tr>
            <td>#</td>
            <td> หน่วยที่บันทึกข้อมูล</td>
            <td> หน่วยที่รับบริการ</td>
            <td> วันที่รับบริการ</td>
            <td> วัคซีน</td>
            <td> วันที่ปรับปรุงข้อมูล</td>

        </tr>
        </thead>
        <tbody>
        <tr><td colspan="4">.....</td></tr>
        </tbody>
    </table>
</div>
<div class="tab-pane" id="tab_childdevelop">
    <table class='table' id='tbl_childdevelop_list'>
        <thead>
        <tr>
            <td>......</td>
           <!-- <td> หน่วยที่บันทึกข้อมูล</td>
            <td> สถานที่คลอด</td>
            <td> ครรภ์ที่ </td>
            <td> วันเกิด</td>
            <td> วันเยี่ยมหลังคลอด</td>
            <td> ผลการเยี่ยม</td>
            <td> วันที่ปรับปรุงข้อมูล--></td>

        </tr>
        </thead>
        <tbody>
        <tr><td colspan="4">.....</td></tr>
        </tbody>
    </table>
</div>
<div class="tab-pane" id="tab_nutrition">
    <table class='table' id='tbl_nutrition_list'>
        <thead>
        <tr>
            <td>#</td>

        </tr>
        </thead>
        <tbody>
        <tr><td colspan="4">.....</td></tr>
        </tbody>
    </table>
</div>
</div>

</div>
<script src="<?php echo base_url()?>assets/apps/js/mom.child.js" charset="utf-8"></script>
