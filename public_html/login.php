<?php

use App\app;
use App\Views\Forms\LoginForm;
use App\Views\Navigation;


require '../bootloader.php';


$nav = new Navigation();

if (App::$session->getUser()) {
    header('Location: /index.php');
    exit();
}

$form = new LoginForm();

if ($form->validate()) {
    $clean_inputs = $form->values();
    App::$session->login($clean_inputs['email'], $clean_inputs['password']);
    header('Location: /index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/media/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <?php print $nav->render(); ?>

    <article class="wrapper">
        <h1 class="header header--main">Prisijunk</h1>

        <?php print $form->render(); ?>
    </article>
</main>
</body>
</html>
