<?php

namespace App\Salary\Strategy;

use Illuminate\Database\Eloquent\Model;
use App\Salary\SalaryBonusInterface;

/**
 * Country Tax for salaries is 20%.
 */
class SalaryDeductCountryTax implements SalaryBonusInterface
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     *
     * @return float
     */
    public function getBonus(Model $employee) : float
    {
        return $employee->salary * -.2;
    }
}
