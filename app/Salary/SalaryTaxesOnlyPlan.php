<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;
use App\Salary\SalaryVirtualPlan;

/**
 * Taxes Only Plan
 *
 *  - deduction: common country tax
 *  - deduction: rent car from company
 *  - mixed: employee is a smoker
 */
final class SalaryTaxesOnlyPlan extends SalaryVirtualPlan
{
    /**
     * Represents set of deductions and mixed tags refering to Class releases them accordingly
    */
    protected $bonuses = [
        'country_tax' => Strategy\SalaryDeductCountryTax::class,
        'car_rent' => Strategy\SalaryDeductCarRent::class,
        'smoker' => Strategy\SalaryMixedSmoker::class
    ];
}
