<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon"type="x-icon"href="<?php echo base_url('assets/img/projekt_web.ico');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css');?>">
    <title>ArchShare - Registrace</title>
</head>

<body>
    <main class="row d-flex justify-content-center align-items-center p-5 m-0">
        <center>
            <div class="card auth-card">
                <form method="POST" action="register">
                    <div class="my-2 auth-input-div mx-auto">
                        <input type="text" class="auth-input form-control" placeholder="Přihlašovací jméno" name="name">
                    </div>
                    <div class="my-2 auth-input-div mx-auto">
                        <input type="email" class="auth-input form-control" placeholder="Email" name="email">
                    </div>
                    <div class="my-2 auth-input-div mx-auto">
                        <input type="date" value="2000-01-01" class="auth-input form-control" placeholder="Datum narození" name="birthday">
                    </div>
                    <div class="my-2 auth-input-div mx-auto">
                        <input type="password" class="auth-input form-control" placeholder="Heslo" name="password">
                    </div>
                    <div class="my-2 auth-input-div mx-auto">
                        <input type="password" class="auth-input form-control" placeholder="Heslo" name="password2">
                    </div>
                    <div class="auth-input-div mx-auto d-flex justify-content-center align-items-end">
                        <button type="submit" class="auth-input auth-submit form-control" placeholder="Enter email">Registrovat se</button>
                    </div>
                </form>
            </div>
            <div class="p-4">
                <a class="auth-switch" href="<?php echo base_url('login');?>">Přihlásit se</a>
            </div>
        </center>
    </main>
</body>

</html>