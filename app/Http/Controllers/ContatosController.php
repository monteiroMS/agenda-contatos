<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contato\AtualizaContatoRequest;
use App\Http\Requests\Contato\CriaContatoRequest;
use App\Models\Contato;
use Inertia\Inertia;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Contato::all();
        return Inertia::render('Contatos/Contatos', [
            'contatos' => $contatos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CriaContatoRequest $request)
    {
        try {
            $contato = Contato::create($request->validated());
            return response()->json($contato);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar contato: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtualizaContatoRequest $request, string $id)
    {
        try {
            $contato = Contato::findOrFail($id);
            $contato->update($request->validated());
            return response()->json($contato);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar contato: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $contato = Contato::findOrFail($id);
            $contato->delete();
            return response()->json(['message' => 'Contato excluído com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar contato: ' . $e->getMessage()], 404);
        }
    }
}
