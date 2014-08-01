var oTable;
$(document).ready(function() {
	oTable = $('#dealTable').dataTable( {
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": admin_path ()+'deal/ajax_list/',
			"type": "POST"
		},
		aoColumnDefs: [
		  {
			 bSortable: false,
			 aTargets: [ -1 ]
		  }
		]
	} );

	$('#deal_form').on('submit',function(e){
		if ($("#dd_dealerid").val() == "") {
        alert("Please select dealer.");
			e.preventDefault();
		}

		if ($("#dd_catid").val() == "") {
			alert("Please select category.");
			e.preventDefault();
		}

		if ($("#dd_name").val() == "") {
			alert("Please enter deal name.");
			e.preventDefault();
		}

		if ($("#dd_status").val() == "") {
			alert("Please select status.");
			e.preventDefault();
		}

		if ($("#dd_includes").val() == "") {
			alert("Please enter what deals includes.");
			e.preventDefault();
		}

		if ($("#dd_policy").val() == "") {
			alert("Please enter deal policy.");
			e.preventDefault();
		}

		if ($("#dd_mainphoto").val() == "") {
			alert("Please select main photo.");
			e.preventDefault();
		}

		$('.offers_div').each(function(k,v){
			var offer_data = {};
			offer_data['do_autoid'] = $(this).find("#do_autoid").val();
			offer_data['do_offertitle'] = $(this).find("#do_offertitle").val();
			offer_data['do_listprice'] = $(this).find("#do_listprice").val();
			offer_data['do_originalprice'] = $(this).find("#do_originalprice").val();
			offer_data['do_discount'] = $(this).find("#do_discount").val();
			//console.log(JSON.stringify(offer_data));
			$(this).find('#offer_data').val(JSON.stringify(offer_data));
		});
	});

	$('#dd_timeperiod').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

	$( ".dd_tags").tagedit({
		//autocompleteURL: 'server/autocomplete.php',
	});

	if ($("#my-awesome-dropzone").length > 0)
	{
		setTimeout(function(){
				var myDropzone = Dropzone.forElement("#my-awesome-dropzone");
				myDropzone.on("success", function(file, res) { 
					if (res.indexOf("Error:") === -1)
					{
						var file = JSON.parse(res);
						var html = "<img src='"+file.path+"' class='newimg' imgid = '"+file.id+"'>";
						$("#img-container").append(html);
						$('#newimages').val($('#newimages').val() +"," +file.id);
					}
				});
		},1000)
	}

	$('#img-container').delegate("img",'click',function(){
		$('#img-container img').removeClass('selected');
		$(this).addClass('selected');
		$('#dd_mainphoto').val($(this).attr('imgid'));
	});

	var mainimgid = $('#dd_mainphoto').val();
	$('#img-container img[imgid="'+mainimgid+'"]').addClass('selected');

	$(document).delegate(".changeprice","blur",function(){
		var do_originalprice = parseInt($(this).closest("div.row").find(".do_originalprice").val());
		var do_listprice = parseInt($(this).closest("div.row").find(".do_listprice").val());
		if (!isNaN(do_originalprice) && do_originalprice != "" && !isNaN(do_listprice) && do_listprice != "")
		{
			discount = do_originalprice - do_listprice;
			if (discount >= 0)
				$(this).closest("div.row").find(".do_discount").val(discount);
		}
	});

	$('.addoffer').on('click',function(e){
		e.preventDefault();
		$clone = $('.offers_div:eq(0)').clone();	
		$clone.find("input").val("");
		$clone.insertAfter(".offers_div:last");
	});

	$(document).delegate('.removeoffer','click',function(e){
		e.preventDefault();
		if($('.removeoffer').length <= 1)
		{
			//$(this).closest('.offers_div').find('input').val();
			return;
		}
		var do_autoid = $(this).attr('do_autoid');
		if (do_autoid != "")
		{
			remove_div = $(this);
			url = admin_path()+'deal/removeOffer',
			data = {id:do_autoid};
			$.post(url,data,function(e){
				if (e == "success") {
					$(remove_div).closest('.offers_div').remove();
					$("#flash_msg").html(success_msg_box ('Offer deleted successfully.'));
				}else{
					$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
				}
			});
		}
		else
		{
			$(this).closest('.offers_div').remove();
		}
	});

	$('#img-container').delegate(".removeimage","click",function(e){
		e.preventDefault();
		atag = $(this);
		dl_autoid = $(atag).attr('dl_autoid');
		url = admin_path()+'deal/removeImage',
		data = {id:dl_autoid};
		$.post(url,data,function(e){
			if (e == "success") {
				if ($('#dd_mainphoto').val() == dl_autoid)
				{
					$('#dd_mainphoto').val("");
				}
				$(atag).closest('div.pull-left').remove();
				$("#flash_msg").html(success_msg_box ('Image deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		});
	});
} );


function delete_deal (del_id) {
	$.ajax({
		type: 'post',
		url: admin_path()+'deal/delete',
		data: 'id='+del_id,
		success: function (data) {
			if (data == "success") {
				oTable.fnClearTable(0);
				oTable.fnDraw();
				$("#flash_msg").html(success_msg_box ('Deal deleted successfully.'));
			}else{
				$("#flash_msg").html(error_msg_box ('An error occurred while processing.'));
			}
		}
	});
}