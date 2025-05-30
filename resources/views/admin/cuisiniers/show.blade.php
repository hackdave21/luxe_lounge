@extends('admin.layout')
@section('title', 'Détails du cuisinier')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Détails du cuisinier : {{ $cuisinier->nom }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Photo à gauche -->
                        <div class="col-md-4">
                            @if($cuisinier->photo)
                                <div class="text-center mb-3">
                                    <img src="{{ Storage::url($cuisinier->photo) }}" alt="{{ $cuisinier->nom }}" class="img-fluid rounded" style="max-height: 300px;">
                                </div>
                            @else
                                <div class="text-center mb-3 p-4 bg-light rounded">
                                    <i class="fa fa-user fa-4x text-muted"></i>
                                    <p class="mt-2">Aucune photo disponible</p>
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
                                        <div class="col-md-9">{{ $cuisinier->nom }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Spécialité :</div>
                                        <div class="col-md-9">
                                            @if($cuisinier->specialite)
                                                {{ $cuisinier->specialite }}
                                            @else
                                                <span class="text-muted">Non spécifiée</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Expérience :</div>
                                        <div class="col-md-9">
                                            @if($cuisinier->experience)
                                                {{ $cuisinier->experience }} ans
                                            @else
                                                <span class="text-muted">Non spécifiée</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Description :</div>
                                        <div class="col-md-9">
                                            @if($cuisinier->description)
                                                {{ $cuisinier->description }}
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
                                        <div class="col-md-9">{{ $cuisinier->id }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Distinctions :</div>
                                        <div class="col-md-9">
                                            @if($cuisinier->distinctions)
                                                {{ $cuisinier->distinctions }}
                                            @else
                                                <span class="text-muted">Aucune distinction</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Date de création :</div>
                                        <div class="col-md-9">{{ $cuisinier->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Dernière modification :</div>
                                        <div class="col-md-9">{{ $cuisinier->updated_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('cuisiniers.edit', $cuisinier->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Modifier
                        </a>
                        <a href="{{ route('cuisiniers.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>

                        <form action="{{ route('cuisiniers.destroy', $cuisinier->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce cuisinier ?');">
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
