<?php
namespace Admin\File;

class FileSystemHelper
{

    private $path = __DIR__ . '/../../../../data/templates/';
    const DEFAULT_PAGE_DIRECTORY = 'pages';
    const DEFAULT_LAYOUT_DIRECTORY = 'layout';

    public function __construct(string $path = '')
    {
            $this->path   .= $path;
        
    }

    public static function createDirectory($path, $mode = 0775){

    }

    public function getFiles(){
        $files = array_diff(scandir($this->path), array('.', '..'));
        return $files;
    }
}