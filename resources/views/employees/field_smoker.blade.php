<div class="row field-smoker">
	<div class="col-sm-6">
		<div class="fg-line form-group">
			<label for="smoker">A Smoker:</label>
			<select id="smoker" name="smoker" class="form-control">
			@foreach($yesno_list as $key=>$val)
				<option value="{{$key}}">{{$val}}</option>
			@endforeach
			</select>
		</div>
	</div>
</div>
