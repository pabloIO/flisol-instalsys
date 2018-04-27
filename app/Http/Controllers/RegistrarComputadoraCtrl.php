<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonaInstalada;
use App\Models\Computadora;
use App\Models\UsuarioRegistraComputadora;
use DB;
class RegistrarComputadoraCtrl extends Controller
{
    public function registerComputer(Request $request){
      DB::beginTransaction();
      try{
        $res = (object)null;
        $data = [
          'person'  => [
            'nombres'  => $request->person['names'],
            'apellidos'  => $request->person['lastnames'],
            'correo'  => $request->person['email'],
          ],
          'computer'  => [
            'marca'  => $request->computer['brand'],
            'ram'  => $request->computer['ram'],
            'procesador'  => $request->computer['processor'],
            'so_a_instalar'  => $request->computer['os_to_install'],
            'so_actual'  => $request->computer['actual_os'],
            'persona_instalada_id'  => NULL,
            'se_puede_instalar'  => $request->computer['can_be_inst'],
            'tipo'  => $request->computer['type'],
            'detalles'  => $request->computer['details'],
          ],
        ];
        $newPerson = PersonaInstalada::create($data['person']);
        $data['computer']['persona_instalada_id'] = $newPerson->id;
        $newComputer = Computadora::create(
          $data['computer']
        );

        $userRegComp = [
          'usuario_id'  => $request->uid,
          'computadora_id'  => $newComputer->id,
        ];
        $newUserRegComp = UsuarioRegistraComputadora::create($userRegComp);
        DB::commit();
        $res->success = true;
        $res->msg = 'Registro realizado éxitosamente';
      }catch(\Exception $e){
        DB::rollBack();
        $res->msg = 'No se pudo registrar la computadora a instalar';
        $res->success = false;
        $res->error = $e->getMessage();
      }finally{
        return response()->json($res);
      }
    }
}
