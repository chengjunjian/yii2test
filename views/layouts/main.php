<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var string $content */
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6/css/all.min.css" rel="stylesheet">
    <?php
    \yii\bootstrap5\BootstrapAsset::register($this);
    ?>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container">
    <?= $content ?>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
