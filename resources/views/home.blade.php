@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>
                <a href="{{route('registercompany')}}" class="btn w-25 mt-2 btn-success">Create New Company</a>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">{{ __('Companies List') }}</div>
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Logotipo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Website</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                <td><img src="{{url("storage/logos/$company->logotipo")}}" class="img-thumbnail"></td>
                                <td>{{$company->nome}}</td>
                                <td>{{$company->site}}</td>
                                <td>{{$company->email}}</td>
                                <td>
                                    <a href="{{route('editcompany',$company->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('removecompany',$company->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            {{$companies->links('pagination::bootstrap-4')}}
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card mt-2">
                <div class="card-header">{{ __('Colaborator List') }}</div>
                <a href="{{route('registercolaborator')}}" class="btn w-25 mt-2 btn-success">Create New Colaborator</a>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">{{ __('Colaborator List') }}</div>
                        <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($funcionarios as $funcionario)
                                <tr>
                                <td>{{$funcionario->nome}}</td>
                                <td>{{$funcionario->sobrenome}}</td>
                                @if (!count($funcionario->empresas))
                                    <td>Empresa não criada ou removida</td>
                                @else
                                    @foreach ($funcionario->empresas as $empresa)
                                        <td>{{$empresa->nome ?? 'Empresa não criada ou removida'}}</td>
                                    @endforeach
                                @endif
                                <td>{{$funcionario->email}}</td>
                                <td>{{$funcionario->telefone}}</td>
                                <td>
                                    <a href="{{route('editcolaborator',$funcionario->id)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('removecolaborator',$funcionario->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            {{$funcionarios->links('pagination::bootstrap-4')}}
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
