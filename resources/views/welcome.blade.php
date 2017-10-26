@extends('layouts.master')

@section('main')

  <!-- Main content -->
  <section class="content">

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                <!-- Deudas Usuaios -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Activos</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="box-body no-padding table-responsive">
                            <table id="activosUsers-selection" class="table table-condensed table-hover table-striped">
                                <thead>
                                <tr>
                                    <th data-column-id="id" data-visible="false">ID</th>
                                    <th data-column-id="name" data-align='center' data-formatter="name" data-header-align="center">Nombre</th>
                                    <th data-column-id="total_sales" data-align='center' data-header-align="center">Total</th>
                                    <th data-column-id="link" data-align='center' data-header-align="center" data-formatter="link" data-sortable="false">Acciones</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ route('users') }}" class="uppercase">Ver Usuarios</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <!--Pasivos-->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pasivos</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="box-body no-padding">
                            <div class="box-body no-padding table-responsive">
                                <table id="pasivosUsers-selection" class="table table-condensed table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="id" data-visible="false">ID</th>
                                        <th data-column-id="name" data-align='center' data-formatter="name" data-header-align="center">Nombre</th>
                                        <th data-column-id="total_sales" data-align='center' data-header-align="center">Total</th>
                                        <th data-column-id="link" data-align='center' data-header-align="center" data-formatter="link" data-sortable="false">Acciones</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Users</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <!-- Deudas Grupos -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grupos</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding table-responsive">
                        <table id="groups-selection" class="table table-condensed table-hover table-striped">
                            <thead>
                            <tr>
                                <th data-column-id="id" data-visible="false">ID</th>
                                <th data-column-id="name" data-align='center' data-formatter="name" data-header-align="center">Nombre</th>
                                <th data-column-id="total_sales" data-align='center' data-header-align="center">Total</th>
                                <th data-column-id="link" data-align='center' data-header-align="center" data-formatter="link" data-sortable="false">Acciones</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{ route('groups') }}" class="uppercase">Ver Grupos</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <!-- /.col -->
        </div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Popularity</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Gastos</span>
              <span class="info-box-number">{{ gastosTotales() }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    Gastos en el mes de {{ date('F') }}
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Boletas</span>
              <span class="info-box-number">{{ count($user->ticketsBelong) }}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </section>
  <!-- /.content -->

@endsection

@section('js')
    <script src="{{ URL::to('bower_components/bootgrid/dist/jquery.bootgrid.js') }}"></script>
    <script src="{{ URL::to('js/welcome.js') }}"></script>

    <script>
        $("#groups-selection").bootgrid({
            ajax: true,
            ajaxSettings: {
                method: "GET",
                cache: false
            },
            labels: {
                noResults: "No se encontraron resultados",
                infos: ""
            },
            url: "{!!URL::to('welcomeGroupTable')!!}",
            navigation: 0,
            formatters: {
                "link": function(column, row)
                {
                    return "<a href=\"#\">" + column.id + "</a>";
                },
                "name" : function (column, row)
                {
                    return "<a href=\"{{ route('groups') }}\">" + row.name + "</a>";
                }
            }
        });

        $("#activosUsers-selection").bootgrid({
            ajax: true,
            ajaxSettings: {
                method: "GET",
                cache: false
            },
            labels: {
                noResults: "No se encontraron resultados",
                infos: ""
            },
            url: "{!!URL::to('welcomeActivosUserTable')!!}",
            navigation: 0,
            formatters: {
                "link": function(column, row)
                {
                    return "<a href=\"#\">" + column.id + "</a>";
                },
                "name" : function (column, row)
                {
                    return "<a href=\"{{ route('groups') }}\">" + row.name + "</a>";
                }
            }
        });

        $("#pasivosUsers-selection").bootgrid({
            ajax: true,
            ajaxSettings: {
                method: "GET",
                cache: false
            },
            labels: {
                noResults: "No se encontraron resultados",
                infos: ""
            },
            url: "{!!URL::to('welcomePasivosUserTable')!!}",
            navigation: 0,
            formatters: {
                "link": function(column, row)
                {
                    return "<a href=\"#\">" + column.id + "</a>";
                },
                "name" : function (column, row)
                {
                    return "<a href=\"{{ route('groups') }}\">" + row.name + "</a>";
                }
            }
        });
    </script>

@endsection