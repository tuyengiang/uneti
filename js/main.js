$(document).ready(function(){
	var topmenu=$("#menu-tab");
	$(window).scroll(function(){
		if($(this).ScrollTop()>150){
			topmenu.show();
		}else{
			topmenu.hide();
		}
	});
	
});