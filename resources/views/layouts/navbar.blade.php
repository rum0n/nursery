
<nav class="my_nav navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            {{--<a class="navbar-brand" href="" style="">My Nursery</a>--}}
                    <!-- My Nursery -->
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}"> <span>Home</span> </a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endguest

            @auth
            <li class="nav-item" style="position: absolute; right: 0px; padding-left: 5px">
                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span style="color: white;"> {{ Auth::user()->name }} <span class="caret"></span></span>

                </a>
                <span class="user_type">{{Auth::user()->role->name}}</span>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                    <ul>
                        {{--<li>--}}
                            {{--<a class="dropdown-item"> {{ __('Edit Profile') }}</a>--}}
                        {{--</li>--}}
                        {{--<hr>--}}
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span>{{ __('Logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </div>
            </li>
            <li class="nav-item">
                @if(Auth::user()->role_id==1)
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin*') ? 'active' : '' }}"><span>Dashboard</span></a>
                @elseif(Auth::user()->role_id==2)
                    <a href="{{ route('owner.dashboard') }}" class="nav-link {{ Request::is('owner*') ? 'active' : '' }}"><span>Dashboard</span></a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}"><span>Dashboard</span></a>
                @endif
            </li>
            @endauth

        </ul>


    </div>
</nav>

<style>
    .navbar-inverse .navbar-nav > li > a {
        color: #15dce6;
    }

    .navbar-inverse .navbar-nav > li > a:hover {
        background: #15dce6;
        color: #FFFFFF;
    }

    .navbar-inverse .navbar-nav > li > .active{
        background: #FFFFFF;
        color: #000000;
    }

    .dropdown-menu ul > li > a{
        color: #FFFFFF;
    }

    .dropdown-menu ul > li > a:hover{
        /*color: #00f221;*/
        color: black;
    }

</style>