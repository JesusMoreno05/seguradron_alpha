@extends('layouts.app')

@section('title', 'Inicio - SeguraDron')

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/fondo_inicio.jpg') }}">
@endsection

@section('content')
<div class="text-center">
    <div class="hero-inicio">
        <div class="hero-overlay"></div>
    </div>
    
    <h1 class="titulo">Nuestros servicios disponibles</h1>
    <p>Soluciones profesionales adaptadas a las necesidades específicas de cada industria.</p>
    <div class="contenedor-tarjetas">

        <div class="tarjetas tarjeta-agricultura">
            <div class="contenido-tarjetas">
                <a class="btn-servicio" href="{{ route('servicio') }}">Contratar servicio</a>
                <h4>Agricultura de Precisión</h4>
                <p class="texto-chico">Análisis de cultivos, fumigación inteligente y mapeo agrícola para maximizar la productividad.</p>
            </div>
        </div>

        <div class="tarjetas tarjeta-industrial">
            <div class="contenido-tarjetas">
                <span class="btn-servicio btn-servicio-disabled">Contratar servicio <span class="badge-proximamente">Proximamente</span></span>
                <h4>Servicios Industriales</h4>
                <p class="texto-chico">Inspecciones técnicas, monitoreo de infraestructuras y análisis termográficos para optimizar procesos industriales.</p>
            </div>
        </div>

        <div class="tarjetas tarjeta-seguridad">
            <div class="contenido-tarjetas">
                <span class="btn-servicio btn-servicio-disabled">Contratar servicio <span class="badge-proximamente">Proximamente</span></span>
                <h4>Seguridad y Vigilancia</h4>
                <p class="texto-chico">Vigilancia aérea, monitoreo de perímetros y respuesta rápida para garantizar la seguridad de las instalaciones.</p>
            </div>
        </div>

        <div class="tarjetas tarjeta-fotografia">
            <div class="contenido-tarjetas">
                <span class="btn-servicio btn-servicio-disabled">Contratar servicio <span class="badge-proximamente">Proximamente</span></span>
                <h4>Fotografía y filmación</h4>
                <p class="texto-chico">Producción audiovisual profesional, fotografía aérea y cobertura de eventos con calidad cinematográfica.</p>
            </div>
        </div>

        <div class="tarjetas tarjeta-rescate">
            <div class="contenido-tarjetas">
                <span class="btn-servicio btn-servicio-disabled">Contratar servicio <span class="badge-proximamente">Proximamente</span></span>
                <h4>Rescate Marino</h4>
                <p class="texto-chico">Operaciones de rescate marítimo con el dron JX-6A Water Rescue, respuesta rápida en emergencias acuáticas y entrega de equipos de flotación.</p>
            </div>
        </div>
    </div>
</div>
@endsection
