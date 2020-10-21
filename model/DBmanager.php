<?php
require "model/db.php";

abstract class DBmanager {
    protected PDO $_db;

    public function setDb(PDO $connection) {
        $this->_db = $connection;
    }

    public function getDb():PDO {
        return $this->_db;
    }

    function __construct()
    {
        $this->setDb(dataBase::DB());
    }
}
?>