<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembroCargo extends Model 
{
    use HasFactory;

    protected $table = 'membros_cargos'; 

    protected $fillable = ['cargo'];

    public function membros()
    {
        return $this->hasMany(Membro::class, 'cargo');
    }
}