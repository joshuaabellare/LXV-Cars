<?php print render($form['field_full_name']); ?>
<?php print render($form['field_email']); ?>
<?php print render($form['field_contact_number']); ?>
<div class="clearfix row">
	<div class="col-md-6">
		<?php print render($form['field_preferred_time']); ?>
	</div>
	<div class="col-md-6">
		<?php print render($form['field_date']); ?>
	</div>
</div>
<?php print render($form['field_message']); ?>
<div class="align-center">
	<?php print drupal_render($form['actions']['captcha']);?>
	<div class="padding-5 no-padding-left no-padding-right no-padding-bottom"><?php print drupal_render($form['actions']['submit']); ?></div>
</div>
<div class="hide">
	<?php print drupal_render_children($form); ?>
</div>


