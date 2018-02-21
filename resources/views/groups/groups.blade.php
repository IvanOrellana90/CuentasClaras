@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootgrid.css') }}">
@endsection

@section('main')
    @include('groups.includes.new-group-modal')
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
                        <table id="table-groups" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th  data-column-id="id" data-visible="false">ID</th>
                                <th  data-column-id="email" data-visible="false">Email</th>
                                <th  data-column-id="borrarLink" data-visible="false">BorrarLink</th>
                                <th  data-column-id="nombreLink" data-visible="false">NombreLink></th>
                                <th  data-column-id="nombre" data-align='center' data-header-align="center" data-formatter="nombre" data-order="desc">Nombre</th>
                                <th  data-column-id="creador" data-align='center' data-header-align="center" data-formatter="creador" >Creador</th>
                                <th  data-column-id="total" data-align='center' data-header-align="center" data-formatter="total">Deuda</th>
                                <th  data-column-id="acciones" data-align='center' data-header-align="center" data-formatter="acciones" data-sortable="false">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Auth::user()->groupsBelong as $group)
                                <tr>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->user->email }}</td>
                                    <td>
                                        @if($group->user_id == $user->id)
                                            {{ route('group.destroy', $group->id) }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{ route('group', $group->id) }}</td>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $group->user->name." ".$group->user->lastName }}</td>
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
