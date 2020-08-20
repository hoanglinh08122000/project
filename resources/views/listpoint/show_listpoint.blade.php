@extends('layouts.master')
@section('content')

<div class="card"  >
	<div class="card-header" >
		<strong>Danh sach diem danh</strong> 
	</div>
	<div class="card-body card-block" >
		<form action="{{ route('listpoint.process_listpoint') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			@csrf
			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Khóa</label></div>
				<div class="col-12 col-md-9">
					<select name="id" class="form-control" id="select_course">
						<option disabled selected> Chọn khóa</option>}
						@foreach ($courses  as $course)
						<option value="{{ $course->id }}">
							{{ $course->name }}
						</option>
						@endforeach
					</select>
				</div>

			</div>
            
            <div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Ngành</label></div>
				<div class="col-12 col-md-9">
					<select name="id" class="form-control" id="select_discipline">
						<option disabled selected> Chọn ngành</option>}
						
						@foreach ($disciplines  as $discipline)
						<option value="{{ $discipline->id }}">
							{{ $discipline->name }}
						</option>
						@endforeach
					</select>
				</div>

			</div>

			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Lớp</label></div>
				<div class="col-12 col-md-9">
					<select name="id_class" class="form-control" id="select_class">
						
					</select>
				</div>

			</div>

			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Môn</label></div>
				<div class="col-12 col-md-9">
					<select name="id" class="form-control" id="select_subject">
						
					</select>
				</div>

			</div>
<table class="table">
	<tr>
		<th scope="col" style="text-align: center;">Tên</th>
		<th></th>
		<th></th>

		
		</tr>

		<tbody>
			<tr>
				<tdscope="col" style="text-align: center;">
					<select name="id" class="form-control" id="show_students">
						
					</select>
				</td>
                <th></th>
		        <th></th>
			</tr>

</table>
			<button type="submit" class="btn btn-primary btn-sm" >
				<i class="fa fa-dot-circle-o"></i> Submit
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<i class="fa fa-ban"></i> Reset
			</button>

		</form>
	</div>
	</div>
	

	@endsection

	@push('js')
	    <!-- subject -->
		<script>
			 $(document).ready(function() {
			 	$("#select_discipline").change(function(){
			 		var id = $(this).val();
			 		$("#select_subject").html('');
			 		$.ajax({
			 			url: '{{ route('ajax.select_subject') }}',
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
			 		// .fail(function() { 
			 		// 	alert("sai roi")
			 		// })
			 		
			 		
			 		
			 	})
			 });
		</script>
		<!-- class -->
		<script>
			 $(document).ready(function() {
			 	$("#select_discipline").change(function(){
			 		var id = $(this).val();
			 		$("#select_class").html('');
			 		$.ajax({
			 			url: '{{ route('ajax.select_class') }}',
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
			 		// .fail(function() { 
			 		// 	alert("sai roi")
			 		// })
			 		
			 		
			 		
			 	})
			 });
		</script>
        <!-- students -->
		<script>
			 $(document).ready(function() {
			 	$("#select_discipline","#select_class","#select_course").change(function(){
			 		var id = $(this).val();
			 		$("#show_students").html('');
			 		$.ajax({
			 			url: '{{ route('ajax.show_students') }}',
			 			type: 'GET',
			 			dataType: 'json',
			 			data: {id : id},
			 		})
			 		.done(function(response) {
			 			$(response).each(function()
			 			{
			 				
			 				$("#show_students").append(`
			 					<option value='${this.id}'>
									${this.full_name}
			 					</option>`)
			 			})
			 		})
			 		// .fail(function() { 
			 		// 	alert("sai roi")
			 		// })
			 		
			 		
			 		
			 	})
			 });
		</script>
	@endpush

