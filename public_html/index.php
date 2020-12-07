<?php

use App\app;
use App\Views\BasePage;
use App\Views\Navigation;
use Core\View;

require '../bootloader.php';


$nav = new Navigation();

$content = new View([
    'title' => 'Poop-Wall',
    'products' => App::$db->getRowsWhere('pixels')
]);

$page = new BasePage([
    'title' => 'Index',
    'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php')
]);

print $page->render();
?>
