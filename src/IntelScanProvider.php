<?php

namespace WalkerSpider\IntelScan;

use Exception;

class IntelScanProvider {
    /**
     * @param String $path
     */
    public static function scanDirectory(String $path) {
        return new ScanDirectory($path);
    }

    /**
     * @param String $host
     * @param String $user
     * @param String $password
     */
    public static function scanDatabase(String $host, String $user, String $password) {
        return new ScanDatabase($host, $user, $password);
    }
}