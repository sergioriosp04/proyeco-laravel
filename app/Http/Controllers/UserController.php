<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public  function config(){
        return view('user.config');
    }

    public function update(Request $request){

        //conseguir el usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //validacion del formulario
       $validate = $this->validate($request, [
           'name' => 'required|string|max:255',
           'surname' => 'required|string|max:255',
           'nick' => 'required|string|max:255|unique:users,nick,'.$id,
           'email' => 'required|string|email|max:255|unique:users,email,'.$id,
       ]);

        //recoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->nick = $nick;
        $user->email = $email;
        $user->surname = $surname;

        // subir imagen
        $image_path = $request->file('image_path');
        if($image_path){
            //colocar nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            // guardarla en el disco
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            // setear el name de la imagen en usuario
            $user->image = $image_path_name;
        }

        //ejecutar consulta:cambios en la base de datos
        $user->update();

        return redirect()->route('config')
                            ->with(['message' => 'usuario actualizado correctamente']);

        //dd($id);
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
}
