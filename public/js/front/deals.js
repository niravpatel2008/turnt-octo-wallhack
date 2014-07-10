$(document).ready(function(){
	$('#search_results').html('');
	salvattore.init();
	var url = base_url()+'deals/search/';
	var tags = $('#tags').val();
	var category = $('#category').val();
	$.post(url,{tags:tags,category:category,limit:"4",or:"1"},function(){
		displayDealsData(result);
	});
});