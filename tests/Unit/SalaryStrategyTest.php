<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Entity\Employee;
use App\Salary\Strategy\SalaryBonusAgeFifty;

class SalaryBonusAgeFiftyTest extends TestCase
{
    /**
     * @dataProvider DataProvider
     */
    public function testSalaryBonusAgeFiftyTest($salary,$birthday,$result)
    {
		$strategy = new SalaryBonusAgeFifty;
		$employee = new Employee;

		$employee->salary = $salary;
		$employee->birthday = $birthday;

        $this->assertTrue(
			$strategy->getBonus($employee) == $result
		);
    }

	public function DataProvider()
	{
		return [
			[ 1000, '1993-02-11', 0 ],
			[ 1000, '1969-09-21', 70 ],
			[ 1000, '1983-01-01', 0 ],
			[ 0, '1655-01-01', 0 ],
		];
	}
}
