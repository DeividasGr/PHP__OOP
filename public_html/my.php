<?php

use App\app;
use App\Views\BasePage;
use Core\View;

require '../bootloader.php';


$content = new View([
    'title' => 'Poop-Wall',
    'products' => App::$db->getRowsWhere('pixels')
]);

$page = new BasePage([
    'title' => 'My Poops',
    'content' => $content->render(ROOT . '/app/templates/content/my.tpl.php')
]);

print $page->render();
?>

