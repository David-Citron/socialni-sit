<?php

namespace App\Controllers;
use App\Models\PostModel;

class Post extends BaseController
{
    var $postModel;
    var $session;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->session = session();
    }

    public function create()
    {
        return;
    }

    public function edit($id)
    {
        return;
    }

    public function delete($id)
    {
        if($this->find($id) != null)
        $this->postModel->delete($id);
        return;
    }
}
