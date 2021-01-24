<?php

namespace App\Core;

class Db {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = new \PDO(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASS'));
    }

    public static function instance() {
        if(!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}