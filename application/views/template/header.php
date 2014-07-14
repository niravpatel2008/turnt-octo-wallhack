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
                    <a href="http://teothemes.com/html/Couponizer/index.html">Couponizer</a>
                </div>
                </div>
                <nav class="large-6 columns">
                    <ul class="rr main-menu">
                        <li class="current"><a href="http://teothemes.com/html/Couponizer/index.html">Home</a></li>
                        <li><a href="http://teothemes.com/html/Couponizer/blog.html">Blog</a></li>
                        <li>
                          <a href="http://teothemes.com/html/Couponizer/search-results.html">Extra</a>
                          <ul class="sub-menu">
                            <li><a href="http://teothemes.com/html/Couponizer/company.html">Company</a></li>
                            <li><a href="http://teothemes.com/html/Couponizer/404.html">404 page</a></li>
                            <li><a href="http://teothemes.com/html/Couponizer/no-results.html">No results</a></li>
                            <li><a href="http://teothemes.com/html/Couponizer/search-results.html">Search results</a></li>
                          </ul>
                        </li>
                        <li><a href="http://teothemes.com/html/Couponizer/coupons.html">Coupons</a></li>
                        <li><a href="http://teothemes.com/html/Couponizer/post.html">Post</a></li>
                    </ul><select class="select-main-menu hasCustomSelect" style="width: 100px; position: absolute; opacity: 0; height: 38px; font-size: 14px;"><option value="#">Navigate to...</option><option value="http://teothemes.com/html/Couponizer/index.html">&nbsp;Home</option><option value="http://teothemes.com/html/Couponizer/blog.html">&nbsp;Blog</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&nbsp;Extra</option><option value="http://teothemes.com/html/Couponizer/company.html">&ndash;&nbsp;Company</option><option value="http://teothemes.com/html/Couponizer/404.html">&ndash;&nbsp;404 page</option><option value="http://teothemes.com/html/Couponizer/no-results.html">&ndash;&nbsp;No results</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&ndash;&nbsp;Search results</option><option value="http://teothemes.com/html/Couponizer/coupons.html">&nbsp;Coupons</option><option value="http://teothemes.com/html/Couponizer/post.html">&nbsp;Post</option></select><span class="customSelect input button dark secondary select-main-menu" style="display: inline-block;"><span class="customSelectInner" style="width: 100px; display: inline-block;">Navigate to...</span></span><select class="select-main-menu hasCustomSelect" style="width: 100px; position: absolute; opacity: 0; height: 38px; font-size: 14px;"><option value="#" selected="selected">Navigate to...</option><option value="http://teothemes.com/html/Couponizer/index.html">&nbsp;Home</option><option value="http://teothemes.com/html/Couponizer/blog.html">&nbsp;Blog</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&nbsp;Extra</option><option value="http://teothemes.com/html/Couponizer/company.html">&ndash;&nbsp;Company</option><option value="http://teothemes.com/html/Couponizer/404.html">&ndash;&nbsp;404 page</option><option value="http://teothemes.com/html/Couponizer/no-results.html">&ndash;&nbsp;No results</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&ndash;&nbsp;Search results</option><option value="http://teothemes.com/html/Couponizer/coupons.html">&nbsp;Coupons</option><option value="http://teothemes.com/html/Couponizer/post.html">&nbsp;Post</option><option value="#">Navigate to...</option><option value="http://teothemes.com/html/Couponizer/index.html">&nbsp;Home</option><option value="http://teothemes.com/html/Couponizer/blog.html">&nbsp;Blog</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&nbsp;Extra</option><option value="http://teothemes.com/html/Couponizer/company.html">&ndash;&nbsp;Company</option><option value="http://teothemes.com/html/Couponizer/404.html">&ndash;&nbsp;404 page</option><option value="http://teothemes.com/html/Couponizer/no-results.html">&ndash;&nbsp;No results</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&ndash;&nbsp;Search results</option><option value="http://teothemes.com/html/Couponizer/coupons.html">&nbsp;Coupons</option><option value="http://teothemes.com/html/Couponizer/post.html">&nbsp;Post</option></select><span class="customSelect input button dark secondary select-main-menu hasCustomSelect" style="width: 100px; position: absolute; opacity: 0; height: 38px; font-size: 14px; display: inline-block;"><span class="customSelectInner" style="width: 100px; display: inline-block;">Navigate to...</span></span><span class="customSelect input button dark secondary select-main-menu hasCustomSelect" style="display: inline-block; width: 100px; position: absolute; opacity: 0; height: 38px; font-size: 14px;"><span class="customSelectInner" style="width: 100px; display: inline-block;">Navigate to...</span><option value="#">Navigate to...</option><option value="http://teothemes.com/html/Couponizer/index.html">&nbsp;Home</option><option value="http://teothemes.com/html/Couponizer/blog.html">&nbsp;Blog</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&nbsp;Extra</option><option value="http://teothemes.com/html/Couponizer/company.html">&ndash;&nbsp;Company</option><option value="http://teothemes.com/html/Couponizer/404.html">&ndash;&nbsp;404 page</option><option value="http://teothemes.com/html/Couponizer/no-results.html">&ndash;&nbsp;No results</option><option value="http://teothemes.com/html/Couponizer/search-results.html">&ndash;&nbsp;Search results</option><option value="http://teothemes.com/html/Couponizer/coupons.html">&nbsp;Coupons</option><option value="http://teothemes.com/html/Couponizer/post.html">&nbsp;Post</option></span><span class="customSelect input button dark secondary select-main-menu" style="display: inline-block;"><span class="customSelectInner" style="width: 100px; display: inline-block;">&nbsp;</span></span>
                </nav>
                <div class="large-3 columns">
                    <div class="account cf">
                      <?php
                        if ($this->front_session['id'] > 0) {
                      ?>
                        <a class="" href="<?=base_url()?>profile"><?=$this->front_session['uname']?></a>&nbsp;&nbsp;
                        <a class="input button tertiary" href="<?=base_url()?>profile/logout">Log out</a>
                      <?php
                        }else{
                      ?>
                        <a class="input button blue tertiary icon plus" href="javascript:void(0)" onclick="openSignupForm();" >Join us</a>
                        <a class="input button transparent tertiary" href="javascript:void(0)" onclick="openLoginForm();" >Log in</a>
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
                    <p class="h1">Hot Offers From BestWebSoft</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Incredible Offer From The Biggest Online Store.
                            We Give You A 5% Discount On All Laptops! More discounts to come in the next weeks!
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">Learn more</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li><li class="clone flex-active-slide" style="width: 900px; float: left; display: block;">
                    <p class="h1">Cheap domains and hosting from GoDaddy</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Unique offers from GoDaddy, register
$0.99 domains and get extremely cheap hosting using our coupon codes for
all the orders placed in April and May.
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">See Coupons</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li style="width: 900px; float: left; display: block;" class="">
                    <p class="h1">Hot Offers From BestWebSoft</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Incredible Offer From The Biggest Online Store.
                            We Give You A 5% Discount On All Laptops! More discounts to come in the next weeks!
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">Learn more</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li style="width: 900px; float: left; display: block;" class="">
                    <p class="h1">Free shipping from Ray Ban</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Ray Ban offers free shipping for all the
orders placed in May! Don't miss this unique opportunity to get your
dream sunglasses.
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">See more offers</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li style="width: 900px; float: left; display: block;" class="">
                    <p class="h1">Cheap domains and hosting from GoDaddy</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Unique offers from GoDaddy, register
$0.99 domains and get extremely cheap hosting using our coupon codes for
all the orders placed in April and May.
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">See Coupons</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li>
                <li style="width: 900px; float: left; display: block;" class="clone">
                    <p class="h1">Hot Offers From BestWebSoft</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Incredible Offer From The Biggest Online Store.
                            We Give You A 5% Discount On All Laptops! More discounts to come in the next weeks!
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">Learn more</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li><li class="clone" style="width: 900px; float: left; display: block;">
                    <p class="h1">Cheap domains and hosting from GoDaddy</p>
                    <div class="row">
                      <div class="large-8 columns large-centered">
                        <div class="content">
                          <p class="caption">
                            Unique offers from GoDaddy, register
$0.99 domains and get extremely cheap hosting using our coupon codes for
all the orders placed in April and May.
                            <a class="ir icon tag" href="http://teothemes.com/html/Couponizer/coupons.html">See Coupons</a>
                          </p>
                          <figure>
                            <img alt="" src="Couponizer_files/prod.png">
                          </figure>
                        </div>
                      </div>
                    </div>
                  </li></ul></div><ul class="flex-direction-nav"><li><a href="#" class="flex-prev">Previous</a></li><li><a href="#" class="flex-next">Next</a></li></ul></div>
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
