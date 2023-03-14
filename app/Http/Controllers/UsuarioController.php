<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Usuario::all();
        //Se trae todos los datos de la base de datos a la tabla
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'nacimiento' => 'required', 'imagen' => 'required'
        ]);

        $user = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImagen = 'imagen/';
            $imagenUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenUser);
            $user['imagen'] = "$imagenUser";
        } else {
            $user['imagen'] = null;
        }

        Usuario::create($user);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Usuario::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $user)
    {
        $request->validate([
            'nombre' => 'required', 'nacimiento' => 'required'
        ]);
        $userid = $request->all();

        if ($imagen = $request->file('imagen')) {
            $rutaGuardarImagen = 'imagen/';
            $imagenUser = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenUser);
            $userid['imagen'] = "$imagenUser";
        } else {
            unset($userid['imagen']);
        }
        $user->update($userid);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Usuario::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
