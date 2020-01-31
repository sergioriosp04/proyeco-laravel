<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('image.create');
    }

    public function save(Request $request){
        //validacion
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image',
        ]);

        // valores que me vienen del form
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // asignar valores al objeto
        $image = new Image();
        $image->description = $description;

        // setear el id del usuario que esta creiando esta imagen
        $user = \Auth::user();
        $image->user_id = $user->id;

        // SUBIR IMAGEN

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();

        return redirect()->route('home')->with([
            'message' => ' la foto ha sido guardada correctamente'
        ]);

    }
}
