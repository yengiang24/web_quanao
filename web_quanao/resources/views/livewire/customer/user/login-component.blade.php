@extends('livewire/customer/layout/master')
@section('content')

    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Đăng nhập / Đăng ký</h1>
            <!-- BEGIN CHECKOUT PAGE -->
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

              <!-- BEGIN CHECKOUT -->
              <div id="checkout" class="panel panel-default">
                <div id="checkout-content" class="panel-collapse collapse in">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                    	<h3>Người dùng mới</h3>
                      @if(Session::has('flag'))
                        <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                      @endif                      
            	        <div class="content-form-page">
              				  <form action="{{route('signup')}}" method="POST" role="form" class="form-horizontal form-without-legend">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                				  <div class="form-group">
                					  <label class="col-lg-2 control-label" for="last_name">Họ <span class="require">*</span></label>
                					  <div class="col-lg-8">
                    				  <input type="text" id="last_name" class="form-control" name="last_name" required>
                					  </div>
                				  </div>

                				<div class="form-group">
                  					<label class="col-lg-2 control-label" for="first_name">Tên <span class="require">*</span></label>
                  					<div class="col-lg-8">
                    					<input type="text" id="first_name" class="form-control" name="first_name" required>
                					</div>
                				</div>

                				<div class="form-group">
                					<label class="col-lg-2 control-label" for="email">E-Mail <span class="require">*</span></label>
                					<div class="col-lg-8">
                    					<input type="text" id="email" class="form-control" name="email" required>
                					</div>
                				</div>

                        <div class="form-group">
                          <label for="password">Mật khẩu</label>
                          <input type="password" id="password" class="form-control" name="password" minlength="8" required>
                        </div>

                        <div class="form-group">
                          <label for="re_password">Nhập lại mật khẩu</label>
                          <input type="password" id="re_password" class="form-control" name="re_password" required>
                        </div>                                                

                				<div class="form-group">
                					<label class="col-lg-2 control-label" for="telephone">Số điện thoại <span class="require">*</span></label>
                  					<div class="col-lg-8">
                    					<input type="text" id="telephone" class="form-control" name="telephone" required>
                					</div>
                				</div>


                				<div class="form-group">
                					<label class="col-lg-2 control-label" for="address_name">Tên địa chỉ <span class="require">*</span></label>
                					<div class="col-lg-8">
                    					<input type="text" id="address_name" class="form-control" name="address_name" required>
                					</div>
                				</div>

				                <div class="form-group">
				                  <label class="col-md-2 control-label">Tỉnh/Thành phố</label>
				                  <div class="col-md-8">
				                    <select class="form-control" name="tinh_tp" id="tinh_tp">
				                      <option value="0">Trống</option>
                              @foreach($tinh_thanh_pho as $ttp)
                              <option value="{{$ttp->ma_tinh_tp}}">{{$ttp->tinh_thanh_pho}}</option>
                              @endforeach
				                    </select>
				                  </div>				                  
				                </div>
				                <div class="form-group">
				                  <label class="col-md-2 control-label">Quận/Huyện</label>
				                  <div class="col-md-8">
				                    <select class="form-control" name="quan_huyen">
				                      <option value="0">Trống</option>
				                    </select>
				                  </div>				                  
				                </div>
				                <div class="form-group">
				                  <label class="col-md-2 control-label">Phường/Xã</label>
				                  <div class="col-md-8">
				                    <select class="form-control" name="phuong_xa">
				                      <option value="0">Trống</option>
				                    </select>
				                  </div>				                  
				                </div>
				                <div class="form-group">
				                  <label class="col-lg-2 control-label" for="message">Địa chỉ cụ thể</label>
				                  <div class="col-lg-8">
				                    <textarea class="form-control" rows="6" name="address" required></textarea>
				                  </div>
				                </div>
				                <div class="row">
				                  <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
				                    <button class="btn btn-primary" type="submit">Đăng ký</button>
				                  </div>
				                </div>
            				</form>
            			</div>                      
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Đăng nhập</h3>
                      @if(Session::has('flagg'))
                        <div class="alert alert-{{Session::get('flagg')}}">{{Session::get('message')}}</div>
                      @endif                       
                      <form role="form" action="{{route('login')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                          <label for="email-login">E-Mail</label>
                          <input type="text" id="email-login" name="email_login" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="password-login">Mật khẩu</label>
                          <input type="password" id="password-login" name="password_login" class="form-control">
                        </div>
                        <a href="javascript:;">Quên mật khẩu?</a>
                        <div class="padding-top-20">                  
                          <button class="btn btn-primary" type="submit">Đăng nhập</button>
                        </div>
                        <hr>
                        <div class="login-socio">
                          <p class="text-muted">hoặc đăng nhập bằng:</p>
                          <ul class="social-icons">
                            <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                            <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                            <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                            <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                          </ul>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CHECKOUT PAGE -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">   
    var url = "{{ url('/quanhuyen') }}";
    $("select[name='tinh_tp']").change(function(){
        var tinh_tp = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                tinh_tp: tinh_tp,
                _token: token
            },
            success: function(data) {
                $("select[name='quan_huyen'").html('');
                $.each(data, function(key, value){
                    $("select[name='quan_huyen']").append(
                        "<option value=" + value.ma_quan_huyen + ">" + value.ten_quan_huyen + "</option>"
                    );
                });
            }
        });
    });


    var urll = "{{ url('/phuongxa') }}";
    $("select[name='quan_huyen']").change(function(){
        var quan_huyen = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: urll,
            method: 'POST',
            data: {
                quan_huyen: quan_huyen,
                _token: token
            },
            success: function(data) {
                $("select[name='phuong_xa'").html('');
                $.each(data, function(key, value){
                    $("select[name='phuong_xa']").append(
                        "<option value=" + value.ma_phuong_xa + ">" + value.ten_phuong_xa + "</option>"
                    );
                });
            }
        });
    });     
      
</script>    

@endsection