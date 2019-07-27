<?php

namespace Tests\Feature;

use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompaniesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads_the_companies_list_page()
    {
        $company = factory(Company::class)->create();

        $this->get('/companies')
            ->assertStatus(200)
            ->assertSee($company->name);
    }

    /** @test */
    public function it_loads_the_companies_list_page_with_empty_companies()
    {
        $this->get('/companies')
            ->assertStatus(200)
            ->assertSee('No hay empresas registradas');
    }

    /** @test */
    function it_loads_the_new_companies_page()
    {
        $this->get('/companies/new')
            ->assertStatus(200)
            ->assertSee('Nueva Empresa');
    }

    /** @test */
    public function it_displays_the_companies_details_page()
    {
        $company = factory(Company::class)->create();

        $this->get("/companies/{$company->id}")
            ->assertStatus(200)
            ->assertSee($company->name);
    }

    /** @test */
    public function it_displays_a_404_error_if_the_company_is_not_found()
    {
        $this->get('/companies/999999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /** @test */
    public function it_creates_a_new_company()
    {
        $this->withoutMiddleware();

        $this->post('companies', [
            'name' => 'Name Test',
            'email' => 'correo@correo.mx',
            'website' => 'testwebsite.com'
        ])->assertRedirect('companies');

    }

    /** @test */
    public function the_name_is_required()
    {
        $this->withoutMiddleware();

        $this->from('companies/new')
            ->post('companies', [
                'name' => '',
                'email' => 'correo@correo.mx',
                'website' => 'testwebsite.com'
            ])
            ->assertRedirect('companies/new')
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertEquals(0, Company::count());
    }

    /** @test */
    public function the_name_is_required_when_updating_a_company()
    {
        $company = factory(Company::class)->create();

        $this->withoutMiddleware();

        $this->from("companies/{$company->id}/edit")
            ->put("companies/{$company->id}", [
                'name' => '',
                'email' => 'correo@correo.mx',
                'website' => 'testwebsite.com'
            ])
            ->assertRedirect("companies/{$company->id}/edit")
            ->assertSessionHasErrors('name');

        $this->assertDatabaseMissing('companies', ['email' => 'correo@correo.mx']);
    }
}
