@extends('livewire/admin/layouts/master')
@section('content')

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">{{$san_pham->ten_sp}}</h1>
			<div class="card shadow mb-4">
				<div class="card-body">
                    <a href="#" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                        	<i class="fas fa-flag"></i>
                        </span>
                       	<span class="text">Split Button Primary</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                        	<i class="fas fa-flag"></i>
                        </span>
                       	<span class="text">Sản phẩm nổi bật</span>
                    </a>
                    <a href="#" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Ẩn sản phẩm</span>
                    </a>                    
                    <a href="{{route('xoa-san-pham', $san_pham->ma_so_sp)}}" class="btn btn-danger btn-icon-split">
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
                            <code>Mã sản phẩm: {{$san_pham->ma_so_sp}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Tên sản phẩm: {{$san_pham->ten_sp}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Giá bán: {{number_format($san_pham->gia_ban)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Giá nhập: {{number_format($san_pham->gia_nhap)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Ngày tạo: {{$san_pham->created_at}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Ngày cập nhật: {{$san_pham->updated_at}}</code>
                        </div>                                                
                        <div class="mb-2">
                            <code>Danh mục: 
                            	@foreach($danh_muc as $dmuc)
                            		{{$dmuc->ten}}, 
                            	@endforeach
                            </code>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ảnh sản phẩm</h6>
                    </div>
                    <div class="card-body">
                    	<p>Ảnh bìa sản phẩm</p>
                    	<img class="anh_sp" src="images/products/{{$san_pham->anh_sp}}">
                    	<div class="my-2"></div>

						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doianhbia">Đổi ảnh bìa sản phẩm</button>
						<div class="modal" id="doianhbia">
							<div class="modal-dialog">
						    	<div class="modal-content">
						    		<form action="{{route('doianhbia')}}" method="POST">
								    	<div class="modal-header">
								        	<h4 class="modal-title">Đổi ảnh bìa sản phẩm</h4>
								        	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								      	</div>

								    	<div class="modal-body">
								    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								    		<input type="hidden" name="san_pham" value="{{$san_pham->ma_so_sp}}">
								    		<input type="file" name="anh">
								    	</div>
						    			<div class="modal-footer">
						    				<button type="submit" class="btn btn-primary">Lưu</button>
											<button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
						      			</div>
						      		</form>
						    	</div>
						  	</div>
						</div>						
						<div class="my-2"></div>
                    	<div class="my-2"></div>
                    	<p>Album ảnh sản phẩm</p>
                    	@foreach($album_anh as $anh)
                    	<img class="anh_sp" src="images/products/{{$anh->anh}}">
                    	@endforeach
                    	<div class="my-2"></div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themanh">Thêm ảnh sản phẩm</button>
						<div class="modal" id="themanh">
							<div class="modal-dialog">
						    	<div class="modal-content">
						    		<form action="{{route('themanh')}}" method="POST">
								    	<div class="modal-header">
								        	<h4 class="modal-title">Thêm ảnh sản phẩm</h4>
								        	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								      	</div>

								    	<div class="modal-body">
								    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								    		<input type="hidden" name="san_pham" value="{{$san_pham->ma_so_sp}}">
								    		<input type="file" name="anh">
								    	</div>
						    			<div class="modal-footer">
						    				<button type="submit" class="btn btn-primary">Lưu</button>
											<button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
						      			</div>
						      		</form>
						    	</div>
						  	</div>
						</div>                    	
                    </div>
                </div>
            </div>

        </div>	
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kho hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Màu sắc</th>
                            <th>Kích cỡ</th>
                            <th>Số lượng</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($kho_hang as $kho_hang)
                       <tr>
                            <td>{{$kho_hang->ma_kho_hang}}</td>
                            <td>{{$kho_hang->mau_sac}}</td>
                            <td>{{$kho_hang->kich_co}}</td>
                            <td>{{$kho_hang->so_luong}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
		<button type="button" class="btn btn-primary nut_them" data-bs-toggle="modal" data-bs-target="#thembienthe">Thêm biến thể</button>

		<div class="modal" id="thembienthe">
			<form action="{{route('thembienthe')}}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="san_pham" value="{{$san_pham->ma_so_sp}}">

				<div class="modal-dialog">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h4 class="modal-title">Thêm biến thể</h4>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			      		</div>
			    		<div class="modal-body">
						    <label for="sel1" class="form-label">Màu sắc:</label>
						    <select class="form-select" id="sel1" name="mau_sac">
						    	@foreach($mau_sac as $mau_sac)
						    	<option value="{{$mau_sac->ma_mau}}">{{$mau_sac->ten_mau}}</option>
						    	@endforeach
						    </select>

						    <label for="sel2" class="form-label">Kích cỡ:</label>
						    <select class="form-select" id="sel2" name="kich_co">
						    	@foreach($kich_co as $kich_co)
						    	<option value="{{$kich_co->ma_kich_co}}">{{$kich_co->kich_co}}</option>
						    	@endforeach
						    </select>

			   			<div class="mb-3 mt-3">
						    <label for="so_luong" class="form-label">Số lượng:</label>
						    <input type="text" class="form-control" id="so_luong" name="so_luong">
						</div>																		
			    	</div>
			    	<div class="modal-footer">
			    		<button type="submit" class="btn btn-primary">Thêm</button>
			        	<button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
			    	</div>

			    </div>
			  </div>
			</form>  
		</div>        
    </div>

                </div>

@endsection