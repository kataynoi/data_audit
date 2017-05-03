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
    <li><a href="<?php echo site_url()."/epi/"?>">แม่และเด็ก</a></li>
    <li class="active"> ความครอบคลุมการรับบริการวัคซีน 0-5 ปี<span class='badge alert-danger'>แฟ้ม EPI </span></li>
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
<span id='age' class=""> หน่วยบริการ
              <select id="sl_office" style="width: 180px;" class="form-control">
                  <option value=""> หน่วยบริการ </option>

              </select>
              <span id='age' class=""> อายุ
             <select id="age_start" style="width: 120px;" class="form-control">
                 <option value=""> อายุเริ่มต้น </option>
                 <?php
                 for($i=0;$i<=13;$i++) {
                     echo '<option value="' . $i. '">'. $i .'</option>';
                 } ?>
             </select> ถึงอายุ
        -  <select id="age_end" style="width: 120px;" class="form-control">
                      <option value=""> อายุสิ้นสุด </option>
                      <?php
                      for($i=0;$i<=13;$i++) {
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
            <th >เลขบัตรประชาชน</th>
            <th >ชื่อ</th>
            <th >อาย ปี/เดือน </th>
               <th >BCG</th>
               <th >DTPHB3</th>
               <th >OPV3</th>
               <th >M/MMR</th>
         <th >DTP4</th>
         <th >OPV4</th>
         <th >JE2</th>
         <th >DTP5</th>
         <th >OPV5</th>
         <th >JE3</th>
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
<script src="<?php echo base_url()?>assets/apps/js/epi.cover_vaccine.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>
