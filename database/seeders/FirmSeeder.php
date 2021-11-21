<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Firm;
use App\Models\Employee;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Firm::factory(10)->create();

        foreach (Firm::all() as $firm) {
            $employees = Employee::inRandomOrder()->take(rand(1,3))->pluck('id');
            $firm->employees()->attach($employees);
        }
    }
}
