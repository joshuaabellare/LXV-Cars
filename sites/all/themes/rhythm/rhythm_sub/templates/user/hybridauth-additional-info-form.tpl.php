<div class="widget-title font-size-18">Required information</div>
<div class="font-size-12">Please fill in additional information to complete your registration.</div>
<br>
<div class="align-left">
	<?php 
		print render($form['fset']['field_first_name']);
		print render($form['fset']['field_last_name']);
		print render($form['fset']['field_contact_number']);
	?>
</div>
<div class="clearfix"><?php print drupal_render_children($form);?></div>
<br>
<div class="font-size-10">By continuing, you agree to our <a class="color-deep-sky-blue" target="_blank" href="https://www.lxv.com.ph/terms-use">Terms & Conditions</a> and <a class="color-deep-sky-blue" target="_blank" href="https://www.lxv.com.ph/privacy-policy">Privacy Policy</a></div>