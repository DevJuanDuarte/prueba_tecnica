@extends('layouts.base')

@section('contenido')
    <h2>Crear Usuario</h2>
    <form class="was-validate" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text"
                onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32"
                class="form-control" class="form-control" id="nombre" name="nombre">
            <div id="nombre" class="form-text">Indicanos tu nombre completo</div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="nacimiento" name="nacimiento" min="1996-11-16" max="2023-02-22">
        </div>
        <div class="mb-3">
            <img id="imagenSeleccionada" class="img-thumbnail" style="max-height: 300px; max-height:200px">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Imagen</label>
            <input class="form-control" accept=".jpg, .jpeg, .png" type="file" id="imagen" name="imagen">
        </div>
        <div class="mb-">
            <a class="btn btn-danger" href="{{ route('users.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>
    
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function (e) {
            $('#imagen').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
        })
</script>