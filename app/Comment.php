<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    // relacion many to one
    public  function  user(){                       // foreing key
        return $this->belongsTo('App\User', 'user_id'); // muchas comentarios puede tener un solo usuario
    }

    // relacion many to one
    public  function  image(){                       // foreing key
        return $this->belongsTo('App\Image', 'image_id'); // muchos comentarios puede tener una imagen
    }
}
