<?php

use App\app;
use App\Views\Forms\RegisterForm;
use App\Views\Navigation;

require '../bootloader.php';

$nav = new Navigation();

if (App::$session->getUser()) {
    header('Location: login.php');
    exit();
}

$form = new RegisterForm();

$clean_inputs = $form->values();
if ($clean_inputs) {
    $success = $form->validate();

    if ($success) {
        unset($clean_inputs['password_repeat']);

        App::$db->insertRow('users', $clean_inputs);

        header("Location: login.php");
    }
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
    <title>Register</title>
</head>
<body>
<main>

    <?php print $nav->render(); ?>

    <article class="wrapper">
        <h1 class="header header--main">Registracija</h1>

        <?php print $form->render(); ?>

    </article>
</main>
</body>
</html>