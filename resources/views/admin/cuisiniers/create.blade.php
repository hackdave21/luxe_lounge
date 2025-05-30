@extends('admin.layout')
@section('title', 'Ajouter un cuisinier')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Ajouter un nouveau cuisinier</h3>
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

                    <form action="{{ route('cuisiniers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="nom">Nom du cuisinier</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}"
                                        placeholder="Ex: Jean Dupont" required>
                                    @error('nom')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="specialite">Spécialité</label>
                                    <input type="text" class="form-control @error('specialite') is-invalid @enderror" id="specialite" name="specialite" value="{{ old('specialite') }}"
                                        placeholder="Ex: Cuisine française, Desserts, etc.">
                                    @error('specialite')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">La spécialité culinaire principale du cuisinier</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Biographie / Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5"
                                        placeholder="Présentez ce cuisinier, son parcours, ses compétences...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Cette description pourra être affichée sur la page du restaurant.</small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="photo">Photo du cuisinier</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                    @error('photo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Format recommandé: JPG, PNG - Max 2MB</small>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h5 class="card-title">Informations complémentaires</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="experience">Années d'expérience</label>
                                            <input type="number" class="form-control @error('experience') is-invalid @enderror" id="experience" name="experience" value="{{ old('experience') }}" min="0">
                                            @error('experience')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="distinctions">Distinctions / Récompenses</label>
                                            <textarea class="form-control @error('distinctions') is-invalid @enderror" id="distinctions" name="distinctions" rows="3"
                                                placeholder="Ex: Médaille d'or du meilleur pâtissier 2022">{{ old('distinctions') }}</textarea>
                                            @error('distinctions')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Enregistrer
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
