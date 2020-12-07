<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\Admin\DeleteForm;
use Core\Views\Form;
use Core\Views\Link;
use Core\Views\Table;

require '../../bootloader.php';

if (!App::$session->getUser()) {
    header("Location: /login.php");
    exit();
}

if (Form::action()) {
    $delete = new DeleteForm();

    if ($delete->validate()) {
        App::$db->deleteRow('pixels', $delete->values()['row_id']);
    }
}

$rows = App::$db->getRowsWhere('pixels');

foreach ($rows as $id => $row){
    $link = new Link([
        'link' => "/admin/edit.php?id={$id}",
        'text' => 'Edit',
    ]);

    $delete = new DeleteForm();
    $delete->fill(['row_id' => $id]);

    $rows[$id]['link'] = $link->render();
    $rows[$id]['delete'] = $delete->render();
}


$table = new Table([
    'headers' => [
        'X',
        'Y',
        'color',
        'email',
        'Update',
        'Delete'

    ],
    'rows' => $rows
]);


$page = new BasePage([
    'title' => 'Edit List',
    'content' => $table->render()
]);


print $page->render();