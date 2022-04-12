@extends('livewire/admin/layouts/master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Thêm thành viên</h1>

	<div class="card shadow mb-4">
		<form class="form" action="{{route('themthanhvien')}}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="mb-3 mt-3">
			    <label for="ho" class="form-label">Họ:</label>
			    <input type="text" class="form-control" id="ho" name="ho">
			</div>
			<div class="mb-3 mt-3">
			    <label for="ten" class="form-label">Tên:</label>
			    <input type="text" class="form-control" id="ten" name="ten">
			</div>
			<div class="mb-3 mt-3">
			    <label for="email" class="form-label">Email:</label>
			    <input type="text" class="form-control" id="email" name="email">
			</div>
			<div class="mb-3 mt-3">
			    <label for="sdt" class="form-label">Số điện thoại:</label>
			    <input type="text" class="form-control" id="sdt" name="sdt">
			</div>						
			<div class="mb-3 mt-3">
			    <label for="matkhau" class="form-label">Mật khẩu:</label>
			    <input type="text" class="form-control" id="matkhau" name="matkhau" value="{{$mat_khau}}">
			</div>
		    <label for="sel1" class="form-label">Vai trò:</label>
		    <select class="form-select" id="sel1" name="vai_tro">
		    	@foreach($vai_tro as $vtro)
		    	<option value="{{$vtro->ma_vai_tro}}">{{$vtro->vai_tro}}</option>
		    	@endforeach
		    </select>												
			<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
		</form>	
	</div>	
</div>

@endsection