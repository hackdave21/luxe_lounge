<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Equipe IVRIVRII</h5>
            <h1 class="mb-5">Nos chefs</h1>
        </div>
        <div class="row g-4">
            @php
                $cuisiniers = App\Models\Cuisinier::all();
            @endphp

            @forelse($cuisiniers as $cuisinier)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.2 }}s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <!-- Conteneur d'image modifié pour prendre toute la largeur et aller jusqu'au bord supérieur -->
                        <div class="team-img-container">
                            @if($cuisinier->photo)
                                <img src="{{ Storage::url($cuisinier->photo) }}" alt="{{ $cuisinier->nom }}">
                            @else
                                <img src="{{ asset('img/chef-default.jpg') }}" alt="{{ $cuisinier->nom }}">
                            @endif
                        </div>
                        <div class="team-content p-4">
                            <h5 class="mb-0">{{ $cuisinier->nom }}</h5>
                            <small>{{ $cuisinier->specialite ?: 'Chef cuisinier' }}</small>

                            <div class="py-3">
                                @if($cuisinier->experience)
                                    <p class="mb-2"><i class="fas fa-star text-primary me-2"></i>{{ $cuisinier->experience }} ans d'expérience</p>
                                @endif
                                @if($cuisinier->distinctions)
                                    <p class="mb-0"><i class="fas fa-award text-primary me-2"></i>{{ $cuisinier->distinctions }}</p>
                                @endif
                            </div>

                            <div class="d-flex justify-content-center mt-2">
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>Aucun chef n'est disponible pour le moment.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    /* Styles pour les cartes des chefs */
    .team-item {
        position: relative;
        height: 100%;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
    }

    .team-img-container {
        width: 100%;
        height: 250px; /* Hauteur fixe pour toutes les images */
        overflow: hidden;
        margin: 0; /* Suppression des marges */
        padding: 0; /* Suppression des paddings */
    }

    .team-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Pour couvrir tout l'espace sans déformer l'image */
        object-position: center top; /* Position l'image en haut */
    }

    .team-content {
        background-color: #fff;
        position: relative;
    }

    .team-item:hover {
        transform: translateY(-10px);
    }
</style>
