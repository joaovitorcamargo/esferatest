<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function register(){
        return view('registercompany');
    }
    public function confirmregister(Request $request){
        $company = $request->only(['nome', 'email', 'logotipo', 'site']);
        $namefile = '';
        if($request->hasFile('logotipo') && $request->file('logotipo')->isValid()){
            $extension = $request->logotipo->extension();
            $namefile = "{$request->nome}.{$extension}";

            $request->logotipo->storeAs('logos', $namefile, 'public');
        }

        Empresa::create([
            'nome'=>$company['nome'],
            'email'=>$company['email'],
            'logotipo'=>$namefile,
            'site'=>$company['site']
        ]);

        return redirect()->route('home');
    }

    public function edit($id){
        $company = Empresa::find($id);
        return view('editcompany',compact('company'));
    }
    public function update(Request $request,$id){
        $company = Empresa::find($id);
        $companyRequest = $request->only(['nome', 'email', 'logotipo', 'site']);
        $namefile = '';
        if($request->hasFile('logotipo') && $request->file('logotipo')->isValid()){
            $extension = $request->logotipo->extension();
            $namefile = "{$request->nome}.{$extension}";

            $request->logotipo->storeAs('logos', $namefile, 'public');
        }
        $company->update([
            'nome'=>$companyRequest['nome'],
            'email'=>$companyRequest['email'],
            'logotipo'=> $namefile,
            'site'=>$companyRequest['site']
        ]);
        return redirect()->route('home');
    }

    public function destroy($id){
        $company = Empresa::find($id);
        if(!$company){
            return redirect()->back();
        }
        $company->delete();
        return redirect()->route('home');
    }
}
