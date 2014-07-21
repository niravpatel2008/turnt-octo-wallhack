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
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?=public_path()?>css/bootstrap.min.css">
	<link href="<?=public_path()?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=public_path()?>css/front/normalize.css">
    <link rel="stylesheet" href="<?=public_path()?>css/front/foundation.css">
    <link href="<?=public_path()?>css/front/css.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?=public_path()?>css/TextboxList.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?=public_path()?>css/TextboxList.Autocomplete.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?=public_path()?>css/front/flexslider.css">
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
                <nav class="large-6 columns">
                    <ul class="rr main-menu">
                        <li class="current"><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>about_us">About us</a></li>
                        <li><a href="<?=base_url()?>how_it_works">How it works</a>
                        </li>
                    </ul>
					<select class="select-main-menu hasCustomSelect" style="width: 100px; position: absolute; opacity: 0; height: 38px; font-size: 14px;">
					<option value="#">Navigate to...</option><option value="<?=base_url()?>">&nbsp;Home</option><option value="<?=base_url()?>about_us">&nbsp;About us</option><option value="<?=base_url()?>how_it_works">&nbsp;How it works</option>
					</select>
                </nav>
                <div class="large-3 columns">
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

        <div class="main-slider-wrap">
          <div class="row">
            <div class="column">
              <div class="main-slider flexslider white">

              <div class="flex-viewport" style="overflow: hidden; position: relative;"></div><ol class="flex-control-nav flex-control-paging"><li><a class="flex-active">1</a></li><li><a class="">2</a></li><li><a class="">3</a></li></ol><ul class="flex-direction-nav"><li><a href="#" class="flex-prev">Previous</a></li><li><a href="#" class="flex-next">Next</a></li></ul><div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1400%; transition-duration: 0s; transform: translate3d(-900px, 0px, 0px);"><li style="width: 900px; float: left; display: block;" class="clone">
                    <p class="h1">We constantly hunt for upcoming hot deals in the city</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <!--figure>
                            <img alt="" src="http://www.clipartlord.com/wp-content/uploads/2013/10/target.png">
                          </figure-->
						  <p class="caption">
                            Our team of serial hunters look at every nook and corner of the city for best of best deals.
							<a class="ir icon tag" href="<?=base_url()?>how_it_works">See Coupons</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </li><li class="clone flex-active-slide" style="width: 900px; float: left; display: block;">
                    <p class="h1">Our representative negotiate and finalise the best deal for U with the dealer</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Our representative converse with the dealers for the best deals at the best price and come out with a fab offer.
                            <a class="ir icon tag" href="<?=base_url()?>how_it_works">See Coupons</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li style="width: 900px; float: left; display: block;" class="">
                    <p class="h1">Deals are listed on the site</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Only the Verified and finalised deals by Administrator are available on the site.
							<a class="ir icon tag" href="<?=base_url()?>how_it_works">See Coupons</a>
                          </p>
                          <!--figure>
                            <img alt="" src="http://blog.quicklinkt.com/wp-content/uploads/2014/05/verified-referrals-quicklinkt-app.png">
                          </figure-->
                        </div>
                      </div>
                    </div>
                  </li>
                  <li style="width: 900px; float: left; display: block;" class="">
                    <p class="h1">Create your login , Like the deals, grab a deal</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            - Just fill the details and make yourself registered.</br>
                            - Once registered you can mark deals as a Favourite and will recieve latest deals as per the flavour of deals which you have marked.
                            <a class="ir icon tag" href="<?=base_url()?>how_it_works">See more offers</a>
                          </p>
                          <!--figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure-->
                        </div>
                      </div>
                    </div>
                  </li>
                  <li style="width: 900px; float: left; display: block;" class="">
                    <p class="h1">Check your mailbox or check under My Deals tab</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            We we will be sending you daily email alerts with the newly added deals as per your flavour.
                            <a class="ir icon tag" href="<?=base_url()?>how_it_works">See Coupons</a>
                          </p>
                          <!--figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure-->
                        </div>
                      </div>
                    </div>
                  </li>
                <li style="width: 900px; float: left; display: block;" class="clone">
                    <p class="h1">Take a print out and enjoy your deal.</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption"></p>
                          <!--figure></figure-->
                        </div>
                      </div>
                    </div>
                  </ul></div><ul class="flex-direction-nav"><li><a href="#" class="flex-prev">Previous</a></li><li><a href="#" class="flex-next">Next</a></li></ul></div>
            </div>
          </div>
        </div>

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
        </div>

      </header>
