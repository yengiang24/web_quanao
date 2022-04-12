@extends('livewire/admin/layouts/master')
@section('content')

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Thành viên</h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" data-bs-toggle="pill" href="#tatca">Tất cả</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="pill" href="#quanly">Quản lý</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="pill" href="#nhanvien">Nhân viên</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="pill" href="#khachhang">Khách hàng</a>
				</li>												
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content">
				<div class="tab-pane container active" id="tatca">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                    <thead>
		                        <tr>
		                            <th>Mã người dùng</th>
		                            <th>Tên</th>
		                            <th>Email</th>
		                            <th>Số điện thoại</th>
		                            <th>Vai trò</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($users as $user)
		                    	<tr>
		                    		<td>{{$user->id}}</td>
		                    		<td>{{$user->first_name}} {{$user->last_name}}</td>
		                    		<td>{{$user->email}}</td>
		                    		<td>{{$user->phone_number}}</td>
		                    		<td>{{$user->vai_tro}}</td>
		                    	</tr>
		                    	@endforeach
		                    </tbody>					
						</table>
					</div>
				</div>
				<div class="tab-pane container" id="quanly">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                    <thead>
		                        <tr>
		                            <th>Mã người dùng</th>

		                        </tr>
		                    </thead>					
						</table>
					</div>
				</div>				
			</div>	
		</div>
	</div>

</div>

@endsection