@extends('admin.layout')
@section('title', 'Détails du témoignage')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue-600">
                    <h3 class="card-title text-green">Détails du témoignage de : {{ $temoignage->nom }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Image à gauche -->
                        <div class="col-md-4">
                            @if($temoignage->image)
                                <div class="text-center mb-3">
                                    <img src="{{ Storage::url($temoignage->image) }}" alt="{{ $temoignage->nom }}"
                                         class="img-fluid rounded-circle" style="max-height: 250px; max-width: 250px;">
                                </div>
                            @else
                                <div class="text-center mb-3 p-4 bg-light rounded-circle" style="max-width: 250px; margin: 0 auto;">
                                    <i class="fa fa-user-circle fa-5x text-muted"></i>
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
                                        <div class="col-md-9">{{ $temoignage->nom }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Profession :</div>
                                        <div class="col-md-9">{{ $temoignage->profession }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Message :</div>
                                        <div class="col-md-9">
                                            @if($temoignage->message)
                                                <div class="bg-light p-3 rounded">
                                                    <i class="fa fa-quote-left text-muted me-2"></i>
                                                    {{ $temoignage->message }}
                                                    <i class="fa fa-quote-right text-muted ms-2"></i>
                                                </div>
                                            @else
                                                <span class="text-muted">Aucun message</span>
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
                                        <div class="col-md-9">{{ $temoignage->id }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Date de création :</div>
                                        <div class="col-md-9">{{ $temoignage->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 fw-bold">Dernière modification :</div>
                                        <div class="col-md-9">{{ $temoignage->updated_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('temoignages.edit', $temoignage->id) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i> Modifier
                        </a>
                        <a href="{{ route('temoignages.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
