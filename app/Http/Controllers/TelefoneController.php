<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Paciente $paciente)
    {
        return view('telefones.index', ['paciente' => $paciente, 'telefones' => $paciente->telefones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Paciente $paciente)
    {
        return view('telefones.create', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Paciente $paciente)
    {
        $request->validate(['numero' => 'required|string|max:15']);
        $paciente->telefones()->create($request->all());
        return redirect()->route('pacientes.telefones.index', $paciente)->with('Telefone adicionado com sucesso!');
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
    public function edit(Paciente $paciente, Telefone $telefone)
    {
        return view('telefones.edit', compact('paciente', 'telefone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente, Telefone $telefone)
    {
        $request->validate(['numero' => 'required|string|max:15']);
        $telefone->update($request->all());
        return redirect()->route('pacientes.telefones.index', $paciente)->with('Telefone atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente, Telefone $telefone)
    {
        $telefone->delete();
        return redirect()->route('pacientes.telefones.index', $paciente)->with('Telefone removido com sucesso!');
    }
}
