@extends('admin.layout')
@section('title', 'Détails du menu du jour')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Détails du menu du jour : {{ $menu->nom }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Image à gauche -->
                        <div class="col-md-4">
                            @if($menu->image)
                                <div class="text-center mb-3">
                                    <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->nom }}" class="img-fluid rounded" style="max-height: 300px;">
                                </div>
                            @else
                                <div class="text-center mb-3 p-4 bg-light rounded">
                                    <i class="fa fa-image fa-4x text-muted"></i>
                                    <p class="mt-2">Aucune image disponible</p>
                                </div>
                            @endif
                        </div>

                        <!-- Détails à droite -->
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="mb-3">Informations principales</h4>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Nom :</div>
                                        <div class="col-md-9">{{ $menu->nom }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Prix :</div>
                                        <div class="col-md-9">{{ number_format($menu->prix) }} FCFA</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Description :</div>
                                        <div class="col-md-9">
                                            @if($menu->description)
                                                {{ $menu->description }}
                                            @else
                                                <span class="text-muted">Aucune description</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Informations additionnelles</h4>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">ID :</div>
                                        <div class="col-md-9">{{ $menu->id }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Date de création :</div>
                                        <div class="col-md-9">{{ $menu->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Dernière modification :</div>
                                        <div class="col-md-9">{{ $menu->updated_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('menudujours.edit', $menu->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Modifier
                        </a>
                        <a href="{{ route('menudujours.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>

                        <form action="{{ route('menudujours.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce menu du jour ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
