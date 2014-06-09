<!--Footer Div Start-->
<!--Footer Div End--> 
<!-- Inline Js --> 
<script type="text/javascript">
var uid = "{$uid}";
var noFixedHeader = false;
var fromLogin = false;
if(uid == "" || uid == null)
	$.cookie("loginUserTags",null);

	if ($(window).height() < $('.searchOption').height())
	{
		noFixedHeader = true;
		$('.searchOption').removeClass('fixed');
	}

	$(document).ready(function() {
		$('#frmSearch select,#requestShowingFrm select').each(function(){
				html = '<span class="selectLabel">'+$(this).find('option:selected').text()+'</span>';
			$(this).after(html);
		});

		$('.selectDisplay').on('click',function(){
			$("#"+$('.selectDisplay').attr('selid')).trigger('click');
		})

		$('select').on('change',function(){
			$(this).parent('div').find('.selectLabel').text($(this).find('option:selected').text());
		});
	});
	
	// Code for infine Scroll Start here.
	$(window).scroll(function () { 
		if( $(window).scrollTop() != 0 && ($(window).scrollTop() >= $(document).height() - $(window).height() - 350) && $('#gettingMoreResultsFlag').val()=='false') {
			var page=$('#page').val();
			var records=parseInt(page)*15;
			if(parseInt(records)<=parseInt($('#totalRecordsCount').val())){
				$('#gettingMoreResultsFlag').val('true');
				if ($('#gettingMoreResultsFlag').val()=='true')
				{
					//$('#gettingMoreResultsFlag').val('false');
					var page=parseInt($('#page').val())+1;
					$('#page').val(page);
					$("#loaderLogin_Bottom").show();
					getPropList();				
				}
			}
		}
	});
	
	var extparam = {};
	// CODE FOR MULTIPLE TAG SEARCH START HERE
	var options =
	{
		bitsOptions:
		{
			editable:
			{
				stopEnter: true,
				addOnBlur: true,
			}
		},
		plugins: 
		{
			autocomplete: 
			{
				minLength: 1,
				onlyFromValues:false,
				queryRemote: true,
				placeholder: false,
				maxResults:1000,
				remote:
				{
					url: '/getAutoTags.php',
					param: 'keyword',
					extraParams: {searchFor: function() { if($('#searchFor').length > 0) return $("#searchFor").val(); else return "";} },
					/*extraParams: extparam,*/
					loadPlaceholder: 'Please wait...'
				}
			}
		},
		unique:true
	};
	
	searchBox = new $.TextboxList('#topick_tags', options);
	
	// Add/Remove Bits
	var addBoxEvt = function(addedBox) {
			searchBox.fromClear = false;
			getPropList('fromSearchBtn');

			// For placeholder
			if($('.textboxlist-bit-editable-input').length > 0)
			{
				$('.textboxlist-bit-editable-input').attr("placeholder","");

				if ($('#topick_tags').val() != "")
					$('.textboxlist-bit-editable-input').css("width","30px");
				else
					$('.textboxlist-bit-editable-input').css("width","385px");
			}
			setTextContainerMoreIcn();
	};
	
	var removeBoxEvt = function(removedBox) {	
		if(!searchBox.fromClear) {
			//console.log(removedBox.value[1]);
			
			// RESTORE THE TAGS WHICH SEARCH BEFORE
			var flag = true;
			if(removedBox.value[1] == "Your Recommendations" || removedBox.value[1] == "Your Thumbs Up")
			{
				$.cookie("loginUserTags","");
				searchBox.clearValues();
				setAllTagsfromCookies();
				flag= false;
			}

			$.cookie("tags","");
			// For placeholder
			if($("#topick_tags").val() == "")
				setAutoPlaceholder();
			if (flag)
				getPropList('fromSearchBtn');
		}

		setTextContainerMoreIcn();
	};	

	var bitBoxFocusEvt = function(removedBox) {
		removedBox.remove();
	};
	searchBox.addEvent("bitAdd", addBoxEvt);
	searchBox.addEvent("bitRemove", removeBoxEvt);
	searchBox.addEvent("bitBoxFocus", bitBoxFocusEvt);
	searchBox.addEvent("focus", function(){
			$('.textboxlist-autocomplete-results').show().scrollTop(0).hide();
	});

	$( window ).resize(function() {
		$('.textboxlist-autocomplete').width($('.textboxlist-bits').width());
	});

	window.addEventListener("orientationchange", function() {
		$('.textboxlist-autocomplete').width($('.textboxlist-bits').width());
	}, false);

	$(document).mousedown(function(e) {
		if (e.which == 1){			
			var clicked=$(e.target);
			if(clicked.is('#overlay2')) {
				closeAllDialog();
			}
		}
	});

	$(document).bind( "touchstart", function(e){
        var clicked=$(e.target);
		if(clicked.is('#overlay2') || clicked.is('#mainOverlay2')) {				
			closeAllDialog();
		}
	});
	
	var mobilDevice = window.matchMedia("screen and (max-width: 480px)")
	if (!mobilDevice.matches){
		$('.searchOption').addClass('fixed');
		$('.srchMid').css('margin-top',$('.searchOption').height()+5);
	}
	else
	{
		noFixedHeader = true;
	}

	getPropList('fromSearchBtn');
</script> 
<script type="text/javascript" src="<?=public_path()?>js/front/responsive.js" charset="utf-8"></script>
</body>
</html>