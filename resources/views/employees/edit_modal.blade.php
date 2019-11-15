<div id="mdl_employee_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">

	<div class="modal-header">
		<h5 class="modal-title">Employee Record</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="modal-body">
		<div class="message"></div>
		<form action="/employees/save">
			@include('employees/field_name')
			@include('employees/field_birthday')
			@include('employees/field_salary')
			@include('employees/field_rent_car')
			@include('employees/field_smoker')
			@include('employees/field_kids')
			<input id="csrf_token" type="hidden" value="{{csrf_token()}}" />
			<input name="id" id="rec_id" type="hidden" value="" />
		</form>
	</div>

	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		<button type="button" class="btn btn-primary form_submit">Submit</button>
		<input id="employee_json" type="hidden" value="" />
	</div>

</div>
</div>
</div>
