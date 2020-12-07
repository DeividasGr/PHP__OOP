<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;
use Core\View;

require '../../bootloader.php';
if (!App::$session->getUser()) {
    header("Location: /login.php");
    exit();
}
$row_id = $_GET['id'] ?? null;

if ($row_id === null) {
    header("Location: /admin/list.php");
    exit();
}

$form = new AddForm();

$form->fill(App::$db->getRowById('pixels', $row_id));

if ($form->validate()) {
    $clean_inputs = $form->values();

    App::$db->updateRow('pixels', $row_id, $clean_inputs);
}

$content = new View([
    'title' => 'Edit item',
    'form' => $form->render()
]);

$page = new BasePage([
    'title' => 'Edit Item',
    'content' => $content->render(ROOT . '/app/templates/content/table.tpl.php')
]);

print $page->render();
