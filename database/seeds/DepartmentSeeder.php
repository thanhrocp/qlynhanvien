<?php

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startTime = microtime(true);

        Department::query()->truncate();
        factory(Department::class, 100)->create();

        echo (microtime(true) - $startTime) . " sec.\n";
    }
}
