@extends('layout')

@section('title', "Detalles de la empresa")

@section('content')

    <div class="mx-auto w-50 card">
        <h1 class="card-header">Empresa # {{ $company->id }}</h1>

        <div class="card-body">
            <p>Nombre de la empresa: {{ $company->name }}</p>
            <p>Correo electrónico: {{$company->email}}</p>

            <p>
                <a href="{{  route('companies.index')  }}">Regresar</a>
            </p>
        </div>
    </div>

@endsection
