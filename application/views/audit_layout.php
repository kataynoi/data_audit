<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <?php header('Content-Type: text/html; charset=utf-8');?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo version(); ?></title>
    
    <script type="text/javascript" charset="utf-8">
    var site_url = '<?php echo site_url()?>';
    var base_url = '<?php echo base_url()?>';
    var provid = '<?php echo provid()?>';
    var provname = '<?php echo provname()?>';
    var nowyear = '<?php echo year()?>';
    var off_id = '<?php echo $this->session->userdata('hospcode')?>';
    var user_level = '<?php echo $this->session->userdata('user_level')?>';

    var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
    </script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/flags.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/freeow/freeow.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/apps/css/app.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="<?php echo base_url()?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>assets/js/respond.min.js"></script>
    <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/ico/favicon.png">

    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/heighcharts/js/highcharts.js"></script>
    <script src="<?php echo base_url()?>assets/heighcharts/js/highcharts-more.js"></script>
    <!-- load library -->
    <script src="<?php echo base_url()?>assets/js/underscore.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.cookie.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.freeow.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.numeric.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.paging.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/numeral.min.js"></script>

    <!-- load application -->
    <script src="<?php echo base_url()?>assets/apps/js/apps.js"></script>
        <script type="text/JavaScript">
            $(document).ready(function(){
               var height =$('#band').height();
                //alert(height);
                    $('#top_menu').css("margin-top",height);
                    $('body').css("padding-top",(height));
                }
            );
    </script>
</head>
<body>

<div id="freeow" class="freeow freeow-bottom-right"></div>
<!-- Fixed navbar -->

<!-- Menu Bar -->
<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top"  id='top_menu'>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class='nav navbar-nav'>

        <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-list-alt"></i> ข้อมูลพื้นฐาน<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href='<?php echo site_url('base_data/person')?>'><i class=" glyphicon glyphicon-globe "></i>  กลุ่มเป้าหมาย จำนวนประชากร แฟ้ม Person </a></li>
                <li ><a href='<?php echo site_url('base_data/person_foreign')?>'><i class="glyphicon glyphicon-globe "></i>  กลุ่มเป้าหมาย จำนวนประชากรต่างด้าว แฟ้ม Person </a></li>
                <li class="disabled" ><a href="http://203.157.185.7/mis/provismis/report-pop.html" target='_blank'><i class="glyphicon glyphicon-th"></i> ข้อมูลประชากรในฐานข้อมูลงานประกัน (DBpop)</a></li>
                <li class="disabled"><a href="http://203.157.185.7/mis/provismis/report-office.html" target='_blank'><i class="glyphicon glyphicon-th-list"></i> ข้อมูลสถานบริการ</a></li>
                <li><a href="http://203.157.185.18/hdc_report/" target='_blank'><i class="glyphicon glyphicon-list-alt"></i> ตรวจปริมาณข้อมูล 43 และ 21 แฟ้ม</a></li>
                <li><a href="http://203.157.185.18/hdc_report/list_file50.php" target='_blank'><i class="glyphicon glyphicon-list-alt"></i> ตรวจ ลำดับการนำเข้า ข้อมูล 43 แฟ้ม</a></li>
                <li class="disabled"><a href="http://203.157.185.18/hdc_report/" target='_blank'><i class="glyphicon glyphicon-list-alt"></i> สาเหตุการตาย</a></li>
            </ul>
        </li>
        <!-- -->
        <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-gift"></i> Audit <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li ><a href='<?php echo site_url("audit")?>'><i class="glyphicon glyphicon-heart-empty "></i> ตาราง Audit </a></li>
                <li ><a href='<?php echo site_url("audit/audit_hosp")?>'><i class="glyphicon glyphicon-heart-empty "></i> รายชื่อผู้ป่วยนอกที่ต้อง Audit </a></li>
                <li ><a href='<?php echo site_url("audit/audit2")?>'><i class="glyphicon glyphicon-heart-empty "></i> แบบรายงาน Audit2 </a></li>
                <li ><a href='<?php echo site_url("audit/audit4")?>'><i class="glyphicon glyphicon-heart-empty "></i> แบบรายงาน Audit4 </a></li>

            </ul>
        </li>
<!---->
</ul>
</div>
</nav>
<!-- End Menu Bar -->
<nav role="navigation" class="navbar navbar-default navbar-fixed-top" id='band' >
    <div class="navbar-header" >
        <a class="navbar-brand" href="<?php echo site_url()?>">KPI Mahasarakham</a>
    </div>
    <span >
    <span class="navbar-text">About Me</span>
    <span class="navbar-text"><i class="glyphicon glyphicon-question-sign"></i><a href="<?php echo site_url('basic/what_new')?>" class='link'> What New</a> </span>
    <span class="navbar-text"><i class="glyphicon glyphicon-cog"></i><a href="<?php echo site_url('settings/set_village')?>" class='link'> ตั้งค่าหมู่บ้านรับผิดชอบ </a> </span>
   <!-- <span class="navbar-text disable "><i class="glyphicon glyphicon-cog"></i><a href="<?php /*echo site_url('board/')*/?>" class='disabled'> Q&A กระดานถามตอบ </a> </span>
   --> <span class="navbar-text "><i class="glyphicon glyphicon-cog"></i><a href="<?php echo site_url('download/')?>" class='disabled'>Download</a> </span>
    </span>


    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-cog"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">
                        <?php echo $this->session->userdata('hospcode')?> :
                        <?php echo $this->session->userdata('hospname')?>
                    </li>
                    <li><a href="<?php echo site_url('/users/user_profile')?>"><i class="glyphicon glyphicon-user"></i> ข้อมูลส่วนตัว</a></li>
                    <li><a href="<?php echo site_url('/users/message')?>"><i class="glyphicon glyphicon-comment"></i> กล่องข้อความ</a></li>
                    <li><a href="<?php echo site_url('/users/change_pass')?>"><i class="glyphicon glyphicon-lock"></i> เปลี่ยนรหัสผ่าน</a></li>
                    <li><a href="<?php echo site_url('/users/all_users')?>"><i class="glyphicon glyphicon-list-alt"></i> ผู้ใช้ทั้งหมด</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('users/logout')?>"><i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ</a></li>
                </ul>
            </li>
        </ul>
                <p class="navbar-text pull-right"> สวัสดี, <i><?php echo $this->session->userdata('fullname')."</i><a href='".site_url('/users/message')."'>  [ <span id='new_msg'>  ".$this->session->userdata('new_msg');?> </span> ]</a></p>
    </div>
</nav>
<div class="container" style='margin-top: 110px'>
    <?php echo $content_for_layout?>
</div>

<nav role="navigation" class="navbar-default navbar-fixed-bottom" >
   <div class="text-right"><a href="<?php echo site_url('/admin')?>" class="link">Administrator </a>  : Phanpichit Keawmong &copy; thait-rex@hotmail.com</div>
</nav>
    <!--<a href="http://info.flagcounter.com/X8so"><img src="http://s04.flagcounter.com/count/X8so/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_12/viewers_0/labels_1/pageviews_1/flags_0/" alt="Flag Counter" border="0"></a>
    -->

</body>
</html>
