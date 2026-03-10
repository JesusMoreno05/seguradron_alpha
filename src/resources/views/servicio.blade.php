@extends('layouts.app')

@section('title', 'Servicio - SeguraDron')

@section('content')
<div class="container">
    <h1 class="titulo">Servicio de Agricultura</h1>
    <div class="servicio-info">
        <p>Brindamos soluciones innovadoras y eficientes para el sector agrícola.</p>
        <p>Los drones representan una herramienta clave en la agricultura moderna, permitiendo a los productores optimizar recursos, disminuir costos y aumentar la productividad.</p>
        <p>En nuestra empresa nos especializamos en ofrecer servicios de drones agrícolas de alta calidad, adaptados a las necesidades particulares de cada cliente.</p>
        <p>Trabajamos con rigor, compromiso y una clara orientación a la excelencia. Utilizamos tecnología de vanguardia y herramientas especializadas para garantizar servicios eficaces y de alta calidad.</p>
        <p>Si buscas un servicio profesional de drones, estaremos encantados de ayudarte y ofrecerte resultados a la altura de tus expectativas.</p>
    </div>

    <p class="lead">Solicita este servicio y te contactaremos pronto.</p>

    <form class="formulario-contacto" id="contactForm">
        <div class="form-group">
            <label for="name">Nombre completo</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="localidad">Localidad</label>
            <input type="text" id="localidad" name="location" required>
        </div>

        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="tel" id="telefono" name="phone" required>
        </div>

        <div class="form-group">
            <label for="message">Mensaje</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <div class="checkbox">
            <label for="privacyAccepted" class="checkbox-label">
                <input type="checkbox" id="privacyAccepted" name="privacyAccepted" required>
                Acepto la <a href="{{ route('politica') }}">Política de privacidad</a>.
            </label>
        </div>

        <button type="submit" class="btn-enviar">Enviar Mensaje</button>
    </form>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script>
        const contactForm = document.getElementById('contactForm');
        emailjs.init('Izl_yZG81r5srqP_c');
        contactForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(contactForm);
            const payload = Object.fromEntries(formData.entries());

            try {
                await emailjs.send('service_nwl2qa8', 'template_plah6ad', {
                    name: payload.name,
                    email: payload.email,
                    location: payload.location,
                    phone: payload.phone,
                    message: payload.message,
                });

                contactForm.reset();
                alert('Mensaje enviado correctamente.');
            } catch (error) {
                alert('Error al enviar el mensaje. Intenta de nuevo.');
            }
        });
    </script>
@endsection
