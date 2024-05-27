<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon"type="x-icon"href="<?php echo base_url('assets/img/projekt_web.ico');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5b42e6ef0e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>ArchShare - Příspěvky</title>
    <style>
        .thumbActive{
            color: blue;
        }    
        .thumbDisabled{
            color: black;
        }
        #navbar{
            transition: top 1s;
        }
    </style>
</head>
<body class="pb-4">
    <nav id="navbar" class="navbar navbar-expand-lg bg-white navbar-white sticky-top" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4)">
        <div class="container-fluid">
            <div class="dropdown navbar-brand">
                <button data-bs-toggle="dropdown" style="background-color: white; border:none;">
                    <img src="<?= base_url('assets/img/user/avatar.png')?>" alt="Avatar Logo" style="width: 60px;" class="rounded-pill">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= base_url('user/'.$userName);?>">Profil</a></li>
                    <li><a class="dropdown-item bg-danger text-white" href="<?= base_url('logout')?>">Odhlásit se</a></li>
                </ul>
            </div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('post/create');?>"><i class="fa-solid fa-plus h3 my-auto" style="color: black;"></i></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid  mt-4">
        <div class="row" id='cardContainer'>
            <!-- karta -->

            <!----
            <div class="col-12 col-lg-6 offset-lg-3 mt-2">
                <div class="container">
                    <div class="card" style="width: 100%; border: none;">
                        <div class="container d-flex justify-content-between p-2">
                            <div class="d-flex">
                                <img src="" alt="Avatar Logo" style="width:50px; height: auto;" class="rounded-pill">
                                <h4 class="my-auto m-3">Uživatelské jméno</h4>
                            </div>
                            <div class="dropdown my-auto"><a class="btn" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical h2 my-auto" style="color: black;"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Upravit</a></li>
                                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete1">Smazat</button></li>
                                  </ul>
                                <div class="modal" id="modalDelete1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                 Opravdu si přejete příspěvek smazat?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zrušit</button>
                                                <button type="button" class="btn btn-success">Ano</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?= base_url('assets/img/post/prispevek01.jpg')?>" alt="" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/img/post/prispevek09.jpg')?>" alt="" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?= base_url('assets/img/post/prispevek20.jpg')?>" alt="" class="d-block w-100">
                                    </div>
                                </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                            </div>
                        </div>
                        <div class="card-body" style="box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.1)">
                            <h5>Název příspěvku</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="d-flex justify-content-between p-2">
                            <div class="d-flex">
                                <i class="fa-regular fa-thumbs-up h2 my-auto"></i>
                                <i style="margin-left: 20px;" class="fa-regular fa-thumbs-down h2 my-auto"></i>
                            </div>
                            <div>
                                <i class="fa-regular fa-message btn btn-lg" data-bs-toggle="modal" data-bs-target="#comments0"></i>
                            </div>
                            <div class="modal fade" id="comments0">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Komentáře</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container bg-white">
                                            <form action="" method="post">
                                                <div class="form-floating">
                                                    <textarea name="comments" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; resize:none;"></textarea>
                                                    <label for="floatingTextarea2">Komentář</label>
                                                </div>
                                                <div class="d-flex justify-content-end"><button class="btn btn-white shadow-lg m-3" type="submit"> Přidat</button></div>
                                            </form>
                                        </div>
                                        <div class="container-fluid row">
                                            <div class="col-12 col-lg-3">
                                                <div class="d-flex">
                                                    <img src="" alt="Avatar Logo" style="width:50px; height: auto; " class=" rounded-pill">
                                                    <p class="small my-auto" style="margin-left: 8px;">Uživatelské jméno</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-9"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean id metus id velit ullamcorper pulvinar. Nulla pulvinar eleifend sem. Curabitur sagittis hendrerit ante. Suspendisse sagittis ultrices augue. Sed convallis magna eu sem. Maecenas libero. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Fusce aliquam vestibulum ipsum. Maecenas libero. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Etiam commodo dui eget wisi. Vivamus porttitor turpis ac leo. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aliquam ante. Pellentesque arcu. Praesent dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque ipsum.</p></div>
                                            <div class="col-12 col-lg-3">
                                                <div class="d-flex">
                                                    <img src="" alt="Avatar Logo" style="width:50px; height: auto; " class=" rounded-pill">
                                                    <p class="small my-auto" style="margin-left: 3px;">Uživatelské jméno</p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-9"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean id metus id velit ullamcorper pulvinar. Nulla pulvinar eleifend sem. Curabitur sagittis hendrerit ante. Suspendisse sagittis ultrices augue. Sed convallis magna eu sem. Maecenas libero. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Fusce aliquam vestibulum ipsum. Maecenas libero. Sed elit dui, pellentesque a, faucibus vel, interdum nec, diam. Etiam commodo dui eget wisi. Vivamus porttitor turpis ac leo. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Aliquam ante. Pellentesque arcu. Praesent dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque ipsum.</p></div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class=" d-flex justify-content-between p-3" style="background-color: #F5F5F5; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3)">
                            <div class="d-flex">
                                <div class="d-flex my-auto">
                                    <i class="fa-regular fa-thumbs-up my-auto"></i>
                                    <p class="my-auto" style="margin-left: 2px;">131 210</p>
                                </div>
                                <div class="d-flex my-auto" style="margin-left: 20px;">
                                    <i class="fa-regular fa-thumbs-down my-auto"></i>
                                    <p class="my-auto" style="margin-left: 2px;">131 210</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                    <p class="my-auto ">131 210</p>
                                    <i class="fa-regular fa-message my-auto" style="margin-left: 7px;"></i>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            
        
            --->

            <!-- konec první karty -->
        </div>
      </div>
      <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-100px";
        }
        prevScrollpos = currentScrollPos;
    }

    function isBottom() {
        return window.innerHeight + window.scrollY >= document.body.offsetHeight;
    }

    function handleScroll() {
        if (isBottom()) {
            showCard();
        }
    }

    window.addEventListener('scroll', handleScroll);

    var currentId = <?php echo $posts[array_key_last($posts)]['id'];?>;
    var loading = false;

    function showCard() {
        if(loading) {
            console.log("API Request already sent!");
            return;
        }
        loading = true;
        var cardHolder = document.getElementById('cardContainer');
        const post = {
            id: currentId
        };

        fetch('<?php echo base_url();?>api/post/next/4', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(post)
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            if(data == null){
                return;
            }
            console.log(data);
            var postsCount = data['posts'].length;
            
            for (var j = 0; j < postsCount; j++){
                var nextPost = data['posts'][j];
                currentId = nextPost['id'];
                loadCard(nextPost);
            }

            loading = false;
            console.log(currentId);
            return;
        })
    }

    var phpReadArray = <?php echo json_encode($posts)?>;
    console.log(phpReadArray);
    for (i = 0; i<phpReadArray.length; i++) {
        loadCard(phpReadArray[i]);
    }

    function loadCard(nextPost) {
        var cardHolder = document.getElementById('cardContainer');

        var dropdownItem = '<div class="dropdown my-auto"> <!-- Dropdown container --><a class="btn" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical h2 my-auto" style="color: black;"></i></a> <!-- Dropdown toggle button --><ul class="dropdown-menu"> <!-- Dropdown menu --><li><a class="dropdown-item" href="<?=base_url('post/edit/');?>'+nextPost['id']+'">Upravit</a></li> <!-- Edit option --><li> <!-- Delete option with modal trigger --><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete'+nextPost['id']+'">Smazat</button></li></ul><!-- Modal for deleting post --><div class="modal" id="modalDelete'+nextPost['id']+'"> <!-- Modal ID dynamically generated --><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body">Opravdu si přejete příspěvek smazat?</div><div class="modal-footer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zrušit</button><button type="button" class="btn btn-success" onclick="deletePost('+nextPost['id']+')">Ano</button></div></div></div></div></div>';

        if(nextPost['dropdown'] == false){
            dropdownItem = '';
        }

        var foto = '';
        if(nextPost['foto'] != null){
            for (var i=0; i< nextPost['foto'].length; i++){
                foto = foto + '<div class="carousel-item';
                if(i == 0){
                    foto = foto + ' active';
                }
                foto = foto + '"><img src="'+nextPost['foto'][i]+'" alt="" class="d-block w-100"></div>';
            }
        }

        var comments = '';
        if(nextPost['comments'] != null){
            for (var i=0; i< nextPost['comments'].length; i++){
                comments = comments + '<div class="col-12 col-lg-3 mb-2" id="commenterHolding'+nextPost['id']+'"><div class="d-flex"><img src="'+nextPost['comments'][i]['uzivatel_foto']+'" alt="Avatar Logo" style="width:50px; height: auto; " class=" rounded-pill"><p class="small my-auto" style="margin-left: 8px;">'+nextPost['comments'][i]['uzivatel_jmeno']+'</p></div></div><div class="col-12 col-lg-9';
                if(i != nextPost['comments'].length - 1){
                    comments = comments + ' mb-4';
                }else{
                    comments = comments + ' mb-0';
                }
                comments = comments + '" ';
                if(i == nextPost['comments'].length - 1){
                    comments = comments + ' id="commentHolding'+nextPost['id']+'"';
                }
                comments = comments + '><p ';
                if(i == nextPost['comments'].length - 1){
                    comments = comments + 'class="mb-0" id="commentParagraph'+nextPost['id']+'"';
                }
                comments = comments + '>' +nextPost['comments'][i]['text']+'</p></div>';
            }
        }

        var controls = '';
        if(nextPost['foto'] != null && nextPost['foto'].length > 1 ){
            controls ='<button class="carousel-control-prev" type="button" data-bs-target="#carousel'+nextPost['id']+'" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button><button class="carousel-control-next" type="button" data-bs-target="#carousel'+nextPost['id']+'" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>';
        }

        cardHolder.insertAdjacentHTML('beforeend', '<div class="col-12 col-lg-6 offset-lg-3 mt-2" id="post'+nextPost['id']+'"><div class="container"><div class="card" style="width: 100%; border: none;"><div class="container d-flex justify-content-between p-2"><div class="d-flex"><a href="<?php echo base_url();?>user/'+nextPost['uzivatel_jmeno']+'"><img src="'+nextPost['uzivatel_foto']+'" alt="Avatar Logo" style="width:50px; height: auto;" class="rounded-pill"></a><h4 class="my-auto m-3">'+nextPost['uzivatel_jmeno']+'</h4></div>'+dropdownItem+'</div><div><!---Carousel pro příspěvky--!--><div id="carousel'+nextPost['id']+'" class="carousel slide" data-bs-ride="carousel"> <!---Pro každý příspěvek se bude muset přidat jiné id, nejlépe id (příspěvku)--!--><div class="carousel-inner">'+foto+'</div>'+ controls +'</div></div><div class="card-body" style="box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.1)"><h5>'+nextPost['nazev']+'</h5><p class="card-text">'+nextPost['text']+'</p></div><div class="d-flex justify-content-between p-2"><div class="d-flex"><button style="border:none; background-color: transparent;" onclick="changeThumb('+nextPost['id']+', 1)"><i id="thumbsUpButton'+nextPost['id']+'" class="fa-regular fa-thumbs-up h2 my-auto"></i></button><button style="margin-left: 20px; border:none; background-color: transparent;" onclick="changeThumb('+nextPost['id']+', 2)"><i id="thumbsDownButton'+nextPost['id']+'" class="fa-regular fa-thumbs-down h2 my-auto"></i></button></div><div><i class="fa-regular fa-message btn btn-lg" data-bs-toggle="modal" data-bs-target="#comments'+nextPost['id']+'"></i></div><div class="modal fade" id="comments'+nextPost['id']+'"> <!-- ID bude vždy "comments + id-příspěvku" !--><div class="modal-dialog modal-xl"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">Komentáře</h4><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><div class="container-fluid row" id="commentsDiv'+nextPost['id']+'"><div class="container"><form action="#" id="addCommentForm'+nextPost['id']+'"><div class="form-floating"><textarea name="text" class="form-control" placeholder="Leave a comment here" id="commentText'+nextPost['id']+'" style="height: 100px; resize:none;"></textarea><label for="commentText">Komentář</label></div><input type="hidden" name="prispevek_id" id="commentPrispevekId'+nextPost['id']+'" value="'+nextPost['id']+'"><div class="d-flex justify-content-end"><button class="btn btn-white shadow-lg my-3" onclick="return addComment('+nextPost['id']+')">Přidat</button></div></form></div>'+comments+'</div></div></div></div></div></div><div class=" d-flex justify-content-between p-3" style="background-color: #F5F5F5; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3)"><div class="d-flex"><div class="d-flex my-auto"><i class="fa-regular fa-thumbs-up my-auto"></i><p class="my-auto" style="margin-left: 2px;" id="thumbsUp'+nextPost['id']+'">'+nextPost['thumbs_up']+'</p></div><div class="d-flex my-auto" style="margin-left: 20px;"><i class="fa-regular fa-thumbs-down my-auto"></i><p class="my-auto" style="margin-left: 2px;" id="thumbsDown'+nextPost['id']+'">'+nextPost['thumbs_down']+'</p></div></div><div class="d-flex"><p class="my-auto" id="commentCount'+nextPost['id']+'">'+nextPost['comments_count']+'</p><i class="fa-regular fa-message my-auto" style="margin-left: 7px;"></i></div></div></div></div></div>');
        thumbClassChange(nextPost['thumb'], nextPost['id']);
    }

    function deletePost(id){
        fetch('<?php echo base_url();?>post/delete/' + id, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            return response;
        })
        .then(data => {
            var myModal = document.getElementById('modalDelete'+id);
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
            document.getElementById('post'+id).remove();
        })
    }

    function addComment(id){
        var commentText = document.getElementById('commentText' + id).value;
        var commentPrispevekId = document.getElementById('commentPrispevekId' + id).value;
        var passingData = {
            text: commentText,
            prispevek_id: commentPrispevekId
        };

        fetch('<?php echo base_url();?>api/comment/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(passingData)
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            var commentsDiv = document.getElementById('commentsDiv' + id);
            var element = document.getElementById('commentHolding'+id);
            if (element) {
                console.log('Removed element 1');
                element.className = element.className.replace('mb-0', 'mb-4');
                element.removeAttribute('id');
            }
            var element2 = document.getElementById('commentParagraph'+id);
            if (element2) {
                console.log('Removed element 2');
                element2.className = element2.className.replace('mb-0', 'mb-2');
                element2.removeAttribute('id');
            }
            var comment = data['comment'];
            commentsDiv.insertAdjacentHTML('beforeend', '<div class="col-12 col-lg-3 mb-2" id="commenterHolding'+id+'"><div class="d-flex"><img src="'+comment['uzivatel_foto']+'" alt="Avatar Logo" style="width:50px; height: auto; " class=" rounded-pill"><p class="small my-auto" style="margin-left: 8px;">'+comment['uzivatel_jmeno']+'</p></div></div><div class="col-12 col-lg-9 mb-0" id="commentHolding'+id+'"><p class="mb-0" id="commentParagraph'+id+'">'+comment['text']+'</p></div>');
            document.getElementById('commentText' + id).value = '';
            var commentCountString = document.getElementById('commentCount' + id).innerHTML;
            var commentCount = parseInt(commentCountString);
            document.getElementById('commentCount' + id).innerHTML = (commentCount + 1);
        })
        return false;
    }

    function changeThumb(prispevek_ID, type){
        var requestData = {
            'post_ID':prispevek_ID,
            'type':type
        };

        fetch('<?php echo base_url();?>api/thumb', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            var thumbsUpButton = document.getElementById('thumbsUpButton' + prispevek_ID);
            var thumbsDownButton = document.getElementById('thumbsDownButton' + prispevek_ID);
            
            var thumbsUpCount = document.getElementById('thumbsUp' + prispevek_ID);
            var thumbsDownCount = document.getElementById('thumbsDown' + prispevek_ID);
            
            thumbsUpCount.innerHTML = data['thumb']['thumbsUpCount'];
            thumbsDownCount.innerHTML = data['thumb']['thumbsDownCount'];

            if(data['message'] == "Palec odstraněn"){
                thumbsDownButton.classList.remove("thumbActive");
                thumbsDownButton.classList.add("thumbDisabled");
                thumbsUpButton.classList.remove("thumbActive");
                thumbsUpButton.classList.add("thumbDisabled");
                return;
            }
            
            thumbClassChange(type, prispevek_ID);
        })
    }

    function thumbClassChange(type, prispevek_ID){
        var thumbsUpButton = document.getElementById('thumbsUpButton' + prispevek_ID);
        var thumbsDownButton = document.getElementById('thumbsDownButton' + prispevek_ID);

        if(type == null){
            thumbsUpButton.classList.remove("thumbActive");
            thumbsUpButton.classList.add("thumbDisabled");
            thumbsDownButton.classList.remove("thumbActive");
            thumbsDownButton.classList.add("thumbDisabled");
        }else if(type == 1){
            thumbsDownButton.classList.remove("thumbActive");
            thumbsDownButton.classList.add("thumbDisabled");
            thumbsUpButton.classList.remove("thumbDisabled");
            thumbsUpButton.classList.add("thumbActive");
        }else if(type == 2){
            thumbsUpButton.classList.remove("thumbActive");
            thumbsUpButton.classList.add("thumbDisabled");
            thumbsDownButton.classList.remove("thumbDisabled");
            thumbsDownButton.classList.add("thumbActive");
        }
    }
</script>
</body>
</html>