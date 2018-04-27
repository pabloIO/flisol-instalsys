<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioCtrl extends Controller
{
    public function new_user(Request $request){
      try{
        $res = (object)null;
        $isNew = Usuario::where('nombre_usuario', '=', $request->username)
                ->first();
        if($isNew !== NULL){
          $res->id = $isNew->id;
          $res->token = md5($isNew->id) . md5(date('Y-m-d H:i:s'));
          $res->success = true;
        }else{
          if($request->names == "" || $request->lastnames == ""){
            $res->msg = 'Usuario no existente, debe ingresar su nombre y apellido';
            $res->success = false;
          }else{
            $newUser = [
              'nombres'  => $request->names,
              'apellidos'  => $request->lastnames,
              'nombre_usuario'  => $request->username,
            ];
            $user = Usuario::create($newUser);
            $res->id = $user->id;
            $res->token = md5($user->id) . md5(date('Y-m-d H:i:s'));
            $res->success = true;
          }
        }
      }catch(\Exception $e){
        $res->msg = 'Hubo un error al crear su usuario';
        $res->success = false;
        $res->error = $e->getMessage();
      }finally{
        return response()->json($res);
      }
    }
}
