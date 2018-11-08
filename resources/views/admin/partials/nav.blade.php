<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.home') }}"  href="{{ route('admin.home') }}">
                    <span data-feather="home"></span> Domov </a>
            </li>

           <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ isActiveRoute('admin.users.index') }}" data-toggle="dropdown" href="{{ route('admin.users.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="users"></span>
                    Používatelia
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item {{ isActiveRoute('admin.users.index') }}" href="{{ route('admin.users.index') }}">
                        <span data-feather="list"></span>
                        Zoznam</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item {{ isActiveRoute('admin.users.create') }}" href="{{ route('admin.users.create') }}">
                        <span data-feather="user-plus"></span>
                        Pridať
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ isActiveRoute('admin.realestateoffices.index') }}" data-toggle="dropdown" href="{{ route('admin.realestateoffices.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="github"></span>
                    Realitné kancelárie
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item {{ isActiveRoute('admin.realestateoffices.index') }}" href="{{ route('admin.realestateoffices.index') }}">
                        <span data-feather="list"></span>
                        Zoznam</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item {{ isActiveRoute('admin.realestateoffices.create') }}" href="{{ route('admin.realestateoffices.create') }}">
                        <span data-feather="user-plus"></span>
                        Pridať
                    </a>
                </div>
            </li>-->

<!-- testik a Janku boli zebvo!-->
            <li>
                <a class="collapsible nav-item" role="button">
                    <span data-feather="users"></span>
                    Používatelia
                    <span data-feather="chevron-down"></span></a>

                <div class="content">
                    <a class="dropdown-item {{ isActiveRoute('admin.users.index') }}" href="{{ route('admin.users.index') }}">
                        <span data-feather="list"></span>
                        Zoznam
                    </a>
                    <a class="dropdown-item {{ isActiveRoute('admin.users.create') }}" href="{{ route('admin.users.create') }}">
                        <span data-feather="user-plus"></span>
                        Pridať
                    </a>
                </div>


            </li>
            <li>
                <a class="collapsible nav-item" role="button">
                    <span data-feather="github"></span>
                     Realitné kancelárie
                    <span data-feather="chevron-down"></span></a>

                <div class="content">
                    <a class="dropdown-item {{ isActiveRoute('admin.realestateoffices.index') }}" href="{{ route('admin.realestateoffices.index') }}">
                        <span data-feather="list"></span>
                        Zoznam
                    </a>
                    <a class="dropdown-item {{ isActiveRoute('admin.realestateoffices.create') }}" href="{{ route('admin.realestateoffices.create') }}">
                        <span data-feather="user-plus"></span>
                        Pridať
                    </a>
                </div>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>-->
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