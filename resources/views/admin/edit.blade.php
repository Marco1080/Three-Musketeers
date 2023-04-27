<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="{{ route('admin.update', $post->id) }}">
    @csrf
    @method('GET')

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control" value="{{ $post->name }}">
    </div>

    <div class="form-group">
        <label for="status">Estado:</label>
        <select name="status" class="form-control">
            <option value="1" @if ($post->status == 1) selected @endif>Visible</option>
            <option value="0" @if ($post->status == 0) selected @endif>Oculto</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>
</body>
</html>