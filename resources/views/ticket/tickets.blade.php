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
      <div class="box-header">
        <h3 class="box-title">Mis Boletas</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool btn-add" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="table-groups" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th  data-column-id="nombre">Nombre</th>
            <th  data-column-id="creador">Creador</th>
            <th  data-column-id="fecha" data-order="desc">Fecha</th>
            <th  data-column-id="total">Total</th>
            <th  data-column-id="adjuntto">Adjunto</th>
          </tr>
          </thead>
          <tbody>
          @foreach($user->tickets as $tickets)
            <tr>
              <td>{{ $tickets->name }}</td>
              <td>{{ $tickets->description }}</td>
              <td>{{ $tickets->user->name." ".$tickets->user->lastName }}</td>
              <td> 4</td>
              <td>X</td>
            </tr>
          </tbody>
          @endforeach
          @foreach($user->ticketsBelong as $tickets)
            <tr>
              <td>{{ $tickets->name }}</td>
              <td>{{ $tickets->description }}</td>
              <td>{{ $tickets->user->name." ".$tickets->user->lastName }}</td>
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

  <script>
    $("#table-groups").bootgrid({
      labels: {
        noResults: "No se econtraron resultados",
        search: "Buscar",
        infos: ""
      },
      rowCount: -1,
      navigation: 1
    });
    $('.select2').select2()
    $('.js-example-basic-single').select2();
  </script>

  @include('ticket.jquery-group-user  ')
@endsection