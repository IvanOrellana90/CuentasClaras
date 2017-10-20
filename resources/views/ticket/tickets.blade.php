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
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool btn-add" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-square"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <table id="table-groups" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th  data-column-id="id" data-visible="false">ID</th>
            <th  data-column-id="email" data-visible="false">Email</th>
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
          @foreach($user->tickets as $tickets)
            <tr>
              <td>{{ $tickets->id }}</td>
              <td>{{ $tickets->user->email }}</td>
              <td>{{ $tickets->name }}</td>
              <td>{{ $tickets->user->name." ".$tickets->user->lastName }}</td>
              <td>{{ $tickets->date }}</td>
              <td>{{ $tickets->amount }}</td>
              <td>{{ $tickets->group->name }}</td>
            </tr>
          </tbody>
          @endforeach
          <!-- Tabla de boletas a las que pertenece el Uusuario -->
          @foreach($user->ticketsBelong as $tickets)
            <tr>
              <td>{{ $tickets->name }}</td>
              <td>{{ $tickets->description }}</td>
              <td>{{ $tickets->user->name." ".$tickets->user->lastName }}</td>
              <td> 4</td>
              <td>X</td>
              <td>
                <span class="label label-warning">Pendiente</span>
              </td>
              <td>Y</td>
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
      var grid = $("#table-groups").bootgrid({
      labels: {
        noResults: "No se econtraron resultados",
        search: "Buscar",
        infos: ""
      },
      multiSort: true,
      rowCount: -1,
      navigation: 1,
      formatters: {
          "acciones": function(column, row)
          {
              return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                  "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
          },
          "estado": function(column, row)
          {
              return "<span class=\"label label-warning\">Pendiente</span>";
          },
          "creador": function(column, row)
          {
              return '<strong>' + row.creador + '</strong> <br> <div class="italicTabla"><i>' + row.email + '</i></div> ';
          },
          "grupo": function(column, row)
          {
              return '<strong>' + row.grupo + '</strong>';
          }
      }
      }).on("loaded.rs.jquery.bootgrid", function()
      {
        /* Executes after data is loaded and rendered */
          grid.find(".command-edit").on("click", function(e)
          {

          }).end().find(".command-delete").on("click", function(e)
          {
              swal({
                  title: 'Estas seguro?',
                  text: "Esta boleta se eliminara permanentemente!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Eliminar',
                  cancelButtonText: 'Cancelar',
              }).then(function () {
                  window.location.href='{{ route('group.destroy') }}';
              })
          });
      });
    $('.select2').select2();
    $('.js-example-basic-single').select2();
  </script>

  @include('ticket.jquery-group-user  ')
@endsection