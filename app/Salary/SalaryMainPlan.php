<?php

namespace App\Salary;

/**
 * Main Salary Plan
 *  - bonus: reaching age of fifty
 *  - bonus: three kids
 *  - deduction: common country tax
 *  - deduction: rent car from company
 */
final class SalaryMainPlan extends SalaryVirtualPlan
{
    /**
     * Bonuses belong to current plan.
     */
    protected $bonuses = [
        'age_fifty'   => Strategy\SalaryBonusAgeFifty::class,
        'three_kids'  => Strategy\SalaryBonusThreeKids::class,
        'country_tax' => Strategy\SalaryDeductCountryTax::class,
        'car_rent'    => Strategy\SalaryDeductCarRent::class,
    ];
}
