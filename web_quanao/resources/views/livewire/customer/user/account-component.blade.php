@extends('livewire/customer/layout/master')
@section('content')
@include('sweetalert::alert')
<div class="main">
    <div class="container">

<div class="row margin-bottom-40">
  <div class="sidebar col-md-3 col-sm-3">
    <ul class="list-group margin-bottom-25 sidebar-menu nav nav-tabs" role="tablist">
      <li class="list-group-item clearfix nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#tai_khoan">
          <i class="fa fa-angle-right"></i> Thông tin cá nhân
        </a>
      </li>              
      <li class="list-group-item clearfix nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#donhang">
        <i class="fa fa-angle-right"></i> Đơn hàng</a>
      </li>
              <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Kho voucher</a></li>

    </ul>
  </div>

<div class="col-md-9 col-sm-7 tab-content">
  <div id="tai_khoan" class="container tab-pane active"><br>
    <h3>Thông tin các nhân</h3>
    <form action="{{route('updateaccount')}}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="last_name">Họ</label>
        <input type="text" id="last_name" class="form-control my-input" name="last_name" value="{{$user->last_name}}">
      </div>
      <div class="form-group">
        <label for="first_name">Tên</label>
        <input type="text" id="first_name" class="form-control my-input" name="first_name" value="{{$user->first_name}}">
      </div>
      <div class="form-group">
        <label for="phone_number">Số điện thoại</label>
        <input type="text" id="phone_number" class="form-control my-input" name="phone_number" value="{{$user->phone_number}}">
      </div>            
      <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="text" id="email" class="form-control my-input" name="email" value="{{$user->email}}" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
  </div>

  <div class="tab-pane container" id="donhang">
    <h3>Lịch sử đặt hàng</h3>
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="pill" href="#tatca">Tất cả</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#choxacnhan">Chờ xác nhận</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#menu2">Menu 2</a>
      </li>
    </ul>

<div class="tab-content">
  <div class="tab-pane container active col-sm-10" id="tatca">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Mã đơn hàng</th>
          <th>Tổng tiền</th>          
          <th>Địa chỉ giao hàng</th>
          <th>Thời gian đặt</th>
          <th>Thời gian cập nhật</th>
          <th>Trạng thái</th>
          <th>Chi tiết</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hoa_don as $hoa_don)
        <tr>
          <td>{{$hoa_don->ma_don_hang}}</td>
          <td>{{number_format($hoa_don->tong_tien)}} VND</td>
          <td>{{$hoa_don->ma_don_hang}}</td>
          <td>{{$hoa_don->created_at}}</td>
          <td>{{$hoa_don->updated_at}}</td>
          <td>{{$hoa_don->ten_tinh_trang}}</td>
          <td><a href="{{route('order-detail', $hoa_don->ma_don_hang)}}"><i class="far fa-eye"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>    
  </div>
  <div class="tab-pane container" id="menu1">...</div>
  <div class="tab-pane container" id="menu2">...</div>
</div>    

    
  </div>
          		<div class="tab-pane container fade" id="menu1"><h6>Test</h6></div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection