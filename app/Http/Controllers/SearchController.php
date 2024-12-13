<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use App\Models\Especialidade;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $medicos = Medico::where('nome', 'LIKE', "%{$query}%")
        ->orWhere('crm', 'LIKE', "%{$query}%")
        ->get();

        $especialidades = Especialidade::where('nome', 'LIKE', "%{$query}%")
        ->get();

        return view('search.search_results', compact('medicos', 'especialidades', 'query'));
    }
}
