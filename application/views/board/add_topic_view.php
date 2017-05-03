<div class='container'>
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
        <li class="active"><a href="<?php echo site_url('board/add_topic')?>">ตั้งกระทู้ </a></li>
    </ul>
    <form class="form-horizontal">
        <div class="row">
            <label for="inputEmail" class="col col-lg-2 control-label">Email</label>
            <div class="col col-lg-10">
                <input type="text" id="inputEmail" placeholder="<?php echo $name->name;?>" class='form-control' value="cccccc" style="width:300;">
            </div>
        </div>
        <div class="row">
            <label for="" class="col col-lg-2 control-label">Password</label>
            <div class="col col-lg-10">
                <input type="password" id="inputPassword" placeholder="Password" class='form-control'>
            </div>
            <div class="col col-lg-10 col-offset-2">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </div>
    </form>
</div>
