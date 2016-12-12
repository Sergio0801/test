<?php

class Database extends PDO
{
    public function __construct()
    {
        $dbn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        $param = array('PDO::ATTR_PERSISTENT' => 'true');
        parent::__construct($dbn, DB_USER, DB_PASS, $param);
    }
}
