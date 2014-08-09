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

	var lat = $("#lat").val();
	var lng = $("#long").val();
	var latlng = new google.maps.LatLng(lat,lng);
	var myOptions = {
		zoom: 20,		
		center: latlng,
		panControl: true,
		zoomControl: true,
		mapTypeControl: true,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
		},
		streetViewControl: true,
		overviewMapControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	var map = new google.maps.Map(document.getElementById('map'), myOptions);	
	var marker = new google.maps.Marker({
		position: latlng,
		map: map,
		icon: 'https://chart.googleapis.com/chart?chst=d_map_spin&chld=0.7|0|FF0000|13|b|',
	});
});


function buy_deal (deal_id,offerid) {
	if(!isLogin) { openLoginForm(); return; }
	url = base_url()+'buy';
	data = {deal_id:deal_id,offerid:offerid}
	$.post(url,data,function(data){
			if (data == "login") {
                openLoginForm();
                return false;
            }

            if (data == "error") {
                alert("An error occured while processing, please try again later.");
                return false;
            }

            if (data == "success") {
				$("#buyofferpopup").modal('hide');
				$('#buyoffermessage').modal();
                return false;
            }
	});
}
