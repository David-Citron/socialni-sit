<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="<?php echo base_url('assets/img/projekt_web.ico');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArchShare - Nový příspěvek</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css');?>">
    <style>
        .card {
            flex: 1;
            border: 1px solid #ccc;
            text-align: center;
            margin: 10px;
            position: relative;
            max-width: calc(50% - 20px); /* Maximální šířka karty */
            width: 100%;
            max-width: 1000px;
        }

        #preview {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            max-height: 100%; /* Přizpůsobíme výšku obrázku */
        }
    </style>
</head>
<body>
    <div style="">
        <h2 style="text-align: center; justify-content: left;">Nový příspěvek</h2>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 90vh;">
        <div style="display: flex; flex-wrap: wrap; max-width: 800px; width: 100%; min-width: 80%; height: 40%; padding: 0 20px">
            <div class="card">
                <div>
                    <label for="imageInput" style="border: 2px dashed #ccc; margin-bottom: 20px; width: 100%; height:100%; cursor: pointer;">
                        <input type="file" multiple required accept="image/*" id="imageInput" name="imageInput" style="width: 100%; min-width: 200px; height: 100%; display: none;">
                        Přetáhnout obrázek sem
                    </label>
                    <img src="" id="preview">
                </div>
                <div style="display: flex; justify-content: center; align-items: center">
                    <div class="card">
                        <img src="" id="preview" width="25" height="25"> 
                    </div>
                    <div class="card">
                        <img src="" id="preview" width="25" height="25"> 
                    </div>
                    <div class="card">
                        <img src="" id="preview" width="25" height="25"> 
                    </div>
                    <div class="card">
                        <img src="" id="preview" width="25" height="25"> 
                    </div>
                    <div class="card">
                        <img src="" id="preview" width="25" height="25"> 
                    </div>
                </div>
            </div>

            <div class="card">
                <textarea id="textInput" name="textInput" placeholder="Zadejte text" style="width: 100%; min-width: 200px; height: 100%;"></textarea>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var preview = document.getElementById('preview');
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    });
    </script>
</body>
</html>
