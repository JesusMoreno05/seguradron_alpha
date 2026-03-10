@extends('layouts.app')

@section('title', 'Contacta - SeguraDron')

@section('head')
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
@endsection

@section('content')
<div class="container">
    <h1 class="titulo">Contacta con nosotros</h1>
    <p class="lead">Estamos aquí para ayudarte. Envíanos un mensaje.</p>
    
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
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js" defer></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const contactForm = document.getElementById('contactForm');
            if (!contactForm) {
                return;
            }

            emailjs.init('Izl_yZG81r5srqP_c');
            contactForm.addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(contactForm);
                const payload = Object.fromEntries(formData.entries());

                try {
                    await emailjs.send('service_nwl2qa8', 'template_eagkukj', {
                        name: payload.name,
                        email: payload.email,
                        message: payload.message,
                    });

                    contactForm.reset();
                    alert('Mensaje enviado correctamente.');
                } catch (error) {
                    alert('Error al enviar el mensaje. Intenta de nuevo.');
                }
            });
        });
    </script>
@endsection
