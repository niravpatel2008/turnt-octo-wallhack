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
    <link rel="stylesheet" href="<?=public_path()?>css/front/flexslider.css">
    <link rel="stylesheet" href="<?=public_path()?>css/front/main.css">
    <link rel="stylesheet" href="<?=public_path()?>css/front/mq-32.css" media="screen and (min-width: 32.5em)">
    <link rel="stylesheet" href="<?=public_path()?>css/front/mq-48.css" media="screen and (min-width: 48em)">
    <link rel="stylesheet" href="<?=public_path()?>css/front/mq-67.css" media="screen and (min-width: 67.5em)">
	<link rel="stylesheet" href="<?=public_path()?>css/front/responsive.css" type="text/css">
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
                        <li class="current"><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>about_us">About us</a></li>
                        <li><a href="<?=base_url()?>how_it_works">How it works</a>
                        <li><a href="<?=base_url()?>privacy_policy">Privacy Policy</a>
                        </li>
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
					  <div class='btn-group'>
						<button data-toggle="dropdown" class="input button tertiary"><?=$this->front_session['uname']?></button>
						<ul class="dropdown-menu pull-right" style='text-align:left;' role="menu">
							<li><a href="<?=base_url()?>profile/edit">Edit Profile</a></li>
							<li><a href="<?=base_url()?>profile/change_password">Change password</a></li>
							<li><a href="<?=base_url()?>profile/myfavorites">My Favorites</a></li>
							<li><a href="<?=base_url()?>profile/mydeals">My Deals</a></li>
							<li><a href="<?=base_url()?>profile/logout">Log out</a></li>
						</ul>
					  </div>
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
      </header>
