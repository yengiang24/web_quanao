@extends('livewire/customer/layout/master')
@section('content')
@include('sweetalert::alert')
    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              @foreach($danh_muc as $danh_muc)
                    <li class="list-group-item clearfix dropdown active">
                        <a href="{{route('product-list', $danh_muc->ma_so)}}" class="collapsed">
                          <i class="fa fa-angle-right"></i>{{$danh_muc->ten}}
                        </a>              
                @foreach($danh_muc_con as $danh_muc_c)
                    @if($danh_muc_c->danh_muc_cha == $danh_muc->ma_so)
                          <ul class="dropdown-menu" style="display:block;">
                            <li><a href="{{route('product-list', $danh_muc_c->ma_so)}}"><i class="fa fa-angle-right"></i> {{$danh_muc_c->ten}}</a></li>
                          </ul>           
                    @endif
                @endforeach
              </li>
              @endforeach  
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                    <img src="images/products/{{$san_pham->anh_sp}}" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="assets/pages/img/products/model7.jpg">
                  </div>
                  <div class="product-other-images">

                  	@foreach($anh as $anh)
                		<a href="images/products/{{$anh->anh}}" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="images/products/{{$anh->anh}}"></a>
                	@endforeach

                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1>{{$san_pham->ten_sp}}</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span></span>{{number_format($san_pham->gia_ban)}} VND</strong>
                    </div>
                    <div class="availability">
                    	Tình trạng: <strong>còn hàng</strong>
                    </div>
                  </div>
                  <div class="Mô tả">
                    <p>{{$san_pham->mo_ta}}</p>
                  </div>


                <form action="{{route('test')}}" method="POST">
					       <input type="hidden" name="_token" value="{{ csrf_token() }}">
					       <input type="hidden" name="san_pham" id="san_pham" value="{{$san_pham->ma_so_sp}}">
					              	  
                	<div class="product-page-options">
	                    <div class="pull-left">
	                      <label class="control-label">Màu sắc:</label>
	                      <select class="input-sm" name="mau_sac">
							            @foreach($mau_sac as $mau_sac)
								          <option value="{{$mau_sac->ma_mau}}">{{$mau_sac->ten_mau}}</option>
							            @endforeach                      	
	                      </select>                      
	                    </div>
	                    <div class="pull-left">
	                      <label class="control-label">Kích cỡ:</label>
	                      <select class="input-sm" name="kich_co">
            							@foreach($kich_co1 as $kco)
            								<option value="{{$kco->ma_kich_co}}">{{$kco->ten_kich_co}}</option>
            							@endforeach
	                      </select>
	                    </div>
                    	<br><br>
	                	<div class="availability" id="sluong">
	                    	Số lượng: <strong id="so_luong">{{$mau_sac1->so_luong}}</strong>
	                    </div>
	                    <input type="hidden" name="max" id="max_sl" value="{{$mau_sac1->so_luong}}">
                	</div>

	                <div class="product-page-cart">
	                    <div class="product-quantity">
	                        <input type="number" id="quantity" class="input-sm" name="so_luong" min="1" max="100" value="1">
	                    </div>
	                    @if(Auth::check())	                   
	                    <button class="btn btn-primary" type="submit" name="submit" value="giohang" style="width: 165px">Thêm vào giỏ hàng</button>
	                    <button class="btn btn-danger" name="submit" value="muangay" type="submit">Mua ngay</button>
	                    @else
	                    <a href="{{route('login_signup')}}" class="btn btn-primary" style="width: 165px">Thêm vào giỏ hàng</a>
	                    <a href="{{route('login_signup')}}" class="btn btn-primary">Mua ngay</a>                
	                    @endif
	                </div>
            	</form>    

                <div class="review">
                	<input type="range" value="4" step="0.25" id="backing4">
                    <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                    </div>
                    <a href="javascript:;">{{$tong_danh_gia}} đánh giá</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                </div>
                  <ul class="social-icons">
                    <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                    <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                    <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                  </ul>
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Description" data-toggle="tab">Mô tả sản phẩm</a></li>

                    <li class="active"><a href="#Reviews" data-toggle="tab">Đánh giá ({{$tong_danh_gia}})</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade" id="Description">
                      <p>{{$san_pham->mo_ta}}</p>
                    </div>

                    <div class="tab-pane fade in active" id="Reviews">
                      <!--<p>There are no reviews for this product.</p>-->

                      @foreach($danh_gia as $danh_gia)
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Mary</strong>
                          <em>{{$danh_gia->updated_at}}</em>
                          <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>{{$danh_gia->danh_gia}}</p>
                        </div>
                      </div>
                      @endforeach

                      <!-- BEGIN FORM-->
                      @if(Auth::check())
                      <form action="{{route('review')}}" class="reviews-form" role="form" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="san_pham" id="san_pham" value="{{$san_pham->ma_so_sp}}">                        
                        <h2>Đánh giá sản phẩm</h2>
                        <div class="form-group">
                          <label for="review">Đánh giá <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" id="review" name="danh_gia"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Rating</label>
                          <input type="range" value="5" step="1" id="backing5" name="diem_xep_hang">
                          <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          </div>
                        </div>
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                      </form>
                      @else
                        <a href="{{route('login_signup')}}">Đăng nhập hoặc đăng ký </a><a>để có thể thêm đánh giá sản phẩm</a>
                      @endif
                      <!-- END FORM--> 
                    </div>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h2>Most popular products</h2>
            <div class="owl-carousel owl-carousel4">
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-new"></div>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="assets/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="assets/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="assets/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="assets/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress4</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                  <div class="sticker sticker-sale"></div>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="assets/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="assets/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress5</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="assets/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="assets/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress6</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$("select[name='mau_sac']").change(function(){
		var url = "{{ url('/kichco') }}";
		var url2 = "{{ url('/soluong') }}";
		var san_pham = $("#san_pham").val();
		var mau_sac = $("select[name='mau_sac']").val();
		var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
            	mau_sac: mau_sac,
            	san_pham : san_pham,
                _token: token
            },
            success: function(data) {
            	$("select[name='kich_co'").html('');
                $.each(data, function(key, value){
                    $("select[name='kich_co']").append(
                        "<option value=" + value.kich_co + ">" + value.ten_kich_co + "</option>"
                    );
                });
                var kich_co = $("select[name='kich_co']").val();
                $("#so_luong").remove();
		        $.ajax({
		            url: url2,
		            method: 'POST',
		            data: {
		            	mau_sac: mau_sac,
		            	san_pham : san_pham,
		                kich_co: kich_co,
		                _token: token
		            },
		            success: function(data) {
					$("#sluong").append(
						"<strong id=" + "so_luong>" + data.so_luong + "</strong>"	
		            	);
					$("#max_sl").val(data.so_luong);
				    $("#quantity").attr({
				       "max" : data.so_luong
				    });					
		            }		           
		        });                            	
            }
        });


	});	

	$("select[name='kich_co']").change(function(){
		$("#so_luong").remove();
		var url = "{{ url('/soluong') }}";
		var san_pham = $("#san_pham").val();
		var mau_sac = $("select[name='mau_sac']").val();
		var kich_co = $(this).val();
		var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
            	mau_sac: mau_sac,
            	san_pham : san_pham,
                kich_co: kich_co,
                _token: token
            },
            success: function(data) {
			$("#sluong").append(
				"<strong id=" + "so_luong>" + data.so_luong + "</strong>"	
            	);
			$("#max_sl").val(data.so_luong);
		    $("#quantity").attr({
		       "max" : data.so_luong
		    });

            }
        });
	});

	$("#quantity").change(function(){
		var so_luong = $("#quantity").val();
		var max = $("#max_sl").val();
		if(so_luong > max){
			alert('Hàng tồn kho không đủ. Số lượng còn lại: '+max+' sản phẩm');
			$("#quantity").val('1');			
		}
	});
</script>
@endsection