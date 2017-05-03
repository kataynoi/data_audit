<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 31/12/2556
 * Time: 12:15 น.
 * To change this template use File | Settings | File Templates.
 */
$cid='3440100383166';
?>
<ul class="breadcrumb">
    <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
    <li ><a href="<?php echo site_url()."/audit/"?>">Audit </a></li>
   <li class="active"><a href="<?php echo site_url()."/audit/audit_hosp/"?>">Audit57 </a></li>
   </ul>
รายชื่อสถานบริการที่ได้รับ การ Audit 2557
<div class="navbar navbar-default">
    <form action="#" class="navbar-form">
        <select id="sl_office" style="width: 250px;" class="form-control">
            <option value=""> หน่วยบริการ </option>
            <?php
            foreach($audit as $r) {
                echo '<option value="' . $r->off_id . '">'.''.$r->off_id. ' : '. $r->off_name .'</option>';
            } ?>
        </select>
        <label> ตั้งแต่วันที่</label>
        <input type="text" id="date_start" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">

        <label>ถึงวันที่</label>
        <input type="text" id="date_end" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
    </form>
</div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_ur" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> UR-Visit</a></li>
        <li><a href="#tab_top_service" data-toggle="tab"><i class="glyphicon glyphicon-list"></i> บริการ[Service]</a></li>
        <li><a href="#tab_top_diag" data-name='anc' data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> วินิจฉัย[Diag] </a></li>
        <li><a href="#tab_top_proced" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> หัตถการ[Procedure]  </a></li>
        <li><a href="#tab_top_drug" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> ยา[Drug] </a></li>
        <li><a href="#tab_disease_group" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i> โรคสำคัญ 20 กลุ่มโรค </a></li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_ur">
            <table class='table table-hover' id='tbl_ur_list'>
                <thead>
                <tr>
                    <th>#</th>
                    <th> เดือนที่ใช้บริการ</th>
                    <th> จำนวน OP Visit</th>
                    <th> จำนวน Visit ทั้งหมด</th>
                    <th> Price [op]</th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="4">.....</td></tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab_top_service">
            <table class='table' id='tbl_top_service_list'>
                <thead>
                <tr>
                    <th>#</th>
                    <th> วันที่ใช้บริการ</th>
                    <th> จำนวน Visit ทั้งหมด</th>
                    <th> จำนวน OP Visit</th>
                    <th> จำนวน Non OP Visit</th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="4">.....</td></tr>
                </tbody>
            </table>

        </div>
       <div class="tab-pane" id="tab_top_diag">
            <table class='table' id='tbl_top_diag_list'>
                <thead>
                <tr>
                    <th>#</th>
                    <th> ICD10</th>
                    <th> ชื่อโรค</th>
                    <th> จำนวน Diagnosis</th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="4">.....</td></tr>
                </tbody>
            </table>

        </div>
<div class="tab-pane" id="tab_top_proced">
            <table class='table' id='tbl_top_proced_list'>
                <thead>
                <tr>
                    <th>#</th>
                    <th> ICD9</th>
                    <th> ชื่อหัตถการ</th>
                    <th> จำนวน หัตถการ</th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="4">.....</td></tr>
                </tbody>
            </table>

        </div>
<div class="tab-pane" id="tab_top_drug">
            <table class='table' id='tbl_top_drug_list'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>  24 หลัก</th>
                    <th> ชื่อยา</th>
                    <th> ราคาทุน [Drug Cost]</th>
                    <th> ราคาขาย [Drug Price]</th>
                    <th> จำนวนจ่าย [เม็ด/ขวด ฯลฯ]</th>
                    <th> จำนวนครั้งที่จ่าย </th>

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="4">.....</td></tr>
                </tbody>
            </table>

        </div>
<div class="tab-pane" id="tab_disease_group">
            <table class='table' id='tbl_disease_group_list'>
                <thead>
                <tr>
                    <th>#</th>
                    <th> ICD10</th>
                    <th> ชื่อกลุ่มโรคโรค</th>
                    <th> จำนวน Diagnosis คน</th>
                    <th> จำนวน Diagnosis ครั้ง</th>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr><td colspan="4">.....</td></tr>
                </tbody>
            </table>

        </div>

    </div>

<script src="<?php echo base_url()?>assets/apps/js/audit.audit2.js" charset="utf-8"></script>
<script src="<?php echo base_url()?>assets/apps/js/basic.js" charset="utf-8"></script>