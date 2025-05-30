@extends('frontend.layout')

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Notre Menu</h5>
            <h1 class="mb-5">Découvrez notre sélection de plats</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <!-- Chargement des modèles -->
            @php
                $categories = App\Models\Categorie::all();
                $plats = App\Models\Plat::all();
            @endphp
            <!-- Onglets des catégories -->
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                @foreach($categories as $index => $categorie)
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 {{ $index === 0 ? 'ms-0 pb-3 active' : 'pb-3' }}"
                       data-bs-toggle="pill" href="#tab-{{ $categorie->id }}">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Menu</small>
                            <h6 class="mt-n1 mb-0">{{ $categorie->nom }}</h6>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>

            <!-- Contenu des onglets -->
            <div class="tab-content">
                @foreach($categories as $index => $categorie)
                <div id="tab-{{ $categorie->id }}" class="tab-pane fade show p-0 {{ $index === 0 ? 'active' : '' }}">
                    <div class="row g-4">
                        @php
                            $platsCategorie = $plats->where('categorie_id', $categorie->id);
                        @endphp

                        @forelse($platsCategorie as $plat)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                @if($plat->image)
                                <img class="flex-shrink-0 img-fluid rounded" src="{{ Storage::url($plat->image) }}" alt="{{ $plat->nom }}" style="width: 80px; height: 80px; object-fit: cover;">
                                @else
                                <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('img/default-dish.jpg') }}" alt="{{ $plat->nom }}" style="width: 80px; height: 80px; object-fit: cover;">
                                @endif
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{ $plat->nom }}</span>
                                        <span class="text-primary">{{ number_format($plat->prix) }} FCFA</span>
                                    </h5>
                                    <small class="fst-italic">{{ $plat->description }}</small>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-info-circle me-2"></i>Aucun plat disponible dans cette catégorie
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                @endforeach

                @if(count($categories) == 0)
                <div class="col-12 text-center py-4">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>Aucune catégorie de menu n'a été créée
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
