<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" id="footer">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Menu de navigation</h4>
                <a href="{{ route('home') }}" class="btn btn-link {{ Request::routeIs('home') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('about') }}" class="btn btn-link {{ Request::routeIs('about') ? 'active' : '' }}">A propos</a>
                <a href="{{ route('service') }}" class="btn btn-link {{ Request::routeIs('service') ? 'active' : '' }}">Services</a>
                <a href="{{ route('menu') }}" class="btn btn-link {{ Request::routeIs('menu') ? 'active' : '' }}">Menu</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jean-Paul 2, Lomé, TOGO</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+228 97 98 02 79</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>email@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Jours d'ouvertures</h4>
                <h5 class="text-light fw-normal">Lundi - Samedi</h5>
                <p>10H00 — 14H00</p>
                <p>15H30 — 23H00</p>
                <h5 class="text-light fw-normal">Dimanche</h5>
                <p>12H00 — 23H59</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Laissez nous votre email</h4>
                <p>Si vous souhaitez recevoir des mails nous concernant, veuillez nous laisser votre email</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">IVRIVRII Chicken</a>, Tous droits reservés.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="#">IVRIVRII</a><br><br>
                </div>
                {{-- <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
