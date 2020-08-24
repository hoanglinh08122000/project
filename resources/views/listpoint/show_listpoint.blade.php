@extends('layouts.master')
@section('content')

<div class="card"  >
	<div class="card-header" >
		<strong>Danh sách điểm danh</strong> 
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
						<option disabled selected>Chọn ngành</option>}
						
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
					<select name="id" class="form-control" id="select_class">
						    Chọn Lớp
					</select>
				</div>

			</div>

			<div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Môn</label></div>
				<div class="col-12 col-md-9">
					<select name="id" class="form-control" id="select_subject">
						    Chọn Môn
					</select>
				</div>

			</div>

			<!-- <div class="row form-group">
				<div class="col col-md-3"><label for="select" class=" form-control-label">Sinh vien</label></div>
				<div class="col-12 col-md-9">
					<select name="id" class="form-control" id="show_students">
						
					</select>
				</div>

			</div> -->
<table class="table">
	<tr>
		<th width="8%" align="center" style="text-align: center;">ID</th>
		<th width="20%" align="center" style="text-align: center;">Tên</th>
		<th width="72%" align="center" style="text-align: center;">Tình Trạng Đi Học</th>
    </tr>

		<tbody id="show_students">

        </tbody>
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
			 					<option value='${this.id}' selected>
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
			 	$("#select_discipline").change(function(){
			 		var id = $(this).val();
			 		$("#show_students").html('');
			 		$.ajax({
			 			url: '{{ route('ajax.show_students') }}',
			 			type: 'GET',
			 			dataType: 'json',
			 			data: {id : id},
			 			columns: [
                            { data: 'id' },
                            { data: 'last_name' },
                        ]                    
			 		})
			 		.done(function(response) {
			 			$(response).each(function()
			 			{
			 				
			 				$("#show_students").append(`
	<tr>
	<th width="8%" style="text-align: center;">${this.id}</th> 
	<th width="20%" align="center">${this.first_name} ${this.last_name}</th>
	<th width="72%" align="center" style="text-align: center;">
        <input type="radio" name="${this.id}" value="1">  Đi Học &emsp;&emsp;&emsp;
        <input type="radio" name="${this.id}" value="0">  Nghỉ Học &emsp;&emsp;&emsp;
        <input type="radio" name="${this.id}" value="2">  Có Phép
	</th>
	</tr>
		 					`)
			 			})
			 		})
			 		// .fail(function() { 
			 		// 	alert("sai roi")
			 		// })
			 		
			 		
			 		
			 	})
			 }); 
		</script>
	@endpush

