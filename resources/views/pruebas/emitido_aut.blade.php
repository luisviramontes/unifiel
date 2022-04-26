@extends('layouts.principal')
@section('contenido')
<div class="pagetitle">
    <h1>Generar certificado emitido por Autoridad Certificadora(AC)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <form action="/genera_emitido_aut" id="form" method="post" files="true" enctype="multipart/form-data"
        class="row g-12">
        {{csrf_field()}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Generar certificado emitido por Autoridad Certificadora(AC)</h5>


                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Seleccione la Autoridad Certificadora <span class="text-danger">*</span></label>
                    <select class="form-select" id="aut" name="aut" required>
                        <option selected disabled value="">Seleccione una opción</option>
                        @foreach($autoridades as $aut)
                        <option value="{{$aut->id}}">{{$aut->cn}}</option>
                        @endforeach
                        
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Nombre común (CN)<span
                            class="text-danger">*</span>
                    </label>
                    <input type="text"
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        class="form-control" placeholder="Favor de ingresar el nombre común ejemplo www.unifiel.com.mx"
                        id="cn" name="cn">
                    <br>
                    <pre class="mb-4"
                        id="CN"> El Nombre Común (CN), también conocido como Nombre de Dominio Totalmente Calificado ( FQDN ), es el valor característico dentro de un Nombre Distinguido (DN). Por lo general, está compuesto por el nombre de dominio del host y se parece a "www.unifiel.com.mx" o "unifiel.com.mx". El campo Nombre común a menudo se malinterpreta y se completa incorrectamente. No utilice el nombre de su organización como su nombre común .</pre>


                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Unidad Organizacional (OU)<span
                            class="text-danger">*</span> </label>
                    <input type="text"
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        class="form-control" placeholder="Favor de ingresar el nombre de la Unidad Organizacional"
                        id="ou" name="ou">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Organización (O)<span
                            class="text-danger">*</span>
                    </label>
                    <input type="text"
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        class="form-control" placeholder="Favor de ingresar el nombre de la Organización" id="org"
                        name="org">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Email<span class="text-danger">*</span> </label>
                    <input type="text"
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        class="form-control" placeholder="Favor de ingresar el email" id="email" name="email">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Codigó postal <span class="text-danger">*</span>
                    </label>
                    <input maxlength="5" minlength="5" type="text" placeholder="Favor de ingresar el codigó postal"
                        onkeypress="return soloNumeros(event)" onchange="validaCodigoPostalAut(this.value);"
                        class="form-control" required id="codigo_aut">
                </div>


                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Localidad (L)<span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="localidad_aut" name="localidad_aut" required>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Nombre del estado o provincia (S) <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="estado_aut" name="estado_aut" required>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Nombre del país (C)<span
                            class="text-danger">*</span></label>

                    <input type="text"
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        class="form-control" maxlength="2" placeholder="Favor de ingresar el pais" id="pais"
                        name="pais">


                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Tiempo de duración de los Certificados de
                        Seguridad <span class="text-danger">*</span></label>
                    <select class="form-select" id="tiempo" name="tiempo" required>
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="365">365 Días</option>
                        <option value="770">770 Días</option>
                        <option value="1135">1135 Días</option>
                    </select>
                </div>








                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">Generar</button>
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