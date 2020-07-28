<?php

namespace App\Http\Controllers;

use App\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function index(){
        $ufs = Uf::All();
        return view('site.uf', ['ufs' => $ufs]);
    }

    public function store(Request $request){
        $uf = new Uf();
        $uf->SGL_UNIDADE_FEDERATIVA = $request->sigla;
        $uf->NOM_UNIDADE = $request->uf;
        $uf->save();

        return redirect('/uf');
    }

    public function update(Request $request, $siglaUf){

        Uf::where('SGL_UNIDADE_FEDERATIVA',$siglaUf)->update([
                'SGL_UNIDADE_FEDERATIVA' => $request->sigla,
                'NOM_UNIDADE' => $request->uf]);

        return redirect('/uf');
    }

    public function delete($siglaUf){
        Uf::where('SGL_UNIDADE_FEDERATIVA', $siglaUf)->delete();

        return redirect('/uf');
    }

}

