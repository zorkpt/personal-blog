<?php

namespace Core;

class Config {
    public $host;
    public $dbname;
    public $charset;

    public function __construct()
    {
        $this->host =  $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->charset = $_ENV['DB_CHARSET'];
    }

}