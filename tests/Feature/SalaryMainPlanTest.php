<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Entity\Employee;

class SalaryMainPlanTest extends TestCase
{
    /**
     * @dataProvider EmployeeDataProvider
     */
    public function testSalaryMainPlanTest($salary,$birthday,$kids,$rent_car,$mainPlan)
    {
		$employee = new Employee;
		$employee->salary = $salary;
		$employee->birthday = $birthday;
		$employee->kids = $kids;
		$employee->rent_car = $rent_car;

        $this->assertTrue($employee->salaryMainPlan == $mainPlan);
    }

	public function EmployeeDataProvider()
	{
		return [
			[ 6000, '1993-02-11', 2, 0, 4800 ],
			[ 4000, '1969-09-21', 0, 1, 2980 ],
			[ 5000, '1983-01-01', 3, 1, 3600 ],
		];
	}
}
