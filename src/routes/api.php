<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::post('/contacta', function (Request $request) {
    $data = $request->validate([
        'nombre' => ['required', 'string', 'max:120'],
        'email' => ['required', 'email', 'max:160'],
        'mensaje' => ['required', 'string', 'max:4000'],
    ]);

    $subject = 'Contacto SeguraDron - ' . $data['nombre'];
    $body = "Nombre: {$data['nombre']}\n" .
        "Email: {$data['email']}\n\n" .
        "Mensaje:\n{$data['mensaje']}";

    Mail::raw($body, function ($message) use ($data, $subject) {
        $message->to('morenobernaljesus@gmail.com')
            ->subject($subject)
            ->replyTo($data['email'], $data['nombre']);
    });

    return response()->json(['ok' => true]);
});
