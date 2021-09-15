<?php

class Dbh {

    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $dbName = 'my_contacts';
    private $charset = 'utf8mb4';

    public function connect() {
        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Conection failed: '. $e->getMessage();
        }
    }
    
}