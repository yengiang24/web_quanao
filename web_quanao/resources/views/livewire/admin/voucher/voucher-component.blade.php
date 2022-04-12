@extends('livewire/admin/layouts/master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Kho voucher</h1>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" data-bs-toggle="pill" href="#tatca">Tất cả</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="pill" href="#ggvc">Giảm giá vận chuyển</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="pill" href="#ggdh">Giảm giá đơn hàng</a>
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
		                            <th>Mã voucher</th>
		                            <th>Loại voucher</th>
		                            <th>Giảm giá</th>
		                            <th>Thời gian bắt đầu</th>
		                            <th>Thời gian kết thúc</th>
		                            <th>Đơn hàng tối thiểu</th>
		                            <th>Tình trạng</th>
		                            <th>Chi tiết</th>
		                            <th>Xóa</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($voucher as $voucher)
		                    		<tr>
		                    			<td>{{$voucher->ma_voucher}}</td>
		                    			<td>{{$voucher->ten_loai_voucher}}</td>
		                    			<td>{{number_format($voucher->giam_gia)}}</td>
		                    			<td>{{$voucher->thoi_gian_bat_dau}}</td>
		                    			<td>{{$voucher->thoi_gian_ket_thuc}}</td>
		                    			<td>{{number_format($voucher->dieu_kien)}}</td>
		                    			<td>{{$voucher->ten_tinh_trang}}</td>
		                    			@if($voucher->tinh_trang == '6' || $voucher->tinh_trang == '7')
		                    			<td><a href="{{route('gui-voucher', $voucher->ma_voucher)}}"class="btn btn-primary"><i class="far fa-share-square"></i></a></td>
		                    			@else
		                    			<td><button type="button" class="btn btn-secondary"><i class="far fa-share-square"></i></button></td>
		                    			@endif
		                    			<td><a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
		                    		</tr>
									<div class="modal" id="gui_voucher{{$voucher->ma_voucher}}">
										<div class="modal-dialog modal-dialog-centered">
									    	<div class="modal-content">
									    		<form action="{{route('guivoucher')}}" method="POST">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="voucher" id="voucher" value="{{$voucher->ma_voucher}}">
											    	<div class="modal-header">
											        	<h4 class="modal-title">Gửi voucher</h4>
											        	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
											    	</div>
											    	<div class="modal-body" id="guivoucher_body">
														<div class="form-check">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input" id="selecctall" value="all"> Chọn tất cả
															</label>
														</div>    		


											    	</div>

											    	<div class="modal-footer">
											    		<button type="submit" class="btn btn-primary">Gửi</button>
											        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>	
											    	</div>
											    </form>
									    	</div>   	
										</div>
									</div>		                    		
		                    	@endforeach
		                    </tbody>					
						</table>
					</div>
				</div>
				<div class="tab-pane container" id="ggvc">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                    <thead>
		                        <tr>
		                            <th>Mã voucher</th>
		                            <th>Loại voucher</th>
		                            <th>Giảm giá</th>
		                            <th>Thời gian bắt đầu</th>
		                            <th>Thời gian kết thúc</th>
		                            <th>Đơn hàng tối thiểu</th>
		                            <th>Gửi</th>
		                            <th>Xóa</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($ggvc as $voucher)
		                    		<tr>
		                    			<td>{{$voucher->ma_voucher}}</td>
		                    			<td>{{$voucher->ten_loai_voucher}}</td>
		                    			<td>{{number_format($voucher->giam_gia)}}</td>
		                    			<td>{{$voucher->thoi_gian_bat_dau}}</td>
		                    			<td>{{$voucher->thoi_gian_ket_thuc}}</td>
		                    			<td>{{number_format($voucher->dieu_kien)}}</td>
		                    			<td><a href="" class="btn btn-primary"><i class="far fa-share-square"></i></a></td>
		                    			<td><a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
		                    		</tr>
		                    	@endforeach
		                    </tbody>					
						</table>
					</div>
				</div>
				<div class="tab-pane container" id="ggdh">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                    <thead>
		                        <tr>
		                            <th>Mã voucher</th>
		                            <th>Loại voucher</th>
		                            <th>Giảm giá</th>
		                            <th>Thời gian bắt đầu</th>
		                            <th>Thời gian kết thúc</th>
		                            <th>Đơn hàng tối thiểu</th>
		                            <th>Gửi</th>
		                            <th>Xóa</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($ggdh as $voucher)
		                    		<tr>
		                    			<td>{{$voucher->ma_voucher}}</td>
		                    			<td>{{$voucher->ten_loai_voucher}}</td>
		                    			<td>{{number_format($voucher->giam_gia)}}</td>
		                    			<td>{{$voucher->thoi_gian_bat_dau}}</td>
		                    			<td>{{$voucher->thoi_gian_ket_thuc}}</td>
		                    			<td>{{number_format($voucher->dieu_kien)}}</td>
		                    			<td><a href="" class="btn btn-primary"><i class="far fa-share-square"></i></a></td>
		                    			<td><a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>
		                    		</tr>
		                    	@endforeach
		                    </tbody>					
						</table>
					</div>
				</div>								
			</div>	
		</div>
	</div>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#danhmucmoi">Thêm voucher mới
	</button>
	<div class="modal" id="danhmucmoi">
		<div class="modal-dialog">
			<form action="{{route('themvoucher')}}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Thêm voucher mới</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">						      	
						<label for="sel1" class="form-label">Loại voucher:</label>
						<select class="form-select" id="sel1" name="loai_voucher">
							@foreach($loai_voucher as $loai)
								<option value="{{$loai->ma_loai_voucher}}">{{$loai->ten_loai_voucher}}</option>
							@endforeach
						</select>
						<label for="sel2" class="form-label">Loại giảm giá:</label>
						<select class="form-select" id="sel2" name="loai_giam_gia">
							@foreach($loai_giam_gia as $ggia)
								<option value="{{$ggia->ma_loai_giam_gia}}">{{$ggia->ten_loai_giam_gia}}</option>
							@endforeach
						</select>						
						<div class="mb-3 mt-3">
							<label for="ten" class="form-label">Giảm giá:</label>
							<input type="text" class="form-control" id="ten" name="giam_gia">
						</div>
						<div class="mb-3 mt-3">
							<label for="dieu_kien" class="form-label">Đơn hàng tối thiểu (VND):</label>
							<input type="text" class="form-control" id="dieu_kien" name="dieu_kien">
						</div>						
						<div class="mb-3 mt-3">
							<label for="ten" class="form-label">Thời gian bắt đầu:</label>
							<input type="datetime-local" class="form-control" id="ten" name="bat_dau">
						</div>						
						<div class="mb-3 mt-3">
							<label for="ten" class="form-label">Thời gian kết thúc:</label>
							<input type="datetime-local" class="form-control" id="ten" name="ket_thuc">
						</div>			
					</div>
						    		<div class="modal-footer">
						    			<button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Thêm</button>
						    			<button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
						    		</div>
								</div>
							</form>
					  </div>
					</div> 		
</div>

<script type="text/javascript">
    $("#selecctall").change(function(){
    	$(".checkbox1").prop('checked', $(this).prop("checked"));
      });
</script>
@endsection