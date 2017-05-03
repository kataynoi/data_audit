<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li><a href="<?php echo site_url()."/ncd/"?>">NCD </a></li>
    <li class="active"> ข้อมูลผู้ป่วยเรื้อรัง (chronic 21 แฟ้ม)</li>
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
        <select id="sl_office" style="width: 180px;" class="form-control">
            <option value=""> หน่วยบริการ </option>

        </select>
        <select id="distid" style="width: 180px;" class="form-control">
            <option value=""> กลุ่มโรคเรื้อรัง  </option>
            <?php
            foreach($chronic as $r) {
                echo '<option value="' . $r->groupcode . '">'.'[ '.$r->diseasecodeinterval. ' ] '. $r->groupname .'</option>';
            } ?>
        </select>
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-name="btn_show_person">
                <i class="glyphicon glyphicon-search"></i> แสดง
            </button>
        </div>
    </form>
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
<script src="<?php echo base_url()?>assets/apps/js/ncd.chronic.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
