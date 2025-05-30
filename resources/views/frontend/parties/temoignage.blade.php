<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Temoignages</h5>
            <h1 class="mb-5">Ce que nos clients disent de nous!!!</h1>
        </div>

        @php
        $temoignages = App\Models\Temoignage::all();
    @endphp
        <div class="owl-carousel testimonial-carousel">
            @foreach($temoignages as $temoignage)
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>{{ $temoignage->message }}</p>
                <div class="d-flex align-items-center">
                    @if($temoignage->image)
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('storage/' . $temoignage->image) }}" style="width: 50px; height: 50px;">
                    @else
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="/galerie/back.jpg" style="width: 50px; height: 50px;">
                    @endif
                    <div class="ps-3">
                        <h5 class="mb-1">{{ $temoignage->nom }}</h5>
                        <small>{{ $temoignage->profession }}</small>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($temoignages) == 0)
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Aucun témoignage disponible pour le moment.</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="/galerie/back.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">En attente</h5>
                        <small>Client</small>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
