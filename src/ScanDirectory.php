<?php

namespace WalkerSpider\IntelScan;

use WalkerSpider\IntelScan\IntelScanTrait;
use Exception;

class ScanDirectory {

    use IntelScanTrait;

    private $documentRoot;

    private $directoryRoot;

    public $directory;

    public $files;

    
    private const ONE_HOUR_IN_SECONDS = 3600;
    private const ONE_DAY_IN_SECONDS = 86400;

    public function __construct(String $directory) {
        $this->documentRoot = $_SERVER['DOCUMENT_ROOT'];
        $this->directoryRoot = $this->documentRoot . '/' . $directory;
        $this->directory = $directory;
        return $this;
    }

    public function after30days() {
        $this->files = glob($this->directory.'/*');
        for ($i=0; $i < count($this->files) ; $i++) { 
            $created_at = filectime($this->files[$i]);
            $now = getdate()[0];
            $this->{$this->action}();

            if ($now - $created_at > self::ONE_DAY_IN_SECONDS * 30) {
                file_exists($this->files[$i]) ?  unlink($this->files[$i]) : '';
            }
        }
        return $this;
    }

    // public function delete(String $indicator = 'after', String $strtotime) {
        
    // }

}