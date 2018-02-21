@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootgrid.css') }}">
@endsection

@section('main')
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Personas</h2>
        </div>
    </header>
    @include('layouts.includes.breadcrumb')
    <section class="dashboard-counts min-height">
        <div class="container-fluid">
            <div class="bg-white has-shadow">
                <!-- Item -->
                <div class="col-sm-12">
                    <div class="item d-flex align-items-center table-responsive">
                        <table id="table-users" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th  data-column-id="email" data-visible="false">Email</th>
                                <th  data-column-id="userLink" data-visible="false">UserLink</th>
                                <th  data-column-id="nombre" data-align='center' data-header-align="center" data-formatter="nombre">Nombre</th>
                                <th  data-column-id="total" data-align='center' data-header-align="center" data-type="numeric" data-formatter="total">Total</th>
                                <th  data-column-id="deuda" data-align='center' data-header-align="center" data-type="numeric" data-formatter="deuda">Pasivo</th>
                                <th  data-column-id="abono" data-align='center' data-header-align="center" data-type="numeric" data-formatter="abono">Activo</th>
                                <th  data-column-id="acciones" data-align='center' data-header-align="center" data-formatter="acciones" data-sortable="false">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- Tabla de boletas a las que pertenece el Uusuario -->
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ route('user', $user->id) }}</td>
                                    <td>{{ $user->name ." ". $user->lastName }}</td>
                                    <td>
                                        @if($user->deuda > $user->abono)
                                            {{ $user->deuda - $user->abono }}
                                        @else
                                            {{ $user->abono - $user->deuda }}
                                        @endif
                                    </td>
                                    <td>{{ $user->abono }}</td>
                                    <td>{{ $user->deuda }}</td>
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
