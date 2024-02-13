<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba imagen</title>
</head>
<body>
    <form action="/cargarimagen" method="post"  enctype="multipart/form-data" >
        @csrf
        <input type="file" name="post_imagen" id="post_imagen">
        <button type="submit">Cargar</button>
    </form>
</body>
</html>