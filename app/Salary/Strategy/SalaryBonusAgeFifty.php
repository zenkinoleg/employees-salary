<?php

namespace App\Salary\Strategy;

use Illuminate\Database\Eloquent\Model;
use App\Salary\SalaryBonusInterface;

/**
 * If an employee older than 50 we want to add 7% to his salary.
 */
class SalaryBonusAgeFifty implements SalaryBonusInterface
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     *
     * @return float
     */
    public function getBonus(Model $employee) : float
    {
        return $employee->age >= 50 ? $employee->salary * .07 : 0;
    }
}
