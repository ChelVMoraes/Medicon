<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'crm', 'especialidade_id'];

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class, 'especialidade_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

}
