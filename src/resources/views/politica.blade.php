@extends('layouts.app')

@section('title', 'Politica de privacidad - SeguraDron')

@section('content')
<div class="container policy-page">
    <h1 class="titulo">Politica de privacidad</h1>
    <p class="lead">Fecha de entrada en vigor: 11 de febrero de 2026</p>

    <div class="servicio-info">
        <p>Esta politica describe como tratamos los datos personales de los usuarios que completan los formularios de contacto en el sitio web de SeguraDron. Usamos la informacion unicamente para ponernos en contacto por email.</p>
    </div>

    <div class="servicio-info">
        <h2>Responsable del tratamiento</h2>
        <ul class="valores-list">
            <li><strong>Responsable:</strong> SeguraDron.S.L.</li>
            <li><strong>Email de contacto:</strong> contacto@seguradron.local</li>
            <li><strong>Localización:</strong> C. Steve Jobs, 2, Campanillas, 29590 Campanillas, Málaga,España</li>
        </ul>
    </div>

    <div class="servicio-info">
        <h2>Datos que recopilamos</h2>
        <p>Cuando completas un formulario, podemos solicitar:</p>
        <ul class="valores-list">
            <li>Nombre completo</li>
            <li>Email</li>
            <li>Telefono</li>
            <li>Localidad</li>
            <li>Mensaje</li>
        </ul>
    </div>

    <div class="servicio-info">
        <h2>Finalidad del tratamiento</h2>
        <p>Usamos los datos unicamente para:</p>
        <ul class="valores-list">
            <li>Responder a tu solicitud y ponernos en contacto por email.</li>
        </ul>
        <p>No usamos los datos para marketing automatizado ni los cedemos a terceros con fines publicitarios.</p>
    </div>

    <div class="servicio-info">
        <h2>Base legal</h2>
        <ul class="valores-list">
            <li>Tu consentimiento al enviar el formulario.</li>
        </ul>
    </div>

    <div class="servicio-info">
        <h2>Destinatarios y terceros</h2>
        <p>Los mensajes se envian por email mediante un proveedor externo de mensajeria (EmailJS). Este proveedor solo procesa los datos para entregar el email.</p>
    </div>

    <div class="servicio-info">
        <h2>Transferencias internacionales de datos</h2>
        <p>Los datos personales pueden ser tratados por proveedores ubicados fuera del Espacio Economico Europeo, como EmailJS. En estos casos, se garantiza que el tratamiento se realiza conforme a la normativa vigente mediante la aplicacion de clausulas contractuales estandar u otros mecanismos legales adecuados.</p>
    </div>

    <div class="servicio-info">
        <h2>Conservacion de los datos</h2>
        <p>Conservamos los datos el tiempo que dure la comunicacion para gestionar y responder a ella. Luego pueden ser eliminados o anonimizados.</p>
    </div>

    <div class="servicio-info">
        <h2>Derechos de las personas usuarias</h2>
        <p>Puedes solicitar:</p>
        <ul class="valores-list">
            <li>Acceso a tus datos</li>
            <li>Rectificacion o supresion</li>
            <li>Limitacion u oposicion al tratamiento</li>
            <li>Derecho a retirar el consentimiento en cualquier momento</li>
            <li>Derecho a presentar una reclamacion ante la autoridad de control</li>
        </ul>
        <p>Para ejercer estos derechos, escribe a: contacto@seguradron.local</p>
    </div>

    <div class="servicio-info">
        <h2>Seguridad</h2>
        <p>Aplicamos medidas razonables para proteger la informacion frente a accesos no autorizados, perdida o divulgacion.</p>
    </div>

    <div class="servicio-info">
        <h2>Cambios en esta politica</h2>
        <p>Podemos actualizar esta politica para reflejar cambios legales o tecnicos. Publicaremos la nueva version en esta misma ubicacion.</p>
    </div>

    <div class="servicio-info">
        <a class="btn-enviar" href="{{ route('servicio') }}">Volver al formulario</a>
    </div>
</div>
@endsection
