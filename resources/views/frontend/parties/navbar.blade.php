<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>IVRIVRII Chicken</h1>
            {{-- <img src="{{asset('galerie/logo.png')}}" alt="Logo" height="90px"> --}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('about') }}" class="nav-item nav-link {{ Request::routeIs('about') ? 'active' : '' }}">A propos</a>
                <a href="{{ route('service') }}" class="nav-item nav-link {{ Request::routeIs('service') ? 'active' : '' }}">Services</a>
                <a href="{{ route('menu') }}" class="nav-item nav-link {{ Request::routeIs('menu') ? 'active' : '' }}">Menu</a>
                <a href="#footer" class="nav-item nav-link ">Contact</a>
                  {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="booking.html" class="dropdown-item">Booking</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    </div>
                </div> --}}
            </div>
            <a href="#reservation" class="btn btn-primary py-2 px-4">Reserver une table</a>
        </div>
    </nav>

    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Savourez nos<br>Délicieux Plats</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">
                    Venez vivre une expérience culinaire inoubliable chez <strong>IVRIVRII Chicken</strong>, situé au cœur de <strong>Lomé</strong>.
                    Nos plats sont préparés avec passion, à base d’ingrédients frais et locaux. Que vous soyez amateur de poulet braisé, de grillades ou de saveurs africaines authentiques,
                    notre restaurant est l’endroit idéal pour satisfaire vos envies gourmandes. Rejoignez-nous et laissez-vous séduire par l’ambiance chaleureuse et conviviale de notre équipe.
                </p>
                    <a href="#reservation" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Reserver une table</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="{{asset('frontend/img/hero.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
