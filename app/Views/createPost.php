<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="<?php echo base_url('assets/img/projekt_web.ico'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchShare - Nový příspěvek</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css'); ?>">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            flex: 1;
            border: 1px solid #ccc;
            text-align: center;
            margin: 10px;
            position: relative;
        }

        .card-preview img {
            width: 100%;
            height: 100%;
        }

        .card-preview {
            aspect-ratio: 1;
            max-width: 20%;
            height: auto;
            width: 100%;
        }

        form {
            padding: 0;
        }

        input {
            padding: 0.5rem;
        }

        textarea {
            resize: none;
            width: 100%;
            height: 100%;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            box-shadow: inset 0px 3px 6px #00000029, 0px 3px 6px #00000029;
            border: none;
            padding: 0.5rem;
        }

        .card-inside {
            height: 100%;
            width: 100%;
            min-height: 300px;
        }

        .card-outside {
            background-color: beige;
            padding: 1rem;
            background: #ECE5E5 0% 0% no-repeat padding-box;
        }

        .textarea-holder {
            height: 80%;
            width: 100%;
            padding-top: 0.5rem;
        }

        .input-holder {
            height: 20%;
            width: 100%;
            padding-bottom: 0.5rem;
        }

        .input-holder input {
            background: #FFFFFF 0% 0% no-repeat padding-box;
            box-shadow: inset 0px 3px 6px #00000029, 0px 3px 6px #00000029;
            border: none;
        }

        .card-box {
            width: 100%;
            min-width: 400px;
            width: 100%;
            border: none;
            border-radius: 0;
            box-shadow: inset 0px 3px 6px #00000029, 0px 3px 6px #00000029;
        }

        .container-preview {
            width: 100%;
        }

        label {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="<?php if(!isset($post))echo base_url('post/create'); else echo base_url('post/edit/'.$post->id)?>" method="post" enctype="multipart/form-data" class="d-flex justify-content-center">
        <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh; max-width: 60%">
            <div class="pt-3">
                <h2 style="text-align: center"><?php if(isset($post)) echo "Upravit příspěvek"; else echo "Nový příspěvek";?></h2>
            </div>
            <div class="d-flex justify-content-center row m-2">
                <div class="card card-box p-2">
                    <label for="imageInput" style="border: 2px dashed #ccc; width: 100%; cursor: pointer; min-height: 250px; height:100%;">
                        <input type="file" multiple <?php if(!isset($post)) echo "required";?> accept="image/*" id="imageInput" name="obrazky[]" style="display: none;">
                        <?php if(isset($post)) echo 'Klepnutím vyberte nové obrázky'; else echo 'Klepnutím přidejte obrázky'?>
                    </label>
                    <div class="container container-preview" id="previewHolder">
                       
                    </div>
                </div>

                <div class="card card-outside card-box">
                    <div class="card-inside">
                        <div class="input-holder">
                            <input placeholder="Zadejte název příspěvku" type="text" name="nazev" style="width: 100%; height: 100%" required <?php if(isset($post)) echo 'value="'.$post->nazev.'"';?>>
                        </div>
                        <div class="textarea-holder">
                            <textarea id="textInput" name="text" placeholder="Zadejte text" required ><?php if(isset($post)) echo $post->text;?></textarea>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: right;" class="mx-3 mb-2">
                    <a href="<?php echo base_url('/'); ?>" class="btn btn-danger" style="margin-right: 10px;">Zrušit</a>
                    <input type="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>

    <script>
        var previewHolder = document.getElementById('previewHolder');
        document.getElementById('imageInput').addEventListener('change', function (event) {
            var files = event.target.files;
            if (files.length == 0) {
                <?php if (isset($post))echo "loadPictures();";?>
                return;
            }
            if (files.length > 5) {
                alert('Můžete nahrát maximálně 5 obrázků.');
                event.target.value = ''; // Reset the input
                return;
            }
            previewHolder.innerHTML = '';
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var html = '<div class="card card-preview" style="overflow:hidden;"><img src="' + e.target.result + '" alt="Preview ' + (i + 1) + '" style="object-fit: cover;"></div>';
                    previewHolder.insertAdjacentHTML('beforeend', html);
                }
                reader.readAsDataURL(files[i]);
            }
        });

        <?php if (!isset($post)){ echo "</script></body></html>"; return;}?>

        function loadPictures() {
            <?php foreach($post->fotky as $key => $foto) {?>
            previewHolder.innerHTML = '';
            var html = '<div class="card card-preview" style="overflow:hidden;"><img src="' + '<?=base_url('assets/img/post/'.$foto->nazev)?>' + '" alt="Preview ' + (<?=$key?> + 1) + '" style="object-fit: cover;"></div>';
            previewHolder.insertAdjacentHTML('beforeend', html);
            <?php } ?>
        }

        loadPictures();
    </script>
</body>

</html>
