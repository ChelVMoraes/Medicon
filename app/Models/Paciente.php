<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'email', 'data_nascimento', 'cep', 'endereco', 'numero', 'data_cadastro'];

    protected $dates = ['data_nascimento'];

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
