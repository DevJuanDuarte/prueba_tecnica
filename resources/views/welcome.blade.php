@extends('layouts.base')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btn btn-success mb-3" href="{{ route('users.index') }}">Usuarios BD</a>
            </div>
        </div>
        <div class="container shadow-lg p3 mb-5 bg-body rounded">
            <table id="usuarios" class="display table table-bordered table-striped table-dark text-center">
                <thead class="tablesilla table-info">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Company</th>
                    </tr>
                </thead>
                <tbody id="data">

                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script src="{{asset('js/app.js')}}"></script>
       
    @endsection
