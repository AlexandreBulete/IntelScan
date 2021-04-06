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
            // echo '<pre>'; var_dump($now - $created_at, $this->files, $_SERVER['DOCUMENT_ROOT']); echo '</pre>';
            // echo '<pre>'; var_dump(getdate(), $this->files[$i]); echo '</pre>';
            // echo $this->files[$i];

            // if ($now - $created_at > self::ONE_DAY_IN_SECONDS * 30) {
            if ($now - $created_at > self::ONE_DAY_IN_SECONDS * 30) {
                file_exists($this->file[$i]) ? unlink($this->files[$i]) : '';
            }
            // echo '<pre>'; var_dump(strtotime('now'), strtotime("now -30 days") + 86400 * 30); echo '</pre>';
            // echo '<pre>'; var_dump(strtotime('-30 days', $created_at), strtotime("now -30 days") + 86400 * 30); echo '</pre>';
        }
        return $this;
    }

    // public function delete(String $indicator = 'after', String $strtotime) {
        
    // }

}