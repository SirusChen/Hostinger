
<?php
use app\assets\AppAsset;
AppAsset::register($this);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>唯品会内推</title>
    <?php $this->head() ?>
</head>
<body>
<?= $content ?>
</body>
</html>