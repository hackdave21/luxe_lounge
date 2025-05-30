@extends('admin.layout')
@section('title', 'Liste des témoignages')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-amber-600 d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-blue m-0">Liste des témoignages clients</h3>
                    <a href="{{ route('temoignages.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle me-1"></i> Ajouter un témoignage
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
                                    <th>Profession</th>
                                    <th>Message</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($temoignages as $temoignage)
                                    <tr>
                                        <td class="fw-bold">{{ $temoignage->nom }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ $temoignage->profession }}</span>
                                        </td>
                                        <td>{{ Str::limit($temoignage->message, 50) }}</td>
                                        <td class="text-center">
                                            @if($temoignage->image)
                                                <img src="{{ asset('storage/' . $temoignage->image) }}" alt="{{ $temoignage->nom }}" 
                                                     class="rounded-circle" width="40" height="40">
                                            @else
                                                <i class="fas fa-user-circle fa-2x text-secondary"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center" style="gap: 12px;">
                                                <a href="{{ route('temoignages.show', $temoignage->id) }}" class="btn btn-sm btn-info mx-1" title="Voir">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('temoignages.edit', $temoignage->id) }}" class="btn btn-sm btn-warning mx-1" title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('temoignages.destroy', $temoignage->id) }}" method="POST" class="d-inline mx-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce témoignage ?')" title="Supprimer">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if(count($temoignages) == 0)
                                    <tr>
                                        <td colspan="5" class="text-center py-3">
                                            <div class="text-muted">
                                                <i class="fas fa-info-circle me-2"></i>Aucun témoignage n'a été créé
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($temoignages, 'links'))
                        <div class="mt-4">
                            {{ $temoignages->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection