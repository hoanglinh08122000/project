@push('js')
		<script>
			 $(document).ready(function() {
			 	$("#select_discipline").change(function(){
			 		var id = $(this).val();
			 		$("#select_subject").html('');
			 		$.ajax({
			 			url: '{{ route('ajax.assignment_teacher') }}',
			 			type: 'GET',
			 			dataType: 'json',
			 			data: {id : id},
			 		})
			 		.done(function(response) {
			 			$(response).each(function()
			 			{
			 				
			 				$("#select_subject").append(`
			 					<option value='${this.id}'>
									${this.name}
			 					</option>`)
			 			})
			 		})
			 		.fail(function() { 
			 			alert("sai roi")
			 		})
			 		
			 		
			 		
			 	})
			 });
		</script>
		<script>
			 $(document).ready(function() {
			 	$("#select_course").change(function(){
			 		var id = $(this).val();
			 		$("#select_class").html('');
			 		$.ajax({
			 			url: '{{ route('ajax.assignment_teacher_course_class') }}',
			 			type: 'GET',
			 			dataType: 'json',
			 			data: {id : id},
			 		})
			 		.done(function(response) {
			 			$(response).each(function()
			 			{
			 				
			 				$("#select_class").append(`
			 					<option value='${this.id}'>
									${this.name}
			 					</option>`)
			 			})
			 		})
			 		.fail(function() { 
			 			alert("sai roi")
			 		})
			 		
			 		
			 		
			 	})
			 });
		</script>
	@endpush