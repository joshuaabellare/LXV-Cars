<?php
	global $base_url;
	$admin = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$seo_admin_role = array_intersect(array('administrator', 'seo'), array_values($user->roles));
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
	<h1 class="uppercase letter-spacing-3 align-center no-margin">Basic Page</h1>
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
				<?php print render($form['field_sub_headline']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Target Area</h3>
				<br>
				<p class="custom-field-description align-center font-size-12">If country is answered this will show on the URL on the first save.</p>
				<br>
				<div class="row clearfix">
					<div class="col-md-4"><?php print render($form['field_country']); ?></div>
					<div class="col-md-4"><?php print render($form['field_region']); ?></div>
					<div class="col-md-4"><?php print render($form['field_location']); ?></div>		
				</div>		
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Short Description</h3>
				<br>
				<?php print render($form['field_description']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Upper Content</h3>
				<br>
				<p class="custom-field-description align-center font-size-12">You can add texts, media, and blocks on this section using shortcode format. (Shown before the parallax ad on a page.)</p>
				<br>
				<?php print render($form['body']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Lower Content</h3>
				<br>
				<p class="custom-field-description align-center font-size-12">You can add texts, media, and blocks on this section using shortcode format. (Shown after the parallax ad on a page.)</p>
				<br>
				<?php print render($form['field_content']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Thumbnail</h3>
				<br>
				<p class="custom-field-description align-center font-size-12">
					Thumbnail will only show if banner has no value.
					<br>
					Image size should be: <strong>(800x600)</strong> Upload size is <strong>300 KB</strong> or less.
				</p>
				<div class="align-center margin-auto-input">
					<?php print render($form['field_thumbnail']); ?>
				</div>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Video Link</h3>
				<br>
				<?php print render($form['field_video_link']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">SEO</h3>
				<br>
				<?php if (empty($seo_admin_role) ? FALSE : TRUE) : ?>
					<?php print render($form['field_passed_to_google']); ?>
					<?php print render($form['field_seo_status_admin']); ?>
				<?php else: ?>
					<?php hide($form['field_passed_to_google']); ?>
					<?php hide($form['field_seo_status_admin']); ?>
				<?php endif; ?>
				<?php print render($form['field_seo_status_content_writer']); ?>
				<?php print render($form['field_seo_title']); ?>
				<?php print render($form['field_meta_keywords']); ?>
				<?php print render($form['field_meta_description']); ?>
				<?php print render($form['additional_settings']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">LXV Information</h3>
				<br>
				<?php print render($form['field_lxv_information']); ?>
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