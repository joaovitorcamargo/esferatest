<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FuncionarioController extends Controller
{
    public function register(){
        $companies = Empresa::all();
        return view('registercolaborator', compact('companies'));
    }
    public function confirmregister(Request $request){
        $colaborator = $request->only(['nome', 'sobrenome', 'empresa', 'email','telefone']);
        Funcionario::create($colaborator);
        $funcionario = new Funcionario();
        $funcionario = $funcionario->where('email',$request['email'])->first();
        $funcionario->empresas()->attach($colaborator['empresa']);
        return redirect()->route('home');
    }
    public function edit($id){
        $colaborator = Funcionario::find($id);
        $companies = Empresa::all();
        return view('editcolaborator',compact(['colaborator','companies']));
    }

    public function update(Request $request,$id){
        $colaborator = Funcionario::find($id);
        $colaboratorRequest = $request->only(['nome', 'sobrenome', 'empresa', 'email', 'telefone']);
        $funcionario = new Funcionario();
        $funcionario->id = Auth()->user()->id;
        $colaborator->update([
            'nome'=>$colaboratorRequest['nome'],
            'sobrenome'=>$colaboratorRequest['sobrenome'],
            'empresa'=>$colaboratorRequest['empresa'],
            'email'=> $colaboratorRequest['email'],
            'telefone'=>$colaboratorRequest['telefone']
        ]);
        $funcionario->empresas()->sync($colaborator['empresa']);
        return redirect()->route('home');
    }

    public function destroy($id){
        $funcionario = Funcionario::find($id);
        $company = new Empresa();
        $company->id = $funcionario->empresas[0]->id;
        if(!$funcionario){
            return redirect()->back();
        }
        $company->funcionarios()->detach($funcionario->empresas[0]->id);
        $funcionario->delete();
        return redirect()->route('home');
    }
}
