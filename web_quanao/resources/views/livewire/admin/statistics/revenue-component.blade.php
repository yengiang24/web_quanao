@extends('livewire/admin/layouts/master')
@section('content')                
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm bán chạy</h1> 
    <div class="card shadow mb-4">   
      <div class="row">
          <div class="col-sm-3">
            <select class="form-select" id="bo_loc">
              <option value="thang_nay">Tháng này</option>
              <option value="thang_truoc">Tháng trước</option>
              <option value="nam_nay">Năm này</option>
            </select>                      
          </div>        
      </div>
    </div>
    <br>
    <div id="myfirstchart" style="height: 250px;"></div>
  </div>
</div>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script type="text/javascript">
  var myfirstchart = Morris.Bar({
    element: 'myfirstchart',
    data: [
    @foreach($doanh_thu as $doanh_thu)
        {'value': '{{ $doanh_thu->so_luong}}', 'ngay_tao': '{{ $doanh_thu->ngay_tao }}'},
    @endforeach
    ],
    xkey: 'ngay_tao',
    ykeys: ['value'],
    labels: [''],
    parseTime: false,
  });    
</script>
<script type="text/javascript">
  $("#bo_loc").change(function(){
    var value = $("#bo_loc").val();
    $.ajax({
          url: "{{ route('loc-doanh-thu')}}",
          method: 'GET',
            data: {
                value: value
            },          
          success: function(data) {
            myfirstchart.setData(data);              
          }
    });    
  });
</script>


@endsection