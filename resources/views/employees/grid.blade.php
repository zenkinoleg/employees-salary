<table id="{{$table}}" class="table table-striped">

	<thead>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Age</th>
		<th>Kids</th>
		<th>Rent Car</th>
		<th>A Smoker</th>
		<th>Salary Rate</th>
		<th>Main Plan</th>
		<th>Tax Plan</th>
		<th>Actions</th>
	</tr>
	</thead>

	<tbody>
	@foreach($model as $item)
	<tr id="tr{{$item->id}}" rec_id="{{$item->id}}">
		<td>{{$item->id}}</td>
		<td>{{$item->name}}</td>
		<td>{{$item->age}}</td>
		<td>{{$item->kids_human}}</td>
		<td>{{$item->rent_car_human}}</td>
		<td>{{$item->smoker_human}}</td>
		<td>{{$item->salary}}</td>
		<td>{{$item->salary_main_plan}}</td>
		<td>{{$item->salary_taxes_only_plan}}</td>
        <td>
		@if($item->permanent)
			<a href="#" class="btn btn-success btn-sm permanent_rec">Permanent</a>
		@else
			<a href="#" class="btn btn-warning btn-sm edit_rec">Edit</a>
			<a href="#" class="btn btn-danger btn-sm delete_rec">Delete</a>
		@endif
		</td>
	</tr>
	@endforeach
    </tbody>

</table>
