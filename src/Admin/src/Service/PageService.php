<?php
namespace Admin\Service;

use Admin\Model\PageDTO;
use Admin\Model\LayoutDTO;

class PageService
{

    private $path = __DIR__ . '/../../../../data/templates/';
    const DEFAULT_PAGE_DIRECTORY = 'pages';
    const DEFAULT_LAYOUT_DIRECTORY = 'layout';

    public function getPageDirectory()
    {
        return $this->path . self::DEFAULT_PAGE_DIRECTORY;
    }

    public function getLayoutDirectory()
    {
        return $this->path . self::DEFAULT_LAYOUT_DIRECTORY;
    }

    private function createContent(PageDTO $page){
        $content = "{% extends '@layout/" . $page->template . ".html.twig' %}\n";
        $content .= "{% block title %}" . $page->title . "{% endblock %}\n";
        $content .= "{% block content %}" . $page->content . "{% endblock %}";
        return $content;
    }

    public function getPages(){
        $files = array_diff(scandir($this->getPageDirectory()), array('.', '..'));
        return $files;
    }

    public function getLayouts(){
        $files = array_diff(scandir($this->getLayoutDirectory()), array('.', '..'));
        return $files;
    }

    public function createPage(PageDTO $page) {
        $filename = $this->getPageDirectory() . '/' . $page->name . '.html.twig';
        $content = $this->createContent($page);
        file_put_contents ( $filename, $content);
    }

    public function updatePage(PageDTO $page) {
        $filename = $this->getPageDirectory() . '/' . $page->name ;
        $content = $this->createContent($page);
        file_put_contents ( $filename, $content);
    }

    public function updateLayout(LayoutDTO $layout) {
        $filename = $this->getLayoutDirectory() . '/' . $layout->name ;
        file_put_contents ( $filename, $layout->content);
    }
}