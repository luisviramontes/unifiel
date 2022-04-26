@extends('layouts.principal')
@section('contenido')
<div class="pagetitle">
    <h1>Validar firma digital</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <form action="/result_ver_firma_dig" id="form" method="post" files="true" enctype="multipart/form-data"
        class="row g-12">
        {{csrf_field()}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Validar firma digital</h5>

             

                

                <div class="col-md-12 mt-4">
                    <div class="col-md-12">
                        <label for="validationCustom04" class="form-label">Llave publica <span
                                class="text-danger">*</span></label>
                        <input type="file" accept=".pub" id="llave" name="llave" class="dropify" />
                    </div>

                </div>

                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Documento original <span
                            class="text-danger">*</span></label>
                    <input type="file" accept=".docx, .txt, .pdf" id="doc" name="doc" class="dropify" />
                </div>


                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Firma aplicada<span
                            class="text-danger">*</span></label>
                    <input type="file" accept=".dat" id="firma" name="firma" class="dropify" />
                </div>

              


                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">Validar</button>
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