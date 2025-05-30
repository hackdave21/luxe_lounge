@extends('admin.layout')

@section('title', 'Accueil')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tableau de bord du restaurant</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Générer un rapport</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Categories -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Catégories de plats</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ isset($categories) ? $categories->count() : \App\Models\Categorie::count() }}
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-utensils fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plats -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                   Plats au menu</div>
                                   <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ isset($plats) ? $plats->count() : \App\Models\Plat::count() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hamburger fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menus du jour -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Menus du jour
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ isset($menudujours) ? $menudujours->count() : \App\Models\Menudujour::count() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cuisiniers -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Cuisiniers</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ isset($cuisiniers) ? $cuisiniers->count() : \App\Models\Cuisinier::count() }}
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-chef fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
