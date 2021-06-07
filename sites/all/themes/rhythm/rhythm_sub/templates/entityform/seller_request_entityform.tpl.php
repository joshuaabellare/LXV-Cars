<div class="row clearfix">
	<div class="col-md-4"><?php print render($form['field_full_name']); ?></div>
	<div class="col-md-4"><?php print render($form['field_email']); ?></div>
	<div class="col-md-4"><?php print render($form['field_contact_number']); ?></div>
</div>
<?php print render($form['field_type_of_seller']); ?>
<?php print render($form['field_type_of_product_to_sell']); ?>
<?php print render($form['field_message']); ?>
<div class="align-center">
	<?php print drupal_render($form['actions']['captcha']);?>
	<div class="padding-5 no-padding-left no-padding-right no-padding-bottom"><?php print drupal_render($form['actions']['submit']); ?></div>
</div>
<div class="hide">
	<?php print drupal_render_children($form); ?>
</div>


