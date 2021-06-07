<?php print render($form['form_id']); ?>
<?php print render($form['form_build_id']); ?>
<!-- <div class="align-center clearfix">
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
<br> -->
<div class="align-left">
	<?php
		print render ($form['name']);
		print render ($form['pass']);
		print drupal_render($form['actions']);
	?>
</div>
<br>