<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 31/12/2556
 * Time: 12:15 น.
 * To change this template use File | Settings | File Templates.
 */
?>
<script>
    var hospcode ='<?php echo $hospcode;?>'
</script>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li ><a href="<?php echo site_url()."/audit/"?>">Audit </a></li>
   <li class="active"><a href="<?php echo site_url()."/audit/audit_hosp/"?>">รายชื่อผู้ป่วย Audit </a></li>
   </ul>
รายชื่อสถานบริการที่ได้รับ การ Audit 2560
<table class="table " id='tbl_list'>
    <thead>
    <tr>
        <th> ลำดับ</th>
        <th> วันที่รับบริการ</th>
        <th> ชื่อ สกุล</th>
        <th> HN</th>
        <th> เลขประชาชน</th>
        <th> บันทึก Audit ICD10</th>
        <th> บันทึก Audit เวชระเบียน</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div class="modal fade" id="mdl_audit_info">
    <div class="modal-dialog" style="width: 960px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id='audit_title'> </h4>
            </div>
            <div class="modal-body" id='audit_body'>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        ตรวจสอบการบันทึกข้อมูลเวชระเบียนผู้ป่วยนอก
                    </div>
                    <div class="panel-body">
                        <table class="table " id=''>
                            <thead>
                            <tr>
                                <th> วันที่รับบริการ</th>
                                <th> ชื่อ สกุล</th>
                                <th> HN</th>
                                <th> เลขประชาชน</th>
                                <th> CC</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td id="date_serve"> </td>
                                <td id="pt_name"> </td>
                                <td id="hn"> </td>
                                <td id="cid"> </td>
                                <td id="cc"> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        ตรวจสอบการบันทึกข้อมูลเวชระเบียนผู้ป่วยนอก คะแนน <span class="badge info" id="fullscore"></span>
                    </div>
                    <div class="panel-body">
                <form role="form">
                    <input type="hidden" id="data_audit_id">
                    <input type="text" id="seq">
                    <input type="text" id="hospcode">
                    <input type="hidden" id="score">
                    <input type="hidden" id="max_score">
                    <input type="hidden" id="percent">
                    <input type="text" id="action">
                 <div class="row">
                    <div class="form-group col col-lg-6">
                        <label>วันเวลาที่มารับบริการ</label>
                        <select  class="form-control" id="sl_datetime">
                            <?php
                            foreach($sl_datetime as $r)
                            {
                                echo '<option value="'.$r->id.'">'. $r->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col col-lg-6">
                        <label>อาการสำคัญ CC </label>
                        <select class="form-control" id="sl_cc">
                            <?php
                            foreach($sl_cc as $r)
                            {
                                echo '<option value="'.$r->id.'">'. $r->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                 </div>
                 <div class="row">
                        <div class="form-group col col-lg-6">
                            <label>ประวัติการเจ็บป่วย</label>
                            <select class="form-control" id="sl_history">
                                <?php
                                foreach($sl_history as $r)
                                {
                                    echo '<option value="'.$r->id.'">'. $r->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col col-lg-6">
                            <label>ผลการตรวจร่างกาย และผล
                                การตรวจชันสูตร</label>
                            <select class="form-control" id="sl_phy_ex">
                                <?php
                                foreach($sl_phy_ex as $r)
                                {
                                    echo '<option value="'.$r->id.'">'. $r->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col col-lg-6">
                            <label>คำวินิจฉัยโรค</label>
                            <select class="form-control" id="sl_diag_text">
                                <?php
                                foreach($sl_diag_text as $r)
                                {
                                    echo '<option value="'.$r->id.'">'. $r->name . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col col-lg-6">
                            <label>การรักษา</label>
                            <select class="form-control" id="sl_treatment">
                                <?php
                                foreach($sl_treatment as $r)
                                {
                                    echo '<option value="'.$r->id.'">'. $r->name . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </form>
                </div>
                    <div class="panel-footer text-center">
                        <button type="submit" class="btn btn-default" id="btn_audit_save">บันทึกข้อมูล</button>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i> ปิดหน้าต่าง</button>
            </div>
        </div>
    </div
</div>
<script src="<?php echo base_url()?>assets/apps/js/audit.audit_hosp.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>