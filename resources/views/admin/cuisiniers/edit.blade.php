@extends('admin.layout')
@section('title', 'Modifier un cuisinier')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Modifier le cuisinier</h3>
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

                    <form action="{{ route('cuisiniers.update', $cuisinier->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom">Nom du cuisinier</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ old('nom', $cuisinier->nom) }}"
                                placeholder="Ex: Jean Dupont" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="specialite">Spécialité</label>
                            <input type="text" class="form-control" id="specialite" name="specialite"
                                value="{{ old('specialite', $cuisinier->specialite) }}"
                                placeholder="Ex: Cuisine française, Pâtisserie...">
                        </div>

                        <div class="form-group mt-3">
                            <label for="experience">Années d'expérience</label>
                            <input type="number" class="form-control" id="experience" name="experience"
                                value="{{ old('experience', $cuisinier->experience) }}"
                                placeholder="Ex: 5" min="0">
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                placeholder="Décrivez le parcours et l'expertise du cuisinier...">{{ old('description', $cuisinier->description) }}</textarea>
                            <small class="form-text text-muted">Cette description apparaîtra sur la page de présentation de l'équipe.</small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="distinctions">Distinctions</label>
                            <textarea class="form-control" id="distinctions" name="distinctions" rows="3"
                                placeholder="Ex: Médaille d'or concours 2022, Formation chez...">{{ old('distinctions', $cuisinier->distinctions) }}</textarea>
                        </div>

                        <div class="form-group mt-3">
                            <label for="photo">Photo du cuisinier</label>
                            @if($cuisinier->photo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($cuisinier->photo) }}" alt="{{ $cuisinier->nom }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="photo" name="photo">
                            <small class="form-text text-muted">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB. Laissez vide pour conserver la photo actuelle.</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Mettre à jour
                            </button>
                            <a href="{{ route('cuisiniers.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
