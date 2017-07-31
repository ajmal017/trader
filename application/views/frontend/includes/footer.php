<?php 
if (@$dashboard_footer == false) { ?>
<div class="footer">
  <div class="container">
    <!--<div class="flogo">
  <a href="#"><img src="<?= base_url(); ?>assets/frontend/images/logo-1.png"></a>
  </div>-->
    <div class="fnav">
      <ul>
          <li><a href="<?php echo site_url(); ?>" class="hvr-underline-reveal">Home</a></li>
          <li><a href="<?php echo site_url(); ?>/about_us" class="hvr-underline-reveal">About Us</a></li>
          <li><a href="<?php echo site_url(); ?>/testimonials" class="hvr-underline-reveal">Testimonials</a></li>
          <li><a href="<?php echo site_url(); ?>/legal" class="hvr-underline-reveal">Legal</a></li>
          <li><a href="<?php echo site_url(); ?>/bankers" class="hvr-underline-reveal">Bankers</a></li>
          <li><a href="<?php echo site_url(); ?>/faqs" class="hvr-underline-reveal">FAQ's</a></li>
          <li><a href="<?php echo site_url(); ?>/contact_us" class="hvr-underline-reveal">Contact Us</a></li>
        </ul>
      <div class="clear"></div>
    </div>
  </div>
</div>
<?php } ?>
<div class="copy-right-sec">
  <div class="container">
    <p>&copy; Copyright 2017 Shreetechnosys Pvt. Ltd. <a href="<?php echo site_url(); ?>/terms_and_conditions">Terms and Conditions</a></p>
    <div class="socail_icon-sec">
    	<ul class="reset">
        	<li><a href="#" class="fb"></a></li>
            <li><a href="#" class="twt"></a></li>
            <li><a href="#" class="in"></a></li>
        </ul>
	<div class="clear"></div>    
    </div>
  </div>
</div>
<?php /* ?><div id="google_translate_element"></div><?php */ ?>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<?php if(isset($session_data['logged_in'])) { ?>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59775d005dfc8255d623edac/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php }else{ ?>
<script>
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5950fbf850fd5105d0c82ba0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<?php } ?>