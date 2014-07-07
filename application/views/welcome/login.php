<!--login popup -->
<div id="divConsLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content property_details">
       <div class="modal-header"> Welcome </div>

      <div class="agtcontact" style='text-align:center;margin-top: 10px;'>
        <a class="fb-button fb-button-large fb-loaded" href="#"> <i class="fb-button-icon"></i> <span class="fb-button-text"> Connect with Facebook </span> </a>
        <h2 class="side-lined"> <span> or </span> </h2>
      </div>

      <div id="divConsumerError" class="errorMsg"></div>
        <form name="loginform" id="loginform" action="" method="post">
          <?=@$error_msg['invalid_login']?>
          <div class="row">
            <div class="" style='padding:15px;'>
              <input type="text" class="input field primary" name='username' id='username' placeholder="Username">
              <?=@$error_msg['username']?>
            </div>
          </div>

          <div class="row">
            <div class="" style='padding:15px;'>
              <input type="password" class="input field primary" name='password' id='password' placeholder="Password">
              <?=@$error_msg['password']?>
            </div>
          </div>

            <div style="padding-top:10px;text-align:center;" class='row'>
			  <input type="submit" name="signin" id="signin" value="Sign in" class="input button primary" style='width: 33.3333%;display:inline-block;' />
			  <input type="submit" name="csbtnClear" id="csbtnClear" onclick="javascript:closeAllDialog();" value="Cancel" class="input button primary" style='width: 33.3333%;display:inline-block;' />
            </div>

          <div class="row">
            <a id="userregister" href="javascript:closeAllDialog();getCreateAccountForm();"> Create Account </a> | <a id="achConsForgot" href="<?=base_url()?>forgotpassword"> Forgot your password? </a>
          </div>
          <div class="clearboth" style="height:10px"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--end login popup -->

<!-- <div id="loginbox" class="loginbox" style="display:none; border-radius:10px 0px 10px 10px; width:320px;">
  <form name="loginform" id="loginform" action="" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td align="left" valign="top" colspan="2"   >
        <?php if(trim(@$msg)!=''){?>
        <div style="background:#fff; border-radius:5px; padding:5px; margin-bottom:4px;">
        <span class="redfont" style="font-size:12px;">
         <strong> <?=@$msg;?></strong>
          </span>
          </div>
          <?php }?>
          </td>
      </tr>
      <tr>
        <td align="left" valign="middle" >Username </td>
        <td align="left" valign="top" width="60%"><input type="text"  style=" width:150px;" name='username' id='username' class="input"  autofocus="autofocus"/></td>
      </tr>
      <tr>
        <td align="left" valign="top">Password</td>
        <td align="left" valign="top"><input type="password"  style="margin-top:-10px; width:150px;"  name='password' id='password'  class="input" />
          <br />
          <a href="<?=base_url()."forgotpassword"?>"  >
          Forgot Password?</a></td>
      </tr>
      <tr class="sign_in">
        <td align="left" valign="top" colspan="2"><input type="submit" name="signin" id="signin" value="Sign in" class="input button primary" /></td>
      </tr>
      <tr class="Authorizing" style="display:none;">
        <td colspan="2" align="center" style="text-align:center; background:#FFFFFF"><div style="margin:0px auto; width:50%;" align="center">
            <div style="float:left; width:auto;"> <img src="<?=public_path()?>images/loading.gif" height="27"/> </div>
            <div style=" float:left; width:auto; margin:4px 0px 0px 4px; font-size:13px; font-weight:bold; color:#000;"> Authorizing... </div>
          </div></td>
      </tr>
    </table>
  </form>
</div> -->
