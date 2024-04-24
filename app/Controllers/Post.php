<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\FotoModel;

class Post extends BaseController
{
    var $postModel;
    var $fotoModel;
    var $session;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->fotoModel = new FotoModel();
        $this->session = session();
    }

    public function create()
    {
        $name = $this->request->getVar('nazev');
        $text = $this->request->getVar('text');
        $pictures = $this->request->getFiles()['obrazky'];
        
        $userModel = new UserModel();
        $userID = $userModel->find($this->session->get('username'));
        
        $data = [
            'nazev' => $name,
            'text' => $text,
            'uzivatel_id' => $userID
        ];

        $this->postModel->insert($data);
        $id = $this->postModel->getInsertID();

        foreach($pictures as $picture)
        {
            $pictureData = [
                'nazev' => $picture->getName(),
                'alt_popis' => null,
                'prispevek_id' => $id
            ];
            $this->fotoModel->insert();
        }
        
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $name = $this->request->getVar('nazev');
        $text = $this->request->getVar('text');
        $pictures = $this->request->getFiles()['obrazky'];

        $currentPost = $this->postModel->find($id);
        
        $data = [
            'nazev' => $name,
            'text' => $text,
            'id' => $id
        ];

        $picturesAlreadyInDatabase[] = null;

        foreach($pictures as $picture)
        {
            if ($this->fotoModel->where('nazev', $picture->getName())->first() != null)
            {
                $picturesAlreadyInDatabase = $this->fotoModel->where('nazev', $picture->getName()->first()->id);
            }

            $pictureData = [
                'nazev' => $picture->getName(),
                'alt_popis' => null,
                'prispevek_id' => $id
            ];
            $this->fotoModel->insert();
        }

        $allPicturesInDatabase = $this->fotoModel->where('prispevek_id', $id)->findAll();
        $deletePictures = [];

        foreach($allPicturesInDatabase as $picSaved)
        {
            $picAlreadySaved = false;
            foreach ($picturesAlreadyInDatabase as $picInserted)
            {
                if($picSaved->id == $picInserted)
                {
                    $picAlreadySaved = true;
                }
            }

            if($picAlreadySaved == false)
            {
                $deletePictures = $picSaved->id;
            }
        }

        foreach ($deletePictures as $delPic)
        {
            $this->fotoModel->delete($delPic);
        }

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
