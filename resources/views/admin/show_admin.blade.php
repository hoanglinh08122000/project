@extends('layouts.master')
@section('content')

{{-- <a href="{{ route('admin.view_insert_admin') }}">
	Add	

</a> --}}

<table class="table">
	<tr>
		<th >Id</th>
		<th scope="col" style="text-align: center;">Tên</th>
		<th scope="col" style="text-align: center;"> Tuổi</th>
		<th scope="col" style="text-align: center;">Địa chỉ</th>
		<th scope="col" style="text-align: center;">Giới tính</th>
		<th scope="col" style="text-align: center;">Điện thoại</th>
		
		<th scope="col" style="text-align: center;">Email</th>
		

		
		</tr>

		<tbody>


			@foreach ($array_list as $admin)
			<tr>
				<th style="text-align: center;">
					{{$admin->id}}
				</td>
				<td style="text-align: center;">
					{{$admin->full_name}}
				</td>
				<td style="text-align: center;">
				    {{ $age = date_diff(date_create($admin->date), date_create('now'))->y}}
				</td>

				<td style="text-align: center;">
					{{$admin->address}}
				</td>
				<td style="text-align: center;">
					@php
					if ($admin->gender==1){
						echo "Nam";
					}else {
						echo "Nữ";
					}

					@endphp
					
				</td>
				<td style="text-align: center;">
					{{$admin->phone}}
				</td>
				<td style="text-align: center;">
					{{$admin->email}}
				</td>
				
				

			</tr>

			@endforeach
			<br>
	{{-- <input type="search" placeholder="search..." name="search" value="{{ $search }}" style="float:right;border-radius: 10px;">
	<button type="submit"></button> --}}

</tbody>
</table>
{{$array_list->appends(['search' => $search])->links()}}
@endsection