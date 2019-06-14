<?php

function safe_filename($fn) {
    $fn1 = preg_replace( '/[\\.\\.]+/', '.', $fn);
    return preg_replace( '/[^a-zA-Z0-9\\.]+/', '-', $fn1);
}

function is_contained_by($vroot, $path) {
    // Validate that the $path is a subfolder of $vroot
    $vroot = realpath($vroot);
    if (substr(realpath($path), 0, strlen($vroot)) != $vroot or !is_dir($path)) {
        return false;
    } else {
        return true;
    }
}

class File {
    private $filename;
    private $dir = '';

    public function __construct() {
        $action = isset($_POST['action']) ? $_POST['action'] : false;
        $this->filename = isset($_POST['filename']) ? $_POST['filename'] : false;
        if ((!$action) || (!$this->filename)) return;
        if (!is_contained_by('.', dirname($this->dir.$this->filename))) {
            echo 'FAILED';
            return;
        }
        switch ($action) {
            case 'save' : 
                $this->save(); break;
            case 'load' : 
                $this->load(); break;
            case 'delete' : 
                $this->delete(); break;
            default :
                return;
                break;
        }
    }
    private function save() {
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        file_put_contents($this->dir.$this->filename, urldecode($content));
    }
    private function load() {
        $content = @file_get_contents($this->dir.$this->filename);
        echo $content;
    }
    private function delete() {
        unlink($this->dir.$this->filename);
    }
}
$file = new File();

