<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function indexAction()
    {
        $employees = Employee::all();

        return view('employees.index')
            ->with('title', 'Listado de Empleados')
            ->with(compact('employees'));
    }

    public function createAction()
    {
        $companies = Company::all();

        return view('employees.create')
            ->with(compact('companies'));
    }

    public function destroyAction(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function editAction(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function showAction(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function storeAction()
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email','unique:employees,email'],
            'company' => 'required',
            'phone' => 'required'
        ], [
            'first_name.required' => 'El campo nombre es obligatorio',
            'last_name.required' => 'El campo apellido es obligatorio',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'Por favor ingrese una dirección de correo válida',
            'company.required' => 'El campo empresa es obligatorio',
            'phone.required' => 'El campo teléfono es obligatorio'
        ]);

        Employee::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'company_id' => $data['company'],
            'phone' => $data['phone']
        ]);

        return redirect()->route('employees.index');
    }

    public function updateAction(Employee $employee)
    {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => ['required', 'email', Rule::unique('employees')->ignore($employee->id)],
            'phone' => 'required'
        ]);

        $employee->update($data);

        return redirect()->route('employees.show', ['employee' => $employee]);
    }
}
