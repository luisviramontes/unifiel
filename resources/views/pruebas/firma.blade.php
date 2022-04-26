@extends('layouts.principal')
@section('contenido')
<div class="pagetitle">
    <h1>Firma digital</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <form action="/firmar_digital" id="form" method="post" files="true" enctype="multipart/form-data"
        class="row g-12">
        {{csrf_field()}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Firma digital</h5>



                

                <div class="col-md-12 mt-4">
                    <div class="col-md-12">
                        <label for="validationCustom04" class="form-label">Llave privada <span
                                class="text-danger">*</span></label>
                        <input type="file" accept=".pri" id="llave" name="llave" class="dropify" />
                    </div>

                </div>

                <div class="col-md-12 mt-4">
                    <label for="validationCustom04" class="form-label">Documento a firmar<span
                            class="text-danger">*</span></label>
                    <input type="file" accept=".docx, .txt, .pdf" id="doc" name="doc" class="dropify" />
                </div>


              


                <div class="col-12 mt-4">
                    <button class="btn btn-primary" type="submit">Firmar</button>
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