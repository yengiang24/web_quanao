@extends('livewire/admin/layouts/master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>
			<div class="card shadow mb-4">
				<div class="card-body">
                    @if($hoa_don->ma_tinh_trang == '4')

                    <button class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                        	<i class="fas fa-check"></i>
                        </span>
                       	<span class="text">{{$hoa_don->button}}</span>
                    </button>

                    @elseif($hoa_don->ma_tinh_trang == '5')
                    <button href="" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                        	<i class="fas fa-flag"></i>
                        </span>
                       	<span class="text">{{$hoa_don->button}}</span>
                    </button>
                    @else
	                    <a href="{{route('duyet-don-hang', $hoa_don->ma_don_hang)}}" class="btn btn-primary btn-icon-split">
	                        <span class="icon text-white-50">
	                        	<i class="fas fa-flag"></i>
	                        </span>
	                       	<span class="text">{{$hoa_don->button}}</span>
	                    </a>
                    @endif
                    <a href="#" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Ẩn sản phẩm</span>
                    </a>                    
                    <a href="" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Xóa sản phẩm</span>
                    </a>                                        					
				</div>
			</div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin chung</h6>
                </div>
                <div class="card-body">
                        <div class="mb-2">
                            <code>Mã đơn hàng: {{$hoa_don->ma_don_hang}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Tổng tiền hàng: {{number_format($hoa_don->tong_tien_hang)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Phí vận chuyển: {{number_format($hoa_don->phi_van_chuyen)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Giảm giá: {{number_format($hoa_don->giam_gia)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Tổng tiền: {{number_format($hoa_don->tong_tien)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Tổng sản phẩm: {{$hoa_don->tong_san_pham}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Ngày tạo: {{$hoa_don->created_at}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Ngày cập nhật: {{$hoa_don->updated_at}}</code>
                        </div>                                      
                        <div class="mb-2">
                            <code>Tình trạng: {{$hoa_don->ten_tinh_trang}}</code>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin giao hàng</h6>
                </div>
                <div class="card-body">
                        <div class="mb-2">
                            <code>Mã khách hàng: {{$khach_hang->id}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Họ tên: {{$khach_hang->first_name}} {{$khach_hang->last_name}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Email: {{$khach_hang->email}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Số điện thoại: {{$khach_hang->phone_number}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Địa chỉ giao hàng: {{$dia_chi->dia_chi_cu_the}}</code>
                            <code>{{$dia_chi->ten_phuong_xa}}, {{$dia_chi->ten_quan_huyen}}, {{$dia_chi->tinh_thanh_pho}}</code>
                        </div>                                      
                    </div>
                </div>
            </div>

        </div>	
	</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Giá nhập</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($san_pham as $san_pham)
                    	<tr>
                    		<td>{{$san_pham->ma_so_sp}}</td>
                    		<td>{{$san_pham->ten_sp}}</td>
                    		<td><input type="text" readonly id="ma_mau" style="border: {{$san_pham->mau_sac}}; background: {{$san_pham->mau_sac}}">
                    		</td>
                    		<td>{{$san_pham->ten_kich_co}}</td>
                    		<td>{{$san_pham->so_luong}}</td>
                    		<td>{{number_format($san_pham->gia_ban)}} VND</td>
                    		<td>{{number_format($san_pham->gia_nhap)}} VND</td>
                    		<td>{{number_format($san_pham->tong)}} VND</td>
                    	</tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>


       
    </div>
</div>

@endsection