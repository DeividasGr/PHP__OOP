<?php

use App\app;
use App\Views\BasePage;
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
$page = new BasePage([
        'title' => 'Login',
        'content' => $form->render(),
    ]
);

print $page->render();
?>

