<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents Main Company Salary Plan
 * Contains the whole list of deductions/mixed related to it
 */
final class SalaryTaxesOnlyPlan
{
    /**
     * Represents set of deductions and mixed tags refering to Class releases them accordingly
    */
    private $bonuses = [
        'country_tax' => Strategy\SalaryDeductCountryTax::class,
        'car_rent' => Strategy\SalaryDeductCarRent::class,
        'smoker' => Strategy\SalaryMixedSmoker::class
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
