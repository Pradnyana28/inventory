@guest
    <div class="navbar-header mt-5 ml-5">
        <a class="navbar-brand" href="index.html"> <img src="{{ asset('images/logo-t.png') }}" alt="homepage" class="dark-logo"> </a> 
    </div>
@else
    <header class="topbar">
    <div class="container">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ config('app.url') }}">
                    <!-- Logo icon -->
                    <b>
                        <img src="{{ asset('images/logo-icon.png') }}" alt="homepage" class="dark-logo"/>
                        <!-- Light Logo icon -->
                        <img src="{{ asset('images/logo-light-icon.png') }}" alt="homepage" class="light-logo"/>
                    </b>

                    <span>
                        <!-- dark Logo text -->
                        <img src="{{ asset('images/logo-text.png') }}" alt="homepage" class="dark-logo dark-logo2"/>
                        <!-- Light Logo text -->
                        <img src="{{ asset('images/logo-light-text.png') }}" class="light-logo" alt="homepage"/>
                    </span> 
                </a>
            </div>

            <div class="top-bar-main">
                <!-- User profile and search -->
                <div class="float-right pr-3">
                    <ul class="navbar-nav my-lg-0 float-right">
                        <!-- Profile -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('images/no_avatar.jpg') }}" alt="user-img">
                                <span class="circle-status"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                                <ul class="dropdown-user">
                                    <li class="text-center">
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <img src="{{ asset('images/no_avatar.jpg') }}" alt="user-img">
                                                <div class="clearfix"></div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->nama_user }}</h4>
                                                    <p class="text-dark"><span class="status-circle bg-success"></span>{{ Auth::user()->jabatan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-in-alt mr-1"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </nav>
    </div>
</header>
@endguest