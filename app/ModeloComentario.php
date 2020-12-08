<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloComentario extends Model
{
    protected $fillable=['comentario','id_producto','id_usuario'];
    public $table='comentarios';
    public $timestamps=false;
    
    public function producto(){
        $this->hasOne('App\ModeloProducto','id');
    }
    public function usuario(){
        $this->hasOne('App\User','id');
    }
}
