<?php

use App\app;
use App\Views\BasePage;
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


$page = new BasePage([
        'title' => 'Register',
        'content' => $form->render(),
    ]
);

print $page->render();
?>
