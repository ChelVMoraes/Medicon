<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::with('telefones', 'consultas.medico')->get();

        foreach ($pacientes as $paciente) {
            if ($paciente->data_nascimento) {
            $paciente->data_nascimento = Carbon::parse($paciente->data_nascimento);
            }
        }
        
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pacientes',
            'data_nascimento' => 'nullable|date',
            'email' => 'required|email|max:255|unique:pacientes',
            'data_cadastro' => 'nullable|date',
            'cep' => 'required|string|max:10',
            'endereco' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
        ]);

        Paciente::create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('data_nascimento'),
            'email' =>  $request->input('email'),
            'data_cadastro' => $request->input('data_cadastro'),
            'cep' => $request->input('cep'),
            'endereco' => $request->input('endereco'),
            'numero' => $request->input('numero'),
        ]);

        return redirect()->route('pacientes.index')->with('Paciente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        $paciente->load('telefones', 'consultas.medico');
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pacientes,cpf,' . $paciente->id,
            'data_nascimento' => 'nullable|date',
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('Paciente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('Paciente excluído com sucesso!');
    }
}
