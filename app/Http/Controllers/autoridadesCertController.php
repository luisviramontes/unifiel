<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\autoridadesCertModel;
use App\User;

class autoridadesCertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autoridades=DB::table('autoridades_cert')->join('users','users.id','=','autoridades_cert.id_user')
        ->select('users.name','users.apellido_p','users.apellido_m','users.razon_social','autoridades_cert.*')
        ->get();

        return view('autoridades_cert.index',['autoridades'=>$autoridades]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    $autoridad=autoridadesCertModel::findOrFail($id);

    return view('autoridades_cert.detalle',['autoridad'=>$autoridad]);
        //
    }

    public function validar_autoridad($id){

        $autoridad=autoridadesCertModel::findOrFail($id);
        return view('autoridades_cert.validar',['autoridad'=>$autoridad]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autoridad=autoridadesCertModel::findOrFail($id);
        if($autoridad){

            $user=User::findOrFail($autoridad->id_user);
            $documentos=DB::table('documentacion_user')->where('id_user','=',$user->id)->get();
            $domicilio=DB::table('domicilios_user')->where('id_user','=',$user->id)->first();

            return view('autoridades_cert.edit',['autoridad'=>$autoridad,'user'=>$user,'documentos'=>$documentos,'domicilio'=>$domicilio]);
        }else{

        }
        

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