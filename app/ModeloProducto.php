<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloProducto extends Model
{
    protected $fillable=['nombre_producto'];
    public $table='productos';
    //protected $timestamps=false;

    public function comentario(){
        $this->hasMany('App\ModeloComentario','id_producto');
    }
}
