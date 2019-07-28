@extends('layout')

@section('title', 'Nuevo Empleado')

@section('content')

    <div class="mx-auto w-50 card">
        <h4 class="card-header">Nuevo Empleado</h4>
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

            <form method="POST" action="{{ url('employees') }}" class="needs-validation" novalidate>
                {!! csrf_field() !!}

                <div class="input-container">
                    <i class="fa fa-user-circle icon"></i>
                    <input type="text" name="first_name" class="input-field" placeholder="Nombre"
                           value="{{ old('first_name') }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-user-circle icon"></i>
                    <input type="text" name="last_name" class="input-field" placeholder="Apellido"
                           value="{{ old('last_name') }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-envelope icon" aria-hidden="true"></i>
                    <input type="text" name="email" class="input-field" placeholder="Correo electrónico"
                           value="{{ old('email') }}"/>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-building icon" aria-hidden="true"></i>
                    <select name="company" class="input-field" placeholder="Empresa">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="input-container">
                    <i class="fa fa-phone icon" aria-hidden="true"></i>
                    <input type="number" name="phone" class="input-field" placeholder="Teléfono"
                           value="{{ old('phone') }}"/>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Nuevo Empleado</button>
                <a href="{{ route('employees.index') }}" class="btn btn-link">Regresar al listado de empleados</a>
            </form>
        </div>

    </div>

@endsection
