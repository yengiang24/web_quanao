@extends('livewire/admin/layouts/master')
@section('content')                
@include('sweetalert::alert')

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>Mã số</th>
                                            <th>Tên</th>
                                            <th>Mô tả</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    	@foreach($danh_muc as $dmuc)
                                        <tr>
                                        	<td>{{$dmuc->ma_so}}</td>
                                            <td>{{$dmuc->ten}}</td>
                                            <td>{{$dmuc->mo_ta}}</td>
                                            <td><a href="{{route('sua-danh-muc', $dmuc->ma_so)}}" class="btn btn-primary" target="_blank"><i class="far fa-edit"></i></a></td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dongyform{{$dmuc->ma_so}}"><i class="far fa-trash-alt"></i></button></td>

											<div class="modal" id="dongyform{{$dmuc->ma_so}}">
											  <div class="modal-dialog modal-dialog-centered">
											    <div class="modal-content">

											      <!-- Modal body -->
											    	<div class="modal-body">
											    		<h6 class="text-center">Bạn có đồng ý xóa danh mục này?</h6>
											    		<div style="padding-left: 150px; padding-right: 60px;">
												      		<a href="{{route('xoa-danh-muc', $dmuc->ma_so)}}" class="btn btn-danger">Đồng ý</a>
															<button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
														</div>	
											      </div>
											    </div>
											  </div>
											</div>                                            
                                        </tr>
                                        @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#danhmucmoi">Thêm danh mục mới
					</button>

					<div class="modal" id="danhmucmoi">
						<div class="modal-dialog">
							<form action="{{route('them-danh-muc')}}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
						    	<div class="modal-content">
							    	<div class="modal-header">
							        	<h4 class="modal-title">Thêm danh mục mới</h4>
							        	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							      	</div>
							    	<div class="modal-body">						      	
							      		<div class="mb-3 mt-3">
										    <label for="ten" class="form-label">Tên:</label>
										    <input type="text" class="form-control" id="ten" name="ten">
										</div>
									    <label for="sel1" class="form-label">Danh mục cha:</label>
									    <select class="form-select" id="sel1" name="danh_muc_cha">
									      <option value="0">Trống</option>
									      @foreach($danh_muc as $dmuc)
									      <option value="{{$dmuc->ma_so}}">{{$dmuc->ten}}</option>
									      @endforeach
									    </select>
										<label for="mo_ta">Mô tả:</label>
										<textarea class="form-control" rows="5" id="mo_ta" name="mo_ta"></textarea>			
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

@endsection