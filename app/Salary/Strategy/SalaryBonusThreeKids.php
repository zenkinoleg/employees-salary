<?php

namespace App\Salary\Strategy;

use Illuminate\Database\Eloquent\Model;
use App\Salary\SalaryBonusInterface;

/**
 * If an employee has more than 2 kids we want to decrease his Tax by 2%
 */
class SalaryBonusThreeKids implements SalaryBonusInterface
{
    public function getBonus(Model $employee) : float
    {
        return $employee->kids > 2 ? $employee->salary * .02 : 0;
    }
}
