<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class firmaElectronicaController extends Controller
{
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
        //
    }  
    
    public function autofirmado()
    {

   // Will hold the exported Certificate*
      $dn = array(
        "countryName" => "MX",
        "stateOrProvinceName" => "Zacatecas",
        "localityName" => "Guadalupe",
        "organizationName" => "UNIFIEL",
        "organizationalUnitName" => "UNIFIEL",
        "commonName" => "UNIFIEL",
        "emailAddress" => "admin@unifiel.org.mx"
      );
      $config = array(
        'config' => 'ssl/openssl.cnf',
        'encrypt_key' => true,
        "private_key_bits" => 4096,
        'private_key_type' => OPENSSL_KEYTYPE_RSA,
        'digest_alg' => 'sha512'
      );
      
      $privkey  = openssl_pkey_new($config);
      $csr = openssl_csr_new($dn, $privkey );    
      $req_cert = openssl_csr_sign($csr, null, $privkey , 730);
      openssl_csr_export($csr, $csrout) and var_dump($csrout);
      openssl_x509_export($req_cert, $certout) and var_dump($certout);
      openssl_pkey_export($privkey, $pkeyout, "Tecno1$1$1") and var_dump($pkeyout);

      openssl_x509_export_to_file($certout, "ssl/cert/admin@unifiel.org.mx.cer");
      openssl_pkey_export_to_file($pkeyout, "ssl/key/admin@unifiel.org.mx.key");

      $a_key = openssl_pkey_get_details($pkeyout);
      $ClavePublica = $a_key["key"];
      file_put_contents("ssl/key/admin@unifiel.org.mx-Pub.key", $ClavePublica);

/*
      var_dump($req_key);
      //$config = array("config" => "ssl/openssl.cnf");    
      if (openssl_pkey_export($req_key, $out_key)) {
        $req_csr  = openssl_csr_new($dn, $req_key);
        $req_cert = openssl_csr_sign($req_csr, null, $req_key, 730, array('digest_alg' => 'sha256'));
        if (openssl_x509_export($req_cert, $out_cert)) {
          openssl_x509_export_to_file($out_cert, "ssl/cert/admin@unifiel.org.mx.cer");
          openssl_pkey_export_to_file($out_key, "ssl/key/admin@unifiel.org.mx.key");
          $a_key = openssl_pkey_get_details($req_key);
          $ClavePublica = $a_key["key"];
          file_put_contents("ssl/key/admin@unifiel.org.mx-Pub.key", $ClavePublica);
        }
      }
      // Mostrar cualquier error que ocurra
      while (($e = openssl_error_string()) !== false) {
        echo $e . "\n";
      }
      */
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
