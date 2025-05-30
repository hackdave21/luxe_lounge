@extends('admin.layout')
@section('title', 'Ajouter un plat')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Ajouter un nouveau plat au menu</h3>
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

                    <form action="{{ route('plats.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom du plat</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}"
                                placeholder="Ex: Poulet rôti, Salade César, Tarte aux pommes..." required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="prix">Prix</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="prix" name="prix"
                                    value="{{ old('prix') }}" placeholder="2500" required>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="categorie_id">Catégorie</label>
                            <select class="form-control" id="categorie_id" name="categorie_id" required>
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Sélectionnez la catégorie à laquelle appartient ce plat.</small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                placeholder="Décrivez les ingrédients et la préparation du plat...">{{ old('description') }}</textarea>
                            <small class="form-text text-muted">Cette description apparaîtra sur le menu de votre restaurant.</small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="image">Image du plat</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="form-text text-muted">Formats acceptés: JPG, PNG, GIF. Taille max: 2MB</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <a href="{{ route('plats.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
