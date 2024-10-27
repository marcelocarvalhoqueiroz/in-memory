<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankSombra extends Model
{
    use HasFactory;

    protected $fillable = ['rank'];

    // Relacionamento com a tabela membros (rank_entrada)
    public function membrosEntrada()
    {
        return $this->hasMany(Membro::class, 'rank_entrada');
    }

    // Relacionamento com a tabela membros (rank_atual)
    public function membrosAtual()
    {
        return $this->hasMany(Membro::class, 'rank_atual');
    }
}