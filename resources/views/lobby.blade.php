@extends('layouts.principal')
@section('contenido')
<div class="pagetitle">
    <h1>Blank Page</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">

@if(Auth::user()->estado == "CORREO_VALIDADO")
    <form id="wizard-validation-form"  action="{{route('documentacion.store')}}" name="formulario" method="post" files="true"
        enctype="multipart/form-data" class="row g-3">
        {{csrf_field()}}
        <div>
            <h3>Datos de usuario</h3>
            <section>
                <div class="card mb-3">
                    <div class="card-header">Datos de usuario</div>
                    <div class="card-body">



                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Tipo de usuario <span
                                    class="text-danger">*</span> </label>
                            <select class="form-select" onchange="display_lobby(this.value) & display_doc(this.value);"
                                id="tipo_persona" name="tipo_persona" required>
                                <option selected disabled value="">Seleccione una opción</option>
                                <option value="FISICA">Persona fisica</option>
                                <option value="MORAL">Persona moral</option>
                                <option value="AUT">Autoridad pública</option>
                            </select>
                        </div>






                        <div class="form-group" id="display_moral" style='display:none;'>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">RFC <span
                                        class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    onkeypress="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    onKeyUp="validarInput(this.value);" class="form-control"
                                    placeholder="Favor de ingresar el RFC" id="rfc">
                                <div class="text-danger" id='error_rfc' name="error_rfc"></div>
                                <pre id="resultado"></pre>

                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Razón social <span
                                        class="text-danger">*</span> </label>
                                <input type="text"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    class="form-control" placeholder="Favor de ingresar la razón social" id="razon"
                                    name="razon">
                            </div>

                        </div>

                        <div class="form-group" id="display_autoridad" style='display:none;'>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Nombre de la autoridad <span
                                        class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    class="form-control" placeholder="Favor de ingresar el RFC" id="nombre_aut"
                                    name="nombre_aut">
                            </div>

                        </div>

                        <div class="form-group" id="display_fisica" style='display:none;'>

                            <div class="col-md-6">
                                <label for="validationCustom03" id="nombre_text" class="form-label">Nombre <span
                                        class="text-danger">*</span></label>
                                <input type="text"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    class="form-control" placeholder="Favor de ingresar el nombre" id="nombre"
                                   value='{{Auth::user()->name}}' name="nombre" required>

                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" id="apellido_p_text" class="form-label">Apellido paterno
                                    <span class="text-danger">*</span> </label>
                                <input type="text"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    class="form-control" placeholder="Favor de ingresar el apellido paterno"
                                    id="apellido_p"  value='{{Auth::user()->apellido_p}}'  name="apellido_p" required>

                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" id="apellido_m_text" class="form-label">Apellido materno
                                </label>
                                <input type="text"
                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                                    class="form-control" placeholder="Favor de ingresar el apellido paterno"
                                    id="apellido_m"  value='{{Auth::user()->apellido_m}}'  name="apellido_m">

                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Sexo <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option selected disabled value="">Seleccione una opción</option>
                                    <option value="MASCULINO">MASCULINO</option>
                                    <option value="FEMENINO">FEMENINO</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Télefono <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" maxlength="10" minlength="10" data-mask="492 999-9999"
                                onkeypress="return soloNumeros(event)" class="form-control" required
                                placeholder="Favor de ingresar el télefono" id="telefono" name="telefono">
                        </div>
                    </div>
                </div>
            </section>


            <h3>Domicilio</h3>
            <section>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Codigó postal <span class="text-danger">*</span>
                    </label>
                    <input maxlength="5" minlength="5" type="text" placeholder="Favor de ingresar el codigó postal"
                        onkeypress="return soloNumeros(event)" onchange="validaCodigoPostal(this.value);"
                        class="form-control" required id="codigo" name="codigo">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">País <span class="text-danger">*</span></label>
                    <select class="form-select" id="pais" name="pais" required>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Estado <span class="text-danger">*</span></label>
                    <select class="form-select" id="estado" name="estado" required>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Municipio <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="municipio" name="municipio" required>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Colónia o Asentamiento <span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="asentamiento" name="asentamiento" required>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Calle <span class="text-danger">*</span> </label>
                    <input
                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                        required maxlength="250" placeholder="Favor de ingresar la calle" type="text"
                        class="form-control" name="calle" id="calle">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Número exterior<span class="text-danger">*</span>
                    </label>
                    <input required maxlength="3" type="text" placeholder="Favor de ingresar el número"
                        class="form-control" id="num" name="num">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Número interior
                    </label>
                    <input maxlength="3" type="text" placeholder="Favor de ingresar el número" class="form-control"
                        id="num_int" name="num_int">
                </div>




            </section>

            <h3>Tipo de registro</h3>
            <section>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Desea registrarse como Autoridad Certificadora y
                        emitir sus propias Firmas Electrónicas para usuarios del sistema <span
                            class="text-danger">*</span></label>
                    <select class="form-select" onchange="display_autoridad(this.value);" id="aut_cert" name="aut_cert"
                        required>
                        <option selected disabled value="">Seleccione una opción</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                <div class="form-group" id="display_aut_cert" style='display:none;'>
                    <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Nombre común (CN)<span
                                class="text-danger">*</span>
                        </label>
                        <input type="text"
                            onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"
                            class="form-control"
                            placeholder="Favor de ingresar el nombre común ejemplo www.unifiel.com.mx" id="cn"
                            name="cn">
                        <br>
                        <pre class="mb-4"
                            id="CN"> El Nombre Común (CN), también conocido como Nombre de Dominio Totalmente Calificado ( FQDN ), es el valor característico dentro de un Nombre Distinguido (DN). Por lo general, está compuesto por el nombre de dominio
                                   del host y se parece a "www.unifiel.com.mx" o "unifiel.com.mx". El campo Nombre común a menudo se malinterpreta y se completa incorrectamente. No utilice el nombre de su organización como su nombre común .</pre>


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
                        <label for="validationCustom03" class="form-label">Codigó postal <span
                                class="text-danger">*</span>
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
                        <select class="form-select" id="pais_aut" name="pais_aut" required>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Tiempo de duración de los Certificados de
                            Seguridad <span class="text-danger">*</span></label>
                        <select class="form-select" id="tiempo" name="tiempo" required>
                            <option selected disabled value="">Seleccione una opción</option>
                            <option value="1">1 AÑO</option>
                            <option value="2">2 AÑOS</option>
                            <option value="3">3 AÑOS</option>
                        </select>
                    </div>


                </div>




            </section>

            <h3>Documentación probatoria</h3>
            <section>




                <div class="form-group" id="display_doc_moral" style='display:none;'>
                    <div class="col-md-12">
                        <label for="validationCustom04" class="form-label">Acta constitutiva <span
                                class="text-danger">*</span></label>
                        <input type="file" accept=".pdf" id="acta_moral" name="acta_moral" class="dropify" />
                    </div>



                </div>

                <div class="form-group" id="display_doc_aut" style='display:none;'>
                    <div class="col-md-12">
                        <label for="validationCustom04" class="form-label">Nombramiento del representante legal de la
                            autoridad pública <span class="text-danger">*</span></label>
                        <input type="file" accept=".pdf" id="nom_rep_leg" name="nom_rep_leg" class="dropify" />
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="validationCustom04"  id="ident_text" class="form-label">Identificación oficial con fotografía <span
                            class="text-danger">*</span></label>
                    <div class="alert alert-success mt-4 bt-4" role="alert">

                        <strong>a) Cartilla del Servicio Militar Nacional;<br>
                            b) Pasaporte expedido por la Secretaría de Relaciones Exteriores;<br>
                            c) Cédula Profesional expedida por la Secretaría de Educación Pública;<br>
                            d) Credencial de Elector expedida por el Instituto Federal Electoral;<br>
                            e) Identificación oficial expedida por cualquier autoridad en el ejercicio de sus
                            funciones.<br></strong>
                    </div>
                    <input type="file" accept=".pdf" id="identificacion" name="identificacion" class="dropify" />
                </div>

                <div class="col-md-12">
                    <label for="validationCustom04" id="curp_text" class="form-label">CURP <span class="text-danger">*</span></label>
                    <input type="file" accept=".pdf" id="curp" name="curp" class="dropify" />
                </div>





            </section>
        </div>
    </form>
@endif    

@if(Auth::user()->estado == "DOCUMENTACION_ENTREGADA")
<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>La documentaciòn ha sido enviada a revisiòn, una vez validada se le notificara sobre el proceso para su firma electronica.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif

</section>
<script>
window.onload = function() {
    $('.dropify').dropify();
};
</script>
@endsection