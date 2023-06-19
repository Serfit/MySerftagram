<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\BinaryOp\Equal;

class PerfilController extends Controller
{
    //proteger rutas
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('perfil.index');
    }

    public function store(Request $request){
        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,editar-perfil,else'], //Mas reglas de validacion in:CLIENTE,PROVEEDOR,VENDEDOR
            'oldpassword' => 'required',
            'password' => 'confirmed'
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);

            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);

        }

         $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;

      //  $usuario->save();

            if (Hash::check($request->oldpassword, auth()->user()->password)) {
                $usuario->password = $request->password ?? auth()->user()->password;
                $usuario->save();
            } else{
                return back()->with('mensaje', 'La Contraseña Actual no Coincide');
            }
        //Redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }
}


//Guardar Cambios



