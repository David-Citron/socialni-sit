<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\FotoModel;
use App\Models\ThumbModel;
use App\Models\CommentModel;
use PHPUnit\Framework\Constraint\IsEmpty;

class Post extends BaseController
{
    use ResponseTrait;

    var $postModel;
    var $fotoModel;
    var $commentModel;
    var $userModel;
    var $thumbModel;
    var $session;
    var $defaultProfilePicture;
    

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->fotoModel = new FotoModel();
        $this->commentModel = new CommentModel();
        $this->userModel = new UserModel();
        $this->thumbModel = new ThumbModel();
        $this->session = session();
        $this->defaultProfilePicture = 'avatar.png';
    }

    public function create()
    {
        $name = $this->request->getVar('nazev');
        $text = $this->request->getVar('text');
        $pictures = $this->request->getFiles()['obrazky'];
        
        $userID = $this->userModel->where('uzivatelske_jmeno', $this->session->get('username'))->first();
        
        $data = [
            'nazev' => $name,
            'text' => $text,
            'uzivatel_id' => $userID->id
        ];

        $this->postModel->insert($data);
        $id = $this->postModel->getInsertID();

        foreach($pictures as $picture)
        {
            $newFileName = 'foto'.($this->fotoModel->orderBy('id', 'desc')->first()->id + 1).'.'.$picture->getExtension();
            $pictureData = [
                'nazev' => $newFileName,
                'alt_popis' => null,
                'prispevek_id' => $id
            ];
            $this->fotoModel->insert($pictureData);
            $picture->move(ROOTPATH.'assets/img/post', $newFileName);
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
        $fotos = $this->fotoModel->where('prispevek_id', $id)->findAll();
        $fotoPath = ROOTPATH.'/assets/img/post/';
        foreach($fotos as $fotoObj)
        {
            $foto = $fotoObj->nazev;
            if (file_exists($fotoPath.$foto)) 
            {
                unlink($fotoPath.$foto);
            }else
            {
                echo "Foto doesn't exist";
                return;
            }
        }

        $this->postModel->delete($id);
        return redirect()->to('/');
    }

    public function showAllPosts()
    {
        $posts = $this->postModel->findAll();
        foreach($posts as $post)
        {
            echo 'Příspěvek č. '.$post->id.' - '.$post->nazev.'<br>';
        }
    }

    public function apiShowPost()
    {
        $id = $this->request->getVar('id');
        return $this->respond(['post' => $this->retrievePost($id), 'message' => 'Příspěvek nalezen', 'status' => 200]);
    }

    public function apiShowNextPost()
    {
        return $this->apiShowNextPostMultiple(1);
    }

    public function apiShowNextPostMultiple($count)
    {
        $requestedId = $this->request->getVar('id');
        $allPosts = $this->postModel->orderBy('id', 'desc')->findAll();
        $next = 0;
        if ($requestedId == 0){
            $next = $count;
        }
        $ids = [];
        foreach($allPosts as $post)
        {
            if ($post->id == $requestedId)
            {
                $next = $count;
            }else if($next > 0)
            {
                $next = $next -1;
                $ids[] = $post->id;
            }
        }
        $posts = [];
        foreach ($ids as $key => $id)
        {
            $posts[$key] = $this->retrievePost($id);
        }
        return $this->respond(['posts' => $posts, 'message' => 'Příspěvky nalezeny', 'status' => 200]);
    }

    public function apiShowNextPostMultipleByUser($count)
    {
        $requestedId = $this->request->getVar('id');
        $userId = $this->request->getVar('user_id');
        $allPosts = $this->postModel->where('uzivatel_id', $userId)->orderBy('id', 'desc')->findAll();
        $next = 0;
        if ($requestedId == 0){
            $next = $count;
        }
        $ids = [];
        foreach($allPosts as $post)
        {
            if ($post->id == $requestedId)
            {
                $next = $count;
            }else if($next > 0)
            {
                $next = $next -1;
                $ids[] = $post->id;
            }
        }
        $posts = [];
        foreach ($ids as $key => $id)
        {
            $posts[$key] = $this->retrievePost($id);
        }
        return $this->respond(['posts' => $posts, 'message' => 'Příspěvky nalezeny', 'status' => 200]);
    }

    public function retrievePost($id)
    {
        $post = (array) $this->postModel->find($id);
        $user = (array) $this->userModel->find($post['uzivatel_id']);
        $post['uzivatel_jmeno'] = $user['uzivatelske_jmeno'];
        $post['uzivatel_foto'] = $user['obrazek'];
        $thumbModel = new ThumbModel();
        $post['thumbs_up'] = $thumbModel->where('prispevek_id', $post['id'])->where('typ', 1)->countAllResults();
        $post['thumbs_down'] = $thumbModel->where('prispevek_id', $post['id'])->where('typ', 2)->countAllResults();
        $thumb = $this->thumbModel->where('prispevek_id', $id)->where('uzivatel_id', $this->userModel->where('uzivatelske_jmeno', $this->session->get('username'))->first()->id)->first();
        if($thumb != null)
        {
            $thumb = $thumb->typ;
        }
        $post['thumb'] = $thumb;
        $post['comments'] = (array) $this->commentModel->where('prispevek_id', $post['id'])->findAll();
        foreach ($post['comments'] as $key => $comment)
        {
            $comment = (array) $comment;
            $commentUser = $this->userModel->find($comment['uzivatel_id']);
            $post['comments'][$key]->uzivatel_jmeno = $commentUser->uzivatelske_jmeno;
            $post['comments'][$key]->uzivatel_foto = $this->userModel->find($comment['uzivatel_id'])->obrazek;
            if($post['comments'][$key]->uzivatel_foto == null)
            {
                $post['comments'][$key]->uzivatel_foto = $this->defaultProfilePicture;
            }
            $post['comments'][$key]->uzivatel_foto = base_url('assets/img/user/'.$post['comments'][$key]->uzivatel_foto);
        }
        $post['comments_count'] = count($post['comments']);
        $allFoto = $this->fotoModel->where('prispevek_id', $post['id'])->findAll();
        $fotoURLs = null;
        foreach($allFoto as $key => $foto)
        {
            $fotoURLs[$key] = base_url('assets/img/post/'.$foto->nazev);
        }
        $post['foto'] = $fotoURLs;
        $post['dropdown'] = $this->session->get('admin');
        if($this->session->get('username') == $post['uzivatel_jmeno'])
        {
            $post['dropdown'] = true;
        }
        if($post['uzivatel_foto'] == null)
        {
            $post['uzivatel_foto'] = $this->defaultProfilePicture;
        }
        $post['uzivatel_foto'] = base_url('assets/img/user/'.$post['uzivatel_foto']);
        return $post;
    }

    public function addComment()
    {
        $data['text'] = $this->request->getVar('text');
        $data['prispevek_id'] = $this->request->getVar('prispevek_id');
        $data['uzivatel_id'] = $this->userModel->where('uzivatelske_jmeno', $this->session->get('username'))->first()->id;
        $data['pridano'] = date('Y-m-d H:i:s');
        $this->commentModel->insert($data);
        $comment = (array) $this->commentModel->find($this->commentModel->getInsertID());
        $commentUser = $this->userModel->find($data['uzivatel_id']);
        $comment['uzivatel_jmeno'] = $commentUser->uzivatelske_jmeno;
        $comment['uzivatel_foto'] = $this->userModel->find($data['uzivatel_id'])->obrazek;
        if($comment['uzivatel_foto'] == null)
        {
            $comment['uzivatel_foto'] = $this->defaultProfilePicture;
        }
        $comment['uzivatel_foto'] = base_url('assets/img/user/'.$comment['uzivatel_foto']);
        return $this->respond(['comment' => $comment, 'message' => 'Komentář byl úspěšně přidán', 'status' => 201]);
    }

    public function changeThumb($prispevekID, $userID, $thumbType)
    {
        $currentThumb = (array) $this->thumbModel->where('uzivatel_id', $userID)->where('prispevek_id', $prispevekID)->first();
        if($currentThumb != null)
        {
            if($currentThumb['typ'] == $thumbType)
            {
                $this->thumbModel->delete($currentThumb['id']);
                $currentThumb['thumbsUpCount'] = $this->thumbModel->where('prispevek_id', $prispevekID)->where('typ', 1)->countAllResults();
                $currentThumb['thumbsDownCount'] = $this->thumbModel->where('prispevek_id', $prispevekID)->where('typ', 2)->countAllResults();
                $currentThumb['change'] = true;
                return $currentThumb;
            }else
            {
                $currentThumb = (array) $currentThumb;
                $currentThumb['typ'] = $thumbType;
                $this->thumbModel->save($currentThumb);
                $currentThumb['thumbsUpCount'] = $this->thumbModel->where('prispevek_id', $prispevekID)->where('typ', 1)->countAllResults();
                $currentThumb['thumbsDownCount'] = $this->thumbModel->where('prispevek_id', $prispevekID)->where('typ', 2)->countAllResults();
                return $currentThumb;
            }
        }else
        {
            $newThumb = ['prispevek_id' => $prispevekID, 'uzivatel_id' => $userID, 'typ' => $thumbType];
            $this->thumbModel->insert($newThumb);
            $newThumb['thumbsUpCount'] = $this->thumbModel->where('prispevek_id', $prispevekID)->where('typ', 1)->countAllResults();
            $newThumb['thumbsDownCount'] = $this->thumbModel->where('prispevek_id', $prispevekID)->where('typ', 2)->countAllResults();
            return $newThumb;
        }
    }

    public function addThumb()
    {
        $type = $this->request->getVar('type');
        $user = $this->userModel->where('uzivatelske_jmeno', $this->session->get('username'))->first()->id;
        $post = $this->request->getVar('post_ID');
        $response = $this->changeThumb($post, $user, $type);
        if(isset($response['change']))
        {
            return $this->respond(['message' => 'Palec odstraněn', 'status' => 200, 'thumb' => $response]);
        }
        return $this->respond(['message' => 'Palec změněn', 'status' => 200, 'thumb' => $response]);
    }
}
