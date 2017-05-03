<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <?php header('Content-Type: text/html; charset=utf-8');?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google" value="notranslate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo version(); ?></title>

    <script type="text/javascript" charset="utf-8">
    var site_url = '<?php echo site_url()?>';
    var base_url = '<?php echo base_url()?>';
    var provid = '<?php echo provid()?>';
    var url_44 = '<?php echo prov_server(44)?>';
    var url_40 = '<?php echo prov_server(40)?>';
    var url_45 = '<?php echo prov_server(45)?>';
    var url_46 = '<?php echo prov_server(46)?>';
    var provname = '<?php echo provname()?>';
    var nowyear = '<?php echo year()?>';
    var off_id = '<?php echo $this->session->userdata('hospcode')?>';
    var user_level = '<?php echo $this->session->userdata('user_level')?>';

    var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
    </script>
    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->

    <!-- Morris Charts CSS -->
<!--    <link href="<?php /*echo base_url()*/?>assets/css/plugins/morris.css" rel="stylesheet">-->
    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">


    <link href="<?php echo base_url()?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url()?>assets/css/freeow/freeow.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/apps/css/app.css" rel="stylesheet">

    <!--[if lt IE 9]>
<!--    <script src="<?php echo base_url()?>assets/js/jquery-1.11.0.js"></script>-->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>assets/js/respond.min.js"></script>

    <!-- highcharts JavaScript -->
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

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/apps/js/apps.js"></script>

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand menu" href="<?php echo site_url()?>">Epidem Online Mahasarakham </a>
        </div>
        <?php
        if($this->session->userdata("status")){

        ?>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('fullname');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url('/users/user_profile')?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('/users/message')?>"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('/users/change_pass')?>"><i class="fa fa-fw fa-gear"></i> ChangPass</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('users/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php
        }else{
        ?>
            <div class="pull-right navbar-form btn-group">
                <a href="<?php echo site_url('users/login')?>" class="btn btn-info " id='btn_login'><i class="fa fa-fw fa-sign-in"></i>Sign in</a>
                <button  class="btn btn-success " id='register'><i class="fa fa-fw fa-github-alt"></i>Register</button>
            </div>


        <?php
        }

        ?>


        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

            <div class="nav navbar-nav side-nav">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Home</div>
                                    <div>หน้าหลัก!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url();?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-reply fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="main_menu">Reports</div>
                                    <div>รายงาน!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('reports')?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-search fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="main_menu">Patient</div>
                                    <div>สืบค้นประวัติผู้ป่วย</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('patients/pt_service')?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <?php echo $content_for_layout?>
    </div>
</div>
<div id="freeow" class="freeow freeow-bottom-right"></div>
<div class="modal fade" id="mdl_login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-search"></i> ค้นหาข้อมูล</h4>
            </div>
            <div class="modal-body">
                <div class='container'>
                    <div class="row">
                        <div class="col col-lg-4" id="left">

                        </div>
                        <div class="col col-lg-4" id="center">
                            <form id="frm_login" class="form-signin" action="<?php echo site_url('users/do_login') ?>" method="post">

                                <?php if (isset($error)) { ?>
                                    <div class="alert alert-danger">
                                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>

                                        <p>ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</p>
                                    </div>
                                <?php } ?>

                                <input type="text" name="username" id="txt_password" class="form-control" placeholder="ชื่อผู้ใช้งาน"
                                       autofocus>
                                <input type="password" name="password" id="txt_username" class="form-control" placeholder="รหัสผ่าน">
                                <input type="hidden" name="csrf_token" value="<?php echo $this->security->get_csrf_hash() ?>">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_login"><i
                                        class='glyphicon glyphicon-share'></i> Sign in
                                </button>
                                <div class=' btn-block text-center'>
                                    <a href="<?php echo site_url('users/register') ?>" class="btn btn-success pull-left"
                                       id="btn_register"><i class='glyphicon glyphicon-record'> </i> ลงทะเบียนใหม่ </a>
                                    <a href="#" class="btn btn-success pull-right" id="btn_request"><i
                                            class='glyphicon glyphicon-th-list'> </i> ขอเข้าใช้ระบบ </a>
                                </div>
                                <br><br>
                                <a href='#' class="btn btn-warning btn-block " id="btn_forget_pass"><i
                                        class='glyphicon glyphicon-repeat'> </i> ลืมรหัสผ่าน </a>
                            </form>

                            <form id="frm_forgot_pass" class="form-signin" action="" method="post">

                                <?php if (isset($error)) { ?>
                                    <div class="alert alert-danger">
                                        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>

                                        <p> ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง </p>
                                    </div>
                                <?php } ?>

                                <!-- <input type="text" name="repass_username" id="txt_repass_username" class="form-control" placeholder="ชื่อผู้ใช้งาน" autofocus>-->
                                <input type="text" name="repass_email" id="txt_repass_email" class="form-control" placeholder="email">
                                <input type="hidden" name="csrf_token" value="<?php echo $this->security->get_csrf_hash() ?>">
                                <button class="btn btn-lg btn-primary btn-block" id="send_mail_forget_pass"><i
                                        class='glyphicon glyphicon-send'></i> ส่งรหัสผ่านไปที่ Email
                                </button>
                                <a href='#' class="btn btn-warning btn-block" id="btn_back"><i class='glyphicon glyphicon-repeat'> </i>
                                    กลับ</a>

                            </form>
                        </div>

                        <div class="col col-lg-4" id="right">

                        </div>
                    </div>
                   </div>


                <script type="text/javascript">
                    $('#frm_forgot_pass').hide();
                </script>
                <script src="<?php echo base_url() ?>assets/apps/js/users.js" charset="utf-8"></script>
            </div>
            <div class="modal-footer">
        </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/page.index.js" charset="utf-8"></script>
</body>
</html>
