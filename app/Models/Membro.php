<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nick',
        'cargo',
        'data_entrada',
        'cd',
        'numero_cel',
        'participa_comunidade',
        'rank_entrada',
        'tc_entrada',
        'nv_entrada',
        'rank_atual',
        'tc_atual',
        'nv_atual',
        'ressonancia',
        'rank_cb',
    ];

    // Relacionamento com a tabela cargos
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo'); 
    }

    // Relacionamento com a tabela rank_sombras para rank_entrada
    public function rankEntrada()
    {
        return $this->belongsTo(RankSombra::class, 'rank_entrada');
    }

    // Relacionamento com a tabela rank_sombras para rank_atual
    public function rankAtual()
    {
        return $this->belongsTo(RankSombra::class, 'rank_atual');
    }
}