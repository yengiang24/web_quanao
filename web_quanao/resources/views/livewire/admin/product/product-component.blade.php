@extends('livewire/admin/layouts/master')
@section('content')  
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tất cả sản phẩm</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <select class="form-select">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên</th>
                                            <th>Tình trạng</th>
                                            <th>Giá bán</th>
                                            <th>Giá nhập</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày cập nhật</th>
                                            <th>Nổi bật</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div>
                                            <x-product-component/>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('them-san-pham')}}" target="_blank" class="btn btn-primary">Thêm sản phẩm</a>
                </div>


@endsection