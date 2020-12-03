<?php

use App\app;

define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');


require 'core/functions/html.php';
require 'core/functions/form/validators.php';
require 'core/functions/file.php';
require 'app/functions/form/validators.php';
require 'app/functions/form/auth.php';
require 'vendor/autoload.php';

$app = new App();

