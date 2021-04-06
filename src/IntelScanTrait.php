<?php

namespace WalkerSpider\IntelScan;

trait IntelScanTrait {

    protected $action;
    
    public function action(String $name, $args = null) {
        switch ($name) {
            case 'delete':
                $this->delete();
                break;

            case 'move':
                $this->action = 'move';
                return $this;
                break;
            default:
                # code...
                break;
        }
    }

    public function delete() {
        $this->action = 'delete';
        return $this;
    }
}