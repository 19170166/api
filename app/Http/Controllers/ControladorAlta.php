<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailRegistro;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailLogin;
use Illuminate\Support\Facades\Http;

class ControladorAlta extends Controller
{
    public function registro(Request $request){
        $request->validate([
            'nombre'=>'required',
            'correo'=>'required',
            'password'=>'required'
        ]);
        $usuario=new User();
        $usuario->email=$request->correo;
        $usuario->name=$request->nombre;
        $usuario->password=Hash::make($request->password);
        /*$respuesta = Http::post('http://192.168.137.211:8000/api/Registro',[
            "name"=>$request->nombre,
            "email"=>$request->correo,
            "password"=>$request->password
        ]);*/
        if($usuario->save()){
            Mail::to('19170166@uttcampus.edu.mx')->send(new MailRegistro());
            return response()->json(['usuario registrado'],200);
        }
        return response()->json(['error al registrar'],400);
    }

    public function login(Request $request){
        $request->validate([
            'correo'=>'required',
            'password'=>'required'
        ]);
        $usuario=User::where('email',$request->correo)->first();
        //dd($usuario);
        if(!$usuario||!Hash::check($request->password,$usuario->password)){
            throw ValidationException::withMessages([
                'correo|password'=>['Datos incorrectos...']
            ]);
        }
        else{
            $token=$usuario->createToken($request->correo,['user'])->plainTextToken;
            /*$respuesta = Http::post('http://192.168.137.211:8000/api/Ingresar',[
                "email"=>$request->correo,
                "password"=>$request->password
            ]);
            Mail::to('19170166@uttcampus.edu.mx')->send(new MailLogin());*/
            return response()->json(['Permiso'=>true,'id_usuario'=>$usuario->id],200);
        }
        return response()->json(['error al generar el token'],400);
    }

    public function ver(Request $request){
       
        if($request->user()->tokenCan('user')){
            return response()->json(['eres usuario'],200);
        }
    }

    
    //prueba
    public function usuario($id){
        $usuario=User::find($id);
        return response()->json(["nombre"=>$usuario->name,"correo"=>$usuario->email]);
    }
}
