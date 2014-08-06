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
				pricehtml+="<div class='col-lg-4'><div class='small-box bg-red'><a class='small-box-footer' href='#'>Now</a><div class='inner'><center><h3 class='box-title'>"+element.dd_listprice+"</h3></center></div></div></div>";
				pricehtml+="<div class='col-lg-4'><div class='small-box bg-aqua'><a class='small-box-footer' href='#'>Was</a><div class='inner'><center><h3 class='box-title'>"+element.dd_originalprice+"</h3></center></div></div></div>";
				pricehtml+="<div class='col-lg-4'><div class='small-box bg-green'><a class='small-box-footer' href='#'>Save</a><div class='inner'><center><h3 class='box-title'>"+element.dd_discount+"</h3></center></div></div></div>";
			pricehtml+="</div>";


			article = "<div class='wrapper-3 item-thumb'>";
			  article += "<div class='top'>";
				article += "<figure><div class='cornerlike'><span class='"+favClass+"' did='"+element.id+"'></span></div>";
				  article += "<img alt='' src='"+element.photo+"'>";
				article += "</figure>";
				article += "<h2 class='alt'><a href='"+element.url+"'>"+element.name+"</a></h2>";
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
		if(!isLogin) { openLoginForm(); return; }
		var url = base_url()+'deals/like/';
		var param = {id:$(this).attr("did")};
		var span =$(this);
		$.post(url,param,function(e){
			if (e == "1")
			{
				$(span).addClass("unfavme").removeClass("favme");
				/*$(span).effect("bounce",{ times: 3 }, "fast",function(){
					$(span).addClass("unfavme").removeClass("favme");
				})*/
			}	
		})
	});

	$('body').delegate('.unfavme','click',function(){
		if(!isLogin) { openLoginForm(); return; }
		var url = base_url()+'deals/dislike/';
		var param = {id:$(this).attr("did")};
		var span =$(this);
		$.post(url,param,function(e){
			if (e == "1")
			{
				$(span).addClass("favme").removeClass("unfavme");
				/*$(span).effect("bounce",{ times: 3 }, "fast",function(){
					$(span).addClass("favme").removeClass("unfavme");
				})*/
			}
		})
	});

	$("#signin").on('click', function () {
		if ($.trim($("#txtuseremail").val()) == "") {
			alert('Please enter email address.');
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

	$("#signup").on('click', function () {

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

	$("#forgotpassword").on('click', function () {
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
					$('#divForgotPasswordForm').modal('toggle');
				}else{
					alert(data);
					return false;
				}
			}
		});
	});

	$('.allow-enter').keydown(function(e){
		 if (e.which == 13) {
			var $targ = $(e.target).closest("form");
			$targ.find(".sumitbtn").focus();
		}	
	})

	
  // main menu responsive
  $('.main-menu').mobileMenu({
    defaultText: 'Navigate to...',
    className: 'select-main-menu'
  });

  $('.select-main-menu').customSelect({
    customClass: 'input button dark secondary'
  });

  $('.popular-companies-list').mobileMenu({
    defaultText: 'Select company...',
    className: 'select-popular-companies-list'
  });

  // main menu indicator
  var temp;
  uripath = location.pathname.match(/([^\/]*)\/*$/)[1];
  temp = $('.main-menu a[href*="'+uripath+'"]:eq(0)').parent("li");
  temp.addClass("current");
   $('.main-menu li').hover(function() {
     //temp = $('.main-menu a[href*="'+uripath+'"]').parent("li");
     temp.removeClass('current');
     $(this).addClass('current');
   }, function() {
     $(this).removeClass('current');
     temp.addClass('current');
   });


  // menu-browse open/close
  var temp2 = $('.menu-browse .input');
  var temp3 = $('.main-menu .submenu-wrap');
  $('html').on('click', function() {
    temp2.children('.sub').hide();
    temp3.children('.submenu').hide();
    temp3.removeClass('opaque');
  });
  temp2.on('click', function(event) {
    event.stopPropagation();
    $(this).children('.sub').toggle();
  });
  $('.menu-browse a').on('click',function(event){
	event.preventDefault();
	var selected = $(this).html().trim();
	$('#category').html(selected);
	var catid = $(this).attr('catid');
	$('#category').attr('catid',catid);
	getDealList('new');
  });
  temp3.on('click', function(event) {
    event.stopPropagation();
    $(this).children('.submenu').toggle();
    if (temp3.children('.submenu').is(':visible')) {
      temp3.addClass('opaque');
    } else {
      temp3.removeClass('opaque');
    }
  });

});
