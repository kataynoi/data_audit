<?php
/*
 * Class ${NAME}
 * Created by Kataynoi.
 * @author  Mr.Dechachit Kaewmoung <thait-rex@hotmail.com>
 * @copyright   MKHO <http://mkho.moph.go.th>
 * Date: 20/3/2558
 * Time: 5:58 น.
 */?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/reports/"?>">รายงาน</a></li>
    <li class="active"> ข้อมูลผู้ป่วยรายบุคคล (Individual Data)</li>
</ul>
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

        <select id="year" style="width: 180px;" class="form-control">
            <option value="">เลือกปี งบประมาณ</option>
            <?php
            $year=year();
            for($i=$year-3;$i<=$year;$i++){
                echo "<option value=".($i)."> ".($i+543)." </option>";
            }
            ?>

        </select>
        <label class="control-label"> จังหวัด </label>
        <select id="provcode" style="width: 180px;" class="form-control">
            <option value="">เลือก จังหวัด</option>
            <?php
            foreach($prov as $v){
                echo '<option value='.$v->changwatcode.'>'.$v->changwatname.'</option>';
            }
            ?>
        </select>
        <label class="control-label"> อำเภอ </label>
        <select id="ampcode" style="width: 180px;" class="form-control">
            <option value=""> อำเภอทั้งหมด </option>
        </select>
        <select id="sl_office" style="width: 180px;" class="form-control">
            <option value=""> หน่วยบริการ </option>
        </select>
        <br>
        <br>
        <label> ตั้งแต่วันที่</label>
        <input type="text" id="date_start" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">

        <label>ถึงวันที่</label>
        <input type="text" id="date_end" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" id="btn_show" data-name='btn_show'>
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
</div>
<table class="table table-bordered" id="tbl_list">
    <thead>
        <th> #</th>
        <th> HN </th>
        <th> ชื่อ สกุล</th>
        <th> วันที่ป่วย </th>
        <th> ที่อยู่ </th>
        <th> อายุ </th>
        <th> เพศ </th>
        <th>  อาชีพ </th>
        <th> โรคหลัก </th>
        <th> Envocc</th>
    </thead>
    <tbody>
        <tr>
            <td colspan="9">......</td>
        </tr>
    </tbody>
</table>
<script src="<?php echo base_url()?>assets/apps/js/report.individual.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>