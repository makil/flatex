<?php
namespace Admin\Model;

class PageDTO
{
    public $name;
    public $template;
    public $title;
    public $content;

    public function __construct(string $name, string $template, string $title = '', string $content = '')
    {
        $this->name = $name;
        $this->template = $template;
        $this->title = $title;
        $this->content = $content;
    }
}