@extends('layout')

@section('title', 'Editar Empresa')

@section('content')

    <div class="mx-auto w-50 card">
        <h4 class="card-header">Editar {{ $company->name }}</h4>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Por favor corregir los siguiente errores:</h6>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url("companies/{$company->id}") }}" class="needs-validation" novalidate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="input-container">
                    <i class="fa fa-user-circle icon"></i>
                    <input type="text" name="name" class="input-field" placeholder="Nombre" value="{{ old('name', $company->name) }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input type="text" name="email" class="input-field" placeholder="Correo electrónico" value="{{ old('email', $company->email) }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-laptop icon"></i>
                    <input type="text" name="website" class="input-field" placeholder="Website" value="{{ old('profession_id', $company->website) }}"/>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
                <a href="{{ route('companies.index') }}" class="btn btn-link">Regresar al listado de empresas</a>
            </form>
        </div>
    </div>

@endsection
