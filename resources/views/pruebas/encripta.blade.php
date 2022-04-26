@extends('layouts.principal')
@section('contenido')
<div class="pagetitle">
    <h1>Encriptar un mensaje</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <form action="/cifrar_msj" id="form" method="post" files="true" enctype="multipart/form-data" class="row g-12">
        {{csrf_field()}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Encriptar un mensaje con llave pública</h5>
                <div class="col-md-12 mt-4">               
                    <div class="col-md-12">
                        <label for="validationCustom04" class="form-label">Llave pública <span
                                class="text-danger">*</span></label>
                        <input type="file" accept=".pub" id="llave" name="llave" class="dropify" />
                    </div>




                </div>

                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Mensaje a encriptar<span
                            class="text-danger">*</span></label>
                    <input type="text"
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        class="form-control" placeholder="Favor de ingresar un mensaje" id="mensaje" name="mensaje">
                </div>



                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">Encriptar</button>
                </div>
            </div>
        </div>
    </form>
</section>

<script>
window.onload = function() {
    $('.dropify').dropify();
};
</script>
@endsection