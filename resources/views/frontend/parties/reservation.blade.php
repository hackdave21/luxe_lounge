<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s" id="reservation">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
                <img src="/galerie/p.jpg" alt="Cover vidéo" style="width: 100%; height: 100%; object-fit: cover;">
                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="/bouffe.mp4" data-bs-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Reserver une table depuis notre plateforme</h1>
                <form id="reservationForm" onsubmit="sendToWhatsApp(event)">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                <label for="name">Nom</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="numero" placeholder="ex. 96622110" required>
                                <label for="numero">Numéro de téléphone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" required />
                                <label for="datetime">Date et Heure</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="personnes" required>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                </select>
                                <label for="personnes">Nombre de personnes</label>
                              </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                <label for="message">Requête spécial (particularité)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Reserver maintenant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sendToWhatsApp(event) {
        event.preventDefault();

        // Récupération des données du formulaire
        const name = document.getElementById('name').value;
        const numero = document.getElementById('numero').value;
        const datetime = document.getElementById('datetime').value;
        const personnes = document.getElementById('personnes').value;
        const message = document.getElementById('message').value;

        // Construction du message
        let whatsappMessage = `*Réservation de Table*\n`;
        whatsappMessage += `Nom: ${name}\n`;
        whatsappMessage += `Numéro: ${numero}\n`;
        whatsappMessage += `Date et heure: ${datetime}\n`;
        whatsappMessage += `Nombre de personnes: ${personnes}\n`;

        if (message.trim() !== '') {
            whatsappMessage += `Message spécial: ${message}\n`;
        }

        // Encodage du message pour l'URL
        const encodedMessage = encodeURIComponent(whatsappMessage);

        window.location.href = `https://wa.me/22893617132?text=${encodedMessage}`;
    }
    </script>
