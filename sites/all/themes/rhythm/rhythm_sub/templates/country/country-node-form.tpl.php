<?php
	global $base_url;
	$seo_admin_role = array_intersect(array('administrator', 'seo'), array_values($user->roles));
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
	<h1 class="uppercase letter-spacing-3 align-center no-margin">Country</h1>
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
				<h3 class="no-margin uppercase">Main Description</h3>
				<br>
				<?php print render($form['body']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Banner</h3>
				<br>
				<p class="custom-field-description align-center">
					Upload a high definition image for the banner.
					<br>
					Recommended: Image size should be: <strong>(1500x600)</strong> Upload size is <strong>300 KB</strong> or less.
				</p>
				<?php print render($form['field_image']); ?>
			</div>
			<br>
			<br>
			<div class="bg-light-grey border-radius-3 padding-15">
				<h3 class="no-margin uppercase">Thumbnail</h3>
				<br>
				<p class="custom-field-description align-center">
					Thumbnail image will show on the listing pages.
					<br>
					Image size should be: <strong>(650x550)</strong> Upload size is <strong>300 KB</strong> or less.
				</p>
				<?php print render($form['field_thumbnail']); ?>
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
