@extends('livewire/admin/layouts/master')
@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Kho voucher</h1>
	<div class="card shadow mb-4">
		<div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin chung</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <code>Mã voucher: {{$voucher->ma_voucher}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Loại voucher: {{$voucher->ten_loai_voucher}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Giảm giá: {{number_format($voucher->giam_gia)}} VND</code>
                        </div>
                        <div class="mb-2">
                            <code>Thời gian bắt đầu: {{$voucher->thoi_gian_bat_dau}}</code>
                        </div>
                        <div class="mb-2">
                            <code>Thời gian kết thúc: {{$voucher->thoi_gian_ket_thuc}}</code>
                        </div>                                                
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Gửi voucher</h6>
                    </div>
                    <div class="card-body">
                  		<form action="{{route('guivoucher')}}" method="POST">
                  			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  			<input type="hidden" name="voucher" id="voucher" value="{{$voucher->ma_voucher}}">
                  			<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" id="selecctall" value="all"> Chọn tất cả
								</label>
							</div>							
                  			@foreach($chua_gui as $key => $value)
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input checkbox1" value="{{$key}}" name="user[]"> {{$value}}
								</label>
							</div>
							@endforeach
							@foreach($da_gui as $keyy => $valuee)
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" value="{{$keyy}}" checked readonly> {{$valuee}}
								</label>
							</div>							
							@endforeach
							<button type="submit" class="btn btn-primary">Gửi</button>
                  		</form>
                    </div>
                </div>
            </div>

        </div>				
		</div>
	</div>	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $("#selecctall").change(function(){
    	$(".checkbox1").prop('checked', $(this).prop("checked"));
      });
</script>
@endsection