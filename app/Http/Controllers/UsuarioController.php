<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{

    public function index(){
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::post(env('URL_BASE_SERVICIO') . '/' . env('LOGIN_ENPOINT'), [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'getToken' => true,
        ]);

        $data = $response->json();

        if ($data['status']) {
            // Guardar el token en la sesión
            session(['token' => $data['token']]);

            // Guardar el objeto identity en la sesión
            session([
                'user' => [
                    'name' => $data['identity']['name'] ."-" . $data['identity']['surname'],
                    'email' => $data['identity']['email'],
                    'avatar' => $data['identity']['avatar'],
                ]
            ]);

            return redirect()->route('home');
        }

        return back()->withErrors(['login' => $data['message']]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->forget('token');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('principal');
    }

}
