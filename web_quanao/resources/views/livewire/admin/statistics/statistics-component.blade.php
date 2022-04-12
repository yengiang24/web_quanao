@extends('livewire/admin/layouts/master')
@section('content')                
@include('sweetalert::alert')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm bán chạy</h1>
    <div class="card shadow mb-4">
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
    @foreach($san_pham as $san_pham)
        {'value': '{{ $san_pham->value}}', 'san_pham': '{{ $san_pham->san_pham }}'},
    @endforeach
],
      xkey: 'value',
      ykeys: ['san_pham'],
      labels: ['Mã sản phẩm'],
      parseTime: false,
    });    
    
</script>


@endsection