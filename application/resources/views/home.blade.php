@extends('layout')

@section('title', 'Inicio')

@section('content')

    <div class="mx-auto w-50 card">
        <h1 class="card-header">¿Qué desea hacer?</h1>

        <div class="card-body">
            <div class="alert alert-primary">
                <h5><a href="{{  route('companies.index')  }}">Ver lista de Empresas</a></h5>
                <h5><a href="{{  route('employees.index')  }}">Ver lista de Empleados</a></h5>
            </div>
        </div>
    </div>

@endsection
