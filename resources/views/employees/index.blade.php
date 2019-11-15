@extends('layouts.main')

@section('title')
Employees
@endsection

@section('content')

	<div class="float-right mb-3">
		<button id="btn_employee_new" type="button" class="btn btn-primary">New Employee</button>
	</div>

	@include('employees/edit_modal',[
	])

	@include('employees/grid',[
		'table' => 'employees_table',
		'model' => $model
	])

@endsection
