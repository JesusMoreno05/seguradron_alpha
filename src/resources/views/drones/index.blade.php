<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de drones</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main class="container">

        <h1>📚 Listado de Drones</h1>

        @foreach ($drones as $dron)
            <article>
                <header>
                    <h3 style="margin-bottom: 0;">📘 {{ $dron->nombre }}</h3>
                    <strong>Plazas:</strong> {{ $dron->plazas }}
                </header>


                <strong>Etiquetas:</strong>
                <ul>
                    @foreach ($dron->etiquetas as $etiqueta)
                        <li>👤 {{ $etiqueta->nombre }}</li>
                    @endforeach
                </ul>

                @if($dron->etiquetas->isEmpty())
                    <small><em>🚫 Este dron no tiene etiquetas aún.</em></small>
                @endif
            </article>
        @endforeach

    </main>
</body>
</html>