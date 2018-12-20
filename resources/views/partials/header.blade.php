<nav class="navbar navbar-dark  fixed-top flex-md-nowrap p-0 mb-5" style="background-color:#3B3B53">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}"
       style="font-family: 'Open Sans', sans-serif; font-size: 18px; color:#fff; letter-spacing: 5px; ">
        <strong>DO-BY-PO</strong>
    </a>
   <ul class="navbar-nav pr-3" style="flex-direction: row; font-size: 12px">
        {{--<li class="nav-item px-3">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<span data-feather="message-square"></span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item pr-3">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<span data-feather="bell"></span>--}}
            {{--</a>--}}
        {{--</li>--}}
        @auth
            @if(auth()->user()->isAdmin)
                <li class="nav-item text-nowrap pr-3">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        {{ __('ADMINISTRÁCIA') }}
                    </a>
                </li>
            @endif
        @endauth
        @guest
            <li class="nav-item text-nowrap pr-3">
                <a class="nav-link" href="{{ route('login') }}" style="color: white">
                    {{ __('PRIHLÁSENIE') }}
                </a>
            </li>
            <li class="nav-item text-nowrap pr-3">
                <a class="nav-link" href="{{ route('register') }}" style="color: white">
                    {{ __('REGISTRÁCIA') }}
                </a>
            </li>
        @endguest
        @auth
           <li class="nav-item text-nowrap pr-3">
               <label style="color: white; margin-top: 0.5em">
                   <strong>{{ \Illuminate\Support\Facades\Auth::user()->surname }} {{ \Illuminate\Support\Facades\Auth::user()->lastname }}</strong>
                   ({{ \Illuminate\Support\Facades\Auth::user()->email }})
               </label>
           </li>
           <li class="nav-item text-nowrap pr-3">
               <a class="nav-link" href="{{ route('user.home') }}" style="color: white;">
                   <strong>{{ __('Môj profil') }}</strong>
               </a>
           </li>
            <li class="nav-item text-nowrap pr-3">
                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link"
                   href="{{ route('logout') }}" style="color: white;">
                    <strong>{{ __('ODHLÁSIŤ SA') }}</strong>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </ul>
</nav>