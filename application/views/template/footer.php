<footer role="contentinfo">
    <div class="stripe-darker footer-wrap">
      <div class="row">
		<div class="large-3 columns" style='padding-bottom: 20px;'>
		</div>
        <div class="large-6 columns toppad" style='padding-bottom: 20px;'>
          <div class="copyright">Copyright &copy; <?=date("Y")?>, developed by Dx Group. All rights reserved. <a href="<?=base_url()?>privacy_policy" target="_blank" style='color: #3c8dbc;text-decoration: underline;'>Privacy Policy</a></div>
        </div>
        <div class="large-3 columns toppad" style='padding-bottom: 20px;'>
          <ul class="rr social">
            <!-- li><a class="ir tw" href="#">Twitter</a></li>
            <li><a class="ir in" href="#">LinkedIn</a></li !-->
            <li><a class="ir fb" target="_blank" href="https://www.facebook.com/people/Django-Deals/100005717055261">Facebook</a></li>
            <li><a class="ir ab" target="_blank" href="http://about.me/djangodeals">About.me</a></li>
          </ul>
        </div>
      </div>
    </div>

  </footer>
</div>

<script src="<?=public_path()?>js/front/jquery.js"></script>
<script src="<?=public_path()?>js/front/plugins.js"></script>
<script src="<?=public_path()?>js/front/jquery.cookie.js"></script>
<script src="<?=public_path()?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "7c10ea91-7fbf-4e61-826c-a7210603986f", doNotHash: false, doNotCopy: false, hashAddressBar:false});</script>

<?php if(in_array($this->router->fetch_class(),array('welcome','deals')) || isset($responsivejs)) {?>
<script type="text/javascript" src="<?=public_path()?>js/front/responsive.js" charset="utf-8"></script>
<?php }?>


<?php if(in_array($this->router->fetch_class(),array('deals'))) {?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php }?>


<?php if(in_array($this->router->fetch_class(),array('welcome'))) { 
if (in_array($this->router->fetch_method(), array("index"))){?>
<!-- Auto Complete tag js -->
<script type="text/javascript" src="<?=public_path()?>js/front/GrowingInput.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=public_path()?>js/front/TextboxList.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=public_path()?>js/front/TextboxList.Autocomplete.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=public_path()?>js/jquery.event.move.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=public_path()?>js/responsive-slider.js" charset="utf-8"></script>
<script src="<?=public_path()?>js/front/welcome.js"></script>
<?php }}else{?>
<script src="<?=public_path()?>js/front/<?=$this->router->fetch_class()?>.js"></script>
<?php }?>


<script src="<?=public_path()?>js/front/common.js"></script>
<script>
var isLogin = <?=($this->front_session['id']>0)?1:0; ?>;
</script>
</body>
</html>
