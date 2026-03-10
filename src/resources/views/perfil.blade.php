@extends('layouts.app')

@section('title', 'Mi Perfil - SeguraDron')

@section('content')
<div class="container">
    <h1 class="titulo">Mi Perfil</h1>
    <p class="lead">Visualiza y gestiona tu información personal.</p>

    @if(session('success'))
        <div style="color: #2e7d32; margin-bottom: 1rem; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: #c62828; margin-bottom: 1rem; text-align: center;">
            {{ $errors->first() }}
        </div>
    @endif
    
    <div class="perfil-container">
        <div class="perfil-card">
            <div class="card-icon">👤</div>
            <h2>Información Personal</h2>

            <div class="perfil-editable">
                <div class="perfil-info">
                    <div class="info-row">
                        <strong>Nombre:</strong>
                        <span>{{ auth()->user()->nombre ?? 'N/A' }}</span>
                    </div>
                    <div class="info-row">
                        <strong>Email:</strong>
                        <span>{{ auth()->user()->email ?? 'N/A' }}</span>
                    </div>
                    <div class="info-row">
                        <strong>Teléfono:</strong>
                        <span>{{ auth()->user()->telefono ?? 'N/A' }}</span>
                    </div>
                    <div class="info-row">
                        <strong>Fecha de registro:</strong>
                        <span>{{ auth()->user()->created_at?->format('d/m/Y') ?? 'N/A' }}</span>
                    </div>
                </div>

                <form id="perfil-form" class="perfil-form" action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', auth()->user()->nombre) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono (Opcional)</label>
                        <input type="tel" id="telefono" name="telefono" value="{{ old('telefono', auth()->user()->telefono) }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Nueva Contraseña (Opcional)</label>
                        <input type="password" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                </form>
            </div>
            
            <div class="perfil-actions">
                <button type="button" class="btn-enviar btn-edit" style="flex: 1;">Editar Perfil</button>
                <button type="submit" class="btn-enviar btn-save" style="flex: 1;" form="perfil-form">Guardar cambios</button>
                <form action="{{ route('logout') }}" method="POST" style="flex: 1;">
                    @csrf
                    <button type="submit" class="btn-enviar btn-logout" style="width: 100%;">Cerrar Sesión</button>
                </form>
            </div>
        </div>
        
        <div class="perfil-card">
            <div class="card-icon">📋</div>
            <h2>Mis Anuncios</h2>
            
            @if(auth()->user()->anuncio->count() > 0)
                <div class="anuncios-list">
                    @foreach(auth()->user()->anuncio as $anuncio)
                        <div class="anuncio-item">
                            <div class="anuncio-header">
                                <div>
                                    <h4 class="anuncio-titulo">{{ $anuncio->titulo }}</h4>
                                    <p class="anuncio-desc">{{ Str::limit($anuncio->descripcion, 100) }}</p>
                                    <div class="anuncio-meta">
                                        <span>💰 {{ number_format($anuncio->precio, 2) }}€</span>
                                        <span>📦 Stock: {{ $anuncio->stock }}</span>
                                        <span>{{ ucfirst(str_replace('_', ' ', $anuncio->estado)) }}</span>
                                    </div>
                                </div>
                                <div class="anuncio-actions">
                                    <a href="{{ route('anuncio.edit', $anuncio) }}" class="btn-editar btn-action" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">Editar</a>
                                    <button class="btn-eliminar btn-action">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="anuncios-empty">Aún no has creado ningún anuncio.</p>
            @endif
        </div>
    </div>
</div>

<style>
    .perfil-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .perfil-card {
        background: linear-gradient(135deg, rgba(0, 59, 255, 0.15), rgba(0, 229, 255, 0.15));
        border: 1px solid rgba(0, 229, 255, 0.4);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    
    .btn-editar {
        background: linear-gradient(135deg, #00B4D8, #0096C7);
        border: none;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-editar:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 180, 216, 0.4);
    }
    
    .btn-eliminar {
        background: linear-gradient(135deg, #FF6B6B, #FF5252);
        border: none;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-eliminar:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
    }

    .btn-logout {
        background: linear-gradient(135deg, #B55E5E, #9A4747);
        border: 1px solid rgba(150, 70, 70, 0.55);
        box-shadow: 0 8px 16px rgba(74, 24, 24, 0.22);
    }

    .btn-logout:hover {
        box-shadow: 0 10px 20px rgba(74, 24, 24, 0.32);
        filter: brightness(1.03);
    }

    .perfil-actions {
        margin-top: 2rem;
        display: flex;
        gap: 1rem;
    }

    .perfil-form {
        display: none;
        margin-top: 1.5rem;
    }

    .btn-save {
        display: none;
    }

    .perfil-editable.is-editing .perfil-info {
        display: none;
    }

    .perfil-editable.is-editing .perfil-form {
        display: block;
    }

    .perfil-editable.is-editing ~ .perfil-actions .btn-edit {
        display: none;
    }

    .perfil-editable.is-editing ~ .perfil-actions .btn-save {
        display: inline-flex;
    }
    
    .perfil-info {
        margin-top: 1.5rem;
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: #E8E8E8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .info-row strong {
        color: #00E5FF;
    }
    
    .info-row span {
        color: #B0B0B0;
    }

    .anuncios-list {
        margin-top: 1.5rem;
    }

    .anuncio-item {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 1rem;
    }

    .anuncio-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 1.5rem;
    }

    .anuncio-titulo {
        color: #00E5FF;
        margin: 0 0 0.5rem 0;
    }

    .anuncio-desc {
        color: #B0B0B0;
        margin: 0;
        font-size: 0.9rem;
    }

    .anuncio-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        margin-top: 0.5rem;
        font-size: 0.85rem;
        color: #00E5FF;
    }

    .anuncio-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }

    .anuncios-empty {
        color: #B0B0B0;
        text-align: center;
        margin-top: 2rem;
    }

    html[data-theme="light"] .btn-logout {
        background: linear-gradient(135deg, #C97878, #A85A5A);
        border-color: rgba(160, 64, 64, 0.45);
        box-shadow: 0 8px 16px rgba(74, 24, 24, 0.18);
    }

    html[data-theme="light"] .btn-logout:hover {
        box-shadow: 0 12px 22px rgba(74, 24, 24, 0.26);
    }

    html[data-theme="light"] .anuncio-item {
        border-bottom-color: rgba(191, 138, 61, 0.2);
    }

    html[data-theme="light"] .anuncio-titulo {
        color: var(--accent);
    }

    html[data-theme="light"] .anuncio-desc {
        color: #4a3a2a;
    }

    html[data-theme="light"] .anuncio-meta {
        color: #8b5a2b;
    }

    html[data-theme="light"] .anuncios-empty {
        color: #6b5846;
    }
</style>
@endsection

@section('scripts')
<script>
    const editButton = document.querySelector('.btn-edit');
    const editable = document.querySelector('.perfil-editable');

    if (editButton && editable) {
        editButton.addEventListener('click', () => {
            editable.classList.add('is-editing');
        });
    }
</script>
@endsection
