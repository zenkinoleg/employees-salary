$(document).ready(function () {

function employee_get_alert(status,message){
	Swal.fire({
    	title: '<h3>' + status + '</h3>',
        type: 'error',
        html: '<p>Sorry, something\'s went wrong, record could not be loaded</p>' +
            '<p class="text-danger">'+ message +'</p>',
	});
}

function employee_permanent_alert(){
	Swal.fire({
    	title: '<strong>Permanent Record</strong>',
        type: 'info',
        html: 'Sorry, it\'s not allowed to <b>update</b>, ' +
            'permanent records',
	});
}

function employee_delete_alert(id) {
	Swal.fire({
    	title: 'Are you sure?',
        text: "Employee record will be removed permanently",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
    	if (result.value) {
        	window.location.replace('/employees/delete/'+id);
		}
	});
}

function employee_edit_clear(clearVals=0){
	$('#employee_json').val('');
	$('#mdl_employee_edit .message').html('');
    $('#mdl_employee_edit [class*=" field-"] .fg-line').each(function ( index ) {
    	$(this).find('input').removeClass('is-invalid');
		if ( clearVals ) {
			$(this).find('input').val('');
		}
        $(this).find('.text-danger').html('');
	});
}

function employee_submit_error(data) {
	$('#mdl_employee_edit .message').html('<div class="alert alert-danger">'+data.message+'</div>');
    $.each(data.errors, function (key,value) {
    	var line = $('#mdl_employee_edit .field-'+key+' .fg-line');
        line.find('input').addClass('is-invalid');
        line.find('.text-danger').append('<p>'+value+'</p>');
	});
}

function employee_get(id){
    $('#rec_id').val(id);
	$.get({
		dataType: 'json',
		url: '/employees/'+id,
		success: function (data) {
			var dataEncoded = encodeURIComponent(JSON.stringify(data));
			$('#employee_json').val(dataEncoded);
			employee_edit_show();
		},
        error: function (data) {
			var status = data.status + ' ' + data.statusText;
			var message = data.responseJSON.message;
			employee_get_alert(status,message);
        }
	});
}

function employee_edit_show()
{
	var data = JSON.parse(decodeURIComponent($('#employee_json').val()));
	employee_edit_clear();
    $('#mdl_employee_edit [class*=" field-"] .form-control').each(function ( index ) {
    	var field = $(this).attr('name');
        var value = data[field];
		var tag = $(this).prop('tagName');
		switch ( tag ) {
           	case 'INPUT':
				$(this).val(value);
			break;
			case 'SELECT':
				$(this).val(value).prop('selected', true);
			break;
		}
    });
    $('#mdl_employee_edit').modal();
}

    $('#employees_table').DataTable({
        'order': [[ 0, 'asc' ]],
    });

    $('#btn_employee_new').on('click', function (e) {
	    $('#rec_id').val('');
		employee_edit_clear(1);
        $('#mdl_employee_edit').modal();
	});

	$('#employees_table').on('click', '.permanent_rec', function (e) {
		employee_permanent_alert();
	});

	$('#employees_table').on('click', '.delete_rec', function (e) {
		employee_delete_alert(
			$(this).closest('tr').attr('rec_id')
		);
	});

	$('#employees_table').on('click', '.edit_rec', function (e) {
		employee_get(
			$(this).closest('tr').attr('rec_id')
		);
    });
    $('#mdl_employee_edit .form_submit').click(function (e) {
		employee_edit_clear();
		var form = $('#mdl_employee_edit form');
		var data = $('#mdl_employee_edit form').serialize()
			+ '&'+$.param({ '_token': $('#csrf_token').val() });
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: data,
            success: function (resp) {
				window.location.replace('/employees');
            },
            error: function (resp) {
                var data = JSON.parse(resp.responseText);
				employee_submit_error(data);
            }
        });
    });
});
