function loadFavDeals()
{
	$('#search_results').html('');
	salvattore.init();
	var url = base_url()+'profile/getmyfav';
	$.post(url,{},function(result){
		displayDealsData(JSON.parse(result));
	});
}

$(document).ready(function(){
	if($('.fav_result').length > 0)
		loadFavDeals();

	$('.print-offer').on('click',function(){
		var uid = $(this).data('uid');
		var dealuniqueid = $(this).data('dealuniqueid');
		location.href = base_url()+'deals/getprint/'+uid+'/'+dealuniqueid;
	})
});
