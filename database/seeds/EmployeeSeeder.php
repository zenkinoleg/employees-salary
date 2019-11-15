<?php

use Illuminate\Database\Seeder;
use App\Entity\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Three permanent records
     */
    private $employees = [
        [
            'name' => 'Alice',
            'salary' => 6000,
            'birthday' => '1993-02-11 20:05:12',
            'kids' => 2,
            'rent_car' => 0,
            'permanent' => 1,
        ] , [
            'name' => 'Bob',
            'salary' => 4000,
            'birthday' => '1969-09-21 10:35:52',
            'kids' => 0,
            'rent_car' => 1,
            'permanent' => 1,
        ] , [
            'name' => 'Charlie',
            'salary' => 5000,
            'birthday' => '1983-01-01 06:06:06',
            'kids' => 3,
            'rent_car' => 1,
            'permanent' => 1,
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->employees as $item) {
			$emp = new Employee;
			$emp->fill($item);
			$emp->save();
        }
    }
}
