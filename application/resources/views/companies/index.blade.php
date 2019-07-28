@extends('layout')

@section('title', 'Listado de Empresas')

@section('content')

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('companies.new') }}" class="btn btn-primary">Nueva Empresa</a>
        </p>
    </div>

    @if ($companies->isNotEmpty())
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($companies as $valor => $company)
                <tr>
                    <th>{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{  route('companies.show', $company)  }}"><i class="fas fa-eye btn btn-link"></i></a>
                            <a href="{{  route('companies.edit', $company)  }}"><i class="fas fa-edit btn btn-link"></i></a>
                            @if ($company->employees->isEmpty())
                                <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt btn btn-link"></i></button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No hay empresas registradas </p>
    @endif

@endsection
