<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Data Audit</h1>
            <div class="account-wall">
<!--                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">-->
                <form id="frm_login" class="form-signin" action="<?php echo site_url('users/do_login') ?>" method="post">
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger">
                            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>

                            <p>ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</p>
                        </div>
                    <?php } ?>
                    <input type="text" name="username" id="txt_username" class="form-control" placeholder="ชื่อผู้ใช้งาน"
                           autofocus>
                    <input type="password" name="password" id="txt_password" class="form-control" placeholder="รหัสผ่าน">

                    <input type="hidden" name="csrf_token" value="<?php echo $this->security->get_csrf_hash() ?>">
                    <button class="btn btn-lg btn-success btn-block" type="submit">
                        Sign in</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Remember me
                    </label>
                   <!-- <a href="<?php /*echo site_url('users/forget_pass?code=xxx')*/?>" class="pull-right need-help">ลืมรหัสผ่าน? </a><span class="clearfix"></span>
-->
                </form>
            </div>
 <!--           <a href="<?php /*echo site_url('users/register')*/?>" class="text-center new-account">ลงทะเบียนใหม่ </a>-->
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#frm_forgot_pass').hide();
</script>
<script src="<?php echo base_url() ?>assets/apps/js/users.js" charset="utf-8"></script>
