<div class="row field-rent_car">
	<div class="col-sm-6">
		<div class="fg-line form-group">
			<label for="rent_car">Rent Car:</label>
			<select id="rent_car" name="rent_car" class="form-control">
			@foreach($yesno_list as $key=>$val)
				<option value="{{$key}}">{{$val}}</option>
			@endforeach
			</select>
		</div>
	</div>
</div>
