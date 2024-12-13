<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\Especialidade;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = Medico::all(); 
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $especialidades = Especialidade::all();

        return view('medicos.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => 'required|string|max:20|unique:medicos',
        ]);

        Medico::create($request->all());

        return redirect()->route('medicos.index')->with('Médico cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medico $medico)
    {
        $medico->load('especialidades', 'consultas.paciente');
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medico $medico)
    {
        
        $especialidades = Especialidade::all();
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => 'required|string|max:20|unique:medicos,crm,' . $medico->id,
        ]);

        
        $medico->update($request->all());

        return redirect()->route('medicos.index')->with('Médico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();
        return redirect()->route('medicos.index')->with('Médico excluído com sucesso!');
    }
}
