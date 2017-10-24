@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::to('bower_components/bootgrid/dist/jquery.bootgrid.css') }}">
    <link rel="stylesheet" href="{{ URL::to('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Deudas
            <small>recuerda cancelar tus deudas!</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-bill" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  data-column-id="email" data-visible="false">Email</th>
                        <th  data-column-id="nombre" data-align='center' data-header-align="center">Nombre</th>
                        <th  data-column-id="creador" data-align='center' data-header-align="center" data-formatter="creador">Responsable</th>
                        <th  data-column-id="fecha" data-align='center' data-header-align="center" data-order="asc">Fecha</th>
                        <th  data-column-id="grupo" data-align='center' data-header-align="center" data-formatter="grupo">Grupo</th>
                        <th  data-column-id="total" data-align='center' data-header-align="center" data-type="numeric">Total</th>
                        <th  data-column-id="estado" data-align='center' data-header-align="center" data-formatter="estado">Estado</th>
                        <th  data-column-id="acciones" data-align='center' data-header-align="center" data-formatter="acciones" data-sortable="false">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- Tabla de boletas a las que pertenece el Uusuario -->
                    @foreach($bills as $bill)
                        <tr>
                            <td>{{ $bill->user->email }}</td>
                            <td>{{ $bill->name }}</td>
                            <td>{{ $bill->user->name ." ". $bill->user->lastName }}</td>
                            <td>{{ $bill->date }}</td>
                            <td>{{ $bill->group->name }}</td>
                            <td>{{ $bill->amount }}</td>
                            <td>{{ $bill->active }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

@endsection
@section('js')
    <script src="{{ URL::to('bower_components/bootgrid/dist/jquery.bootgrid.js') }}"></script>
    <script src="{{ URL::to('bower_components/steps/assets/js/jquery.bootstrap.wizard.js') }}"></script>
    <script src="{{ URL::to('bower_components/steps/assets/js/paper-bootstrap-wizard.js') }}"></script>
    <script src="{{ URL::to('bower_components/steps/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::to('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::to('js/tablas-bootgrid.js') }}"></script>

    <script>
        $('.select2').select2()
    </script>

@endsection