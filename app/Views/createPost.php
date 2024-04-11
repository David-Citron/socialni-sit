<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nahrát obrázek</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css');?>">
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .card {
        width: 300px;
        border: 1px solid #ccc;
        padding: 20px;
        text-align: center;
    }
    #dropArea {
        border: 2px dashed #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }
    img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<div class="card" id="dropArea" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
    <input type="file" accept="image/*" id="imageInput" name="imageInput" style="display: none;" onchange="fileSelected()">
    <button type="button" onclick="document.getElementById('imageInput').click()">Vybrat soubor</button>
    <br>
    <img src="" id="preview" alt="Náhled obrázku">
</div>

<script>
    function fileSelected() {
        var fileInput = document.getElementById('imageInput').files[0];
        previewFile(fileInput);
    }

    function dropHandler(event) {
        event.preventDefault();
        var file = event.dataTransfer.files[0];
        previewFile(file);
    }

    function dragOverHandler(event) {
        event.preventDefault();
    }

    function previewFile(file) {
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
    }
</script>

</body>
</html>
