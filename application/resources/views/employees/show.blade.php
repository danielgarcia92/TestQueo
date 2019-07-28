@extends('layout')

@section('title', "Detalles del empleado")

@section('content')

    <div class="mx-auto w-50 card">
        <h1 class="card-header">Empleado # {{ $employee->id }}</h1>

        <div class="card-body">
            <p>Nombre del empleado: {{ "$employee->first_name $employee->last_name" }}</p>
            <p>Correo electrónico: {{$employee->email}}</p>
            <p>Empresa: {{$employee->company->name}}</p>
            <p>Teléfono: {{$employee->phone}}</p>

            <p>
                <a href="{{  route('employees.index')  }}">Regresar</a>
            </p>
        </div>
    </div>

@endsection
