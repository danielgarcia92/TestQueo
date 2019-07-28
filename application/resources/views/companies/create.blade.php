@extends('layout')

@section('title', 'Nueva Empresa')

@section('content')

    <div class="mx-auto w-50 card">
        <h4 class="card-header">Nueva Empresa</h4>
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

            <form method="POST" action="{{ url('companies') }}" class="needs-validation" novalidate>
                {!! csrf_field() !!}

                <div class="input-container">
                    <i class="fa fa-user-circle icon"></i>
                    <input type="text" name="name" class="input-field" placeholder="Nombre" value="{{ old('name') }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-envelope icon" aria-hidden="true"></i>
                    <input type="text" name="email" class="input-field" placeholder="Correo electrónico"
                           value="{{ old('email') }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-laptop icon" aria-hidden="true"></i>
                    <input type="text" name="website" class="input-field" placeholder="Website"
                           value="{{ old('website') }}"/>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Nueva Empresa</button>
                <a href="{{ route('companies.index') }}" class="btn btn-link">Regresar al listado de empresas</a>
            </form>
        </div>

    </div>

@endsection
