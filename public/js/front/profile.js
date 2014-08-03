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
		var offerid = $(this).data('offerid');
		location.href = base_url()+'deals/getprint/'+offerid;
	})
});