@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.css') }}">
@endsection

@section('main')
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Deudas</h2>
        </div>
    </header>
    <section class="dashboard-counts">
        <div class="container-fluid">
            <div class="bg-white has-shadow">
                <!-- Item -->
                <div class="col-sm-12">
                    <div class="item d-flex align-items-center table-responsive">
                        <table id="table-users" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th  data-column-id="email" data-visible="false">Email</th>
                                <th  data-column-id="nombre" data-align='center' data-header-align="center" data-formatter="creador">Nombre</th>
                                <th  data-column-id="deuda" data-align='center' data-header-align="center" data-type="numeric">Deuda</th>
                                <th  data-column-id="total" data-align='center' data-header-align="center" data-type="numeric">Total</th>
                                <th  data-column-id="acciones" data-align='center' data-header-align="center" data-formatter="acciones" data-sortable="false">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- Tabla de boletas a las que pertenece el Uusuario -->
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->name." ".$user->lastName }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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

@section('js')
    <script src="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.js') }}"></script>
    <script src="{{ URL::to('js/bootgrid-tables.js') }}"></script>
@endsection
