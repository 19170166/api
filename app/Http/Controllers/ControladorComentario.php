<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailComentario;
use App\ModeloComentario;


class ControladorComentario extends Controller
{
    public function comentar(Request $request){
        //dd($request->user()->id);
        $com=new ModeloComentario();
        $com->comentario=$request->comentario;
        $com->id_usuario=$request->user()->id;
        $com->id_producto=$request->id_producto;
        if($com->save()){
            Mail::to('19170166@uttcampus.edu.mx')->send(new MailComentario());
            return response()->json(['comentario guardado'],200);
        }
    }
}
