<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControladorArchivos extends Controller
{
    public function subir(Request $request){
        if($request->hasFile('file')){
            $archivo=$request->file('file');
            $nombre=$archivo->getClientOriginalName();
            //dd($nombre);
            $path=Storage::disk('public')->put('ArchivosPublicos',$request->file);
            return response()->json(["ruta"=>$path]);
        }
    }
}
//3|2RpmDhjgl0arFnFFvXiw9hOIcoxUSBJxSp9G893B
//10|F1SpfNIVPVBhToVe8oreVjiv05800WNLkZ4tnPED