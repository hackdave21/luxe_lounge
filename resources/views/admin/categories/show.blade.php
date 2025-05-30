@extends('admin.layout')
@section('title', 'Détails de la catégorie')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Détails de la catégorie</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <h4>{{ $categorie->nom }}</h4>

                                    <div class="mt-4">
                                        <h5>Description</h5>
                                        <p class="text-muted">
                                            @if($categorie->description)
                                                {{ $categorie->description }}
                                            @else
                                                <em>Aucune description disponible</em>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="mt-4">
                                        <h5>Informations additionnelles</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th style="width: 30%">ID</th>
                                                    <td>{{ $categorie->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date de création</th>
                                                    <td>{{ $categorie->created_at->format('d/m/Y H:i') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dernière modification</th>
                                                    <td>{{ $categorie->updated_at->format('d/m/Y H:i') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary">
                                            <i class="fa fa-edit"></i> Modifier
                                        </a>
                                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                            <i class="fa fa-arrow-left"></i> Retour à la liste
                                        </a>
                                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie?')">
                                                <i class="fa fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
