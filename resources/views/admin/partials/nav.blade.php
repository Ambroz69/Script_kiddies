<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.home') }}"  href="{{ route('admin.home') }}">
                    <span data-feather="home"></span> &nbsp Domov </a>
            </li>

        <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.users.index') }}" href="{{ route('admin.users.index') }}">
                    <span data-feather="users"></span>
                    &nbsp Používatelia
                </a>
            </li>

       <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.addresses.index') }}" href="{{ route('admin.addresses.index') }}">
                    <span data-feather="mail"></span>
                    &nbsp Adresy
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.realestateoffices.index') }}" href="{{ route('admin.realestateoffices.index') }}">
                    <span data-feather="coffee"></span>
                    &nbsp Realitné kancelárie
                </a>
            </li>

            <li class="nav-item" id="fialova">
                <a class="nav-link{{ isActiveRoute('admin.ads.index') }}" href="{{ route('admin.ads.index') }}">
                    <span data-feather="file"></span>
                    &nbsp Inzeráty
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.houses.index') }}" href="{{ route('admin.houses.index') }}" style="margin-left: 12px">
                    <span data-feather="circle"></span>
                    &nbsp Domy
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.apartments.index') }}" href="{{ route('admin.apartments.index') }}" style="margin-left: 12px">
                    <span data-feather="circle"></span>
                    &nbsp Byty
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.estates.index') }}" href="{{ route('admin.estates.index') }}" style="margin-left: 12px">
                    <span data-feather="disc"></span>
                    &nbsp Pozemky
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link{{ isActiveRoute('admin.propertydetails.index') }}" href="{{ route('admin.propertydetails.index') }}" style="margin-left: 12px">
                    <span data-feather="box"></span>
                    &nbsp Detaily nehnuteľností
                </a>
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