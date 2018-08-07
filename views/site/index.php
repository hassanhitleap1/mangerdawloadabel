<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<div class="row">
    <?php $i=1;?>
    <?php foreach($files as $file):?>
        <div class="col-md-6 box">
            <h2> <?= $file->title?></h2>
            <p><?= $file->description?>
                <a href="<?=  Yii::getAlias( '@web' ).'/'. $file->path_file ;?>">dawnload</a>
            </p>
        </div>
    <?php endforeach;?>
</div>
 
</div>
