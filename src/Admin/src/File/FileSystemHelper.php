<?php
namespace Admin\File;

use Admin\Model\PageDTO;

class FileSystemHelper
{

    private $path = __DIR__ . '/../../../../data/templates/';
    const DEFAULT_PAGE_DIRECTORY = 'pages';
    const DEFAULT_LAYOUT_DIRECTORY = 'layout';

    public function __construct(string $path = '')
    {
        $this->path   .= $path;
    }

    private function createContent(PageDTO $page){
        $content = "{% extends '@layout/" . $page->template . ".html.twig' %}\n";
        $content .= "{% block title %}" . $page->title . "{% endblock %}\n";
        $content .= "{% block content %}" . $page->content . "{% endblock %}";
        return $content;
    }

    public function getFiles(){
        $files = array_diff(scandir($this->path), array('.', '..'));
        return $files;
    }

    public function createPage(PageDTO $page) {
        $filename = $this->path . '/' . $page->name . '.html.twig';
        $content = $this->createContent($page);
        file_put_contents ( $filename, $content);
    }

    public function updatePage(PageDTO $page) {
        $filename = $this->path . '/' . $page->name ;
        $content = $this->createContent($page);
        file_put_contents ( $filename, $content);
    }
}