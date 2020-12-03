<?php

use App\app;

require '../bootloader.php';

$nav = nav();


$items = App::$db->getRowsWhere('pixels',
    ['email' => $_SESSION['email']]);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/media/style.css">
    <title>My</title>
</head>
<body>
<?php require ROOT . '/app/templates/nav.tpl.php'; ?>
<section class="box">
    <h2>Poop-wall</h2>
    <div class="wall">
        <?php foreach ($items as $span): ?>
            <span class="pixels" style="
                    background: <?php print $span['colors']; ?>;
                    top: <?php print $span['X']; ?>px;
                    left: <?php print $span['Y']; ?>px; ">
            </span>
        <?php endforeach; ?>
    </div>
</body>
</html>
