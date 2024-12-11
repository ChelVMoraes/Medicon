<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidades = Especialidade::all();
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Especialidade::create($request->all());
        return redirect()->route('especialidades.index')->with('Especialidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.show', compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->update($request->all());
        return redirect()->route('especialidades.index')->with('Especialidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Especialidade::findOrFail($id)->delete();
        return redirect()->route('especialidades.index')->with('Especialidade excluída com sucesso!');
    }
}
