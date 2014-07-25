$(document).ready(function(){
	//alert("test");
	$('#search_results').html('');
	salvattore.init();
	var url = base_url()+'deals/search/';
	var tags = $('#tags').val();
	var category = $('#category').val();
	$.post(url,{tags:tags,category:category,limit:"4",or:"1"},function(result){
		displayDealsData(JSON.parse(result));
	});
	$('.btn-buy').on('click',function(){
		buy_deal($(this).data('dealid'),$(this).data('offerid'));
	});
});


function buy_deal (deal_id,offerid) {
	url = base_url()+'buy';
	data = {deal_id:deal_id,offerid:offerid}
	$.post(url,data,function(data){
			if (data == "login") {
                alert("Please login to continue.");
                return false;
            }

            if (data == "error") {
                alert("An error occured while processing, please try again later.");
                return false;
            }

            if (data == "success") {
                alert("Deal processed successfully.");
                return false;
            }
	});
}
