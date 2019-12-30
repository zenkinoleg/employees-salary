<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;

/**
 * Virtual Salary Plan Calculator.
 */
abstract class SalaryVirtualPlan
{
    /**
     * All inheriting classes must provide list of
     * bonuses/deduction/mixed to be calculated altogether
     *
     * @var array
    */
    protected $bonuses = [
//      'tagName' => '\App\Somewhere\Where\Your\Class\Is';
    ];

    /**
     * Calculate all bonuses defined in @bonuses
     *
     * @param  \Illuminate\Database\Eloquent\Model  $employee
     *
     * @return float
     */
    public function calculate(Model $employee) : float
    {
        $result = 0;
        foreach ($this->bonuses as $tag => $classname) {
            $result += (new $classname)->getBonus($employee);
        }

        return $result;
    }
}
