@extends('livewire/admin/layouts/master')
@section('content')                
@include('sweetalert::alert')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Các thuộc tính</h1>
		<div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Màu sắc</h6>
                    </div>
                    <div class="card-body">
                    	<div class="table-responsive">
                    		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
                                    <tr>
                                        <th>Mã màu</th>
                                        <th>Tên màu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($mau_sac as $mau_sac)
                                	<tr>
                                		<td>{{$mau_sac->ma_mau}}</td>
                                		<td>{{$mau_sac->ten_mau}}</td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                    	</div>
                    </div>
                <button type="button" class="btn btn-primary nut_them_tt" data-bs-toggle="modal" data-bs-target="#themmausac">Thêm màu sắc</button>
				<div class="modal" id="themmausac">
					<form action="{{route('themmausac')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="modal-dialog">
					    	<div class="modal-content">
					      		<div class="modal-header">
					        		<h4 class="modal-title">Thêm màu sắc</h4>
					        		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					      		</div>
					    		<div class="modal-body">
					   				<div class="mb-3 mt-3">
								    	<label for="mau_sac" class="form-label">Tên màu sắc:</label>
								    	<input type="text" class="form-control" id="mau_sac" name="mau_sac">
									</div>
					   				<div class="mb-3 mt-3">
								    	<label for="ma_mau" class="form-label">Màu sắc:</label>
								    	<input type="color" class="form-control" id="ma_mau" name="ma_mau">
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

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kích cỡ</h6>
                    </div>
                    <div class="card-body">
                    	<div class="table-responsive">
                    		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
                                    <tr>
                                        <th>Mã kích cỡ</th>
                                        <th>Kích cỡ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($kich_co as $kich_co)
                                	<tr>
                                		<td>{{$kich_co->ma_kich_co}}</td>
                                		<td>{{$kich_co->kich_co}}</td>
                                	</tr>
                                	@endforeach
                                </tbody>                                
                            </table>
                    	</div>                    	
                    </div>
                <button type="button" class="btn btn-primary nut_them_tt" data-bs-toggle="modal" data-bs-target="#themkichco">Thêm kích cỡ</button>
				<div class="modal" id="themkichco">
					<form action="{{route('themkichco')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="modal-dialog">
					    	<div class="modal-content">
					      		<div class="modal-header">
					        		<h4 class="modal-title">Thêm kích cỡ</h4>
					        		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					      		</div>
					    		<div class="modal-body">
					   				<div class="mb-3 mt-3">
								    	<label for="mau_sac" class="form-label">Kích cỡ:</label>
								    	<input type="text" class="form-control" id="mau_sac" name="kich_co">
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

        </div>

@endsection