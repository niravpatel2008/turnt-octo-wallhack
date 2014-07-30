var qryString;
var resultSet = {};
var qryStrHash = {};


function setCookies()
{
	$.cookie("tags",qryStrHash["tags"]);
	$.cookie("category",qryStrHash["category"]);

	//$.cookie("searchFor",qryStrHash["searchFor"]);
}

function clearCookies()
{
	$.cookie("tags","");
	$.cookie("category","");
}


function getParamValue()
{
	qryString	= "";
	var selectedTags = $("#search_tags").val();

	//For Tags Type
	if(typeof(selectedTags) != "undefined")
	{
		qryStrHash["tags"] = $.trim(selectedTags);
		qryString += "tags_"+selectedTags+"/";
	}

	var selectedCategory = $("#category").attr('catid');

	//For Tags Type
	if(typeof(selectedCategory) != "undefined")
	{
		qryStrHash["category"] = $.trim(selectedCategory);
		qryString += "category_"+selectedCategory+"/";
	}

	//For Price Range
	/*if($(".fiterByTypeBx:visible").val() != "")
	{
		qryStrHash["sortType"] = $(".fiterByTypeBx:visible").val();
	}

	if($('#searchFor').length > 0)
		qryStrHash["searchFor"] = $('#searchFor').val();
	else
		qryStrHash["searchFor"] = "";*/
}


function getDealList(action)
{
	$("#loaderLogin").show();
	//setTopOfPage("hide"); // default Hide
	$("#noResultDiv").hide();

	if(action=='new'){
		$('#page').val('1');
		$('#search_results').html('');
		salvattore.init();
	}

	dealData = {};
	getParamValue();

	setCookies();

	/*********** Get Data Of Property *********/
	//var url = '/getSearchResult.php';
	var url = base_url()+'deals/search/';
	var data = {};

	//Set property hash into query srting
	$.each(qryStrHash, function(key, value) {
		data[key] = value;
	});
	console.log(qryStrHash);
	console.log(data);
	data['page']=$('#page').val();

	$.ajax({
		url: url,
		type: 'POST',
		data: data,
		dataType: 'json',
		async: false,
		success: function(result)
		{
			$("#loaderLogin").hide();
			var page = $('#page').val();

			resultSet[page] = result;
			if($.trim(result) != "") {
				hideHeader = true;
				$("#noResultDiv").hide();

				displayDealsData(result);
			}
			else if($.trim(result) == "") {
				$("#noResultDiv").show();
				$('#totalRecordsCount').val("");
			}
			$("#noRecTbl").hide();
		},
		error: function(xhr, textStatus, errorThrown){
			//console.log("Server error");
		}
	});
}

function setStartUp(){
	var tags = $.cookie("tags");
	if (typeof(tags) != 'undefined')
		$('#search_tags').val(tags);

	var category = $.cookie("category");
	if (typeof(category) != 'undefined')
	{

		category = (category == null)?"":category;
		$('#category').html($('.menu-browse a[catid="'+category+'"]').html());
		$('#category').attr('catid',category);
	}
}

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
  var temp;
   $('.main-menu li').hover(function() {
     temp = $(this).parent().children('.current')
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

	setStartUp();


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
					url: './welcome/autosuggest',
					param: 'keyword',
					loadPlaceholder: 'Please wait...'
				}
			}
		},
		unique:true
	};

	searchBox = new $.TextboxList('#search_tags', options);

	// Add/Remove Bits
	var addBoxEvt = function(addedBox) {
			//searchBox.fromClear = false;
			//getPropList('new');

			// For placeholder
			/*if($('.textboxlist-bit-editable-input').length > 0)
			{
				$('.textboxlist-bit-editable-input').attr("placeholder","");

				if ($('#search_tags').val() != "")
					$('.textboxlist-bit-editable-input').css("width","30px");
				else
					$('.textboxlist-bit-editable-input').css("width","385px");
			}*/
			//setTextContainerMoreIcn();
	};

	var removeBoxEvt = function(removedBox) {
			$.cookie("tags","");
			if($("#search_tags").val() == "")
				setAutoPlaceholder();
			//if (flag)
			//	getPropList('new');
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

	getDealList('new');
});
