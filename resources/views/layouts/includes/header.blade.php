<header class="main-header">
  <!-- Logo -->
  <a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">C<b>CL</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Cuentas<b>Claras</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li><!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                <!-- end message -->
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user-o"></i>
            @if(count($bills) > 0)
              <span class="label label-danger">{{ count($bills) }}</span>
            @else
              <span class="label label-danger"></span>
            @endif
          </a>
          <ul class="dropdown-menu">
            @if(count($bills) > 1)
              <li class="header text-center">Tienes {{ count($bills) }} deudas pendientes</li>
            @elseif(count($bills) == 1)
              <li class="header text-center">Tienes {{ count($bills) }} deuda pendiente</li>
            @else
              <li class="header">No tienes deudas pendientes</li>
            @endif
            <li>
              <!-- inner menu: contains the actual data -->
              @foreach($bills as $bill)
                <ul class="menu">
                  <li><!-- start message -->
                    <div class="row">
                      <div class="col-xs-4 text-center">
                          <h5 class="text-red">{{ number_format($bill->amount) }}</h5>
                      </div>
                      <div class="col-xs-8">
                        <a href="#">
                          <h6 class="margin-bottom-none">
                            {{ substr($bill->group->name,0,20) }}
                          </h6>
                        </a>
                        <small>{{ substr($bill->name,0,24) }}... </small> <br>
                        <small>{{ $bill->date }}</small> <br>
                      </div>
                    </div>
                  </li>
                  <!-- end message -->
                </ul>
              @endforeach
            </li>
            <li class="footer">
              <a href="{{ route('bills') }}">Ver mis deudas</a>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>