<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id';
    protected $fillable = ['codigo_curso', 'nome_curso'];

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
