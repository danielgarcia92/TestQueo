@extends('layout')

@section('title', 'Listado de Empleados')

@section('content')

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('employees.new') }}" class="btn btn-primary">Nuevo Empleado</a>
        </p>
    </div>

    @if ($employees->isNotEmpty())
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Empresa</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <th>{{ $employee->id }}</th>
                    <td>{{ "$employee->first_name $employee->last_name" }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{  route('employees.show', $employee)  }}"><i class="fas fa-eye btn btn-link"></i></a>|
                            <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt btn btn-link"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No hay empleados registrados </p>
    @endif

@endsection
