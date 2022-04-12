<div class="form-group">
    <label class="control-label" for="address_name">Tên địa chỉ <span class="require">*</span></label>
    <input type="text" id="address_name" class="form-control" name="address_name" required>
</div>
<div class="form-group">
    <label class="control-label" for="address_name">Tỉnh/Thành phố <span class="require">*</span></label>
	<select class="form-control" name="tinh_tp" id="tinh_tp">
		<option value="0">Trống</option>
        @foreach($tinh_thanh_pho as $ttp)
        <option value="{{$ttp->ma_tinh_tp}}">{{$ttp->tinh_thanh_pho}}</option>
        @endforeach
	</select>
</div>
<div class="form-group">
    <label class="control-label" for="address_name">Quận/Huyện <span class="require">*</span></label>
	<select class="form-control" name="quan_huyen">
		<option value="0">Trống</option>
	</select>
</div>
<div class="form-group">
    <label class="control-label" for="address_name">Phường/Xã <span class="require">*</span></label>
	<select class="form-control" name="phuong_xa">
		<option value="0">Trống</option>
	</select>
</div>
<div class="form-group">
	<label class="control-label" for="message">Địa chỉ cụ thể</label>
	<textarea class="form-control" rows="6" name="address" required></textarea>
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