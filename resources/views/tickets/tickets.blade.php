@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootgrid.css') }}">
@endsection

@section('main')
    @include('tickets.includes.new-ticket-modal')
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Grupos</h2>
        </div>
    </header>
    @include('layouts.includes.breadcrumb')
    <section class="dashboard-counts min-height">
        <div class="container-fluid">
            <div class="bg-white has-shadow">
                <!-- Item -->
                <div class="col-sm-12">
                    <div class="item d-flex align-items-center table-responsive">
                        <table id="table-ticket" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th  data-column-id="id" data-visible="false">ID</th>
                                <th  data-column-id="email" data-visible="false">Email</th>
                                <th  data-column-id="borrarLink" data-visible="false">BorrarLink</th>
                                <th  data-column-id="grupoLink" data-visible="false">GrupoLink</th>
                                <th  data-column-id="ticketLink" data-visible="false">TicketLink</th>
                                <th  data-column-id="userLink" data-visible="false">UserLink</th>
                                <th  data-column-id="nombre" data-align='center' data-header-align="center" data-formatter="nombre">Nombre</th>
                                <th  data-column-id="creador" data-align='center' data-header-align="center" data-formatter="creador">Creador</th>
                                <th  data-column-id="fecha" data-align='center' data-header-align="center" data-order="desc">Fecha</th>
                                <th  data-column-id="total" data-align='center' data-header-align="center" data-type="numeric" data-formatter="total">Total</th>
                                <th  data-column-id="grupo" data-align='center' data-header-align="center" data-formatter="grupo">Grupo</th>
                                <th  data-column-id="estado" data-align='center' data-header-align="center" data-formatter="estado">Estado</th>
                                <th  data-column-id="acciones" data-align='center' data-header-align="center" data-formatter="acciones" data-sortable="false">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- Tabla de boletas a las que pertenece el Uusuario -->
                            @foreach($user->ticketsBelong as $tickets)
                                <tr>
                                    <td>{{ $tickets->id }}</td>
                                    <td>{{ $tickets->user->email }}</td>
                                    <td>
                                        @if($tickets->user_id == $user->id)
                                            {{ route('ticket.destroy', $tickets->id) }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{ route('group', $tickets->group->id) }}</td>
                                    <td>{{ route('ticket', $tickets->id) }}</td>
                                    <td>{{ route('user', $tickets->user->id) }}</td>
                                    <td>{{ $tickets->name }}</td>
                                    <td>{{ $tickets->user->name." ".$tickets->user->lastName }}</td>
                                    <td>{{ $tickets->date }}</td>
                                    <td>{{ $tickets->amount }}</td>
                                    <td>{{ $tickets->group->name }}</td>
                                    <td>{{ $tickets->active }}</td>
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

    @include('tickets.includes.jquery-group-user')
@endsection
