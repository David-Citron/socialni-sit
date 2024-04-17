<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;

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
        $name = $this->request->getVar('nazev');
        $text = $this->request->getVar('text');
        $picture = $this->request->getVar('obrazek');

        $userModel = new UserModel();
        $userID = $userModel->find($this->session->get('username'));
        
        $data = [
            'nazev' => $name,
            'text' => $text,
            'picture' => $picture,
            'uzivatel_id' => $userID
        ];

        $this->postModel->insert($data);

        return redirect()->to('/');
    }

    public function edit($id)
    {
        $name = $this->request->getVar('nazev');
        $text = $this->request->getVar('text');
        $picture = $this->request->getVar('obrazek');

        $currentPost = $this->postModel->find($id);
        
        $data = [
            'nazev' => $name,
            'text' => $text,
            'picture' => $picture,
            'id' => $currentPost['uzivatel_ID']
        ];

        $this->postModel->save($data);

        return redirect()->to('/');
    }

    public function delete($id)
    {
        if(empty($this->postModel->find($id)))
        {
            return redirect()->to('/');
        }
        
        $this->postModel->delete($id);
        return redirect()->to('/');
    }
}
