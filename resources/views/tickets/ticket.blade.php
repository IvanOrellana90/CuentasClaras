@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.css') }}">
@endsection

@section('main')
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">{{ $ticket->name }}</h2>
        </div>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tickets') }}">Tickets</a></li>
            <li class="breadcrumb-item active">{{ $ticket->name }}</li>
        </ul>
    </div>
    <section class="feeds min-height">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="articles card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <div class="wizard-header text-center">
                                <h2 class="h3">Información del Ticket</h2>
                            </div>
                        </div>
                        <div class="card-body no-padding text-center">
                            <div class="item align-items-center">
                                <h6><strong>Nombre</strong></h6>
                                <p class="descripcion-texto">{{ $ticket->name }}</p>
                                @if($ticket->description != "")
                                    <h6><strong>Descripción</strong></h6>
                                    <p class="descripcion-texto">{{ $ticket->description }}</p>
                                @endif
                                <h6><strong>Monto</strong></h6>
                                <p class="descripcion-texto">${{ number_format($ticket->amount) }}</p>
                                <h6><strong>Fecha</strong></h6>
                                <p class="descripcion-texto">{{ $ticket->date }}</p>
                                <h6><strong>Grupo</strong></h6>
                                <p class="descripcion-texto"><a href="">{{ $ticket->group->name}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trending Articles-->
                <div class="col-lg-6">
                    <div class="articles card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h2 class="h3">Usuarios   </h2>
                            <div class="badge badge-rounded bg-red">{{ $ticket->debts->where('state',0)->count() }} Pendientes       </div>
                        </div>
                        <div class="card-body no-padding">
                            @foreach($ticket->debts as $debt)
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img src="{{  URL::to('img/avatars') }}/{{ $debt->user->avatar}}.jpg" alt="..."
                                                                    class="img-fluid rounded-circle" style="border: 1px solid @if($debt->state == 1) #28a745 @else #dc3545 @endif"></div>
                                            <div class="text"><a href="{{ route('user', $debt->user->id) }}">
                                                    <h3 class="h5">{{ $debt->user->name." ".$debt->user->lastName }}</h3></a>
                                                <small>{{ $debt->user->email }}   </small>
                                            </div>
                                        </div>
                                    </div>
                                    @if($debt->state == 0)
                                        <div class="col-lg-2">
                                            <div class="item d-flex align-items-center">
                                                <div class="text">
                                                    <a href="" class="command-done"><span class="fa fa-check"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Check List -->

            </div>

            <div class="row">

                @if($ticket->attached != "")
                <div class="col-lg-4">
                    <div class="articles card">
                        <div class="card-body no-padding text-center">
                            <div class="item align-items-center">
                                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-target="#image-gallery">
                                    <img style="max-width:80%; border: 1px solid gray; " src="{{ URL::to('storage') }}/{{ $ticket->attached }}" class="rounded" alt="Boleta"> 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="statistics col-lg-3 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i style=" margin-top:10px" class="fa fa-calendar-o"></i></div>
                        <div class="text"><strong>{{ diferenciaDias($ticket->created_at) }} DÍAS</strong><br><small>Pendiente</small></div>
                    </div>
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i style=" margin-top:10px" class="fa fa-bitcoin "></i></div>
                        <div class="text"><strong>{{ $ticket->debts->where('state',0)->sum('amount') }}</strong><br><small>Deduda</small></div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <img style="max-width: 100%;" id="image-gallery-image" class="img-responsive" src="{{ URL::to('storage') }}/{{ $ticket->attached }}">
            </div>
        </div>
    </div>
</div>

@section('js')
    <script src="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.js') }}"></script>
    <script src="{{ URL::to('js/bootgrid-tables.js') }}"></script>
@endsection
