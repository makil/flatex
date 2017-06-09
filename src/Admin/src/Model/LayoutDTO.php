<?php
namespace Admin\Model;

class LayoutDTO
{
    public $name;
    public $content;

    public function __construct(string $name, string $content = '')
    {
        $this->name = $name;
        $this->content = $content;
    }
}