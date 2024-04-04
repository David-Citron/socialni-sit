<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon"type="x-icon"href="<?php echo base_url('assets/img/projekt_web.ico');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css');?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>ArchShare - Přihlášení</title>
</head>

<body>
    <main class="row d-flex justify-content-center align-items-center p-5 m-0 auth-main">
        <center class="pt-1">
            <div class="card auth-card pt-2">
                <form method="POST" action="login">
                    <div class="my-2 mt-5 auth-input-div mx-auto">
                        <input type="text" class="auth-input form-control" placeholder="Přihlašovací jméno / E-mail" name="name">
                    </div>
                    <div class="my-2 auth-input-div mx-auto">
                        <input type="password" class="auth-input form-control" placeholder="Heslo" name="password">
                    </div>
                    <div class="auth-input-div mx-auto d-flex justify-content-center align-items-end">
                        <button type="submit" class="auth-input auth-submit form-control" placeholder="Enter email">Přihlásit se</button>
                    </div>
                </form>
            </div>
            <div class="p-4">
                <a class="auth-switch" href="<?php echo base_url('register');?>">Registrovat se</a>
            </div>
        </center>
    </main>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Při odesílání formuláře se vyskytla chyba</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php echo $error; ?>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Zavřít</button>
            </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if (!empty($error)): ?>
                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.show();
            <?php endif; ?>
        });
    </script>
</body>

</html>