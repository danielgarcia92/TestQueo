<?php

use App\Company;
use App\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyId = Company::get()->first()->id;

        factory(Employee::class)->create([
            'company_id' => $companyId
        ]);
    }
}
