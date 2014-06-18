$(function() {

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
  // var temp;
  // $('.main-menu li').hover(function() {
  //   temp = $(this).parent().children('.current')
  //   temp.removeClass('current');
  //   $(this).addClass('current');
  // }, function() {
  //   $(this).removeClass('current');
  //   temp.addClass('current');
  // });


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
  temp3.on('click', function(event) {   
    event.stopPropagation(); 
    $(this).children('.submenu').toggle();
    if (temp3.children('.submenu').is(':visible')) {
      temp3.addClass('opaque');
    } else {
      temp3.removeClass('opaque');
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

	searchBox = new $.TextboxList('#search_tags', options);

	// Add/Remove Bits
	var addBoxEvt = function(addedBox) {
			searchBox.fromClear = false;
			//getPropList('fromSearchBtn');

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
			//if (flag)
			//	getPropList('fromSearchBtn');
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

	//salvattore.init();
});
