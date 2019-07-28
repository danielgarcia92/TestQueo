<?php

namespace Tests\Feature;

use App\Company;
use App\Employee;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads_the_employees_list_page()
    {
        $company = factory(Company::class)->create();

        $employee = factory(Employee::class)->create([
            'company_id' => $company->id
        ]);

        $this->get('/employees')
            ->assertStatus(200)
            ->assertSee($employee->first_name);
    }

    /** @test */
    public function it_loads_the_employees_list_page_with_empty_employees()
    {
        $this->get('/employees')
            ->assertStatus(200)
            ->assertSee('No hay empleados registrados');
    }

    /** @test */
    function it_loads_the_new_employees_page()
    {
        $this->get('/employees/new')
            ->assertStatus(200)
            ->assertSee('Nuevo Empleado');
    }

    /** @test */
    public function it_displays_the_employees_details_page()
    {
        $company = factory(Company::class)->create();

        $employee = factory(Employee::class)->create([
            'company_id' => $company->id
        ]);

        $this->get("/employees/{$employee->id}")
            ->assertStatus(200)
            ->assertSee($employee->first_name);
    }

    /** @test */
    public function it_displays_a_404_error_if_the_employee_is_not_found()
    {
        $this->get('/employees/999999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

}
