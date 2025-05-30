@extends('admin.layout')
@section('title', 'Liste des plats')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-amber-600 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-blue m-0">Liste des plats du menu</h3>
                    <a href="{{ route('plats.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Ajouter un plat
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
                                    <th>Catégorie</th>
                                    <th class="text-center">Prix</th>
                                    <th>Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plats as $plat)
                                    <tr>
                                        <td class="fw-bold">{{ $plat->nom }}</td>
                                        <td>
                                            @if($plat->categorie)
                                                <span class="badge bg-primary">{{ $plat->categorie->nom }}</span>
                                            @else
                                                <span class="badge bg-secondary">Sans catégorie</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-amber-500">{{ number_format($plat->prix) }} FCFA</span>
                                        </td>
                                        <td>{{ Str::limit($plat->description, 50) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center" style="gap: 12px;">
                                                <a href="{{ route('plats.show', $plat->id) }}" class="btn btn-sm btn-info mx-1" title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('plats.edit', $plat->id) }}" class="btn btn-sm btn-warning mx-1" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('plats.destroy', $plat->id) }}" method="POST" class="d-inline mx-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce plat ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($plats) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center py-3">
                                            <div class="text-muted">
                                                <i class="fas fa-info-circle me-2"></i>Aucun plat n'a été créé
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($plats, 'links'))
                        <div class="mt-4">
                            {{ $plats->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
