@extends('layouts.base')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary mb-3" href="{{ route('users.create') }}">Crear</a>
            </div>
        </div>
    </div>

    <div class="container">
      <table class="table table-dark table-bordered text-center align-middle"">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col" class="col-3">Fecha de Nacimiento</th>
                <th scope="col">Imagen</th>
                <th scope="col" class="col-2">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->nacimiento }}</td>
                    <td><img src="{{ asset('imagen/' . $user->imagen) }}" width="100" height="50" /></td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    </div>
    <div class="container">
        <div class="d-flex justify-content-end">
            <div class="">
                <a class="btn btn-danger mt-3" href="/usersjson">Usuarios Json</a>
            </div>
        </div>
    </div>
@endsection
