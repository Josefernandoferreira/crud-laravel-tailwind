<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';
    protected $primaryKey = 'id';
    protected $fillable = ['matricula', 'nome', 'curso_id', 'cep', 'logradouro', 'bairro', 'localidade', 'uf'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
