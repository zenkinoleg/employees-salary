<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
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
    /** @var \App\Entity\Employee */
    private $employee;

    /**
     * EmployeeController constructor.
     *
     * @param  \App\Entity\Employee  $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * List of all Employees
     *
     * @return View
     */
    public function all()
    {
        return view('employees/index', [
            'model'      => $this->employee->all(),
            'yesno_list' => YesNoList::LIST,
        ]);
    }

    /**
     * Get Employee record.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $model = $this->employee->findOrFail($id);
        if ($model->permanent) {
            abort('403');
        }

        return response()->json($model);
    }

    /**
     * Save Employee record.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id    = $request->input('id', 0);
        $model = $id ? $this->employee->findOrFail($id) : new Employee;
        $this->validate($request, ($this->employee)::rules($id));
        $model->fill(
            $request->except('_token')
        );
        $model->save();

        return response()->json($model);
    }

    /**
     * Delete Employee record.
     *
     * @param $id
     *
     * @throws \Exception
     * @return \Redirect
     */
    public function destroy($id)
    {
        $model = $this->employee->findOrFail($id);
        if ($model->permanent) {
            abort('403');
        }
        $model->delete();

        return redirect()->action(
            'EmployeeController@all'
        );
    }
}
