@extends('livewire/customer/layout/master')
@section('content')
<div class="main">
	<form action="{{route('checkout_end')}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<div class="container">
        	<div class="row margin-bottom-40">
        		<div class="col-md-12 col-sm-12">
            		<h1>Đặt hàng</h1>
            		<div id="payment-address-content">
                		<div class="row">
	                		<div class="col-md-6 col-sm-6">
	                    		<h4>Thông tin cá nhân</h4>
	                    		<input type="hidden" name="user" value="{{$user->id}}">
	                    		<div class="form-group">
	                        		<label for="firstname">Họ</label>
	                        		<input type="text" id="firstname" class="form-control" value="{{$user->last_name}}" readonly>
	                    		</div>
	                    		<div class="form-group">
	                        		<label for="lastname">Tên</label>
	                        		<input type="text" id="lastname" class="form-control" value="{{$user->first_name}}" readonly>
	                      		</div>
		                    	<div class="form-group">
		                        	<label for="email">E-Mail</label>
		                        	<input type="text" id="email" class="form-control" value="{{$user->email}}" readonly>
		                    	</div>
		                    	<div class="form-group">
		                        	<label for="telephone">Số điện thoại</label>
		                        	<input type="text" id="telephone" class="form-control" value="{{$user->phone_number}}" readonly>
		                    	</div>
	                    	</div>
	                    	<div class="col-md-6 col-sm-6">
	                    		<h4>Địa chỉ</h4>
		                    	<div class="radio-list">
		                    		@foreach($dia_chi as $dia_chi)
		                        	<label>
		                          		<input type="radio" name="dia_chi"  value="{{$dia_chi->ma_dia_chi}}"> {{$dia_chi->ten_dia_chi}}
		                          		<p>{{$dia_chi->dia_chi_cu_the}}, {{$dia_chi->ten_phuong_xa}}, {{$dia_chi->ten_quan_huyen}}, {{$dia_chi->tinh_thanh_pho}}</p>
		                        	</label>
		                        @endforeach
		                    	</div>
		                    	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themdiachi">Thêm địa chỉ
								</button>
	                    	</div>
                    		<hr>
            			</div>                    	
                	</div>
            	</div>
        	</div>

			<div class="row margin-bottom-40">
        		<div class="col-md-12 col-sm-12">
            		<div class="goods-page">
            			<div class="goods-data clearfix">
                			<div class="table-wrapper-responsive">
                				<table summary="Shopping cart">
                					<tr>
                    					<th class="goods-page-image">Ảnh</th>
                    					<th class="goods-page-description">Mô tả</th>
                    					<th class="goods-page-ref-no">Số lượng</th>
                    					<th class="goods-page-quantity">Giá</th>
                    					<th class="goods-page-total" colspan="2">Tổng tiền</th>
                					</tr>

                					@foreach($san_pham as $chi_tiet)
                					<input type="hidden" name="san_pham[]" value="{{$chi_tiet->ma_chi_tiet}}">
                					
                					<tr>
                						<td class="goods-page-image">
                    						<a href="{{route('product', $chi_tiet->ma_so_sp)}}"><img src="images/products/{{$chi_tiet->anh_sp}}" alt="Berry Lace Dress">
                    						</a>
                    					</td>
                    					<td class="goods-page-description">
                    						<h3><a href="{{route('product', $chi_tiet->ma_so_sp)}}">{{$chi_tiet->ten_sp}}</a></h3>
                    						<p><strong>Mã số: </strong>{{$chi_tiet->ma_kho_hang}}</p>
                    						<div class="mb-3 mt-3 form-inline">
                        						<label for="mau_sac" class="form-label">Màu sắc:</label>
                        						<input type="text" class="form-control" id="mau_sac" style="background: {{$chi_tiet->mau_sac}}" readonly>
                    						</div>                      

                    						<p><strong>Kích cỡ: </strong>{{$chi_tiet->ten_kich_co}}</p>
                    					</td>
					                    <td class="goods-page-quantity">
					                    	<div class="product-quantity">
					                        	<p style="font-size: 20px;">{{$chi_tiet->so_luong}}</p>
					                    	</div>
					                    </td>
					                    <td class="goods-page-price">
					                    	<strong>{{number_format($chi_tiet->gia_ban)}} VND</strong>
					                    </td>
					                    <td class="goods-page-total">
					                    	<strong>{{number_format($chi_tiet->gia_ban*$chi_tiet->so_luong)}} VND</strong>
					                    </td>
                  					</tr>
                  					@endforeach
                				</table>
                			</div>

                			<div class="margin-bottom-40" style="margin-top: 40px;">
							    <label for="sel1" class="form-label">Voucher:</label>
							    <select name="sellist1">
							      <option>1</option>
							      <option>2</option>
							      <option>3</option>
							      <option>4</option>
							    </select>                				
                			</div>

                			<div class="shopping-total">
			                	<ul>
			                    	<li>
			                      		<em>Tổng tiền hàng</em>
			                      		<strong class="price">{{number_format($tien_hang)}} VND</strong>
			                      		<input type="hidden" name="tong_tien_hang" value="{{$tien_hang}}">
			                    	</li>
				                    <li>
				                    	<em>Phí vận chuyển</em>
				                    	<strong class="price">30.000 VND</strong>
				                    	<input type="hidden" name="phi_van_chuyen" value="30000">
				                    </li>
				                    <li>
				                    	<em>Giảm giá</em>
				                    	<strong class="price">0 VND</strong>
				                    	<input type="hidden" name="giam_gia" value="0">
				                    </li>                    
				                    <li class="shopping-total-price">
				                    	<em>Tổng thanh toán</em>
				                    	<strong class="price">{{number_format($tong_tien)}} VND</strong>
				                    	<input type="hidden" name="tong_thanh_toan" value="{{$tong_tien}}">
				                    </li>
			                  	</ul>
                			</div>
            			</div>
            			<button class="btn btn-default" type="submit">Về trang chủ <i class="fa fa-shopping-cart"></i></button>
            			<button class="btn btn-primary" type="submit">Thanh toán <i class="fa fa-check"></i></button>
            		</div>
          		</div>
        	</form>
		</div>
	</div>
</div>




<div class="modal" id="themdiachi">
	<div class="modal-dialog">
		<form action="{{route('newadress')}}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    	<div class="modal-content">
			    <div class="modal-header">
			        <h4 class="modal-title">Thêm địa chỉ</h4>
			        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			    </div>
			    <div class="modal-body">
					<x-address-component/>                               	    		
			     </div>
			    <div class="modal-footer">
			    	<button type="submit" class="btn btn-primary" id="themdiachi">Thêm</button>
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>			        	
			    </div>
	    	</div>
	    </form>
	</div>
</div>    
@endsection
