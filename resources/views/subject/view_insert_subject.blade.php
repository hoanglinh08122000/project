@extends('layouts.master')
@section('content')

	<div class="card"  >
		<div class="card-header" >
			<strong>Thêm Môn học</strong>
		</div>
		<div class="card-body card-block" >
			<form action="{{ route('subject.process_insert_subject') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
				@csrf


				<div class="row form-group">
					<div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên</label></div>
					<div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
				</div>
					<div class="row form-group">
					<div class="col col-md-3"><label for="text-input" class=" form-control-label">Thời gian học</label></div>
					<div class="col-12 col-md-9"><input type="number" id="text-input" name="time" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
				</div>
             
                
					<div class="row form-group">
					<div class="col col-md-3"><label for="text-input" class=" form-control-label">Tình trạng</label></div>
					<div class="col-12 col-md-9"><input type="text" id="text-input" name="status" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
				</div>
				<div class="row form-group">
					<div class="col col-md-3"><label for="select" class=" form-control-label">Ngành</label></div>
					<div class="col-12 col-md-9">
						<select name="id_discipline" class="form-control">
							@foreach ($disciplines  as $discipline)
							    <option value="{{ $discipline->id }}">
							    	{{ $discipline->name }}
							    </option>
							@endforeach
						</select>
					</div>
					
				</div>




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
