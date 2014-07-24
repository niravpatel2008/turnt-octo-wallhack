<footer role="contentinfo">
    <div class="stripe-darker footer-wrap">
      <div class="row">
        <div class="large-3 columns">
          <div class="logo">
            <a href="<?=base_url()?>"><img src='<?=base_url()?>public/img/logo.png'></a>
          </div>
        </div>
        <div class="large-6 columns">
          <div class="copyright">Copyright &copy; <?=date("Y")?>, developed by Dx Group. All rights reserved.</div>
        </div>
        <div class="large-3 columns">
          <ul class="rr social">
            <li><a class="ir tw" href="#">Twitter</a></li>
            <li><a class="ir in" href="#">LinkedIn</a></li>
            <li><a class="ir fb" href="#">Facebook</a></li>
          </ul>
        </div>
      </div>
    </div>

  </footer>
</div>


<script src="<?=public_path()?>js/front/jquery.min.js"></script>
<script src="<?=public_path()?>js/front/plugins.js"></script>
<script src="<?=public_path()?>js/front/jquery.cookie.js"></script>
<!-- Auto Complete tag js -->
<script type="text/javascript" src="<?=public_path()?>js/front/GrowingInput.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=public_path()?>js/front/TextboxList.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=public_path()?>js/front/TextboxList.Autocomplete.js" charset="utf-8"></script>
<script src="<?=public_path()?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "7c10ea91-7fbf-4e61-826c-a7210603986f", doNotHash: false, doNotCopy: false, hashAddressBar:false});</script>
<?php if(in_array($this->router->fetch_class(),array('welcome','deals')) || isset($responsivejs)) {?>
<script type="text/javascript" src="<?=public_path()?>js/front/responsive.js" charset="utf-8"></script>
<?php }?>
<script src="<?=public_path()?>js/front/common.js"></script>
<script src="<?=public_path()?>js/front/<?=$this->router->fetch_class()?>.js"></script>

</body>
</html>
