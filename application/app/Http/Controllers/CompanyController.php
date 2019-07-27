<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function indexAction()
    {
        $companies = Company::all();

        return view('companies.index')
            ->with('title', 'Listado de Empresas')
            ->with(compact('companies'));
    }

    public function createAction()
    {
        return view('companies.create');
    }

    public function destroyAction(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index');
    }

    public function editAction(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function showAction(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function storeAction()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:companies,email'],
            'website' => 'required'
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo correo es obligatorio',
            'email.email' => 'Por favor ingrese una dirección de correo válida',
            'website.required' => 'El campo website es obligatorio'
        ]);

        Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'website' => $data['website']
        ]);

        return redirect()->route('companies.index');
    }

    public function updateAction(Company $company)
    {
        $data = request()->validate([
            'name' => 'required',
            'website' => 'required',
            'email' => ['required', 'email', Rule::unique('companies')->ignore($company->id)]
        ]);

        $company->update($data);

        return redirect()->route('companies.show', ['company' => $company]);
    }
}
