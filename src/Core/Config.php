<?php

namespace Core;

class Config {
    public $host;
    public $dbname;
    public $charset;

    public function __construct($host = 'mysql', $dbname = 'blog', $charset = 'utf8')
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->charset = $charset;
    }

}