<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="img/avatar/{{ $user->avatar }}.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ $user->name." ".$user->lastName }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu Principal</li>
      <li>
        <a href="{{ route('welcome') }}">
          <i class="fa fa-home"></i> <span>Inicio</span>
        </a>
      </li>
      <li>
        <a href="{{ route('groups') }}">
          <i class="fa fa-group"></i> <span>Grupos</span>
        </a>
      </li>
      <li>
        <a href="{{ route('tickets') }}">
          <i class="fa fa-list"></i> <span>Boletas</span>
        </a>
      </li>
      <li>
        <a href="{{ route('users') }}">
          <i class="fa fa-user"></i>
          <span>Usuarios</span>
        </a>
      </li>
      <li>
        <a href="{{ route('bills') }}">
          <i class="fa fa-bookmark"></i>
          <span>Deudas</span>
          <span class="pull-right-container">
              <small class="label pull-right bg-red">{{ count($bills) }}</small>
            </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Layout Options</span>
          <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li>
      <li class="header">Relevante</li>
      <li><a href="#"><i class="fa fa-thumbs-up text-green"></i> <span>Activo: <strong>{{ number_format($activos->total_sales) }}</strong></span></a></li>
      <li><a href="#"><i class="fa fa-thumbs-down text-red"></i> <span>Pasivo: <strong>{{ number_format($pasivos->total_sales) }}</strong></span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>