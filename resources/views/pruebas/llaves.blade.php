@extends('layouts.principal')
@section('contenido')
<div class="pagetitle">
    <h1>Crear llave privada y pública</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <form action="/generar_claves" id="form" class="row g-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Crear llave privada y pública</h5>
                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Seleccione el tipo de función HASH <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="hash" name="hash">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="sha512">sha512</option>
                        <option value="sha224">sha224</option>
                        <option value="md5">md5</option>
                        <option value="sha1">sha1</option>
                    </select>
                </div>

                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Tamaño de la clave bits <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="tamaño" name="tamaño">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="4096">4096</option>
                        <option value="2000">2000</option>
                        <option value="1000">1000</option>
                        <option value="500">500</option>
                    </select>
                </div>

                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Tipo de clave privada a crear<span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="privada" name="privada">
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="OPENSSL_KEYTYPE_RSA">OPENSSL_KEYTYPE_RSA</option>
                        <option value="OPENSSL_KEYTYPE_EC">OPENSSL_KEYTYPE_EC</option>
                        <option value="OPENSSL_KEYTYPE_DH">OPENSSL_KEYTYPE_DH</option>
                        <option value="OPENSSL_KEYTYPE_DSA">OPENSSL_KEYTYPE_DSA</option>
                    </select>
                </div>

                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection