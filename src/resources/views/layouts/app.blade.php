<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SeguraDron')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/seguradron_logo.png') }}">
    <link rel="preload" as="image" href="{{ asset('images/seguradron_logo.png') }}">
    <link rel="preload" as="image" href="{{ asset('images/seguradron_logo_claro.png') }}" media="(prefers-color-scheme: light)">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    @yield('head')
</head>

<header>
    <div class="navbar">
        <a href="{{ route('home') }}" class="logo-link">
            <img src="{{ asset('images/seguradron_logo.png') }}" alt="SeguraDron Logo" class="logo" data-logo-dark="{{ asset('images/seguradron_logo.png') }}" data-logo-light="{{ asset('images/seguradron_logo_claro.png') }}">
        </a>
        <nav class="main-nav">
            <a href="{{ route('home') }}">Inicio</a>
            <a href="{{ route('nosotros') }}">Nosotros</a>
            <a href="{{ route('contacta') }}">Contacta</a>
            <button type="button" class="theme-toggle" aria-label="Cambiar tema"></button>
        </nav>
    </div>
</header>

<body>
    <main id="mainView">
        @yield('content')
    </main>

    <footer>
        <p>© 2026 SeguraDron. Todos los derechos reservados.</p>
    </footer>

    <script>
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }, { passive: true });

        const themeToggle = document.querySelector('.theme-toggle');
        if (themeToggle) {
            const storedTheme = localStorage.getItem('theme');
            const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            const initialTheme = storedTheme || systemTheme;

            document.documentElement.dataset.theme = initialTheme;

            const updateToggleLabel = () => {
                const isDark = document.documentElement.dataset.theme === 'dark';
                themeToggle.textContent = isDark ? '☀️' : '🌙';
            };

            const updateLogo = () => {
                const logo = document.querySelector('.logo');
                if (!logo) {
                    return;
                }

                const isDark = document.documentElement.dataset.theme === 'dark';
                const nextSrc = isDark ? logo.dataset.logoDark : logo.dataset.logoLight;

                if (nextSrc && logo.getAttribute('src') !== nextSrc) {
                    logo.setAttribute('src', nextSrc);
                }
            };

            updateToggleLabel();
            updateLogo();

            themeToggle.addEventListener('click', () => {
                const nextTheme = document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark';
                document.documentElement.dataset.theme = nextTheme;
                localStorage.setItem('theme', nextTheme);
                updateToggleLabel();
                updateLogo();
            });
        }
    </script>

    @yield('scripts')
</body>

</html>
