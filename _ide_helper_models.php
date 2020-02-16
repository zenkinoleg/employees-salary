<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Entity{
/**
 * Class Employee
 *
 * @mixin Eloquent
 * @property mixed birthday
 * @property double salary
 * @property mixed smoker
 * @property mixed kids
 * @property mixed rent_car
 * @property mixed permanent
 * @property int $id
 * @property string $name
 * @property float $salary
 * @property string $birthday
 * @property int $kids
 * @property int $rent_car
 * @property int $permanent
 * @property int $smoker
 * @property-read int $age
 * @property-read string $kids_human
 * @property-read string $rent_car_human
 * @property-read \number|string $salary_main_plan
 * @property-read \number|string $salary_taxes_only_plan
 * @property-read string $smoker_human
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereKids($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee wherePermanent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereRentCar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Employee whereSmoker($value)
 */
	class Employee extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

