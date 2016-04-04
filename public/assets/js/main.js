$(document).ready(function() {

	// Create new todos
	$('.todo-create-button').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);

		var route 	= $(".todos_create_form").attr('action'),
			token 	= $("input[name='_token']").attr('value'),
		 	data = $('.todos_create_form').serialize();

		$.ajax({
			url: route,
			type : 'POST',
			data: data,
			dataType: 'json',
			success: function(data) {
				$this.closest('form').find('.form-error').removeClass('alert-warning').addClass('alert alert-success animated fadeInDown').html( data.success );
				$('form')[0].reset();				
			},
			error: function(data) {
				var errors = (data.responseJSON);
				$.each(errors, function(key, value){
					$this.closest('form').find('.form-error').removeClass('alert-success').addClass('alert alert-warning').html( value );
				});
			}
		});
	});


	// Update todo
	$('.todo-update-button').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);

		var route = $(this).closest('form').attr('action');
		var data = $(this).closest('form').serialize();

		$.ajax({
			url: route,
			type : 'POST',
			data: data,
			dataType: 'json',
			success: function(data) {
				$this.closest('form').find('.form-error').removeClass('alert-warning').addClass('alert alert-success animated fadeInDown').html( data.success );
				$('form')[0].reset();
			},
			error: function(data) {
				var errors = (data.responseJSON);
				$.each(errors, function(key, value){
					$this.closest('form').find('.form-error').removeClass('alert-success').addClass('alert alert-warning').html( value );
				});
			}
		});
	});

	// Complete todo
	$('.mark-completed').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var route = $(this).closest('form').attr('action');
		var token = $(this).prev().val();

		$.ajax({
			url: route,
			type: 'post',
			data: {'_token' : token},
			dataType: 'json',
			success: function(data) {
				if(data.success) {
					$this.text('completed');
					$this.closest('tr').find('.btn-edit').hide();
				} else {
					alert("Sorry, couldn't able to mark this task as completed. Try again");
				}
			}
		});
	});


	// UnComplete todo
	$('.uncomplete').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var route = $(this).closest('form').attr('action');
		var token = $(this).prev().val();

		$.ajax({
			url: route,
			type: 'post',
			data: {'_token' : token},
			dataType: 'json',
			success: function(data) {
				if(data.success) {
					$this.text('Mark as completed');
				} else {
					alert("Sorry, couldn't able to mark this task as completed. Try again");
				}
			}
		});
	});

});