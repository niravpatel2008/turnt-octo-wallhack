$(document).ready(function(){
	$('body').delegate('.favme','click',function(){
		var url = base_url()+'deals/like/';
		$.get(url,{id:$('this').attr("did")},function(e){
			if (e == 1)
				$(this).addClass("unfavme").removeClass("favme");
		})
	});

	$('body').delegate('.unfavme','click',function(){
		var url = base_url()+'deals/dislike/';
		$.get(url,{id:$('this').attr("did")},function(e){
			if (e == 1)
				$(this).addClass("favme").removeClass("unfavme");
		})		
	});
});