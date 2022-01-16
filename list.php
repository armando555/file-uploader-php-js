<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico">
    <title>List 2</title>
</head>
<body>
<?php $cont = 1; ?>

<?php $read = file('images.txt'); ?>

<?php $read_count = count($read); ?>

<?php foreach ($read as $value) : ?>
    <li>
    <?php    echo trim($value); ?>
</li>
    <?php if ($cont < $read_count) : ?>
        <?php    echo "\n"; ?>
    <?php endif; ?>

    <?php $cont++; ?>

<?php endforeach; ?>
</body>
</html>

