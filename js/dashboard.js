$(document).ready(function(){
		$(".tab ul li").click(function(){
				$(".tab ul li.th_active").removeClass("th_active");
				$(this).addClass("th_active");
				
				$(".tab_container div.tc_active").removeClass("tc_active");
				$(".tab_container div:nth-child("+($(this).index()+1)+")").addClass("tc_active");
		});
});