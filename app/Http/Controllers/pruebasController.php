<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use ZipArchive;
use App\autoridadesCertModel;
use DB;

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
        $zip = new ZipArchive();

        //pruebas ITZ Criptografia asimetrica openssl
        $config = array(
            "digest_alg" => $request->get('hash'),
            "private_key_bits" => $request->get('tamaño'),
            "private_key_type" => $request->get('privada'),
        );
           
  
        $name_zip = "Llaves.zip";
        //$filename = 'COMPRIMIDOS/' . $name_zip;
        $filename = "pruebas/Llaves_key_public.zip.";

        if ($zip->open($filename, ZIPARCHIVE::CREATE) === true) {  
        // Crear la clave pública y privada
        $res = openssl_pkey_new($config);
        
        // Extraiga la clave privada de $res a $privKey
        openssl_pkey_export($res, $privKey);
        
        // Extraiga la clave pública de $res a $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];

    
        file_put_contents("pruebas/unifiel.key.pub", $pubKey);
        file_put_contents("pruebas/unifiel.key.pri", $privKey);
        
        
        $zip->addFile("pruebas/unifiel.key.pub");
        $zip->addFile("pruebas/unifiel.key.pri");

        $resultado = $zip->close();
        if (!$resultado) {
            exit("Error creando archivo");
        }


        // El nombre con el que se descarga
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=unifiel.zip");
        // Leer el contenido binario del zip y enviarlo
        readfile($filename);
        // Si quieres puedes eliminarlo después:  
        unlink($filename);
        //return Redirect::to('welcome');
        }else {
          echo 'Error creando ' . $filename;
         // return Redirect::to('welcome')->with('errors', 'Error al crear el zip ');
        }
       
        
      

    }

    public function encriptar_msj(){
        return view('pruebas.encripta');

    }

    public function cifrar_msj(request $request){
        $data = $request->get('mensaje');  
        $pubKey = $request->file('llave');      
        $pubKey=file_get_contents($pubKey);
        // Cifra los datos en la variable $encrypted usando la clave pública
        openssl_public_encrypt($data, $encrypted, $pubKey);

        file_put_contents("pruebas/mensaje_encriptado.txt", $encrypted);
          // El nombre con el que se descarga
          header('Content-Type: application/octet-stream');
          header("Content-Transfer-Encoding: Binary");
          header("Content-disposition: attachment; filename=mensaje_encriptado.txt");
          // Leer el contenido binario del zip y enviarlo
          readfile('pruebas/mensaje_encriptado.txt');
          // Si quieres puedes eliminarlo después:  
          unlink('pruebas/mensaje_encriptado.txt');
    }

    public function decifrar_msj(){
        return view('pruebas.desencripta');
    }

    public function desencriptar_msj(request $request){

        $privKey = $request->file('llave');      
        $privKey=file_get_contents($privKey);

        $encrypted = $request->file('mensaje');      
        $encrypted=file_get_contents($encrypted);

        openssl_private_decrypt($encrypted, $decrypted, $privKey);

        file_put_contents("pruebas/mensaje_desencriptado.txt", $decrypted);
        // El nombre con el que se descarga
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=mensaje_desencriptado.txt");
        // Leer el contenido binario del zip y enviarlo
        readfile('pruebas/mensaje_desencriptado.txt');
        // Si quieres puedes eliminarlo después:  
        unlink('pruebas/mensaje_desencriptado.txt');

    }

    public function firma_digital(){
        return view('pruebas.firma');
    }

    public function firmar_digital(request $request){

        $zip = new ZipArchive();
        $filename = "pruebas/Firma_Digital.zip";

        if ($zip->open($filename, ZIPARCHIVE::CREATE) === true) {  

        $privKey = $request->file('llave');      
        $privKey=file_get_contents($privKey);

        $doc = $request->file('doc');      
        $hash = $request->get('hash');      
        $b64Doc = chunk_split(base64_encode(file_get_contents($doc)));
        $hash=hash('sha256', $b64Doc);

        openssl_sign($hash, $firma, $privKey, OPENSSL_ALGO_SHA1);

        $firma_64 = base64_encode($firma);

        file_put_contents("pruebas/firma.dat", $firma);
        file_put_contents("pruebas/firma64.txt", $firma_64);

        $zip->addFile("pruebas/firma.dat");
        $zip->addFile("pruebas/firma64.txt");

        $resultado = $zip->close();
        if (!$resultado) {
            exit("Error creando archivo");
        }

        // El nombre con el que se descarga
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=Firma_Digital.zip");
        // Leer el contenido binario del zip y enviarlo
        readfile('pruebas/Firma_Digital.zip');
        // Si quieres puedes eliminarlo después:  
        unlink('pruebas/Firma_Digital.zip');


        
        }else{
            echo 'Error creando ' . $filename;
        }
        
    }

    public function verifica_firma(){
        return view('pruebas.verifica_firmad');

    }

    public function result_ver_firma_dig(request $request){
        
        $pubkeyid = $request->file('llave');      
        $pubkeyid=file_get_contents($pubkeyid);

        $signature = $request->file('firma');      
        $signature=file_get_contents($signature);

        $data = $request->file('doc');    
        $b64Doc = chunk_split(base64_encode(file_get_contents($data)));
        $data=hash('sha256', $b64Doc);  


        $ok = openssl_verify($data, $signature, $pubkeyid);
        if ($ok == 1) {
            return Redirect::to('welcome')->with('errors', "La firma coincide con el documento");
        } elseif ($ok == 0) {
            return Redirect::to('welcome')->with('errors', "La firma no coicide con el documento, fue alterado");
        } else {
            return Redirect::to('welcome')->with('errors', "La firma no coicide con el documento, fue alterado: ".openssl_error_string());
        }
        // liberar la clave de la memoria
        //openssl_free_key($pubkeyid);
        
        
    }

    public function autofirmado(){
        return view('pruebas.autofirmado');
    }

    public function genera_autofirmado(request $request){


       


        $dn = array(
            "countryName" => "MX",
            "stateOrProvinceName" => $request->get('estado_aut'),
            "localityName" =>$request->get('localidad_aut'),
            "organizationName" => $request->get('org'),
            "organizationalUnitName" => $request->get('ou'),
            "commonName" => $request->get('cn'),
            "emailAddress" =>  $request->get('email')
          );
          $config = array(
            'config' => 'ssl/openssl.cnf',
            'encrypt_key' => true,
            "private_key_bits" => 4096,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
            'digest_alg' => 'sha512'
          );
          var_dump( $dn);
          
          $privkey  = openssl_pkey_new($config);
          $csr = openssl_csr_new($dn, $privkey );    
          $req_cert = openssl_csr_sign($csr, null, $privkey , $request->get('tiempo'),array('digest_alg'=>'sha256'));
          openssl_csr_export($csr, $csrout) and var_dump($csrout);
          openssl_x509_export($req_cert, $certout);
          openssl_pkey_export($privkey, $pkeyout);
    
          openssl_x509_export_to_file($certout, "ssl/cert/".$request->get('email').".cer");
          openssl_pkey_export_to_file($pkeyout, "ssl/key/".$request->get('email').".key.pri");
    
          $pub_key = openssl_pkey_get_public(file_get_contents("ssl/cert/".$request->get('email').".cer"));
          $keyData = openssl_pkey_get_details($privkey);
          file_put_contents("ssl/key/".$request->get('email').".key.pub", $keyData['key']);

          $user=Auth::user();
          $autoridad= new autoridadesCertModel;
          $autoridad->cn=$request->get('cn');
          $autoridad->ou=$request->get('ou');
          $autoridad->org=$request->get('org');
          $autoridad->loc=$request->get('localidad_aut');
          $autoridad->sta=$request->get('estado_aut');
          $autoridad->coun='MX';
          $autoridad->years= $request->get('tiempo');
          $autoridad->estado="ACTIVO";
          $autoridad->cert=$request->get('email').".cer";
          $autoridad->key=$request->get('email').".key.pri";
          $autoridad->id_user=$user->id;
          $autoridad->captura=$user->name." ".$user->apellido_p." ".$user->apellido_m;
          $autoridad->save();


          $zip = new ZipArchive();
          $filename = "pruebas/Certificado.zip";
  
          if ($zip->open($filename, ZIPARCHIVE::CREATE) === true) { 
            $zip->addFile("ssl/cert/".$request->get('email').".cer");
            $zip->addFile("ssl/key/".$request->get('email').".key.pri"); 
            $zip->addFile("ssl/key/".$request->get('email').".key.pub"); 

            $resultado = $zip->close();
            if (!$resultado) {
                exit("Error creando archivo");
            }
    
            // El nombre con el que se descarga
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=Certificado.zip");
            // Leer el contenido binario del zip y enviarlo
            readfile('pruebas/Certificado.zip');
            // Si quieres puedes eliminarlo después:  
            unlink('pruebas/Certificado.zip');
    

          }

    }

    public function emitido_aut(){
        $autoridades=DB::table('autoridades_cert')->where('estado','=','ACTIVO')->get();
        return view('pruebas.emitido_aut',['autoridades'=>$autoridades]);
    }

    public function genera_emitido_aut(request $request){

        $config = array(
            'config' => 'ssl/openssl.cnf',
            'encrypt_key' => true,
            "private_key_bits" => 4096,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
            'digest_alg' => 'sha256'
          );
          // $CA_CERT = "ssl/cert/SIJEL.cer";
          //$CA_KEY  = "ssl/key/SIJEL.key";
          $aut=$request->get('aut');
          $autoridad=DB::table('autoridades_cert')->where('id','=',$aut)->first();
          $CA_CERT = "ssl/cert/".$autoridad->cert;
          $CA_KEY  = "ssl/key/".$autoridad->key;
          $req_key = openssl_pkey_new($config);
          //$config = array("config" => "ssl/openssl.cnf");
          if (openssl_pkey_export($req_key, $out_key)) {
            $dn = array(
                "countryName" => "MX",
                "stateOrProvinceName" => $request->get('estado_aut'),
                "localityName" =>$request->get('localidad_aut'),
                "organizationName" => $request->get('org'),
                "organizationalUnitName" => $request->get('ou'),
                "commonName" => $request->get('cn'),
                "emailAddress" =>  $request->get('email')
              );

            $permitted_chars = '0123456789';
            //GENERA LA CLAVE ALFANUMERICA PARA LA ASIGNACION
            $serial = substr(str_shuffle($permitted_chars), 0, 5);

            $req_csr  = openssl_csr_new($dn, $req_key);
            $req_cert = openssl_csr_sign($req_csr, "file://$CA_CERT", "file://$CA_KEY",  $request->get('tiempo'), array('digest_alg' => 'sha256'), $serial);
            if (openssl_x509_export($req_cert, $out_cert)) {
              openssl_x509_export_to_file($out_cert, "ssl/cert/".$request->get('email').".cer");
              openssl_pkey_export_to_file($out_key, "ssl/key/".$request->get('email').".key.pri");
              $a_key = openssl_pkey_get_details($req_key);
              $ClavePublica = $a_key["key"];
              file_put_contents("ssl/key/".$request->get('email').".key.pub", $ClavePublica);            
         }}

          $zip = new ZipArchive();
          $filename = "pruebas/Certificado_Emitido_Autoridad.zip";
  
          if ($zip->open($filename, ZIPARCHIVE::CREATE) === true) { 
            $zip->addFile("ssl/cert/".$request->get('email').".cer");
            $zip->addFile("ssl/key/".$request->get('email').".key.pri"); 
            $zip->addFile("ssl/key/".$request->get('email').".key.pub"); 

            $resultado = $zip->close();
            if (!$resultado) {
                exit("Error creando archivo");
            }
    
            // El nombre con el que se descarga
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=Certificado_Emitido_Autoridad.zip");
            // Leer el contenido binario del zip y enviarlo
            readfile('pruebas/Certificado_Emitido_Autoridad.zip');
            // Si quieres puedes eliminarlo después:  
            unlink('pruebas/Certificado_Emitido_Autoridad.zip');
          }

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
