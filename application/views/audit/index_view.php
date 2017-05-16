<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 31/12/2556
 * Time: 12:15 น.
 * To change this template use File | Settings | File Templates.
 */
?>
<br>
<div class="col-lg-12">



    <!-- /.col-lg-4 -->


<table class="table highlighttable" id="">
    <thead>
    <tr>
        <th rowspan="2"> ลำดับที่</th>
        <th rowspan="2"> หน่วยบริการ</th>
        <th rowspan="2"> จำนวนแฟ้ม Audit</th>
        <th colspan="2" class="text-center">Audit เวชระเบียน </th>
        <th colspan="2" class="text-center"> Audit ICD10</th>

    </tr>
    <tr>
        <th>Audit เสร็จแล้วร้อยละ</th>
        <th>ผลงาน Audit ถูกต้องร้อยละ</th>
        <th>Audit ICD10 แล้วร้อยละ</th>
        <th>ผลงาน Audit ICD10 ถูกต้องร้อยละ</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach($audit as $r) {
        echo '<tr><td>'.$no.'</td><td><a href='.site_url('audit/audit_hosp/'.$r->hospcode).'>'.$r->hospname. '</a></td><td>'.$r->total.'</td>';
        echo '<td>'.number_format($r->percent_input,2).'</td>';
        echo '<td>'.number_format($r->percent_avg,2).'</td>';
        echo '<td>'.number_format($r->percent_icd,2).'</td>';
        echo '<td>'.number_format($r->percent_icd_avg,2).'</td>';
        echo '</tr>';
    $no++;
    } ?>
    </tbody>
</table>

