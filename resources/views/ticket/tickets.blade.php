@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootgrid/dist/jquery.bootgrid.css') }}">
  <link rel="stylesheet" href="{{ URL::to('bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('main')

  @include('ticket.new-ticket-modal')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Boletas
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
      <div class="box-body table-responsive">
        <table id="table-ticket" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th  data-column-id="id" data-visible="false">ID</th>
            <th  data-column-id="email" data-visible="false">Email</th>
              <th  data-column-id="borrarLink" data-visible="false">BorrarLink</th>
            <th  data-column-id="nombre" data-align='center' data-header-align="center">Nombre</th>
            <th  data-column-id="creador" data-align='center' data-header-align="center" data-formatter="creador">Creador</th>
            <th  data-column-id="fecha" data-align='center' data-header-align="center" data-order="asc">Fecha</th>
            <th  data-column-id="total" data-align='center' data-header-align="center" data-type="numeric">Total</th>
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
                <td>{{ route('user.destroy', $tickets->id) }}</td>
                <td>{{ $tickets->name }}</td>
                <td>{{ $tickets->user->name." ".$tickets->user->lastName }}</td>
                <td>{{ $tickets->date }}</td>
                <td>{{ $tickets->amount }}</td>
                <td>{{ $tickets->group->name }}</td>
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
    $('.select2').select2();
    $('.js-example-basic-single').select2();
  </script>

  @include('ticket.jquery-group-user  ')
@endsection