<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


    <h1>Crear publicacion</h1>
    
    <form action="{{ route('admin.store', ['newpost' => true]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
    </div>
        @error('nombre')
            <span>{{ $message }}</span>
        @enderror

    <div>
        <label for="categoria">Categoría:</label>
        <select name="category">
            <option option value="" disabled selected>--Categoría--</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach
        </select>
        @error('categoria')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" accept="image/*">
        @error('imagen')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="status">Estado:</label>
        <input type="radio" id="visible" name="status" value="1" checked>
        <label for="visible">Visible</label>
        
        <input type="radio" id="oculto" name="status" value="0">
        <label for="oculto">Oculto</label>
    </div>

    <div>
        <button type="submit">Guardar</button>
    </div>
</form>

</body>
</html>