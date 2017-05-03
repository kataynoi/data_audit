

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small></small>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> </h3>
            </div>
            <div class="navbar navbar-default">
                <form action="#" class="navbar-form">
         <span>ปี
                 <select id="txt_year" style="width: 180px;" class="form-control">
                     <?php
                     $year=2015;
                     for($i=$year-5;$i<=$year;$i++){
                         if($i==$year){echo "<option value=".$i." selected=selected> ".($i+543)." </option>";
                         }else{
                             echo "<option value=".$i."> ".($i+543)." </option>";
                         }
                     }
                     ?>

                 </select>
             <button class="btn btn-info" id='btn_show_chart'><span class="glyphicon glyphicon-print"></span> แสดงกราฟ </button>
     </span>



                </form>
            </div>
            <div class='panel-body'>
                <div id="disease_year" ></div>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-fax fa-fw"></i> จำนวนผู้ป่วย 10 อันดับแรก โรคจากการประกอบอาชีพ</h3>
            </div>
            <div class="panel-body">
                <div id='top10_y96'></div>
            </div>
        </div>
</div>
        <div class="col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>xxxx</h3>
            </div>
            <div class="panel-body">
                <div id='top10_y97'></div>
            </div>
        </div>
    </div>


</div>
<!-- /.row -->

</div>
<script src="<?php echo base_url()?>assets/apps/js/dashboard.js" charset="utf-8"></script>
