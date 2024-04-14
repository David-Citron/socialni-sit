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
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        max-width: 800px;
        width: 100%;
        padding: 0 20px;
    }
    .card {
        width: calc(50% - 20px);
        border: 1px solid #ccc;
        padding: 20px;
        text-align: center;
        margin: 10px;
    }
    #dropArea, #textInput {
        border: 2px dashed #ccc;
        padding: 20px;
        margin-bottom: 20px;
        width: 100%;
        cursor: pointer;
    }
    #imageInput, #textInput {
        width: 100%;
    }
    img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .card {
            width: calc(100% - 20px);
        }
    }
</style>
</head>
<body>

<div class="container">
    <div class="card">
        <label for="imageInput" id="dropArea">
            <input type="file" accept="image/*" id="imageInput" name="imageInput">
        </label>
        <img src="" id="preview">
    </div>

    <div class="card">
        <input type="text" id="textInput" name="textInput" placeholder="Textové pole">
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
