<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function busca(Request $request)
    {
        $cep = $request->input('cep');
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        $httpCode = $response->status();
        $cepData = $response->json();

        if ($httpCode != 200 || isset($cepData['erro'])) {
            return response()->json(['error' => 'CEP not found'], 404);
        }

        return response()->json($cepData);
    }
}
