<?php

namespace App\Salary;

use Illuminate\Database\Eloquent\Model;

/**
 * Common interface to handle both bonuses and deductions
 * A strategy pattern allows us to incapsulate each bonus separately from others
 * what makes all bunch of Salary classes low coupled and highly cohased at the same time.
 * To be noticed we still depend on Eloquent Model class. But since Laravel
 * has been chosen for this release as a core, it doesn't really matter.
*/
interface SalaryBonusInterface
{
    public function getBonus(Model $model) : float;
}
