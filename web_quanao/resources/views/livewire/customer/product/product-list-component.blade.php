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
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                <a href="javascript:;"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="pull-right">
                  <label class="control-label">Show:</label>
                  <select class="form-control input-sm">
                    <option value="#?limit=24" selected="selected">24</option>
                    <option value="#?limit=25">25</option>
                    <option value="#?limit=50">50</option>
                    <option value="#?limit=75">75</option>
                    <option value="#?limit=100">100</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label class="control-label">Sort&nbsp;By:</label>
                  <select class="form-control input-sm">
                    <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                    <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                    <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                    <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                    <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                    <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                    <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                    <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                    <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
            	@foreach($product as $prd)
            	<div class="col-md-4 col-sm-6 col-xs-12">
                	<div class="product-item">
                		<div class="pi-img-wrapper">
                    		<img src="images/products/{{$prd->anh_sp}}" class="img-responsive" alt="Berry Lace Dress">
                    		<div>
                    			<a href="images/products/{{$prd->anh_sp}}" class="btn btn-default fancybox-button"><i class="fas fa-eye"></i></a>
                    			<a href="{{route('product', $prd->ma_so_sp)}}" class="btn btn-default fancybox-fast-view">Chi tiết</a>
                    		</div>
                		</div>
                		<h3><a href="{{route('product', $prd->ma_so_sp)}}">{{$prd->ten_sp}}</a></h3>
                		<div class="pi-price">{{number_format($prd->gia_ban)}} VND</div>
                	</div>
            	</div>
            	@endforeach


            </div>


            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->
            <div class="row">
              <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
              <div class="col-md-8 col-sm-8">
                <ul class="pagination pull-right">
                  <li><a href="javascript:;">&laquo;</a></li>
                  <li><a href="javascript:;">1</a></li>
                  <li><span>2</span></li>
                  <li><a href="javascript:;">3</a></li>
                  <li><a href="javascript:;">4</a></li>
                  <li><a href="javascript:;">5</a></li>
                  <li><a href="javascript:;">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
@endsection