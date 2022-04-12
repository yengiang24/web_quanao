@extends('livewire/admin/layouts/master')
@section('content')

<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800">Đơn hàng</h1>
	<ul class="nav nav-tabs justify-content-center">
	  <li class="nav-item">
	    <a class="nav-link active" data-bs-toggle="tab" href="#tatca">Tất cả</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Menu 1</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-bs-toggle="tab" href="#menu2">Menu 2</a>
	  </li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane container active" id="tatca">
			<div class="card shadow mb-4">
				<div class="card-body">												
					<div class="table-responsive">
				  		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

      <thead>
        <tr>
          <th>Mã đơn hàng</th>
          <th>Tổng tiền</th>          
          <th>Địa chỉ giao hàng</th>
          <th>Thời gian đặt</th>
          <th>Thời gian cập nhật</th>
          <th>Trạng thái</th>
          <th>Chi tiết</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hoa_don as $hoa_don)
        <tr>
	          <td>{{$hoa_don->ma_don_hang}}</td>
	          <td>{{number_format($hoa_don->tong_tien)}} VND</td>
	          <td>{{$hoa_don->ma_don_hang}}</td>
	          <td>{{$hoa_don->created_at}}</td>
	          <td>{{$hoa_don->updated_at}}</td>
	          <td>{{$hoa_don->ten_tinh_trang}}</td>
	          <td><a href="{{route('chi_tiet-don-hang', $hoa_don->ma_don_hang)}}"><i class="fas fa-eye"></i></a></td> 
        </tr>
        @endforeach
      </tbody>

				  		</table>
				  	</div>
		  		</div>
		  	</div>	
		</div>
	  <div class="tab-pane container fade" id="menu1">...</div>
	  <div class="tab-pane container fade" id="menu2">...</div>
	</div>		
</div>

@endsection
