<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use App\Enum\YesNoList;

/**
 * Many programmers misinterpret Eloquent Model class. They think this is just a persistance layer of data
 * But it's not. This is where you keep all your Business Logic related to the current Enitity. In fact,
 * this is a Business Unit. If you don't like Active Record "Anti-Pattern" which Eloquent releases, well
 * just don't use it, go pure and wild and do what you want, but since we pick Laravel we gonna use all
 * benefits it provides.
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
    protected $guarded = [ 'id', 'permanent' ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Validate fields.
     *
     * @return array
     */
    public static function rules($id): array
    {
        return [
            'name' => [ 'required', 'string', 'max:64', "unique:employees,name,$id" ],
            'salary' => [ 'required', 'numeric', 'min:0.01' ],
            'birthday' => [ 'required', 'date' ],
            'kids' => [ 'integer', 'min:0' ],
            'rent_car' => [ 'integer', 'min:0', 'digits_between:0,1' ]
        ];
    }

    /**
     * Salary Main Plan calculator object
     *
     * @var App\Salary\MainPlan
    */
    private $salaryMainPlan;

    /**
     * Since Laraval does not allow to inject services into Model objects
     * we use global helper resolve() to get an instance of needed service.
    */
    public function __construct()
    {
        $this->salaryMainPlan = resolve(\App\Salary\SalaryMainPlan::class);
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
        $result = '';
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
     * Custom property. Calculte total salary amount by summarizing
     * all bonuses and deductions included in current plan.
     * One of the beauty in here is that we have our SalaryMainPlan calculator
     * injected right into the Eloquent Model dynamic attribute
     *
     * @return number
     */
    public function getSalaryMainPlanAttribute()
    {
        $salaryTotal = $this->salary + $this->salaryMainPlan->calculate($this);

        // Example 3500.95
        return number_format($salaryTotal, 2, '.', '');
    }
}
