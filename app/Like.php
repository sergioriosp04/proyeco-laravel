<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    // relacion many to one
    public  function  user(){                       // foreing key
        return $this->belongsTo('App\User', 'user_id'); // muchos likes puede dar un solo usuario
    }

    // relacion many to one
    public  function  image(){                       // foreing key
        return $this->belongsTo('App\Image', 'image_id'); // muchos likes puede tener una imagen
    }
}
