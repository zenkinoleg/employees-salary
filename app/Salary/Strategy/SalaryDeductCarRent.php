<?php

namespace App\Salary\Strategy;

use Illuminate\Database\Eloquent\Model;
use App\Salary\SalaryBonusInterface;

/**
 * If an employee wants to use a company car we need to deduct $500.
 */
class SalaryDeductCarRent implements SalaryBonusInterface
{
    /**
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     *
     * @return float
     */
    public function getBonus(Model $employee) : float
    {
        return $employee->rent_car ? -500 : 0;
    }
}
