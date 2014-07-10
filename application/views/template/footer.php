<footer role="contentinfo">
    <div class="newsletter-wrap stripe-white">
      <div class="row">
        <form action="#">
          <div class="large-3 columns">
            <h3>Newsletter Signup</h3>
          </div>
          <div class="small-4 large-3 columns">
            <input type="text" placeholder="Enter Your Name" class="input field primary">
          </div>
          <div class="small-5 large-4 columns">
            <input type="text" placeholder="Enter Your E-mail" class="input field primary">
          </div>
          <div class="small-3 large-2 columns">
            <input type="submit" value="Subscribe" class="input button primary red">
          </div>
        </form>
      </div>
    </div>

    <div class="stripe-dark pre-footer-wrap">
      <div class="row">
        <div class="large-4 columns">
          <h3 class="alt">About</h3>
          <p>
            Ut sodales ultrices metus, at molestie tellus cursus
quis. Cras placerat bibendum quam sed facilisis. Suspendisse dapibus
eros eget tellus tempor lacinia. Cras ornare lorem sit amet arcu
accumsan ut tristique est fringilla.
          </p>
        </div>
        <div class="small-6 large-4 large-offset-1 columns">
          <h3 class="alt">Recent Tweets</h3>
          <div class="tweet">
            <p>
              Couponizer is a multi-purpose PSD template.
Created by #bestwebsoft - hand-made websites from great guys
http://t.co/HXvWw
            </p>
            <a class="posted" href="#">posted 5 minutes ago</a>
          </div>
        </div>
        <nav class="small-6 large-2 large-offset-1 columns">
          <h3 class="alt">Menu</h3>
          <ul class="rr footer-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Terms &amp; Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Jobs</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="stripe-darker footer-wrap">
      <div class="row">
        <div class="large-3 columns">
          <div class="logo">
            <a href="#">Couponizer</a>
          </div>
        </div>
        <div class="large-6 columns">
          <div class="copyright">Copyright &copy; 2013, developed by <a href="http://teothemes.com/">TeoThemes</a>. All rights reserved.</div>
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
<?php if(in_array($this->router->fetch_class(),array('welcome','deals'))){?>
<script type="text/javascript" src="<?=public_path()?>js/front/responsive.js" charset="utf-8"></script>
<?php }?>
<script src="<?=public_path()?>js/front/common.js"></script>
<script src="<?=public_path()?>js/front/<?=$this->router->fetch_class()?>.js"></script>

</body>
</html>
