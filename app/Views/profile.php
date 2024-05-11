<!DOCTYPE html>
<html lang="cs">
<head>
<meta charset="UTF-8">
    <link rel="shortcut icon"type="x-icon"href="<?php echo base_url('assets/img/projekt_web.ico');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5b42e6ef0e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Profil</title>
</head>
<body>
    <div class="container-fluid" style="background-color: #BEBEBE; height:40vh">
        <div class="d-flex justify-content-end">
        <a href="<?= base_url('/')?>"><i class="fa-solid fa-house h3 m-2 text-white" style="color: white;"></i></a>
        </div>
        <div class="d-flex aling-items-center justify-content-start" style="height: 57%; display: flex; justify-content: start; align-items: center;">
            <div class=" d-block d-sm-flex" style="width: 100%;">
                <a href="#" style="margin-left: 5%;"><img src="<?= base_url('assets/img/user/avatar.png')?>" style="width:80px;" class="rounded-pill" alt="user"></a>
                <div class="my-auto text-white" style="margin-left: 3%;"><h3>Jméno a příjmení</h3></div>
            </div>
        </div>
        <div class="d-flex justify-content-end" style="margin-right: 20%;">
            <a href="#"><button class="p-2" style="background-color: white; width: 160px; border:none; border-radius:30px; box-shadow: 0 3px 6px rgba(0, 0, 1, 0.8); ">Přidat</button></a>
        </div>
    </div>
    <div class="container-fluid  mt-4">
        <div class="row" id='cardContainer'>
            <!-----Začátek karty----->
            <div class="col-12 col-lg-6 offset-lg-3 mt-2">
                <div class="container">
                    <div class="card" style="width: 100%; border: none;">
                        <div class="container d-flex justify-content-between p-2">
                            <div class="d-flex">
                                <img src="<?= base_url('assets/img/user/avatar.png')?>" alt="Avatar Logo" style="width:50px; height: auto;" class="rounded-pill">
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
                          <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow:ellipsis;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="text-center">
                                <button type="button" style="border:none" class="bg-white color-black text-center" data-bs-toggle="modal" data-bs-target="#textCotribution1"><small>více</small>  <i class="fa-solid fa-angle-down"></i></button>
                                <div class="modal" id="textCotribution1">
                                    <div class="modal-dialog">
                                        <div class="modal-content"> 
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>   
                                            <div class="modal-body text-start">
                                                <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    <div class="container">
                                        <form action="" method="post">
                                            <div class="form-floating">
                                                <textarea name="comments" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; resize:none;"></textarea>
                                                <label for="floatingTextarea2">Komentář</label>
                                              </div>
                                              <button class="btn btn-white shadow-lg m-3" type="submit"> Přidat</button>
                                        </form>
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
        <!----Konec karty----->
        </div>
      </div>
</body>
</html>