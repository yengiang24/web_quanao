@extends('livewire/admin/layouts/master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Sửa danh mục</h1>
	<div class="card shadow mb-4">
		<div class="form">
			<form action="{{route('suadanhmuc')}}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="ma_so" value="{{$danh_muc->ma_so}}">	
				<div class="mb-3 mt-3">
					<label for="ten" class="form-label">Tên:</label>
					<input type="text" class="form-control" id="ten" name="ten" value="{{$danh_muc->ten}}">
				</div>
				<label for="sel1" class="form-label">Danh mục cha:</label>
				<select class="form-select" id="sel1" name="danh_muc_cha">
					<option value="0">{{$dmuc_cha1->ten}}</option>
					@foreach($dmuc_cha2 as $dmuc_cha2)
					<option value="{{$dmuc_cha2->ma_so}}">{{$dmuc_cha2->ten}}</option>
					@endforeach
				</select>
				<label for="mo_ta">Mô tả:</label>
				<textarea class="form-control" rows="5" id="mo_ta" name="mo_ta">{{$danh_muc->mo_ta}}</textarea>
				<button type="submit" class="btn btn-primary">Cập nhật</button>		
			</form>
		</div>	
	</div>	
</div>

@endsection