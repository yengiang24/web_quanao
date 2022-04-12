@extends('livewire/customer/layout/master')
@section('content')
<div class="main">
  <div class="container">
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <form action="{{route('checkout')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-12 col-sm-12">
          <h1>Giỏ hàng</h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tr>
                    <th></th>
                    <th class="goods-page-image">Ảnh</th>
                    <th class="goods-page-description">Mô tả</th>
                    <th class="goods-page-ref-no">Số lượng</th>
                    <th class="goods-page-quantity">Giá</th>
                    <th class="goods-page-total" colspan="2">Tổng tiền</th>
                  </tr>

                  @foreach($chi_tiet as $chi_tiet)
                  <tr>
                    <td>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="gio_hang[]" value="{{$chi_tiet->ma_chi_tiet}}">
                      </div>
                    </td>
                    <td class="goods-page-image">
                      <a href="{{route('product', $chi_tiet->ma_so_sp)}}"><img src="images/products/{{$chi_tiet->anh_sp}}" alt="Berry Lace Dress"></a>
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
                          <input id="product-quantity2" type="text" value="{{$chi_tiet->so_luong}}" readonly class="form-control input-sm">
                      </div>
                    </td>
                    <td class="goods-page-price">
                      <strong>{{number_format($chi_tiet->gia_ban)}} VND</strong>
                    </td>
                    <td class="goods-page-total">
                      <strong>{{number_format($chi_tiet->gia_ban*$chi_tiet->so_luong)}} VND</strong>
                    </td>
                    <td class="del-goods-col">
                      <a class="del-goods" href="javascript:;">&nbsp;</a>
                    </td>
                  </tr>
                  @endforeach

                </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <li>
                      <em>Sub total</em>
                      <strong class="price"><span>$</span>47.00</strong>
                    </li>
                    <li>
                      <em>Shipping cost</em>
                      <strong class="price"><span>$</span>3.00</strong>
                    </li>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price"><span>$</span>50.00</strong>
                    </li>
                  </ul>
                </div>
              </div>
              <button class="btn btn-default" type="submit">Về trang chủ <i class="fa fa-shopping-cart"></i></button>
              <button class="btn btn-primary" type="submit">Thanh toán <i class="fa fa-check"></i></button>
            </div>
          </div>
        </form>

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
@endsection
