@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Create New Company') }}</div>
                <div class="card-body">
                    <form action="{{route('confirmregistercolaborator')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input name="nome" type="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sobrenome</label>
                            <input name="sobrenome" type="text" class="form-control" placeholder="Sobrenome">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Empresa</label>
                            <select name="empresa" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telefone</label>
                            <input name="telefone" type="text" class="form-control" placeholder="Telefone">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
