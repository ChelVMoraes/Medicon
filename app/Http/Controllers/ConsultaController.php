<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'medico'])->get();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('consultas.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_consulta' => 'required|date',
            'data_agendamento' => 'required|date',
        ]);

        Consulta::create($request->all());
        return redirect()->route('consultas.index')->with('Consulta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consulta = Consulta::with(['paciente', 'medico'])->findOrFail($id);
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consulta = Consulta::findOrFail($id);
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'data_consulta' => 'required|date',
            'data_agendamento' => 'required|date',
        ]);

        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());
        return redirect()->route('consultas.index')->with('Consulta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Consulta::findOrFail($id)->delete();
        return redirect()->route('consultas.index')->with( 'Consulta excluída com sucesso!');
    }
}
