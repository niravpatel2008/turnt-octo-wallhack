<div style="width:100%;" class="searchOption fixed">
	<section class="headerOption">
		<header>
			<span style="color:#000;margin:10px 90px 8px 0;float:right !important;" class="phone" id="phonespan">855-292-6556</span>
			<span style="color:#000;margin:8px 5px 0;float:right;" id="welmobi">  
				Welcome, USERNAME
			</span>
			<div class="alignleft slogantxt">
				<h1>
					<a href="/"><img alt="Logo" src="<?=public_path()?>images/logo.png" class="logo"></a>
				</h1>
				<h2 class="alignleft">TITLE</h2>
			</div>
			<div class="alignrightmenu">
				<nav class="mainnav">
					<nav class="nav">
						<ul>
						  <li class="current" id="mainli">
							 <a class="cntmenu" onclick="javascript:$('.menuitem').toggle();" href="javascript:void(0);">Menu</a>
						  </li>
						 <!-- {if $uid != ""}
						   <li id="welcomeli">			
							<p class="agetwelcome">Welcome </p>
							<a class="" href="/app/login/userAccount.php">{$userName}</a>			
						   </li>
						  {/if} -->
						 <li id="loginli">
							 <a class="phone">855-292-6556</a>
						  </li>	
						  <li class="menuitem">
							<!--{if $uid != ""}
								<a class="signout" onclick="javascript:logOut();" href="#">Sign Out</a>	     
							{else}
								<a href="javascript:void(0);" onclick="javascript:getLoginForm();" class="login">Log In</a>
							{/if} -->
							<a class="login" onclick="javascript:getLoginForm();" href="javascript:void(0);">Log In</a>
						  </li>
						</ul>
					</nav>
					
				</nav>
			</div>
			<div class="clearboth"></div>
		</header>
		<!-- Search options start from here -->
			<div class="clearfix" id="mydiv">
				<div class="welcome"> </div>
				<!--Search Parameters Section Start-->
				<form class="formtop clearfix" name="frmSearch" id="frmSearch">
					<!-- Main form search text boxes div start -->
					<div class="formwrap_main">
						<div class="formwrap-row">
							<div style="width:80%" class="formwrap_cell">
								<div class="formwrap-adjust">
									<div class="w2 l">
										<input type="text" id="topick_tags" class="jqTextboxList" style="display: none;" autocomplete="off"><div class="textboxlist"><ul class="textboxlist-bits"><li class="textboxlist-bit textboxlist-bit-editable"><input type="text" autocomplete="off" class="textboxlist-bit-editable-input" style="width: 30px;"><span style="float: left; display: inline-block; position: absolute; left: -1000px; font-size: 11px; font-family: &quot;Lucida Grande&quot;,Verdana; padding: 2px 0px; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-transform: none;"></span></li></ul><div class="textboxlist-autocomplete" style="width: 870px;"><ul class="textboxlist-autocomplete-results"></ul></div></div>
									</div>
									<div class="w6 l">
										<div id="searchFordiv">
											<select id="searchFor" class="selextbox searchFor">
												<option value=""> -- Category -- </option>                
											</select><span class="selectLabel"> -- Category -- </span>
										</div>
									</div>
								</div>
							</div>
							<!-- Main form search text boxes div -->
							<div style="width:20%" class="formwrap_cell">
								<div style="width:33%" class="w7 l">	   
									<a id="btnSearch" href="javascript:void(0);" onclick="javascript:getPropList('fromSearchBtn');" class="button-styleArrow">
										<img src="<?=public_path()?>images/icon_search.png" style="cursor:pointer;">
									</a> 
								</div>
								<div style="width: 62%; background: none repeat scroll 0% 0% rgb(255, 255, 255);" class="w8 l formwrap-adjust">
									<div id="fiterByTypeBxProp">
									<select onchange="javascript:doSortBy();" id="fiterByTypeBx" class="selextbox fiterByTypeBx">
										<option value=""> -- Filter By -- </option>
									</select><span class="selectLabel"> -- Filter By -- </span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!--Search Parameters Section End-->
			</div>
		<!-- Search options end from here -->
	</section>
</div>