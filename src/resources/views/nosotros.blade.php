@extends('layouts.app')

@section('title', 'Nosotros - SeguraDron')

@section('content')
<div class="container">
    <h1 class="titulo">Sobre Nosotros</h1>
    <p class="lead">Conoce nuestra historia, valores y compromiso con la innovación tecnológica.</p>
    
    <div class="nosotros-container">
        <div class="nosotros-card">
            <div class="card-icon">🎯</div>
            <h2>Nuestra Misión</h2>
            <p>En <span class="highlight">SeguraDron</span> impulsamos el futuro con tecnología aérea.</p>
            <p>Ofrecemos soluciones con drones para la agricultura de precisión, los servicios industriales y el rescate marítimo, combinando innovación, seguridad y sostenibilidad.</p>
            <p>Nuestro objetivo es mejorar la vida de las personas y optimizar los recursos del planeta a través de operaciones inteligentes, seguras y eficientes.</p>
        </div>

        <div class="nosotros-card">
            <div class="card-icon">🔭</div>
            <h2>Nuestra Visión</h2>
            <p>Ser líderes en el uso de drones aplicados a la agricultura, la industria y el salvamento, marcando el camino hacia un mundo más seguro, conectado y sostenible.</p>
            <p>Queremos que <span class="highlight">SeguraDron</span> sea sinónimo de tecnología al servicio de las personas y del medio ambiente.</p>
        </div>

        <div class="nosotros-card valores-card">
            <div class="card-icon">⭐</div>
            <h2>Nuestros Valores</h2>
            <ul class="valores-list">
                <li>
                    <strong>Innovación:</strong> evolucionamos constantemente para ofrecer soluciones de vanguardia.
                </li>
                <li>
                    <strong>Seguridad:</strong> cada vuelo, cada misión y cada decisión se basan en la protección de personas y entornos.
                </li>
                <li>
                    <strong>Sostenibilidad:</strong> usamos la tecnología para cuidar los recursos naturales y reducir el impacto ambiental.
                </li>
                <li>
                    <strong>Compromiso:</strong> trabajamos con ética, calidad y responsabilidad en cada servicio.
                </li>
                <li>
                    <strong>Colaboración:</strong> creemos en el poder del trabajo conjunto para lograr grandes resultados.
                </li>
            </ul>
        </div>

    </div>
</div>
@endsection
