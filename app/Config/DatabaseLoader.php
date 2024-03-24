<?php

namespace Config;

class DatabaseLoader
{
    private string $path = 'database.json';
    var $file;
    var $data;

    function __construct()
    {
        $this->file = file_get_contents(base_url($this->path));
        $this->data = json_decode($this->file, true);
    }

    function getData()
    {
        return $this->data;
    }
}