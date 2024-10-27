<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use App\Models\RankSombra;
use App\Models\MembroCargo;
use Illuminate\Http\Request;

class MembroController extends Controller
{

    public function index(){
        $ranks = RankSombra::get();
        $cargos = MembroCargo::get();

        return view('home', [
            'ranks' => $ranks,
            'cargos' => $cargos
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validação dos dados recebidos
        $request->validate([
            'nick' => 'required|string|max:255',
            //'cargo' => 'required|integer',
            //'data_entrada' => 'required|date',
            'rank_entrada' => 'required|integer',
            // adicione outras validações conforme necessário
        ]);

        // 2. Criação do novo membro
        $membro = Membro::create([
            'nick' => $request->input('nick'),
            //'cargo' => $request->input('cargo'),
            'cargo' => 1,
            'data_entrada' => now(),
            //'data_entrada' => $request->input('data_entrada'),
            'rank_entrada' => $request->input('rank_entrada'),
            // outros campos do formulário
        ]);

        // 3. Retorno da resposta em JSON
        return response()->json([
            'message' => 'Membro cadastrado com sucesso!',
            'membro' => $membro // opcional: retorna os dados do membro cadastrado
        ]);
    }

    public function show(){
        $membros = Membro::get();

        $total = Membro::count();

        return view('membros', [
            'membros' => $membros,
            'total' => $total
        ]);
    }

    public function showDetail($id){
        $membro = Membro::where('id', $id)->first();

        return view('detalhe',[
            'membro' => $membro
        ]);
    }

    public function viraSemana(){
        Membro::query()->update(['cd' => false]);

        return response()->json([
            'message' => 'Semana alterada com sucesso!',
            'status' => 'OK'
        ]);
    }
}