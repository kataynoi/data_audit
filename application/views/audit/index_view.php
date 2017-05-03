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
        <th> ลำดับที่</th>
        <th> หน่วยบริการ</th>
        <th> จำนวนแฟ้ม Audit</th>
        <th> รหัส A,B</th>
        <th> รหัส D50-D89</th>
        <th> รหัส E </th>
        <th> รหัส I</th>
        <th> รหัส J </th>
        <th> รหัส K</th>
        <th> รหัส M </th>
        <th> รหัส O</th>
        <th> รหัส R</th>
        <th> รหัส S</th>
        <th> รหัส Z</th>
        <th> รหัส อื่นๆ </th>

    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach($audit as $r) {
        echo '<tr><td>'.$no.'</td><td><a href='.site_url('audit/audit_hosp/'.$r->hospcode).'>'.$r->hospname. '</a></td><td>'.$r->total.'</td>';
        echo '<td>'.$r->g_1.'</td>';
        echo '<td>'.$r->g_2.'</td>';
        echo '<td>'.$r->g_3.'</td>';
        echo '<td>'.$r->g_4.'</td>';
        echo '<td>'.$r->g_5.'</td>';
        echo '<td>'.$r->g_6.'</td>';
        echo '<td>'.$r->g_7.'</td>';
        echo '<td>'.$r->g_8.'</td>';
        echo '<td>'.$r->g_9.'</td>';
        echo '<td>'.$r->g_10.'</td>';
        echo '<td>'.$r->g_11.'</td>';
        echo '<td>'.$r->g_12.'</td>';
        echo '</tr>';
    $no++;
    } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#auditTable').DataTable({
            "language": {
                "lengthMenu": "แสดง _MENU_ แถว ต่อหน้า",
                "zeroRecords": "Nothing found - sorry",
                "info": "แสดง  _PAGE_ of _PAGES_ หน้า",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }
        } );
    });
</script>
