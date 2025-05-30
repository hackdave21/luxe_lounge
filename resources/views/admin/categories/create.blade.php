@extends('admin.layout')
@section('title', 'Ajouter une catégorie')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Ajouter une nouvelle catégorie de menu</h3>
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

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom de la catégorie</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}"
                                placeholder="Ex: Entrées, Plats principaux, Desserts..." required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                placeholder="Décrivez cette catégorie de menu...">{{ old('description') }}</textarea>
                            <small class="form-text text-muted">Cette description apparaîtra sur le menu de votre restaurant.</small>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
