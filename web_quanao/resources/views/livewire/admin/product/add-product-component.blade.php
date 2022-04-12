@extends('livewire/admin/layouts/master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>

	<div class="card shadow mb-4">
		<form class="form" action="{{route('themsanpham')}}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-sm-8">
					<div class="mb-3">
						<label for="ten">Tên sản phẩm:</label>
					    <input type="text" class="form-control" name="ten" id="ten">
					</div>
					<div>
						<label for="mo-ta">Mô tả:</label>
						<textarea class="form-control" rows="5" id="mo-ta" name="mo_ta"></textarea>
					</div>
					<label for="gia_ban">Giá bán:</label>
					<input type="text" class="form-control" name="gia_ban" id="gia_ban">

					<label for="gia_nhap">Giá nhập:</label>
					<input type="text" class="form-control" name="gia_nhap" id="gia_nhap">

				</div>
				<div class="col-sm-1">
				</div>				
				<div class="col-sm-3">
				    <label for="sel1" class="form-label">Danh mục sản phẩm:</label>
				    @foreach($danh_muc as $danh_muc)
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" name="dmuc{{$danh_muc->ma_so}}" value="{{$danh_muc->ma_so}}">
						  <label class="form-check-label">{{$danh_muc->ten}}</label>
						</div>
					@endforeach
					<label for="anh" class="form-label">Ảnh sản phẩm:</label>
					<input type="file" class="form-control" name="anh_san_pham" id="anh">

					<label for="alb_anh" class="form-label">Danh mục sản phẩm:</label>
					<input type="file" class="form-control" name="anh_sp[]" id="anh" multiple/>
															
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
		</form>	
	</div>	
</div>

@endsection