<ul class="breadcrumb">
    <li><a href="<?php echo  site_url() ?>">หน้าหลัก </a></li>
    <li><a href="<?php echo  site_url() . "/thaimed/" ?>">แพทย์แผนไทย </a></li>
    <li class="active"> ข้อมูลการใช้ยาสมันไพร</li>
</ul>
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

        <select name="year" id='year' class='form-control' style="width: 180px;">
            <?php
            $year = year();
            for ($i = $year - 5; $i <= $year; $i++) {
                if ($i == $year) {
                    echo "<option value=" . $i . " selected=selected> " . ($i + 543) . " </option>";
                } else {
                    echo "<option value=" . $i . "> " . ($i + 543) . " </option>";
                }
            }
            ?>
        </select>
        <select id='cup_code' class='form-control' style="width: 250px;">
            <?php
            foreach ($cup as $r)
                echo '<option value="' . $r->off_id . '">' . $r->off_name . '</option>';
            ?>
        </select>
        <input type="button" class='btn btn-info' value="ตกลง" id='ok_ontop'>

    </form>
</div>
<table class="table table-bordered table-hover" id='tb_ontop'>
    <thead>
    <tr>
        <th>ลำดับที่</th>
        <th>รหัสสถานบริการ</th>
        <th>ชื่อหน่วยบริการ</th>
        <th>อัตรา</th>
        <th>ต.ค.</th>
        <th>พ.ย.</th>
        <th>ธ.ค.</th>
        <th>ม.ค.</th>
        <th>ก.พ.</th>
        <th>มี.ค.</th>
        <th>เม.ย.</th>
        <th>พ.ค.</th>
        <th>มิ.ย.</th>
        <th>ก.ค.</th>
        <th>ส.ค.</th>
        <th>ก.ย.</th>
        <th>รวมทั้งปี</th>
        <th>วันรับบริการล่าสุด</th>
    </tr>
    </thead>
    <tbody id='tbody_ontop'>

    </tbody>

</table>
<script src="<?php echo base_url()?>assets/apps/js/pcu.ontop.js" charset="utf-8"></script>