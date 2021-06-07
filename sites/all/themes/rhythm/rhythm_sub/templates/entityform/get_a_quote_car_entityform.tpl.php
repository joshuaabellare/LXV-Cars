<?php print render($form['field_full_name']); ?>
<?php print render($form['field_country_text']); ?>
<div class="row clearfix">
	<div class="col-md-6"><?php print render($form['field_email']); ?></div>
	<div class="col-md-6"><?php print render($form['field_contact_number']); ?></div>
</div>
<?php print render($form['field_purchase_date']); ?>
<?php print render($form['field_message']); ?>
<?php print render($form['field_current_car']); ?>
<?php print render($form['field_lxv_exclusive']); ?>
<div class="align-center">
	<?php print drupal_render($form['actions']['captcha']);?>
	<div class="padding-5 no-padding-left no-padding-right no-padding-bottom"><?php print drupal_render($form['actions']['submit']); ?></div>
</div>
<div class="hide">
	<?php print drupal_render_children($form); ?>
</div>