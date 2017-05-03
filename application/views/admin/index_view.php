<?php
/**
 * Created by JetBrains PhpStorm.
 * User: spiderman
 * Date: 14/10/2556
 * Time: 9:20 น.
 * To change this template use File | Settings | File Templates.
 */
?>
<ul class="breadcrumb" xmlns="http://www.w3.org/1999/html">
    <li><a href="<?php echo site_url('/admin')?>">หน้าหลัก</a> </li>
    <li class="active">Admin</li>
</ul>

<div class="navbar navbar-default">
    <form action="#" class="navbar-form">

<label> ตั้งแต่วันที่</label>
        <input type="text" id="date_start" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">
        <label>ถึงวันที่</label>
        <input type="text" id="date_end" data-type="date" class="form-control"
               placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" data-name="btn_show">
                <i class="glyphicon glyphicon-search"></i> ประมวลผล
            </button>
        </div>
</div>

<div class="container">
    <table class="table">
        <tbody>
            <tr>
           <td>
               <ul>
                   <li><a href="#" data-name="call_person" id='call_person'> ประมวลผล Person</a></li>
               </ul>
           </td>
            </tr>
        </tbody>
    </table>
</div>



<div class="modal fade" id='mdl_parameter'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ประมวลผลข้อมูล ....</h4>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal">
                    <div class="row">
                        <label for="year" class="col col-lg-2 control-label">ปี  </label>
                        <div class="col col-lg-4">
                            <select id="year" style="width: 110px;" class="form-control">
                                <?php
                                $year=year();
                                for($i=$year-5;$i<=$year;$i++){
                                    if($i==$year){
                                        echo "<option value=".$i." selected=selected> ".($i+543)." </option>";
                                    }else{
                                        echo "<option value=".$i."> ".($i+543)." </option>";
                                    }
                                }
                                ?>
                                </select>
                        </div><span class="col col-lg-6 badge alert-info pull-left"> *เพื่อแสดงที่ DashBoard </span>
                    </div>
                    <br>
                    <div class="row">
                        <label for="date_start" class="col col-lg-2 control-label">ตั้งแตวันที่ </label>
                        <div class="col col-lg-4">
                            <input type="text" id="date_start" data-type="date" class="form-control"
                                   placeholder="วว/ดด/ปปปป" title="เช่น 01/01/2556" data-rel="tooltip" style="width: 110px;">
                        </div>
                        <label for="date_end" class="col col-lg-2 control-label">ถึงวันที่ </label>
                        <div class="col col-lg-4">
                            <input type="text" id="date_end" data-type="date" class="form-control"
                                   placeholder="วว/ดด/ปปปป" style="width: 110px;" title="เช่น 31/01/2556" data-rel="tooltip">
                        </div>
                    </div>

                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">ปรมวลผล</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal -->


<script src="<?php echo base_url()?>assets/apps/js/admin.call_procedure.js" charset="utf-8"></script>