<ul class="breadcrumb">
    <li><a href="<?php echo site_url('users/login')?>">Login </a></li>
    <li class="active"> ลงทะเบียนใหม่ : Register </li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-refresh"></i>  ลงทะเบียนใหม่ : Register (การลงทะเบียนนี้เป็นการลงทะเบียน สมาชิก ของ User center หากท่านเป็นสมาชิกของระบบอยู่ ไม่ต้องลทะเบียนใหม่ ให้ทำการร้องขอใช้ระบบแทน)</div>
    <div class="panel-body text-center">
        <form  class="form-horizontal"  method="post">
            <div class="row">
                <label class="col col-lg-2 control-label">ชื่อสกุล </label>
                <div class="col col-lg-3">
                    <input type="text" id="name" class="form-control" value="" placeholder="ชื่อสกุล">
                    <input type="hidden" id="sys_id" class="form-control" value="<?php echo sys_id();?>">
                </div>

                <label class="control-label"> จังหวัด </label>
                <select id="provcode" style="width: 180px;" class="form-control">
                    <option value="">เลือก จังหวัด</option>
                    <?php
                    foreach($prov as $v){
                        echo '<option value='.$v->changwatcode.'>'.$v->changwatname.'</option>';
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="row">
                <label class="col col-lg-2 control-label">Email </label>
                <div class="col col-lg-3">
                    <input type="text" id="email" class="form-control" value="" placeholder="E-Mail"><i id='check_email'></i>
                </div>
                <label class="col col-lg-2 control-label">เบอร์โทร </label>
                <div class="col col-lg-3">
                    <input type="text" id="user_mobile" class="form-control" value="" placeholder="เบอร์ติดต่อ">
                </div>
            </div>
            <br>
            <div class="row">
                <label class="col col-lg-2 control-label">User Name </label>
                <div class="col col-lg-3">
                    <input type="text" id="username" class="form-control" value="" placeholder="Username"><i id='check_user' class=''></i>
                </div>
                <label class="col col-lg-2 control-label">Password </label>
                <div class="col col-lg-3">
                    <input type="password" id="password" class="form-control" value="" placeholder="Password">
                </div>
            </div>
            <br>

    </div>
    </form>
</div>
<div class="panel-footer">

    <button type="button" class="btn btn-primary" id="btn_save_register">
        <i class="glyphicon glyphicon-floppy-saved"></i> บันทึก
    </button>
</div>
</div>
<script src="<?php echo base_url()?>assets/apps/js/users.js" charset="utf-8"></script>