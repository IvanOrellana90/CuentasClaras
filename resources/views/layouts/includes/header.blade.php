<!-- Main Navbar-->
<header class="header">
    <nav class="navbar">
        <!-- Search Box-->
        <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
                <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
        </div>
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big"><span>Cuentas </span><strong>Claras</strong></div>
                        <div class="brand-text brand-small"><strong>CC</strong></div></a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Search-->
                    <li class="nav-item "><a id="search" href="#"><i class="icon-search"></i></a></li>
                    <!-- Notifications-->
                    <li class="nav-item dropdown">
                        <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i>
                            @if($user->debts->where('state',0)->count() > 0)
                                <span class="badge bg-red">{{ $user->debts->where('state',0)->count() }}</span>
                            @endif
                        </a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            @foreach($user->debts->where('state',0)->sortBy('created_at', SORT_REGULAR, true)->slice(0, 4) as $debt)
                                <li><a rel="nofollow" href="#" class="dropdown-item">
                                        <div class="notification row">
                                            <div class="col-lg-2">
                                                <img src="{{ URL::to('img/avatars') }}/{{$debt->ticket->user->avatar}}.jpg" ></img>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="notification-deuda">
                                                    Le debes <strong class="text-red">{{ $debt->amount }}</strong> a <br>{{ $debt->ticket->user->name ." ". $debt->ticket->user->lastName }}
                                                    <br> <div class="notification-time"><small>{{ $debt->created_at }}</small></div>
                                                </div>
                                            </div>
                                        </div></a></li>
                            @endforeach
                            <li style="text-align:center"><strong><a href="{{ route('tickets') }}">Ver todos los tickets</a></strong></li>
                        </ul>
                    </li>
                    <!-- Messages                        -->
                    <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                    <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                    </div></a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                        </ul>
                    </li>
                    <!-- Logout    -->
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>