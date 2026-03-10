<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\anuncio;
use App\Models\Dron;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnuncioController extends Controller
{
    // Método para mostrar el formulario de crear anuncio
    public function create()
    {
        $drones = Dron::all();
        return view('anuncio-crear', ['drones' => $drones]);
    }

    // Método para guardar el anuncio creado desde el formulario web
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'estado' => 'required|in:nuevo,usado_como_nuevo,usado_bueno,reacondicionado',
            'dron_id' => 'required|exists:drones,id',
        ]);

        $user = auth()->user();
        if ($user && $user->role === 'particular') {
            $totalAnuncios = $user->anuncio()->count();
            if ($totalAnuncios >= 3) {
                return redirect()->back()->withErrors([
                    'titulo' => 'Has alcanzado el máximo de 3 anuncios para cuentas particulares.'
                ])->withInput();
            }
        }

        // Crear anuncio con usuario autenticado
        $anuncio = new anuncio($validated);
        $anuncio->user_id = Auth::id();
        $anuncio->visible = false; // Por defecto, no visible
        $anuncio->save();

        return redirect()->route('perfil')->with('success', 'Anuncio creado exitosamente');
    }

    public function edit(anuncio $anuncio)
    {
        if ($anuncio->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este anuncio.');
        }

        $drones = Dron::all();

        return view('anuncio-editar', ['anuncio' => $anuncio, 'drones' => $drones]);
    }

    public function update(Request $request, anuncio $anuncio)
    {
        if ($anuncio->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este anuncio.');
        }

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'estado' => 'required|in:nuevo,usado_como_nuevo,usado_bueno,reacondicionado',
            'dron_id' => 'required|exists:drones,id',
        ]);

        $anuncio->update($validated);

        return redirect()->route('perfil')->with('success', 'Anuncio actualizado correctamente.');
    }

    public function index()
    {
        $anuncios = anuncio::all();

        if ($anuncios->isEmpty()) {
            return response()->json(['message' => 'No existen anuncios todavia'], 404);
        }

        return response()->json($anuncios, 200);
    }

    public function show($id)
    {
        $anuncio = anuncio::find($id);

        if (!$anuncio) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        } else {
            $data = [
                'anuncio' => $anuncio,
                'status' => 200
            ];

            return response()->json($data, 200);
        }
    }

    public function search($titulo)
    {
        $anuncio = anuncio::where('titulo', 'like', '%' . $titulo . '%')->get();

        if ($anuncio->isEmpty()) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        } else {
            $data = [
                'anuncio' => $anuncio,
                'status' => 200
            ];

            return response()->json($data, 200);
        }
    }

    public function aniadirAnuncio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'estado' => 'required|in:nuevo,usado_como_nuevo,usado_bueno,reacondicionado',
            'dron_id' => 'required|exists:drones,id',
            'vendedor_id' => 'required|exists:usuarios,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $anuncio = anuncio::create($request->all());

        return response()->json(['message' => 'Anuncio creado con exito', 'anuncio' => $anuncio], 201);
    }

    public function editarAnuncio(Request $request, $id)
    {
        $anuncio = anuncio::find($id);

        if (!$anuncio) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'precio' => 'sometimes|required|numeric',
            'stock' => 'sometimes|required|integer',
            'estado' => 'sometimes|required|in:nuevo,usado_como_nuevo,usado_bueno,reacondicionado',
            'dron_id' => 'sometimes|required|exists:drones,id',
            'vendedor_id' => 'sometimes|required|exists:usuarios,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $anuncio->update($request->all());

        return response()->json(['message' => 'Anuncio actualizado con exito', 'anuncio' => $anuncio], 200);
    }

    public function eliminarAnuncio($id)
    {
        $anuncio = anuncio::find($id);

        if (!$anuncio) {
            return response()->json(['message' => 'Anuncio no encontrado'], 404);
        }

        $anuncio->delete();

        return response()->json(['message' => 'Anuncio eliminado con exito'], 200);
    }
}
