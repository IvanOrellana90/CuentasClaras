@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.css') }}">
@endsection

@section('main')
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">{{ $user->name." ".$user->lastName }}</h2>
        </div>
    </header>
    <section class="dashboard-counts min-height">
        <div class="container-fluid">
            <div class="bg-white has-shadow">
                <!-- Item -->
                <div class="col-sm-12">
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{ URL::to('vendor/bootgrid/dist/jquery.bootgrid.js') }}"></script>
    <script src="{{ URL::to('js/bootgrid-tables.js') }}"></script>
@endsection
