<body class="bodypage">
<div id="topOfPage"></div>
<div id="loadingData">
  <div id="testDiv" class="mainOverlay" style="display:none;">
    <div id="loadingDiv"><img src="<?=public_path()?>images/loading.gif"></div>
  </div>
</div>
<input type="hidden" name="gettingMoreResultsFlag" id="gettingMoreResultsFlag" value="true">
<input type="hidden" name="page" id="page" value="1">
<input type="hidden" name="listingType" id="listingType" value="">
<input type="hidden" name="totalRecordsCount" id="totalRecordsCount">

<!-- Main div START -->
<div class="wrapper_inner" style="width:100%">

	<?php
		$this->load->view('template/nav_bar');
	?>

	<section style="width: 100%; margin-top: 140px;" class="srchMid clearfix"> 
		<?php
			$this->load->view($this->router->fetch_class()."/".$view);
		?>
	</section>
	<div style="display:none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="divAlertDlg">
		<div class="modal-dialog">
			<div class="modal-content property_details">
				 <div class="modal-header"> Browser Setting </div>
				 <div class="msglaert" id="alertmsg"></div>
			</div>
		</div>
	</div>
	<div style="display:none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="divConsLogin">
		<div class="modal-dialog">
			<div class="modal-content property_details">
				 <div class="modal-header"> Welcome </div>
				
				<div style="text-align:center;margin-top: 10px;" class="agtcontact">
					<a href="#" class="fb-button fb-button-large fb-loaded"> <i class="fb-button-icon"></i> <span class="fb-button-text"> Connect with Facebook </span> </a>
					<h2 class="side-lined"> <span> or </span> </h2>
				</div>

				<div class="errorMsg" id="divConsumerError"></div>
				<form action="javascript:void(0);" id="frmConsLogin">
					<div class="agtcontact agent_margin">					
						<div class="agtfield alignleft"><input type="text" placeholder="Email Address" value="" id="txtConsusername" class="validate[required]"></div>
						<div class="clearboth"></div>
					</div>
					<div class="agtcontact">
						<div class="agtfield alignleft"><input type="password" placeholder="Password" value="" id="txtConspassword" class="validate[required]"></div>
						<div class="clearboth"></div>
					</div>		
					<div class="agtcontact">
						<div style="padding-top:10px;text-align:center;">			
							<a class="button-style1" id="btnConsLogin" href="javascript:void(0);"><span> Submit </span></a>
							<a class="button-style1" onclick="javascript:closeAllDialog();" id="csbtnClear" href="javascript:void(0);"><span> Cancel </span></a>
						</div>
						<div class="clearboth"></div>
					</div>					
					<div class="clearboth"></div>
					<div class="agtcontact alignright">
						<a href="javascript:closeAllDialog();getCreateAccountForm();" id="userregister"> Create Account </a> | <a href="javascript:void(0);" id="achConsForgot"> Forgot your password? </a>
					</div>
					<div style="height:10px" class="clearboth"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Main div END -->


<div style="display:none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="forgotPasswordDiv">
	<div class="modal-dialog">
		<div class="modal-content property_details">
			 <div class="modal-header"> Forgot Password </div>
			<form action="javascript:void(0);" id="frmConsForgot">					
				<div class="agtcontact agent_margin">
					<div class="errorMsg" id="divforPassError"></div>
					<div class="agtfield alignleft"><p><span>*</span></p></div>
					<div class="agtfield alignleft"><input type="text" class="validate[required]" placeholder="Email Address" id="txtConsForgotUsername"></div>
					<div class="clearboth"></div>
				</div>
				<div class="agtcontact">
					<div style="padding:10px;text-align:center">					
							<a class="button-style1" id="btnConsForgot" href="javascript:void(0);"><span> Submit </span></a>
							<a class="button-style1 btnmargin" href="javascript:void(0);" id="btnConsForgotcancel"><span> Cancel </span></a>
					</div>
					<div class="clearboth"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<div style="display:none;" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="divCreateAccountForm">
	<div class="modal-dialog">
		<div class="modal-content property_details">			
			<div class="modal-header"> Create Your Account </div>

			<div style="text-align:center;margin-top: 10px;" class="agtcontact">
				<a href="#" class="fb-button fb-button-large fb-loaded">
					<i class="fb-button-icon"></i>
					<span class="fb-button-text"> Connect with Facebook</span>
				</a>
				<h2 class="side-lined"> <span> or </span> </h2>
			</div>

			<div class="errorMsg" id="divConsumerError1"></div>
			<form action="javascript:void(0);" id="frmSignUp">
				<div class="agtcontact agent_margin">					
					<div class="agtfield alignleft"><input type="text" placeholder="John Smith" value="" id="consFirstName" class="validate[required]"></div>
					<div class="clearboth"></div>
				</div>
				<div class="agtcontact">						
					<div class="agtfield alignleft"><input type="text" placeholder="john.smith@example.com" value="" id="consEmail" class="validate[required,custom[email]]"></div>
					<div class="clearboth"></div>
				</div>
				<div class="agtcontact">
					<div class="agtfield alignleft">
					<input type="password" placeholder="&quot;minimum 5 character&quot;" id="consPassword" class="validate[required,minSize[5],maxSize[15]]" value="">
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="agtcontact">
					<div class="agtfield alignleft">
					<input type="password" placeholder="&quot;minimum 5 character&quot;" id="consPassword2" class="validate[required,equals[consPassword]]" value="">
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="agtcontact">
					<div class="agtfield alignleft"><input type="text" placeholder="555-555-5555" value="" id="consPhone" class="validate[custom[phone],funcCall[validatePhone]]"></div>
					<div class="clearboth"></div>
				</div>
				<div class="agtcontact">
						<p style="padding:10px;text-align:center;">							
							<a class="button-style1" id="btnRegisterUser" href="javascript:void(0);"><span>Create Account</span></a>
							<a class="button-style1" onclick="javascript:clearCreateAccountForm();" id="csbtnClear" href="javascript:void(0);"><span> Clear </span></a>
						</p>
				</div>
			</form>

		</div>
	</div>
</div>
