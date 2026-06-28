@extends('layouts.app')

@section('title', 'Listado de Mascotas')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="mb-0">🐾 Sistema de Mascotas</h3>
        <a href="{{ route('pets.create') }}" class="btn btn-light btn-sm fw-bold">+ Agregar Mascota</a>
    </div>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('pets.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" 
                       placeholder="Buscar por nombre o especie..." 
                       value="{{ $search }}">
                <button class="btn btn-primary" type="submit">🔍 Buscar</button>
                @if($search)
                    <a href="{{ route('pets.index') }}" class="btn btn-secondary">Limpiar</a>
                @endif
            </div>
        </form>

        <table class="table table-striped table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Edad</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pets as $pet)
                    <tr>
                        <td>{{ $pet->id }}</td>
                        <td>{{ $pet->name }}</td>
                        <td>{{ $pet->species }}</td>
                        <td>{{ $pet->age }} años</td>
                        <td>{{ $pet->created_at ? $pet->created_at->format('d/m/Y H:i') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No se encontraron mascotas que coincidan con la búsqueda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $pets->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection