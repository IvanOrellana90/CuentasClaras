<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ URL::to('img/avatars') }}/{{Auth::user()->avatar}}.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::user()->name." ".Auth::user()->lastName }}</h1>
            <p>Cuenta la leyenda..</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Menu</span>
    <ul class="list-unstyled">
        <li> <a href="{{ route('home') }}"><i class="icon-home"></i>Inicio</a></li>
        <li> <a href="{{ route('groups') }}"> <i class="icon-interface-windows"></i>Grupos </a></li>
        <li> <a href="{{ route('tickets') }}"> <i class="fa fa-bar-chart"></i>Tickets </a></li>
        <li> <a href="{{ route('users') }}"> <i class="fa fa-user-o"></i>Usuarios </a></li>
    </ul><span class="heading">Saldo total</span>
    <ul class="list-unstyled">
        @if(($activos->total_sales - $pasivos->total_sales) >= 0)
            <li><strong class="text-blue text-menu"><i class="fa fa-thumbs-o-up"></i>${{ number_format($activos->total_sales - $pasivos->total_sales) }}</strong></li>
        @else()
            <li><strong class="text-red text-menu"><i class="fa fa-thumbs-o-down"></i>${{ number_format(($activos->total_sales - $pasivos->total_sales)*-1) }}</strong></li>
        @endif
    </ul>
</nav>