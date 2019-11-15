<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents Main Company Salary Plan
 * Contains the whole list of bonuses and deductions related to it
 */
final class SalaryMainPlan
{
    /**
     * Represents set of bonuses and deductions tags refering to Class releases them accordingly
    */
    private $bonuses = [
        'age' => Strategy\SalaryBonusAgeFifty::class,
        'three_kids' => Strategy\SalaryBonusThreeKids::class,
        'country_tax' => Strategy\SalaryDeductCountryTax::class,
        'car_rent' => Strategy\SalaryDeductCarRent::class
    ];

    public function calculate(Model $employee) : float
    {
        $result = 0;
        foreach ($this->bonuses as $tag => $classname) {
            $result += (new $classname)->getBonus($employee);
        }

        return $result;
    }
}
