<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images'; // la tabla de la bd a la que pertenece el modelo

    //relacion one to many
    public function comments(){
        return $this->hasMany('App\Comment'); // una sola imagen puede tener muchos comentarios
    }

    //relacion one to many
    public function likes(){
        return $this->hasMany('App\Like');  // una sola imagen puede tener muchos likes
    }

    // relacion many to one
    public  function  user(){                       // foreing key
        return $this->belongsTo('App\User', 'user_id'); // muchas imagenes puede tener un solo usuario
    }
}
