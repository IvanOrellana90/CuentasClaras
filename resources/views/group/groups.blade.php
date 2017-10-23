@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::to('bower_components/bootgrid/dist/jquery.bootgrid.css') }}">
    <link rel="stylesheet" href="{{ URL::to('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')

    @include('group.new-group-modal')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Grupos
            <small>recuerda cancelar tus deudas!</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table-groups" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th  data-column-id="id" data-visible="false">ID</th>
                        <th  data-column-id="email" data-visible="false">Email</th>
                        <th  data-column-id="borrarLink" data-visible="false">BorrarLink</th>
                        <th  data-column-id="nombre" data-align='center' data-header-align="center" data-order="desc">Nombre</th>
                        <th  data-column-id="creador" data-align='center' data-header-align="center" data-formatter="creador" >Creador</th>
                        <th  data-column-id="total" data-align='center' data-header-align="center" data-formatter="total">Deuda</th>
                        <th  data-column-id="acciones" data-align='center' data-header-align="center" data-formatter="acciones" data-sortable="false">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->user->email }}</td>
                            <td>{{ route('group.destroy', $group->id) }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->user->name." ".$group->user->lastName }}</td>
                            <td>{{ number_format(pasivosGrupo($group->id) - activosGrupo($group->id)) }}</td>
                        </tr>
                        </tbody>
                    @endforeach
                    @foreach($user->groupsBelong as $groups)
                        <tr>
                            <td>{{ $groups->name }}</td>
                            <td>{{ $groups->description }}</td>
                            <td>{{ $groups->user->name." ".$groups->user->lastName }}</td>
                            <td> 4</td>
                            <td>X</td>
                        </tr>
                        </tbody>
                    @endforeach
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