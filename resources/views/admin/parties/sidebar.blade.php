<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background: black">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
          <h4 class="m-0 fs-5" style="color: #FEA116"><i class="fa fa-utensils me-2"></i><STRONg>LUX LOUNGE</STRONg></h4>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Liste
    </div>

    <!-- Gestion des Catégories avec sous-menus -->
    <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
           aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-tags"></i>
            <span>Catégories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('categories.create') }}">Ajouter catégorie</a>
                <a class="collapse-item" href="{{ route('categories.index') }}">Voir tout</a>
            </div>
        </div>
    </li>

    <!-- Gestion des Plats  -->
    <li class="nav-item {{ request()->routeIs('plats.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlats"
           aria-expanded="true" aria-controls="collapsePlats">
            <i class="fas fa-utensils"></i>
            <span>Plats</span>
        </a>
        <div id="collapsePlats" class="collapse" aria-labelledby="headingPlats" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('plats.create') }}">Ajouter plat</a>
                <a class="collapse-item" href="{{ route('plats.index') }}">Voir tous les plats</a>
            </div>
        </div>
    </li>

    <!-- Menu du jour  -->
    {{-- <li class="nav-item {{ request()->routeIs('menudujours.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenusDuJour"
           aria-expanded="true" aria-controls="collapseMenusDuJour">
            <i class="fas fa-concierge-bell"></i>
            <span>Menus du jour</span>
        </a>
        <div id="collapseMenusDuJour" class="collapse" aria-labelledby="headingMenusDuJour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('menudujours.create') }}">Ajouter menu</a>
                <a class="collapse-item" href="{{ route('menudujours.index') }}">Voir tout</a>
            </div>
        </div>
    </li> --}}

    <!-- Gestion des Cuisiniers -->
    <li class="nav-item {{ request()->routeIs('cuisiniers.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCuisiniers"
           aria-expanded="true" aria-controls="collapseCuisiniers">
            <i class="fas fa-user-tie"></i>
            <span>Cuisiniers</span>
        </a>
        <div id="collapseCuisiniers" class="collapse" aria-labelledby="headingCuisiniers" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('cuisiniers.create') }}">Ajouter cuisinier</a>
                <a class="collapse-item" href="{{ route('cuisiniers.index') }}">Voir tous</a>
            </div>
        </div>
    </li>

     <!-- Gestion des Temoiganges  -->
     <li class="nav-item {{ request()->routeIs('temoignages.*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTemoignages"
           aria-expanded="true" aria-controls="collapseTemoignages">
            <i class="fas fa-user-tie"></i>
            <span>Temoignages</span>
        </a>
        <div id="collapseTemoignages" class="collapse" aria-labelledby="headingTemoignages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('temoignages.create') }}">Ajouter temoignage</a>
                <a class="collapse-item" href="{{ route('temoignages.index') }}">Voir tout</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
