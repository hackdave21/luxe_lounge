@extends('admin.layout')
@section('title', 'Liste des catégories')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-amber-600 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-blue m-0">Liste des catégories de menu</h3>
                    <a href="{{ route('categories.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Ajouter une catégorie
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
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th class="text-center">Plats associés</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td class="fw-bold">{{ $categorie->nom }}</td>
                                        <td>{{ Str::limit($categorie->description, 50) }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-amber-500">{{ $categorie->plats_count ?? 0 }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center" style="gap: 12px;">
                                                <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-sm btn-info mx-1" title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-warning mx-1" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline mx-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($categories) == 0)
                                    <tr>
                                        <td colspan="4" class="text-center py-3">
                                            <div class="text-muted">
                                                <i class="fas fa-info-circle me-2"></i>Aucune catégorie de menu n'a été créée
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($categories, 'links'))
                        <div class="mt-4">
                            {{ $categories->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
