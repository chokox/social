<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Visita;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function incrementarContador(Request $request)
    {
        if (!Session::has('visita_registrada')) {
            $ip = $request->ip();
            DB::table('visitas')->insert([
                'created_at' => now(), // Puedes agregar la fecha y hora actual
                'updated_at' => now(),
                'ip' => $ip,
                'visita' => 1, // Inicializa el contador en 1
            ]);
            Session::put('visita_registrada', true);
        }

        $contador = Visita::count();

        return view('welcome', compact('contador'));
    }
}
