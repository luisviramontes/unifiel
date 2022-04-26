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
    <form id="wizard-validation-form" action="{{route('documentacion.store')}}" name="formulario" method="post"
        files="true" enctype="multipart/form-data" class="row g-3">
        {{csrf_field()}}
        <div>
            <h3>Datos del Usuario</h3>
            <section>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label for="validationCustom03" id="nombre_text" class="form-label">Tipo de persona <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Favor de ingresar el nombre"
                                id="tipo_persona" value='{{$user->tipo_persona}}' name="tipo_persona" readonly>

                        </div>


                        @if($user->tipo_persona == "MORAL")
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">RFC <span class="text-danger">*</span>
                            </label>
                            <input type="text" readonly value='{{$user->rfc}}' class="form-control"
                                placeholder="Favor de ingresar el RFC" id="rfc">
                            <div class="text-danger" id='error_rfc' name="error_rfc"></div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Razón social <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" readonly value='{{$user->razon_social}}' class="form-control"
                                placeholder="Favor de ingresar la razón social" id="razon" name="razon">
                        </div>

                        @elseif($user->tipo_persona == "AUTORIDAD")

                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Nombre de la autoridad <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" readonly value='{{$user->nombre_aut}}' class="form-control"
                                placeholder="Favor de ingresar el RFC" id="nombre_aut" name="nombre_aut">
                        </div>

                        @endif


                        <div class="col-md-12">
                            <label for="validationCustom03" id="nombre_text" class="form-label">Nombre <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Favor de ingresar el nombre"
                                id="nombre" value='{{$user->name}}' name="nombre" readonly>

                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom03" id="apellido_p_text" class="form-label">Apellido paterno
                                <span class="text-danger">*</span> </label>
                            <input type="text" value='{{$user->apellido_p}}' class="form-control"
                                placeholder="Favor de ingresar el apellido paterno" id="apellido_p" name="apellido_p"
                                readonly>

                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom03" id="apellido_m_text" class="form-label">Apellido materno
                            </label>
                            <input type="text" value='{{$user->apellido_m}}' readonly class="form-control"
                                placeholder="Favor de ingresar el apellido paterno" id="apellido_m" name="apellido_m">

                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Sexo <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="sexo" name="sexo" disabled>
                                @if($user->sexo == "MASCULINO")
                                <option value="MASCULINO" selected>MASCULINO</option>
                                <option value="FEMENINO">FEMENINO</option>
                                @else
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="FEMENINO" selected>FEMENINO</option>
                                @endif
                            </select>
                        </div>



                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Télefono <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" maxlength="10" minlength="10" data-mask="492 999-9999"
                                class="form-control" readonly value='{{$user->telefono}}'
                                placeholder="Favor de ingresar el télefono" id="telefono" name="telefono">
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Email <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" readonly value='{{$user->email}}' id="email"
                                name="email">
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Fecha de registro <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" readonly value='{{$user->created_at}}'
                                id="created_at" name="created_at">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Codigó postal <span
                                    class="text-danger">*</span>
                            </label>
                            <input maxlength="5" minlength="5" type="text"
                                placeholder="Favor de ingresar el codigó postal" value="{{$domicilio->codigo}}"
                                class="form-control" readonly id="codigo" name="codigo">
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">País <span
                                    class="text-danger">*</span></label>

                            <input type="text" placeholder="Favor de ingresar el codigó postal"
                                value="{{$domicilio->pais}}" class="form-control" readonly id="pais" name="pais">


                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Estado <span
                                    class="text-danger">*</span></label>

                            <input type="text" value="{{$domicilio->estado}}" class="form-control" readonly id="estado"
                                name="estado">

                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Municipio <span
                                    class="text-danger">*</span></label>
                            <input type="text" value="{{$domicilio->municipio}}" class="form-control" readonly
                                id="municipio" name="municipio">
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Colónia o Asentamiento <span
                                    class="text-danger">*</span></label>
                            <input type="text" value="{{$domicilio->asentamiento}}" class="form-control" readonly
                                id="asentamiento" name="asentamiento">
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Calle <span class="text-danger">*</span>
                            </label>
                            <input type="text" value="{{$domicilio->calle}}" class="form-control" readonly id="calle"
                                name="calle">


                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Número exterior<span
                                    class="text-danger">*</span>
                            </label>


                            <input type="text" value="{{$domicilio->num}}" class="form-control" readonly id="num"
                                name="num">
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Número interior
                            </label>

                            <input type="text" value="{{$domicilio->num}}" class="form-control" readonly id="num_int"
                                name="num_int">
                        </div>


                    </div>
                </div>





            </section>


            <h3>Datos la Autoridad Certificadora</h3>
            <section>


                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Nombre común (CN)<span
                            class="text-danger">*</span>
                    </label>
                    <input type="text" value="{{$autoridad->cn}}" readonly class="form-control" id="cn" name="cn">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Unidad Organizacional (OU)<span
                            class="text-danger">*</span> </label>
                    <input type="text" value="{{$autoridad->ou}}" readonly class="form-control" id="ou" name="ou">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" readonly class="form-label">Organización (O)<span
                            class="text-danger">*</span>
                    </label>
                    <input type="text" readonly value="{{$autoridad->org}}" class="form-control" id="org" name="org">
                </div>




                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Localidad (L)<span
                            class="text-danger">*</span></label>

                    <input type="text" readonly value="{{$autoridad->loc}}" class="form-control" id="localidad_aut"
                        name="localidad_aut">


                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Nombre del estado o provincia (S) <span
                            class="text-danger">*</span></label>
                    <input type="text" readonly value="{{$autoridad->sta}}" class="form-control" id="estado_aut"
                        name="estado_aut">
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Nombre del país (C)<span
                            class="text-danger">*</span></label>
                    <input type="text" readonly value="{{$autoridad->coun}}" class="form-control" id="pais_aut"
                        name="pais_aut">

                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Tiempo de duración de los Certificados de
                        Seguridad <span class="text-danger">*</span></label>
                    <input type="text" readonly value="{{$autoridad->years}}" class="form-control" id="tiempo"
                        name="tiempo">
                </div>







            </section>

            <h3>Documentación probatoria</h3>
            <section>

                @foreach($documentos as $doc)
                <div class="form-group">
                    <div class="col-md-12">
                        <table  style="width:100%;">
                            <thead>
                                <tr>
                                    <th width="33%"> <label for="validationCustom04"
                                            class="form-label">{{$doc->tipo_documento}}</label>
                                    </th>
                                    <th width="33%"> <a class="btn btn-primary" target="blank" href="/documentos/{{$doc->documento}}"><i class="bi bi-eye me-1"></i> Ver</a></th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
                @endforeach








            </section>

            <h3>Estatus final</h3>
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
                    <label for="validationCustom04" id="ident_text" class="form-label">Identificación oficial con
                        fotografía
                        <span class="text-danger">*</span></label>
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
                    <label for="validationCustom04" id="curp_text" class="form-label">CURP <span
                            class="text-danger">*</span></label>
                    <input type="file" accept=".pdf" id="curp" name="curp" class="dropify" />
                </div>





            </section>
        </div>
    </form>

</section>
<script>
window.onload = function() {
    $('.dropify').dropify();
};
</script>
@endsection