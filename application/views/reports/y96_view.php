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
    <li class="active">จำนวนผู้ป่วยด้วยโรคจากการประกอบอาชีพ</li>
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
        <div class="btn-group">
            <button type="button" class="btn btn-primary" id="btn_show" data-name='btn_show'>
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-fax fa-fw"></i> จำนวนผู้ป่วยด้วยโรคจากการประกอบอาชีพ </h3>
            </div>
            <div class="panel-body">
                <div id='chart'></div>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover table-custom" id='tbl_list'>
    <thead>
    <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">ชื่อหน่วย</th>
        <th colspan="3">จำนวน ผู้ได้รับการวนิฉัยด้วย Y96</th>
    </tr>
    <tr>
        <th> ชาย </th>
        <th> หญิง </th>
        <th> รวม </th>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td colspan="15">...</td>
    </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>
<ul class="pagination" id="main_paging"></ul>
<script type="text/javascript">
    $(function () {
        $('th').addClass('text-center');
    });
</script>
<script src="<?php echo base_url()?>assets/apps/js/report.y96.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
