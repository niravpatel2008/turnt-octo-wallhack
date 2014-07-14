var dealCnt = 1;

function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function openLoginForm()
{
	$("#divCreateAccountForm").modal('hide');
	$("#divForgotPasswordForm").modal('hide');
    $('#divConsLogin').modal();
}

function openSignupForm()
{
	$('#divConsLogin').modal('hide');
	$("#divForgotPasswordForm").modal('hide');
    $("#divCreateAccountForm").modal();
}

function openForgotPasswordForm () {
	$('#divConsLogin').modal('hide');
	$("#divCreateAccountForm").modal('hide');
    $("#divForgotPasswordForm").modal();
}

function displayDealsData(result)
{
	var article = "";
	var htmlStr = "";
	if(result.length>0 && result != ""){
		$("#noRecTbl").hide();
	}
	$('#totalRecordsCount').val(result.totalRecordsCount);
	var flag = false;
	$.each(result, function(index,element)
	{
		favClass = (element.is_fav)?'unfavme':'favme';
		commanAttr = " st_url='"+element.url+"' st_title='"+element.name+"' st_image='"+element.photo+"' st_summary='"+element.name+"' ";
		if(index!='totalRecordsCount'){
			pricehtml="<div class='row'>";
				pricehtml+="<div class='col-lg-4'><div class='small-box bg-aqua'><a class='small-box-footer' href='#'>Now</a><div class='inner'><center><h3 class='box-title'>"+element.dd_listprice+"</h3></center></div></div></div>";
				pricehtml+="<div class='col-lg-4'><div class='small-box bg-red'><a class='small-box-footer' href='#'>Was</a><div class='inner'><center><h3 class='box-title'>"+element.dd_originalprice+"</h3></center></div></div></div>";
				pricehtml+="<div class='col-lg-4'><div class='small-box bg-green'><a class='small-box-footer' href='#'>Save</a><div class='inner'><center><h3 class='box-title'>"+element.dd_discount+"</h3></center></div></div></div>";
			pricehtml+="</div>";


			article = "<div class='wrapper-3 item-thumb'>";
			  article += "<div class='top'>";
				article += "<figure>";
				  article += "<img alt='' src='"+element.photo+"'>";
				article += "</figure>";
				article += "<h2 class='alt'><span class='"+favClass+"' did='"+element.id+"'></span><a href='#'>"+element.name+"</a></h2>";
			  article += "</div>";
			  article += "<div class='bottom'>";
				article += pricehtml;
				//article += "<p class='value secondary'>$30 OFF</p>";
				//article += "<h6>31 days left</h6>";
				article += "<a class='input button red secondary' href='"+element.url+"'>View Deal</a>";
			  article += "</div>";
			  article += "<div class='v_itemtitle' class='sharethis clearboth'>";
					article += "<span class='st_facebook' "+commanAttr+"></span>";
					article += "<span class='st_twitter' "+commanAttr+"></span>";
					article += "<span class='st_linkedin' "+commanAttr+"></span>";
					article += "<span class='st_pinterest' "+commanAttr+"></span>";
					article += "<span class='st_email' "+commanAttr+"></span>";
					article += "<span class='st_sharethis' "+commanAttr+"></span>";
			  article += "</div>";
			article += "</div>";


			var grid = $('#search_results');
			salvattore['append_elements'](grid[0], [$(article)[0]]);

			dealCnt++;
		}
	});

	if (stButtons){stButtons.locateElements();}

	if($('#totalRecordsCount').val() == (dealCnt-1))
	{
			//setTopOfPage("show");
	}
}

$(document).ready(function(){
	$('body').delegate('.favme','click',function(){
		var url = base_url()+'deals/like/';
		var param = {id:$(this).attr("did")};
		var span =$(this);
		$.post(url,param,function(e){
			if (e == "1")
			{
				$(span).effect("bounce",{ times: 3 }, "fast",function(){
					$(span).addClass("unfavme").removeClass("favme");
				})
			}	
		})
	});

	$('body').delegate('.unfavme','click',function(){
		var url = base_url()+'deals/dislike/';
		var param = {id:$(this).attr("did")};
		var span =$(this);
		$.post(url,param,function(e){
			if (e == "1")
			{
				$(span).effect("bounce",{ times: 3 }, "fast",function(){
					$(span).addClass("favme").removeClass("unfavme");
				})
			}
		})
	});

	$("#signin").live('click', function () {
		if ($.trim($("#txtpassword").val()) == "") {
			alert('Please enter username.');
			return false;
		}

		if ($.trim($("#txtpassword").val()) == "") {
		  alert('Please enter password');
		  return false;
		}

		$.ajax({
			url: base_url()+'welcome/login',
			type: 'post',
			data: $("#loginform").serialize(),
			success: function  (data) {
				if(data == 'success'){
					//location.href = base_url()+'deals';
					location.reload();
				}else{
					alert(data);
					return false;
				}
			}
		});

	});

	$("#signup").live('click', function () {

		if ($.trim($("#username").val()) == "") {
			alert('Please enter username.');
			return false;
		}

		if ($.trim($("#password").val()) == "") {
		  alert('Please enter password');
		  return false;
		}

		if ($.trim($("#password2").val()) == "") {
			alert('Please enter confirm password.');
			return false;
		}

		if ($.trim($("#password").val()) != $.trim($("#password2").val())) {
			alert('Password and confirm password should be same.');
			return false;
		}

		if (!IsEmail($.trim($("#email").val())) || $.trim($("#email").val()) == "") {
		  alert('Please enter valid email.');
		  return false;
		}

		if ($.trim($("#contact").val()) == "") {
		  alert('Please enter contact.');
		  return false;
		}

		$.ajax({
			url: base_url()+'welcome/signup',
			type: 'post',
			data: $("#signupform").serialize(),
			success: function  (data) {
				if(data == 'success'){
					//location.href = base_url()+'deals';
					location.reload();
				}else{
					alert(data);
					return false;
				}
			}
		});

	});

	$("#forgotpassword").live('click', function () {
		if (!IsEmail($.trim($("#txtemail").val())) || $.trim($("#txtemail").val()) == "") {
		  alert('Please enter valid email.');
		  return false;
		}
		$.ajax({
			url: base_url()+'welcome/forgotpassword',
			type: 'post',
			data: $("#forgotpwdform").serialize(),
			success: function  (data) {
				if(data == 'success'){
					alert("Email has been sent to your email.");
				}else{
					alert(data);
					return false;
				}
			}
		});
	});
});
