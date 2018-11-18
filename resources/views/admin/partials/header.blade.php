<nav class="navbar navbar-dark  fixed-top flex-md-nowrap p-0" style="background-color:#3B3B53">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('admin.home') }}"
       style="font-family: 'Open Sans', sans-serif; font-size: 18px; color:#fff; letter-spacing: 5px; ">
        <strong>DO-BY-PO</strong>
    </a>
    <ul class="navbar-nav pr-3" style="flex-direction: row;">
        <li class="nav-item px-3">
            <a class="nav-link" href="#">
                <span data-feather="message-square"></span>
            </a>
        </li>
        <li class="nav-item pr-3">
            <a class="nav-link" href="#">
                <span data-feather="bell"></span>
            </a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                <span data-feather="log-out"></span>
                {{ __('Odhlásiť sa') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            {{--<a class="nav-link" href="{{ route('logout') }}">Sign out</a>--}}
        </li>
    </ul>
</nav>