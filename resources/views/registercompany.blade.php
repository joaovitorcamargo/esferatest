@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">{{ __('Create New Company') }}</div>
                <div class="card-body">
                    <form action="{{route('confirmregistercompany')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome</label>
                            <input name="nome" type="nome" class="form-control" placeholder="Empresa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Logotipo</label>
                            <input name="logotipo" type="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Website</label>
                            <input name="site" type="text" class="form-control" placeholder="Website">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
