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
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <p>Add lightweight datatables to your project with using the <a
                            href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                            DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to
                        conver to a datatable</p>

                    <!-- Table with stripped rows -->
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border:1; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nombre de la AC</th>
                                <th>CN</th>
                                <th>OU</th>
                                <th>ORG</th>
                                <th>Loc</th>
                                <th>Estado</th>
                                <th>Pais</th>
                                <th>Estado de la certificacion</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($autoridades as $aut)
                            <tr>
                                <td>{{$aut->name}} {{$aut->apellido_p}} {{$aut->apellido_m}}
                                    {{$aut->razon_social}}</td>
                                <td>{{$aut->cn}}</td>
                                <td>{{$aut->ou}}</td>
                                <td>{{$aut->org}}</td>
                                <td>{{$aut->loc}}</td>
                                <td>{{$aut->sta}}</td>
                                <td>{{$aut->coun}}</td>
                                <td>{{$aut->estado}}</td>
                                <td>
                                    <a href="{{URL::action('autoridadesCertController@show',$aut->id)}}"
                                        class="btn waves-effect waves-light btn-info" role="button">
                                        <i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection