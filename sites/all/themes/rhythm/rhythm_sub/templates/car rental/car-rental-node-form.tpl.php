<?php
	global $user;
	global $base_url;
	$admin_seo_role = array_intersect(array('administrator', 'website admin', 'seo'), array_values($user->roles));
	hide($form['actions']['delete']);
?>
<?php if($node = menu_get_object()): ?>
	<?php
		$page_title = $node->title;
		$page_id = $node->nid;
		$alias = drupal_get_path_alias('node/' . $node->nid);
	?>
	<br>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-offset-1 col-md-10">
				<div class="row clearfix">
					<div class="col-md-10 col-sm-12 col-xs-12">
						<br>
						<h1 class="no-margin"><?php print $page_title; ?></h1>
						<div class="font-size-12">Reference ID: <?php print $page_id; ?></div>
						<br>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<br>
						<div><a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle uppercase full-width" target = "_blank" href="<?php print $base_url . '/' . $alias; ?>">View Page </a></div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
<?php else: ?>
	<br>
	<br>
	<h1 class="uppercase letter-spacing-3 align-center no-margin">Car for Rent</h1>
	<br>
	<br>
<?php endif; ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-offset-1 col-md-10">
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Basic Information</h3>
				<br>
				<?php print render($form['title']); ?>
				<div class="row clearfix">
					<div class="col-md-6"><?php print render($form['field_country']); ?></div>
					<div class="col-md-6"><?php print render($form['field_location']); ?></div>
					<div class="col-md-6"><?php print render($form['field_units']); ?></div>
					<div class="col-md-6"><?php print render($form['field_year']); ?></div>
					<div class="col-md-6"><?php print render($form['field_max_capacity']); ?></div>
				</div>
				<?php print render($form['field_type_of_vehicle']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Description</h3>
				<br>
				<?php print render($form['body']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Services Offered</h3>
				<br>
				<?php print render($form['field_car_service_with_price']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Rate</h3>
				<br>
				<div class="row clearfix">
					<div class="col-md-4">
						<?php print render($form['field_currency']); ?>
					</div>
					<div class="col-md-4">
						<?php print render($form['field_price']); ?>
					</div>
					<div class="col-md-4">
						<?php print render($form['field_price_label']); ?>
					</div>
				</div>
				<?php print render($form['field_rates_details']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Media</h3>
				<br>

				<h4 class="no-margin uppercase">Banner</h4>
				<br>
				<p class="custom-field-description align-center font-size-12">Upload a high definition image for Banner.
				<br>
				Image size should be: <strong>(1800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
				<br>
				<div class="align-center margin-auto-input">
					<?php print render($form['field_image']); ?>
				</div>
				<br>

				<h4 class="no-margin uppercase">Thumbnail</h4>
				<br>
				<p class="custom-field-description align-center font-size-12">
					Thumbnail will only show if banner has no value.
					<br>
					Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.
				</p>
				<div class="align-center margin-auto-input">
					<?php print render($form['field_thumbnail']); ?>
				</div>
				<br>

				<h4 class="no-margin uppercase">Gallery</h4>
				<br>
				<p class="custom-field-description align-center font-size-12">Upload a high definition image for Gallery, you can rearrange the images you upload.
				<br>
				Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.</p>
				<br>
				<div class="align-center margin-auto-input">
					<?php print render($form['field_images']); ?>
				</div>
				<br>

				<h4 class="no-margin uppercase">Video Link</h4>
				<br>
				<?php print render($form['field_video_link']); ?>
				<br>

				<h4 class="no-margin uppercase">Virtual Tour Link</h4>
				<br>
				<?php print render($form['field_virtual_tour']); ?>
				<br>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Highlights</h3>
				<br>
				<?php print render($form['field_title']); ?>
				<?php print render($form['field_feature_details']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Services</h3>
				<br>
				<?php print render($form['field_sub_headline']); ?>
				<?php print render($form['field_feature_details_no_pics']); ?>
			</div>
			<br>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">SEO</h3>
				<br>
				<?php print render($form['field_seo_title']); ?>
				<?php print render($form['field_meta_description']); ?>
				<?php print render($form['additional_settings']); ?>
			</div>
			<br>
			<br>
		</div>
	</div>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-offset-3 col-md-6">
			<div class="align-center full-width-btn">
				<?php print drupal_render($form['actions']['submit']); ?>
			</div>
		</div>
	</div>
</div>
<br>
<br>
<div class="hide"><?php print drupal_render_children($form);?></div>