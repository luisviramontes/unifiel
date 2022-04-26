<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use ZipArchive;

class pruebasController extends Controller
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
    public function crear_claves_priv_pub()
    {
        //pruebas ITZ Criptografia asimetrica openssl
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 4096,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
           
        // Crear la clave pública y privada
        $res = openssl_pkey_new($config);
        
        // Extraiga la clave privada de $res a $privKey
        openssl_pkey_export($res, $privKey);

        print_r("ESTA ES LA LLAVE PRIVADA*****<BR>".$privKey."<br>");
        
        // Extraiga la clave pública de $res a $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];

        print_r("ESTA ES LA LLAVE PUBLICA*****<BR>".$pubKey."<br>");
        
        $data = 'ESTE ES UN EJEMPLO DE CIFRADO ITZ';

        print_r("MENSAJE A CIFRAR*****<BR>".$data."<br>");
        
        // Cifra los datos en la variable $encrypted usando la clave pública
        openssl_public_encrypt($data, $encrypted, $pubKey);

        print_r("MENSAJE CIFRADO*****<BR>".$encrypted."<br>");
        
        // Descifrar los datos usando la clave privada y almacena los resultados en $decrypted
        openssl_private_decrypt($encrypted, $decrypted, $privKey);

        print_r("MENSAJE DECIFRADO MEDIANTE CLAVE PRIVADA*****<BR>".$decrypted."<br>");
        
      //  echo $decrypted;
        //
    }

    public function priv_pub(){

        return view('pruebas.llaves');
    }

    public function generar_claves(request $request){
        //pruebas ITZ Criptografia asimetrica openssl
        $config = array(
            "digest_alg" => $request->get('hash'),
            "private_key_bits" => $request->get('tamaño'),
            "private_key_type" => $request->get('privada'),
        );
           
  
        // Crear la clave pública y privada
        $res = openssl_pkey_new($config);
        
        // Extraiga la clave privada de $res a $privKey
        openssl_pkey_export($res, $privKey);

        print_r("ESTA ES LA LLAVE PRIVADA*****<BR>".$privKey."<br>");
        
        // Extraiga la clave pública de $res a $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];

        print_r("ESTA ES LA LLAVE PUBLICA*****<BR>".$pubKey."<br>");
        file_put_contents("/unifiel.key.pub", $pubKey);
        // El nombre con el que se descarga
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=unifiel.key.pub");
        // Leer el contenido binario del zip y enviarlo
        readfile('/unifiel.key.pub');
        // Si quieres puedes eliminarlo después:
        unlink('/unifiel.key.pub');

        file_put_contents("/unifiel.key.pri", $privKey);
        // El nombre con el que se descarga
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=unifiel.key.pri");
        // Leer el contenido binario del zip y enviarlo
        readfile('/unifiel.key.pri');
        // Si quieres puedes eliminarlo después:  
        unlink('/unifiel.key.pri');

        return Redirect::to('welcome');
        
      

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