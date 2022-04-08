<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\documentacionUsuariosModel;
use App\User;
use App\autoridadesCertModel;
use App\domiciliosUserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class documentacionUsuariosController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('documentacion.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_aux=Auth::User();
        $user= User::findOrFail($user_aux->id);
        $tipo=$request->get('tipo_persona');
        //documentacion oficial
        $year = date("Y");
        //IDENTIFICACION
        if ($request->hasFile('identificacion')) {
            $file = $request->file('identificacion');
            //VALIDAMOS EL ARCHIVO
            $path_valida = pathinfo($file->getClientoriginalName());
            if($path_valida['extension'] <> "PDF" && $path_valida['extension'] <> "pdf"){
            return Redirect::to('/welcome')->with('errors','Documento no valido');
            }else{
            $documento= new documentacionUsuariosModel;
            $documento->id_user=$user->id;
            $documento->tipo_documento="IDENTIFICACION OFICIAL";
            $file->move('documentos/', $file->getClientoriginalName());
            $path_info = pathinfo($file->getClientoriginalName());
            $extension = $path_info['extension']; // "bill"
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $clave_alfa_asig = substr(str_shuffle($permitted_chars), 0, 10);
            $nombre = "IDENTIFICACION_OFICIAL_" . $user->id  . $clave_alfa_asig."_" .$year ."." . $extension;
            rename("documentos/".$file->getClientoriginalName(), "documentos/" . $nombre);
            $documento->documento = $nombre;
            $documento->estado="ACTIVO";
            $documento->captura= $user->name." ".$user->apellido_p." ".$user->apellido_m;
            $documento->save();
            }
        } //endif    

        if ($request->hasFile('curp')) {
            $file = $request->file('curp');
            //VALIDAMOS EL ARCHIVO
            $path_valida = pathinfo($file->getClientoriginalName());
            if($path_valida['extension'] <> "PDF" && $path_valida['extension'] <> "pdf"){
            return Redirect::to('/welcome')->with('errors','Documento no valido');
            }else{
            $documento= new documentacionUsuariosModel;
            $documento->id_user=$user->id;
            $documento->tipo_documento="CURP";
            $file->move('documentos/', $file->getClientoriginalName());
            $path_info = pathinfo($file->getClientoriginalName());
            $extension = $path_info['extension']; // "bill"
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $clave_alfa_asig = substr(str_shuffle($permitted_chars), 0, 10);
            $nombre = "CURP_" . $user->id  . $clave_alfa_asig."_" .$year ."." . $extension;
            rename("documentos/".$file->getClientoriginalName(), "documentos/" . $nombre);
            $documento->documento = $nombre;
            $documento->estado="ACTIVO";
            $documento->captura= $user->name." ".$user->apellido_p." ".$user->apellido_m;
            $documento->save();
            }
        } //endif    


        if($tipo == "MORAL"){
            if ($request->hasFile('acta_moral')) {
                $file = $request->file('acta_moral');
                //VALIDAMOS EL ARCHIVO
                $path_valida = pathinfo($file->getClientoriginalName());
                if($path_valida['extension'] <> "PDF" && $path_valida['extension'] <> "pdf"){
                return Redirect::to('/welcome')->with('errors','Documento no valido');
                }else{
                $documento= new documentacionUsuariosModel;
                $documento->id_user=$user->id;
                $documento->tipo_documento="ACTA DE CONSTITUCION";
                $file->move('documentos/', $file->getClientoriginalName());
                $path_info = pathinfo($file->getClientoriginalName());
                $extension = $path_info['extension']; // "bill"
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $clave_alfa_asig = substr(str_shuffle($permitted_chars), 0, 10);
                $nombre = "ACTA_DE_CONSTITUCION_" . $user->id . $clave_alfa_asig."_" .$year ."." . $extension;
                rename("documentos/".$file->getClientoriginalName(), "documentos/" . $nombre);
                $documento->documento = $nombre;
                $documento->estado="ACTIVO";
                $documento->captura= $user->name." ".$user->apellido_p." ".$user->apellido_m;
                $documento->save();
                }
            } //endif    
        }elseif($tipo == "AUT"){
            if ($request->hasFile('nom_rep_leg')) {
                $file = $request->file('nom_rep_leg');
                //VALIDAMOS EL ARCHIVO
                $path_valida = pathinfo($file->getClientoriginalName());
                if($path_valida['extension'] <> "PDF" && $path_valida['extension'] <> "pdf"){
                return Redirect::to('/welcome')->with('errors','Documento no valido');
                }else{
                $documento= new documentacionUsuariosModel;
                $documento->id_user=$user->id;
                $documento->tipo_documento="NOMBRAMIENTO";
                $file->move('documentos/', $file->getClientoriginalName());
                $path_info = pathinfo($file->getClientoriginalName());
                $extension = $path_info['extension']; // "bill"
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $clave_alfa_asig = substr(str_shuffle($permitted_chars), 0, 10);
                $nombre = "NOMBRAMIENTO_" . $user->id . $clave_alfa_asig."_" .$year ."." . $extension;
                rename("documentos/".$file->getClientoriginalName(), "documentos/" . $nombre);
                $documento->documento = $nombre;
                $documento->estado="ACTIVO";
                $documento->captura= $user->name." ".$user->apellido_p." ".$user->apellido_m;
                $documento->save();
                }
            } //endif    

        }
       
        $user->name=$request->get('nombre');
        $user->tipo_usuario=$request->get('tipo_persona');
        $user->apellido_p=$request->get('apellido_p');
        $user->apellido_m=$request->get('apellido_m');
        $user->sexo=$request->get('sexo');
        $user->telefono=$request->get('telefono');

        if($tipo == "MORAL"){
        $user->razon_social=$request->get('razon');
        $user->rfc=$request->get('rfc');
        }elseif($tipo == "AUT"){
        $user->nombre_aut=$request->get('nombre_aut');
        }
        $user->estado="DOCUMENTACION_ENTREGADA";
        $user->update();
        $domicilio=new domiciliosUserModel;
        $domicilio->codigo=$request->get('codigo');
        $domicilio->pais=$request->get('pais');
        $domicilio->estado=$request->get('estado');
        $domicilio->municipio=$request->get('municipio');
        $domicilio->asentamiento=$request->get('asentamiento');
        $domicilio->calle=$request->get('calle');
        $domicilio->num=$request->get('num');
        $domicilio->num_int=$request->get('num_int');
        $domicilio->id_user=$user->id;
        $domicilio->save();

        $aut_cert=$request->get('aut_cert');
        if($aut_cert == "SI"){
            $autoridad= new autoridadesCertModel;
            $autoridad->cn=$request->get('cn');
            $autoridad->ou=$request->get('ou');
            $autoridad->org=$request->get('org');
            $autoridad->loc=$request->get('localidad_aut');
            $autoridad->sta=$request->get('estado_aut');
            $autoridad->coun=$request->get('pais_aut');
            $autoridad->years=$request->get('tiempo');
            $autoridad->estado="POR_VALIDAR";
            $autoridad->id_user=$user->id;
            $autoridad->captura=$user->name." ".$user->apellido_p." ".$user->apellido_m;
            $autoridad->save();
        }

        return Redirect::to('welcome')->with('errors','La documentaciòn ha sido enviada a revisiòn, una vez validada se le notificara sobre el proceso para su firma electronica');


        

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
