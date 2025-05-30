@extends('admin.layout')
@section('title', 'Ajouter un menu du jour')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Ajouter un nouveau menu du jour</h3>
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

                    <form action="{{ route('menudujours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="nom">Nom du menu</label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}"
                                        placeholder="Ex: Menu Découverte" required>
                                    @error('nom')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="prix">Prix</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" value="{{ old('prix') }}"
                                            placeholder="Ex: 8500" required>
                                        <span class="input-group-text">FCFA</span>
                                    </div>
                                    @error('prix')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Le prix du menu du jour en FCFA</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Description du menu</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5"
                                        placeholder="Décrivez le menu et ses composants...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Une description détaillée des plats inclus dans ce menu.</small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Image du menu</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                            @error('image')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            <small class="form-text text-muted">Format recommandé: JPG, PNG - Max 2MB</small>
                                        </div>

                                        <div class="text-center mt-3 p-3 bg-light rounded">
                                            <i class="fa fa-image fa-4x text-muted"></i>
                                            <p class="mt-2">Aperçu de l'image</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Enregistrer
                            </button>
                            <a href="{{ route('menudujours.index') }}" class="btn btn-secondary">
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
