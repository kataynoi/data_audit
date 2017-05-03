<div class='container'>
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url()?>">หน้าหลัก </a></li>
        <li class="active"><a href="<?php echo site_url('board/')?>">Webboard </a></li>
    </ul>
    <div class="panel panel-primary">
        <div class="panel-heading"> <span class='badge ' style='background-color: #33CC00'> <?php echo $topic->date_add?></span><?php echo $topic->topic ?></div>
        <div class='panel-body'><p><?php echo $topic->message?></div>
        <div class="panel-footer"><?php echo $topic->name;?></div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading"> ตอบโดย นายพันพิชิต แก้วม่วง</div>
        <div class='panel-body'><p><?php echo $topic->message?></div>
    </div>
