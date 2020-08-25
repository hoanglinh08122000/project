@extends('layouts.master')
@section('content')
<table class="table">
	<tr>
		<th scope="col" style="text-align: center;">Id</th>
		<th scope="col" style="text-align: center;">Tên</th>
		<th scope="col" style="text-align: center;">Ngày sinh</th>
		<th scope="col" style="text-align: center;">Địa chỉ</th>
		<th scope="col" style="text-align: center;">Giới tính</th>
		<th scope="col" style="text-align: center;">Điện thoại</th>
		<th scope="col" style="text-align: center;">Email</th>
		<th>Sửa Mật Khẩu</th>

		
		</tr>

		<tbody>

			<tr>
				<th style="text-align: center;">
					{{ Session::get('id') }}
				</td>
				<td style="text-align: center;">
					{{ Session::get('first_name') }} {{ Session::get('last_name') }}
				</td>
				<td style="text-align: center;">
					{{ Session::get('date') }}
				</td>
				<td style="text-align: center;">
					{{ Session::get('address') }}
				</td>
				<td style="text-align: center;">
					@php
					if (  Session::get('gender') ==1 ){
						echo "Nam";
					}else {
						echo "Nữ";
					}

					@endphp
				</td>
				<td style="text-align: center;">
					{{ Session::get('phone') }}
				</td>
				<td style="text-align: center;">
					{{ Session::get('email') }}
				</td>
				<td style="text-align: center;">
					<a href="{{ route('profile.view_change_password_profile',['id' =>  Session::get('id') ]) }}">
						Sửa
					</a>
				</td>
				

			</tr>
			<br>
	{{-- <input type="search" placeholder="search..." name="search" value="{{ $search }}" style="float:right;border-radius: 10px;">
	<button type="submit"></button> --}}

</tbody>
</table>
@endsection