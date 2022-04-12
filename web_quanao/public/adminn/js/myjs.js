$("#thoi-gian-bd").change(function(){
	var tgbd = $("#thoi-gian-bd").val();
    $("#thoi-gian-kt").attr({
       "min" : tgbd 
    });	
});




$("#thoi-gian-kt").change(function(){
	var tgbd = $("#thoi-gian-bd").val();
	var tgbd = $("#thoi-gian-bd").val();
	var today = (new Date()).toISOString().split('T')[0];	
});