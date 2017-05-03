<div class='container'>
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
        <li class="active"><a href="<?php echo site_url('board/')?>">Webboard </a></li>
    </ul>


<div class='col-lg-pull-12'><a href='<?php echo site_url('board/add_topic/')?>' class='btn btn-info' class='pull-right'> <span class='glyphicon glyphicon-plus-sign'></span>ตั้งกระทู้</a></div>
<ul class="list-group table-striped">
    <li class="list-group-item">

        <span class="badge" style="background-color: #FFCC00">โดย / ตอบ / อ่าน</span>
        หัวข้อ
    </li>


<?php
foreach( $topic as $r) {
    echo '<li class="list-group-item">';
    echo " <span class='badge' style='background-color: #FFCC00'><i class='glyphicon glyphicon-search' title='อ่าน'></i> ".$r->read."/ <i class='glyphicon glyphicon-edit' title='ตอบ'></i> ".$r->reply."</span>";
    echo '<span class="pull-left badge " style="background-color: #33CC00"> '.$r->date_add.'</span> ';
    echo " <a href='".site_url("board/topic/$r->id")."' class='btn-link'>".$r->topic."</a>";
    echo " <div><h6 style='color:#CCCCCC'><span class='pull-left'> โดย ".$r->name."</span>";
    echo " <span class='pull-right'> โพสล่าสุด ".$r->last_reply."</span></h6></div><br></li>";
}
?>
</ul>