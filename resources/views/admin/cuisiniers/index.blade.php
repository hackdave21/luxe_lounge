@extends('admin.layout')
@section('title', 'Liste des cuisiniers')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-amber-600 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-blue m-0">Liste des cuisiniers</h3>
                    <a href="{{ route('cuisiniers.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Ajouter un cuisinier
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-1"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 10%">Photo</th>
                                    <th>Nom</th>
                                    <th>Spécialité</th>
                                    <th>Expérience</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuisiniers as $cuisinier)
                                    <tr>
                                        <td class="text-center">
                                            @if($cuisinier->photo)
                                                <img src="{{ Storage::url($cuisinier->photo) }}" alt="{{ $cuisinier->nom }}" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                    <i class="fas fa-user text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="fw-bold">{{ $cuisinier->nom }}</td>
                                        <td>
                                            @if($cuisinier->specialite)
                                                <span class="badge bg-primary">{{ $cuisinier->specialite }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($cuisinier->experience)
                                                <span class="badge bg-amber-500">{{ $cuisinier->experience }} ans</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($cuisinier->description, 50) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center" style="gap: 12px;">
                                                <a href="{{ route('cuisiniers.show', $cuisinier->id) }}" class="btn btn-sm btn-info mx-1" title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('cuisiniers.edit', $cuisinier->id) }}" class="btn btn-sm btn-warning mx-1" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('cuisiniers.destroy', $cuisinier->id) }}" method="POST" class="d-inline mx-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cuisinier ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($cuisiniers) == 0)
                                    <tr>
                                        <td colspan="6" class="text-center py-3">
                                            <div class="text-muted">
                                                <i class="fas fa-info-circle me-2"></i>Aucun cuisinier n'a été ajouté
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($cuisiniers, 'links'))
                        <div class="mt-4">
                            {{ $cuisiniers->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
