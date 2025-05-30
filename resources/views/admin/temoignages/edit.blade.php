@extends('admin.layout')
@section('title', 'Modifier un témoignage')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Modifier le témoignage</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('temoignages.update', $temoignage->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom">Nom du client</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ old('nom', $temoignage->nom) }}"
                                placeholder="Ex: John Doe" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" id="profession" name="profession"
                                value="{{ old('profession', $temoignage->profession) }}"
                                placeholder="Ex: Chef d'entreprise" required>
                            <small class="form-text text-muted">La profession ou le statut de la personne qui témoigne.</small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5"
                                placeholder="Saisissez le témoignage du client...">{{ old('message', $temoignage->message) }}</textarea>
                            <small class="form-text text-muted">Le témoignage complet du client à propos de votre restaurant.</small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image">Photo du client</label>
                            @if($temoignage->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $temoignage->image) }}" alt="{{ $temoignage->nom }}"
                                         class="img-thumbnail rounded-circle" style="max-height: 150px; max-width: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB. Laissez vide pour conserver l'image actuelle.</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('temoignages.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
