<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nahrát obrázek</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/auth.css');?>">
</head>
<body>

<h2 style="text-align: center; justify-content: center;">Nový příspěvek</h2>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: stretch; max-width: 800px; width: 100%; padding: 0 20px;">
        <div style="flex: 1; border: 1px solid #ccc; text-align: center; margin: 10px; position: relative">
            <label for="imageInput" style="border: 2px dashed #ccc; margin-bottom: 20px; width: 100%; cursor: pointer;">
                <input type="file" accept="image/*" id="imageInput" name="imageInput" style="width: 100%; min-width: 200px height: 100%; display: none;">
                Přetáhnout obrázek sem
            </label>
            <img src="" id="preview" style="max-width: 100%; height: auto; margin-bottom: 10px;">
            <div style="position: absolute; bottom: 0; display: flex; justify-content: center; width: 100%; margin-bottom: -30px">
                <button style="height: 60px; width: 100px" class="btn btn-primary">Vložit</button>    
            </div>
        </div>

        <div style="flex: 1; border: 1px solid #ccc; text-align: center; margin: 10px;">
            <input type="text" id="textInput" name="textInput" placeholder="Zadejte text" style="width: 100%; min-width: 200px; height: 100%;">
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
