<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><!--<![endif]--><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?=public_path()?>css/bootstrap.min.css">
	<link href="<?=public_path()?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=public_path()?>css/front/normalize.css">
    <link rel="stylesheet" href="<?=public_path()?>css/front/foundation.css">
    <link href="<?=public_path()?>css/front/css.css" rel="stylesheet" type="text/css">
	<?php if (in_array($this->router->fetch_class(),array('welcome'))){?>
	<link rel="stylesheet" href="<?=public_path()?>css/TextboxList.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?=public_path()?>css/TextboxList.Autocomplete.css" type="text/css" media="screen" charset="utf-8" />
	<?php } ?>
    <link rel="stylesheet" href="<?=public_path()?>css/front/responsive-slider.css">
    <link rel="stylesheet" href="<?=public_path()?>css/front/main.css">
    <link rel="stylesheet" href="<?=public_path()?>css/front/mq-32.css" media="screen and (min-width: 32.5em)">
    <link rel="stylesheet" href="<?=public_path()?>css/front/mq-48.css" media="screen and (min-width: 48em)">
    <link rel="stylesheet" href="<?=public_path()?>css/front/mq-67.css" media="screen and (min-width: 67.5em)">
    <link rel="stylesheet" href="<?=public_path()?>css/front/responsive.css">
	<link href="<?=public_path()?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!--[if (lt IE 9)&(!IEMobile)]>
      <link rel="stylesheet" href="<?=public_path()?>css/front/foundation-ie8.css">
      <link rel="stylesheet" href="<?=public_path()?>css/front/mq-32.css"/>
      <link rel="stylesheet" href="<?=public_path()?>css/front/mq-48.css"/>
      <link rel="stylesheet" href="<?=public_path()?>css/front/mq-67.css"/>
    <![endif]-->

    <script src="<?=public_path()?>js/front/modernizr-2.js"></script>
    <script type="text/javascript">
      function base_url () {
          return '<?=base_url()?>';
      }
    </script>
</head>
<body>
	<?=$this->load->view('welcome/initial');?>
    <div class="page home">
    <header class="cf" role="banner">
        <div class="top-wrap">
            <div class="row">
                <div class="large-3 columns">
                <div class="logo">
                    <a href="<?=base_url()?>"><img src='<?=base_url()?>public/img/logo.png'></a>
                </div>
                </div>
                <nav class="large-6 columns toppad">
                    <ul class="rr main-menu">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>about_us">About us</a></li>
                        <li><a href="<?=base_url()?>how_it_works">How it works</a></li>
						<li><a href="<?=base_url()?>privacy_policy">Privacy Policy</a>
                    </ul>
					<select class="select-main-menu hasCustomSelect" style="width: 100px; position: absolute; opacity: 0; height: 38px; font-size: 14px;">
					<option value="#">Navigate to...</option><option value="<?=base_url()?>">&nbsp;Home</option><option value="<?=base_url()?>about_us">&nbsp;About us</option><option value="<?=base_url()?>how_it_works">&nbsp;How it works</option>
					<option value="<?=base_url()?>privacy_policy">&nbsp;Privacy Policy</option>
					</select>
                </nav>
                <div class="large-3 columns toppad">
                    <div class="account cf">
                      <?php
                        if ($this->front_session['id'] > 0) {
                      ?>
                        <button data-toggle="dropdown" class="input button tertiary"><?=$this->front_session['uname']?></button>
						<ul class="dropdown-menu pull-right" style='text-align:left;' role="menu">
							<li><a href="<?=base_url()?>profile/edit">Edit Profile</a></li>
							<li><a href="<?=base_url()?>profile/change_password">Change password</a></li>
							<li><a href="<?=base_url()?>profile/myfavorites">My Favorites</a></li>
							<li><a href="<?=base_url()?>profile/mydeals">My Deals</a></li>
							<li><a href="<?=base_url()?>profile/logout">Log out</a></li>
						</ul>
                      <?php
                        }else{
                      ?>
                        <a class="input button blue tertiary icon plus" href="javascript:void(0)" onclick="openSignupForm();" >Sign up</a>
                        <a class="input button transparent tertiary" href="javascript:void(0)" onclick="openLoginForm();" >Sign in</a>
                      <?php
                        }
                      ?>
                    </div>
                </div>
            </div>
        </div>

        <!--div class="row main-slider-wrap" style='max-width:84.4em;'>
			<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
        <div class="slides" data-group="slides">
      		<ul>
  	    		<li>
              <div class="slide-body" data-group="slide">
                <img src="<?=public_path()?>img/slider/2.jpg">
                <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                  <h2 style='color:#FFFFFF;'>From restaurant to Banquet hall</h2>
                </div>
              </div>
  	    		</li>
  	    		<li>
              <div class="slide-body" data-group="slide">
                <img src="<?=public_path()?>img/slider/3.jpg">
                <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                  <h2 style='color:#FFFFFF;'>From Hotel to Hospitality</h2>
                </div>
              </div>
  	    		</li>
  	    		<li>
              <div class="slide-body" data-group="slide">
                <img src="<?=public_path()?>img/slider/1.jpg">
                <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                  <h2 style='color:#000000;'>Talk of the town deals</h2>
                </div>
              </div>
  	    		</li>
  	    	</ul>
        </div>
        <a class="slider-control left" href="#" data-jump="prev">Prev</a>
        <a class="slider-control right" href="#" data-jump="next">Next</a>
        <div class="pages">
          <a class="page" href="#" data-jump-to="1">1</a>
          <a class="page" href="#" data-jump-to="2">2</a>
          <a class="page" href="#" data-jump-to="3">3</a>
        </div>
    	</div>
        </div -->

        <div class="search-wrap stripe-white">
          <div class="row">
            <form action="search-results.html">
              <div class="small-6 large-8 columns">
                  <input type="text" id='search_tags' placeholder="Search listing" class="input field primary">
              </div>
              <div class="small-3 large-2 columns">
                <input type="button" onclick="getDealList('new');" value="Search" class="input button primary red">
              </div>
              <nav class="small-3 large-2 columns">
                <ul class="rr menu-browse">
                  <li class="input button primary">
                    <p class="label" catid='' id='category'>All</p>
                    <ul class="rr sub" style="display: none;">
							<li><a href='#' catid=''>All</a></li>
					<?php foreach($categories as $category){
							echo "<li><a href='#' catid='$category->dc_catid'>$category->dc_catname</a></li>";
					}?>
                    </ul>
                  </li>
                </ul>
              </nav>
            </form>
          </div>
		  <div class="row category_select">
			<img data-catid='' src='<?=public_path()?>/img/all_cat.png' alt='All' title='All Deal'/>
			<?php foreach($categories as $category){
					echo "<img data-catid='".$category->dc_catid."' src='".category_img_path().$category->dc_catimg."' alt='".$category->dc_catname."' title='".$category->dc_catname."' />";
			}?>
		  </div>
        </div>

      </header>
