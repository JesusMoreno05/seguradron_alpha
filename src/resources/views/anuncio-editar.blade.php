@extends('layouts.app')

@section('title', 'Editar Anuncio - SeguraDron')

@section('content')
<div class="container">
    <h1 class="titulo">Editar Anuncio</h1>
    <p class="lead">Actualiza los datos de tu anuncio.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="registro-wrapper">
        <form class="formulario-registro" action="{{ route('anuncio.update', $anuncio) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="titulo">Título del Anuncio</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $anuncio->titulo) }}" required>
                @error('titulo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="5" required>{{ old('descripcion', $anuncio->descripcion) }}</textarea>
                @error('descripcion')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="dron_id">Selecciona un Dron</label>
                <select id="dron_id" name="dron_id" required>
                    <option value="">-- Selecciona un dron --</option>
                    @foreach($drones as $dron)
                        <option value="{{ $dron->id }}" {{ old('dron_id', $anuncio->dron_id) == $dron->id ? 'selected' : '' }}>
                            {{ $dron->nombre }} - {{ $dron->make->nombre ?? 'Sin marca' }}
                        </option>
                    @endforeach
                </select>
                @error('dron_id')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio">Precio (Eur)</label>
                <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio', $anuncio->precio) }}" required>
                @error('precio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', $anuncio->stock) }}" min="1" required>
                @error('stock')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado">Estado del Dron</label>
                <select id="estado" name="estado" required>
                    <option value="">-- Selecciona un estado --</option>
                    <option value="nuevo" {{ old('estado', $anuncio->estado) == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                    <option value="usado_como_nuevo" {{ old('estado', $anuncio->estado) == 'usado_como_nuevo' ? 'selected' : '' }}>Usado como nuevo</option>
                    <option value="usado_bueno" {{ old('estado', $anuncio->estado) == 'usado_bueno' ? 'selected' : '' }}>Usado - Buen estado</option>
                    <option value="reacondicionado" {{ old('estado', $anuncio->estado) == 'reacondicionado' ? 'selected' : '' }}>Reacondicionado</option>
                </select>
                @error('estado')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; gap: 1rem; align-items: center;">
                <button type="submit" class="btn-enviar">Guardar Cambios</button>
                <a href="{{ route('perfil') }}" class="btn-enviar" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">Volver</a>
            </div>
        </form>
    </div>
</div>
@endsection
