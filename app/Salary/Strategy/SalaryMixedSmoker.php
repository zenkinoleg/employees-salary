<?php

namespace App\Salary\Strategy;

use Illuminate\Database\Eloquent\Model;
use App\Salary\SalaryBonusInterface;

/**
 * If an employee is a smoker we will deduct $500,
 * if he is not we will grant him for $300.
 */
class SalaryMixedSmoker implements SalaryBonusInterface
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     *
     * @return float
     */
    public function getBonus(Model $employee) : float
    {
        return $employee->smoker ? -500 : 300;

    }
}
