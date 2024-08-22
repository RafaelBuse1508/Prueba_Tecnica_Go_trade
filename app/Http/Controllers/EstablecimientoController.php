<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstablecimientoController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return redirect()->route('home');
        }

        $user = session('user');

        return view('Establecimiento.agregar_establecimiento', ['user' => $user]);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_manzana' => 'required|string|max:255',
            'direccion_calle_principal' => 'required|string|max:255',
            'direccion_numero' => 'required|string|max:255',
            'direccion_transversal' => 'required|string|max:255',
            'direccion_referencia' => 'required|string|max:255',
            'administrador' => 'required|string|max:255',
            'telefonos_contacto' => 'required|string|max:20',
            'email_contacto' => 'required|email|max:255',
            'ubicacion' => 'required|string|max:255',
            'id_provincia' => 'required|uuid',
            'id_ciudad' => 'required|uuid',
            'id_zona' => 'required|uuid',
            'id_canal' => 'required|uuid',
            'id_subcanal' => 'required|uuid',
            'id_cadena' => 'required|uuid',
            'en_ruta' => 'required|boolean',
            'cliente_proyecto_id' => 'required|uuid',
        ]);

        $response = Http::withHeaders([
            'Authentication' => session('token'),
        ])->post(env('URL_BASE_SERVICIO') . '/' . env('AGREGAR_ESTABLECIMIENTO_ENDPOINT'), [
            'nombre' => $request->input('nombre'),
            'direccion_manzana' => $request->input('direccion_manzana'),
            'direccion_calle_principal' => $request->input('direccion_calle_principal'),
            'direccion_numero' => $request->input('direccion_numero'),
            'direccion_transversal' => $request->input('direccion_transversal'),
            'direccion_referencia' => $request->input('direccion_referencia'),
            'administrador' => $request->input('administrador'),
            'telefonos_contacto' => $request->input('telefonos_contacto'),
            'email_contacto' => $request->input('email_contacto'),
            'ubicacion' => $request->input('ubicacion'),
            'id_provincia' => $request->input('id_provincia'),
            'id_ciudad' => $request->input('id_ciudad'),
            'id_zona' => $request->input('id_zona'),
            'id_canal' => $request->input('id_canal'),
            'id_subcanal' => $request->input('id_subcanal'),
            'id_cadena' => $request->input('id_cadena'),
            'en_ruta' => $request->input('en_ruta'),
            'cliente_proyecto_id' => $request->input('cliente_proyecto_id'),
        ]);

        $data = $response->json();

        if ($data['status']) {
            return redirect()->back()->with('success', 'Establishment agregado');
        }

        return back()->withErrors(['error' => $data['message']]);
    }

    public function listar()
    {
        if (!session()->has('user')) {
            return redirect()->route('home');
        }

        $idProyecto = '568cf8ce-a2d6-411b-85bf-d9678c2a8c4b';

        $response = Http::withHeaders([
            'Authentication' => session('token'),
        ])->get(env('URL_BASE_SERVICIO') . '/' . env('LISTAR_ESTABLECIMIENTOS_ENDPOINT') . "/" . $idProyecto);

        $listaEstablecimientos = $response->successful() ? $response->json('listaEstablecimientos') : [];

        $user = session('user');

        return view('Establecimiento.listar_establecimientos', [
            'user' => $user,
            'listaEstablecimientos' => $listaEstablecimientos,
        ]);
    }

}
