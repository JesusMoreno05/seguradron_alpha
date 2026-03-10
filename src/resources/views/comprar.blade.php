@extends('layouts.app')

@section('title', 'Comprar Drones - SeguraDron')

@section('content')
<div class="container-comprar">
    <h1 class="titulo">Comprar Drones</h1>
    <p class="lead">Encuentra y adquiere tus drones favoritos.</p>
    
    @if(auth()->check())
        <div style="text-align: center; margin-bottom: 2rem;">
            <a href="{{ route('anuncio.crear') }}" class="btn-enviar" style="display: inline-block; padding: 0.75rem 2rem; text-decoration: none;">+ Crear Anuncio</a>
        </div>
    @endif
    
    <div class="comprar-layout">
        <!-- Navegador lateral izquierdo -->
        <aside class="sidebar-filtros">
            <form class="filtros-form" method="GET" action="{{ route('comprar') }}">
                @php
                    $selectedCategorias = (array) request('categoria', []);
                    $selectedMarcas = (array) request('marca', []);
                @endphp

                <h3>Buscar por nombre</h3>
                <div class="filtro-busqueda">
                    <input type="search" name="buscar" placeholder="Ej: Phantom" value="{{ request('buscar') }}" />
                </div>

                
                <h3>Categorías</h3>
                <div class="filtro-categorias">
                    <label>
                        <input type="checkbox" name="categoria[]" value="agricultura" {{ in_array('agricultura', $selectedCategorias, true) ? 'checked' : '' }}>
                        <span>Agricultura</span>
                    </label>
                    <label>
                        <input type="checkbox" name="categoria[]" value="industrial" {{ in_array('industrial', $selectedCategorias, true) ? 'checked' : '' }}>
                        <span>Industrial</span>
                    </label>
                    <label>
                        <input type="checkbox" name="categoria[]" value="seguridad" {{ in_array('seguridad', $selectedCategorias, true) ? 'checked' : '' }}>
                        <span>Seguridad</span>
                    </label>
                    <label>
                        <input type="checkbox" name="categoria[]" value="fotografia" {{ in_array('fotografia', $selectedCategorias, true) ? 'checked' : '' }}>
                        <span>Fotografía</span>
                    </label>
                    <label>
                        <input type="checkbox" name="categoria[]" value="rescate-marino" {{ in_array('rescate-marino', $selectedCategorias, true) ? 'checked' : '' }}>
                        <span>Rescate Marino</span>
                    </label>
                </div>
                
                <h3>Precio</h3>
                <div class="filtro-precio">
                    <label for="precio_max">Hasta</label>
                    <div class="price-range">
                        <input
                            type="range"
                            id="precio_max"
                            name="precio_max"
                            min="0"
                            max="5000"
                            step="50"
                            value="{{ request('precio_max', 2500) }}"
                            oninput="document.getElementById('precio_max_value').textContent = this.value"
                        >
                        <span class="price-value"><span id="precio_max_value">{{ request('precio_max', 2500) }}</span>€</span>
                    </div>
                    <small class="price-hint">0€ - 5000€</small>
                </div>
                
                <h3>Marca</h3>
                <div class="filtro-marcas">
                    <label>
                        <input type="checkbox" name="marca[]" value="dji" {{ in_array('dji', $selectedMarcas, true) ? 'checked' : '' }}>
                        <span>DJI</span>
                    </label>
                    <label>
                        <input type="checkbox" name="marca[]" value="autel" {{ in_array('autel', $selectedMarcas, true) ? 'checked' : '' }}>
                        <span>Autel</span>
                    </label>
                    <label>
                        <input type="checkbox" name="marca[]" value="parrot" {{ in_array('parrot', $selectedMarcas, true) ? 'checked' : '' }}>
                        <span>Parrot</span>
                    </label>
                    <label>
                        <input type="checkbox" name="marca[]" value="yuneec" {{ in_array('yuneec', $selectedMarcas, true) ? 'checked' : '' }}>
                        <span>Yuneec</span>
                    </label>
                </div>

                

                <button type="submit" class="btn-filtrar">Filtrar</button>
            </form>
        </aside>
        
        <!-- Catálogo de anuncios a la derecha -->
        <div class="catalogo">
            @if($anuncios->count() > 0)
                @foreach($anuncios as $anuncio)
                    <div class="dron-card">
                        <img src="{{ asset('images/pngwing.com (1).png') }}" alt="{{ $anuncio->dron?->nombre ?? $anuncio->titulo }}" loading="lazy" decoding="async" width="300" height="150">
                        <h3>{{ $anuncio->titulo }}</h3>
                        <p class="precio">{{ $anuncio->precio }}€</p>
                        <p class="descripcion">{{ $anuncio->descripcion }}</p>
                        @if(auth()->check())
                            <button class="btn-comprar">Saber más</button>
                        @else
                            <a href="{{ route('login') }}" style="display: inline-block; padding: 0.4rem 0.6rem; font-size: 0.7rem; background: linear-gradient(135deg, #00B4D8, #0096C7); color: white; border-radius: 8px; text-decoration: none; text-align: center; white-space: nowrap;">Inicia sesión</a>
                        @endif
                    </div>
                @endforeach
            @else
                <div style="grid-column: 1/-1; text-align: center; padding: 2rem; color: #01ABBE;">
                    <p>No hay anuncios disponibles en este momento.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
