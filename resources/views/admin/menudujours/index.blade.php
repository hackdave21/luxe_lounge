@extends('admin.layout')
@section('title', 'Liste des menus du jour')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-amber-600 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-blue m-0">Liste des menus du jour</h3>
                    <a href="{{ route('menudujours.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Ajouter un menu du jour
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
                                    <th style="width: 10%">Image</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Description</th>
                                    <th>Date de création</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td class="text-center">
                                            @if($menu->image)
                                                <img src="{{ Storage::url($menu->image) }}" alt="{{ $menu->nom }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                    <i class="fas fa-utensils text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="fw-bold">{{ $menu->nom }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ number_format($menu->prix) }} FCFA</span>
                                        </td>
                                        <td>{{ Str::limit($menu->description, 50) }}</td>
                                        <td>{{ $menu->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center" style="gap: 12px;">
                                                <a href="{{ route('menudujours.show', $menu->id) }}" class="btn btn-sm btn-info mx-1" title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('menudujours.edit', $menu->id) }}" class="btn btn-sm btn-warning mx-1" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('menudujours.destroy', $menu->id) }}" method="POST" class="d-inline mx-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce menu du jour ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($menus) == 0)
                                    <tr>
                                        <td colspan="6" class="text-center py-3">
                                            <div class="text-muted">
                                                <i class="fas fa-info-circle me-2"></i>Aucun menu du jour n'a été ajouté
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($menus, 'links'))
                        <div class="mt-4">
                            {{ $menus->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
