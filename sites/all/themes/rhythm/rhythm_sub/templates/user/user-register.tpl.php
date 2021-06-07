<div class="align-center clearfix">
	<?php
		if (module_exists('hybridauth')) {
			$element['#title'] = '';
			$element['#type'] = 'hybridauth_widget';
			$element['#hybridauth_widget_icon_pack'] = 'hybridauth_48';
			print drupal_render($element);
		}
	?>
</div>
<br>
<div class="align-center">OR</div>
<br>
<div class="align-left">
	<?php
		print render($form['account']['name']);
		print render($form['field_first_name']);
		print render($form['field_last_name']);
		print render($form['account']['mail']);
		print render($form['field_contact_number']);
		print render($form['account']['pass']);
		print render($form['actions']['captcha']);
	?>
</div>
<div class=""><?php print drupal_render($form['actions']['submit']); ?></div>
<div class="clearfix padding-5 no-padding-left no-padding-right no-padding-bottom"><?php print drupal_render_children($form);?></div>
<br>
<div class="font-size-10">By continuing, you agree to our <a class="color-deep-sky-blue" target="_blank" href="https://www.theluxeguide.com/terms-use">Terms & Conditions</a> and <a class="color-deep-sky-blue" target="_blank" href="https://www.theluxeguide.com/privacy-policy">Privacy Policy</a></div>