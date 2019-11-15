<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Employee;
use App\Enum\YesNoList;

/**
 * Once again we use Laravel Controller the most natural way it supposed to be
 * to wit as a business logic handler itself. Especially when we don't really have
 * sophisticated stuff in here. No need for extra layer.
 */
class EmployeeController extends Controller
{
    const MODEL = \App\Entity\Employee::class;

    /**
     * List of all Employees
     *
     * @return View
     */
    public function all()
    {
        return view('employees/index', [
            'model' => (self::MODEL)::all(),
            'yesno_list' => YesNoList::LIST
        ]);
    }

    /**
     * Get Employee record.
     *
     * @return Json|Redirect
     */
    public function edit($id)
    {
        $model = (self::MODEL)::findOrFail($id);
        if ($model->permanent) {
            abort('403');
        }

        return $model->toJson();
    }

    /**
     * Save Employee record.
     *
     * @return void|Redirect
     */
    public function save(Request $request)
    {
        $id = $request->input('id', 0);
        $model = $id ? (self::MODEL)::findOrFail($id) : new Employee;
        $this->validate($request, (self::MODEL)::rules($id));
        $model->fill(
            $request->except('_token')
        );
        $model->save();
    }

    /**
     * Delete Employee record.
     *
     * @return Redirect
     */
    public function delete($id)
    {
        $model = (self::MODEL)::findOrFail($id);
        if ($model->permanent) {
            abort('403');
        }
        $model->delete();

        return redirect()->action('EmployeeController@all');
    }
}
