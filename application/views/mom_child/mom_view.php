<div class="navbar navbar-default">
    <form action="#" class="navbar-form">
        <span>
          เลขบัตรประชาชน  <input class='form-control' type='text' id='cid' value="<?php echo $cid?>" style="width:200px">
        </span>
        <span>
        ครรภ์ที่            <input class='form-control' type='text' id='gravida' value="<?php echo $gravida?> " style="width:100px">
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
    <li class="active"><a href="#tab_prenatal" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> ข้อมูลการตั้งครรภ์</a></li>
    <li><a href="#tab_anc" data-name='anc' data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> ข้อมูลการฝากครรภ์ </a></li>

    <li><a href="#tab_labor" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> ข้อมูลการคลอด </a></li>
    <li><a href="#tab_postnatal" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> ข้อมูลการเยี่ยมหลังคลอด </a></li>

</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_prenatal">
    <table class='table' id='tbl_prenatal_list'>
        <thead>
        <tr>
            <td>#</td>
            <td> หน่วยที่บันทึกข้อมูล</td>

            <td> วันที่ปรับปรุงข้อมูล</td>
            <td> LMP</td>
            <td> EDC</td>
            <td> VDRL</td>
            <td> HB</td>
            <td> DATE_HCT</td>
            <td> HCT</td>
        </tr>
        </thead>
        <tbody>
        <tr><td colspan="4">.....</td></tr>
        </tbody>
    </table>
</div>
<div class="tab-pane" id="tab_anc">
<table class='table' id='tbl_anc_list'>
    <thead>
    <tr>
        <td>#</td>
        <td> หน่วยที่บันทึกข้อมูล</td>
        <td> หน่วยที่รับบริการ</td>
        <td> วันที่รับบริการ</td>
        <td> อายุครรภ์</td>
        <td> ครรภ์คุณภาพ </td>
    </tr>
    </thead>
    <tbody>
    <tr><td colspan="4">.....</td></tr>
    </tbody>
</table>

</div>
<div class="tab-pane" id="tab_labor">
    <table class='table' id='tbl_labor_list'>
        <thead>
        <tr>
            <td>#</td>
            <td> หน่วยที่บันทึกข้อมูล</td>
            <td> สถานที่คลอด</td>
            <td> ครรภ์ที่ </td>
            <td> วันเกิด</td>
            <td> EDC</td>
            <td> วันคลอด</td>
            <td> ผลการคลอด</td>
            <td> ข้อมูลเด็ก </td>
            <td> วันที่ปรับปรุงข้อมูล</td>

        </tr>
        </thead>
        <tbody>
        <tr><td colspan="4">.....</td></tr>
        </tbody>
    </table>
</div>
<div class="tab-pane" id="tab_postnatal">
    <table class='table' id='tbl_postnatal_list'>
        <thead>
        <tr>
            <td>#</td>
            <td> หน่วยที่บันทึกข้อมูล</td>
            <td> สถานที่คลอด</td>
            <td> ครรภ์ที่ </td>
            <td> วันเกิด</td>
            <td> วันเยี่ยมหลังคลอด</td>
            <td> ผลการเยี่ยม</td>
            <td> วันที่ปรับปรุงข้อมูล</td>

        </tr>
        </thead>
        <tbody>
        <tr><td colspan="4">.....</td></tr>
        </tbody>
    </table>
</div>
</div>

</div>
<script src="<?php echo base_url()?>assets/apps/js/mom.mom.js" charset="utf-8"></script>
