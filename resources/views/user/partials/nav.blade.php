<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('user.home') }}"  href="{{ route('user.home') }}">
                    <span data-feather="lock"></span> &nbsp Domov </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('user.home') }}">
                    <span data-feather="folder"></span> &nbsp Moje inzeráty </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isActiveRoute('user.office') }}" href="{{ route('user.office') }}">
                    <span data-feather="coffee"></span>
                    &nbsp Realitná kancelária
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.home') }}" style="margin-left: 12px">
                    <span data-feather="archive"></span>
                    &nbsp Inzeráty
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isActiveRoute('user.office.employees') }}" href="{{ route('user.office.employees') }}" style="margin-left: 12px">
                    <span data-feather="users"></span>
                    &nbsp Zamestnanci
                </a>
            </li>
            @auth
                @if(strcmp(Auth::user()->status,'správca') == 0)
                    <li class="nav-item">
                        <a class="nav-link {{ isActiveRoute('user.office.requests') }}" href="{{ route('user.office.requests') }}" style="margin-left: 12px">
                            <span data-feather="file-plus"></span>
                            &nbsp Žiadosti
                        </a>
                    </li>
                @endif
            @endauth

        </ul>
    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
</nav>