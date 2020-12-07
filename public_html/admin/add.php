<?php

use App\app;
use App\Views\Forms\Admin\AddForm;
use App\Views\Navigation;

require '../../bootloader.php';

$nav = new Navigation();

if (!App::$session->getUser()) {
    header('Location: login.php');
    exit();
}

$form = new AddForm();

if ($form->validate()) {
    $clean_inputs = $form->values();
    $clean_inputs['email'] = $_SESSION['email'];
    App::$db->insertRow('pixels', $clean_inputs);
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
    <title>Add</title>
</head>
<body>
<main>
    <?php print $nav->render(); ?>
    <?php print $form->render(); ?>
</main>
</body>
</html>

