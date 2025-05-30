@extends('frontend.layout')

@section('content')


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('galerie/1.jpg')}}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{asset('galerie/10.jpg')}}" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{asset('galerie/7.jpg')}}">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{asset('galerie/8.jpg')}}">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{asset('galerie/11.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">A Propos de nous</h5>
                <h1 class="mb-4">Bienvenue sur <i class="fa fa-utensils text-primary me-2"></i>IVRIVRII</h1>
                <p class="mb-4">
                    Découvrez IVRIVRII, un restaurant unique créé au Togo, avec une ambition mondiale. Le nom "Ivrivriii" signifie "Everybody pour la conquête du monde", et notre mission est claire : vous offrir une expérience culinaire mémorable, où que vous soyez.
                </p>
                <p class="mb-4">
                    Explorez un menu riche en saveurs avec nos délicieuses spécialités de poulet, burgers, sandwiches et plats-minutes. La clé de notre succès ? Une qualité constante, des ingrédients frais, et un service irréprochable. Que vous veniez pour manger sur place ou commander à emporter, IVRIVRII vous garantit une satisfaction totale.
                </p>
                <p class="mb-4">
                    Dégustez nos plats savoureux, sirotez une boisson rafraîchissante, et surtout... détendez-vous ! Nous vous remercions pour votre fidélité et votre confiance. Avec IVRIVRII, la conquête du monde continue — et vous en faites partie.
                </p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="ps-4">
                                <p class="mb-0">ans </p>
                                <h6 class="text-uppercase mb-0">d'experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">10</h1>
                            <div class="ps-4">
                                <p class="mb-0">Plus de </p>
                                <h6 class="text-uppercase mb-0">Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Voir plus</a>
            </div>
        </div>
    </div>
</div>


@endsection
