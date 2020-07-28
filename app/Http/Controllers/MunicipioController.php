<?php

namespace App\Http\Controllers;

use App\Municipio;
use App\Uf;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function index(){
        $municipio = Municipio::All();
        $ufs = Uf::All();
        return view('site.municipio', ['municipio' => $municipio, 'ufs' => $ufs]);
    }

    public function store(Request $request){
        $municipio = new Municipio();
        $municipio->SGL_UNIDADE_FEDERATIVA = $request->uf;
        $municipio->NOM_MUNICIPIO = $request->municipio;
        $municipio->NUM_POPULACAO = $request->populacao;
        $municipio->NOM_PREFEITO = $request->prefeito;
        $municipio->save();

        return Redirect('/municipio');
    }

    public function update(Request $request, $cod){
        Municipio::where('COD_MUNICIPIO', $cod)
        ->update([
            'SGL_UNIDADE_FEDERATIVA' => $request->uf,
            'NOM_MUNICIPIO' => $request->municipio,
            'NUM_POPULACAO' => $request->populacao,
            'NOM_PREFEITO' => $request->prefeito
        ]);

        return redirect('/municipio');
    }

    public function delete($cod){
        Municipio::where('COD_MUNICIPIO', $cod)->delete();

        return redirect('/municipio');
    }

}
