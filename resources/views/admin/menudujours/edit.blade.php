@extends('admin.layout')
@section('title', 'Modifier un menu du jour')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Modifier le menu du jour</h3>
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

                    <form action="{{ route('menudujours.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom">Nom du menu</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ old('nom', $menu->nom) }}"
                                placeholder="Ex: Menu Découverte, Menu du Chef, Formule Midi..." required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="prix">Prix</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="prix" name="prix"
                                    value="{{ old('prix', $menu->prix) }}" placeholder="8500" required>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                placeholder="Décrivez les plats inclus dans ce menu...">{{ old('description', $menu->description) }}</textarea>
                            <small class="form-text text-muted">Cette description apparaîtra sur la carte de votre restaurant.</small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image">Image du menu</label>
                            @if($menu->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->nom }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB. Laissez vide pour conserver l'image actuelle.</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Mettre à jour
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