<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Home/Index', [
            'contatos' => [
                (object) ['nome' => 'Matheus asdasdasdasdasdasdasdasdasdasdasdadasMonteiro', 'email' => 'matasdasdasdasdasdasdasdheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneidereidereidereidereidereidereidereidereidereidereidereidereidereidereidereidereider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
                (object) ['nome' => 'Matheus Monteiro', 'email' => 'matheuschran@hotmail.com', 'endereco' => 'Rua Paulo Schneider, 305 - Apto 204 - Joinville/SC', 'telefone' => '(47) 99642-9380'],
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
