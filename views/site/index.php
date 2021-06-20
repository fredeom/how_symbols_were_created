<?php

/* @var $this yii\web\View */

$this->title = 'Application for path generation';

?>

<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
              <?= \yii\helpers\Html::beginForm('/web/site/index', 'post') ?>
                <?= \yii\helpers\Html::textInput('text', $text) ?>
                <?= \yii\helpers\Html::submitButton('Submit') ?>
              <?= \yii\helpers\Html::endForm() ?>
              <?= $text ?>
              <canvas width="1000" height="500" style="width: 1000px; height: 500px;"></canvas>
              <script>
                var tree = <?php var_export(json_encode($tree)); ?>;
              </script>
            </div>
        </div>
    </div>
</div>
