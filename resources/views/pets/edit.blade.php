@extends('layouts.app')

@section('title', 'Editar Mascota')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0 fw-bold">✏️ Modificar Mascota</h4>
                <a href="{{ route('pets.index') }}" class="btn btn-outline-light btn-sm fw-bold">Volver</a>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('pets.update', $pet->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Nombre</label>
                        <input type="text" name="name" value="{{ $pet->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Especie</label>
                        <input type="text" name="species" value="{{ $pet->species }}" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Edad (años)</label>
                        <input type="number" name="age" value="{{ $pet->age }}" class="form-control" required min="0">
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                        <a href="{{ route('pets.index') }}" class="btn btn-outline-secondary fw-bold">Cancelar</a>
                        <button type="submit" class="btn btn-primary fw-bold px-4">Guardar Cambios</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection