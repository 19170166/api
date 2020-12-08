<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;//este?
use Illuminate\Foundation\Bus\DispatchesJobs;// este?
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;//venian por defecto
use App\Mail\MailRegistro;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\MailLogin;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
            Mail::to('19170166@uttcampus.edu.mx')->send(new MailLogin());
            return response()->json(['token: ',$token],200);
        }
        return response()->json(['error al generar el token'],400);
    }

    public function ver(Request $request){
        dd($request->user());
        if($request->user()->tokenCan('user')){
            return response()->json(['eres usuario'],200);
        }
    }

}
//1|g3EXDTYhgT5qC6o8vhmqYECWl7zNpA6zzvdtphOj