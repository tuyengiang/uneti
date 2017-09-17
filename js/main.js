$(document).ready(function(){
	var topmenu=$("#header");
	$(window).scroll(function(){
		if($(this).scrollTop()>50){
			topmenu.css("background","white");
		}else{
			topmenu.hide();
		}
	});
	
});