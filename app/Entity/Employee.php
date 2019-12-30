<?php

namespace App\Entity;

use App\Salary\SalaryMainPlan;
use App\Salary\SalaryTaxesOnlyPlan;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use App\Enum\YesNoList;

/**
 * Class Employee
 * @mixin Eloquent
 *
 * @property mixed birthday
 * @property double salary
 * @property mixed smoker
 * @property mixed kids
 * @property mixed rent_car
 * @property mixed permanent
 */
class Employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'permanent'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Validate fields.
     *
     * @param $id integer
     *
     * @return array
     */
    public static function rules($id): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:64',
                "unique:employees,name,$id",
            ],
            'salary' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'birthday' => [
                'required',
                'date',
            ],
            'kids' => [
                'integer',
                'min:0',
            ],
            'rent_car' => [
                'integer',
                'min:0',
                'digits_between:0,1',
            ],
            'smoker' => [
                'integer',
                'min:0',
                'digits_between:0,1',
            ]
        ];
    }

    /**
     * Salary Main Plan calculator object
     *
     * @var \App\Salary\SalaryMainPlan
    */
    private $salaryMainPlan;

    /**
     * Salary Taxes Only Plan calculator object
     *
     * @var \App\Salary\SalaryTaxesOnlyPlan
    */
    private $salaryTaxesOnlyPlan;

    /**
     * Since Laravel does not allow to inject services into Model objects
     * we use global helper resolve() to get an instance of needed service.
    */
    public function __construct()
    {
        parent::__construct();

        $this->salaryMainPlan = resolve(SalaryMainPlan::class);
        $this->salaryTaxesOnlyPlan = resolve(SalaryTaxesOnlyPlan::class);
    }

    /**
     * Custom property. Age of employee in years
     *
     * @return integer
     */
    public function getAgeAttribute()
    {
        $interval = date_diff(
            date_create($this->birthday),
            date_create(
                now()->toDateTimeString()
            )
        );

        return (int) $interval->format('%y');
    }

    /**
     * Custom property. How many kids employee have. Humanized
     *
     * @return string
     */
    public function getKidsHumanAttribute()
    {
        switch ($this->kids) {
            case 0:
                $result = 'No Kids';
                break;
            case 1:
                $result = 'One Kid';
                break;
            case 2:
                $result = 'Two Kids';
                break;
            case 3:
                $result = 'Three Kids';
                break;
            case 4:
                $result = 'Four Kids';
                break;
            default:
                $result = 'Full House';
                break;
        }
        return $result;
    }

    /**
     * Custom property. If employee use company's car. Humanized
     *
     * @return string
     */
    public function getRentCarHumanAttribute()
    {
        return YesNoList::LIST[$this->rent_car];
    }

    /**
     * Custom property. If an employee is a smoker. Humanized
     *
     * @return string
     */
    public function getSmokerHumanAttribute()
    {
        return YesNoList::LIST[$this->smoker];
    }

    /**
     * Custom property. Calculate total salary amount by summarizing
     * all bonuses and deductions included in current plan.
     * One of the beauty in here is that we have our SalaryMainPlan calculator
     * injected right into the Eloquent Model dynamic attribute
     *
     * @return number|string
     */
    public function getSalaryMainPlanAttribute()
    {
        return $this->formatSalarySting(
            $this->salary + $this->salaryMainPlan->calculate($this)
        );
    }

    /**
     * Custom property. Calculate SalaryTaxesOnly plan
     *
     * @return number|string
     */
    public function getSalaryTaxesOnlyPlanAttribute()
    {
        return $this->formatSalarySting(
            $this->salary + $this->salaryTaxesOnlyPlan->calculate($this)
        );
    }

    /**
     * @param  float  $value
     *
     * @return string
     */
    private function formatSalarySting(float $value)
    {
        // Example 3500.95
        return number_format($value, 2, '.', '');
    }
}
