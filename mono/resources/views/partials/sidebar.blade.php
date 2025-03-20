<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <a class="nav-link" href="index.html">
                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                Inicio
            </a>
            <div class="sb-sidenav-menu-heading">Datos</div>
            <!-- tablas -->
            <a class="nav-link" href="{{ route('clientes') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Clientes
            </a>
            <a class="nav-link" href="{{ route('monos') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                Moños
            </a>
            <a class="nav-link" href="{{ route('ventas') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                Ventas
            </a>
            <a class="nav-link" href="{{ route('detalles') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                Detalles
            </a>

            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>