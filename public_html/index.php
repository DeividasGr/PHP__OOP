<?php

use App\app;
use App\Views\Navigation;

require '../bootloader.php';


$my_pixels = App::$db->getRowsWhere('pixels');
$nav = new Navigation();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/media/style.css">
    <title>Shit Wall</title>
</head>
<body>
<?php print $nav->render(); ?>
<section class="box">

    <div class="wall">
        <?php foreach ($my_pixels as $span): ?>
            <span class="pixels" style="
                    background: <?php print $span['colors']; ?>;
                    top: <?php print $span['X']; ?>px;
                    left: <?php print $span['Y']; ?>px; ">
            </span>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>