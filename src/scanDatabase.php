<?php

namespace WalkerSpider\IntelScan;

use PDO;
use PDOException;

class ScanDatabase {
    
    public function __construct(String $host, String $user, String $password) {
        return $this->pdo($host, $user, $password);
    }

    /**
     * Return the PDO Instance
     * @param String $host
     * @param String $user
     * @param String $password
     * @return PDO
     */
    private function pdo(String $host, String $user, String $password) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=myDB", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function action(String $name, $args) {
        switch ($name) {
            case 'delete':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }
}