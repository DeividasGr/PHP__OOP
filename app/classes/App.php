<?php

namespace App;

use Core\FileDB;
use Core\Session;
use App\Cookie;

class app
{
    public static FileDB $db;
    public static Session  $session;
    public static Cookie  $cookie;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();
        self::$session = new Session();
        self::$cookie = new Cookie('testCookie');
    }
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        self::$db->save();
    }

}