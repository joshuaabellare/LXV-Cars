<?php 
	global $base_url; 
	global $user;
	$path = current_path();
	$img_style = 'full_width_banner_small';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_banner_default = image_style_url($img_style, $image_default_uri);
	if(!empty($content['field_image'])) {
		$image_banner = image_style_url($img_style, $node->field_image[LANGUAGE_NONE][0]['uri']);
	}
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$feature_details = module_invoke('views', 'block_view', 'field_collection-feature_details');
	$feature_details_no_img = module_invoke('views', 'block_view', 'field_collection-feature_details_no_img');
?>

<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($content['field_image'])): ?>
	<div class="full-width festive-filter"><img src="<?php print $image_banner; ?>" /></div>
<?php endif; ?>
<div class="bg-light-grey">
	<div class="bg-white">
		<div class="padding-60 no-padding-left no-padding-right">
			<div class="container">
				<h1 class="no-margin uppercase align-center"><?php print($title);?></h1>
				<br>
				<div class="align-center"><a class="btn btn-mod btn-medium btn-round scroll" href="#book">Inquire Now</a></div>
			</div>
			<?php if(!empty($content['body'])) : ?>
				<br>
				<br>
				<div class="container">
					<?php print render($content['body']); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php print render($content['field_php_filter']); ?>
	<?php if(!empty($content['field_content'])) : ?>
		<br>
		<br>
		<div class="bg-white">
			<div class="padding-60 no-padding-left no-padding-right">
				<div class="container"><?php print render($content['field_content']); ?></div>
			</div>
		</div>
	<?php endif; ?>
	<?php if(!empty($feature_details)):?>
		<br>
		<br>
		<div class="bg-white">
			<div class="padding-60 no-padding-left no-padding-right no-padding-bottom">
				<h3 class="no-margin-top uppercase align-center fw-500"><?php print render($content['field_title']); ?></h3>
				<br>
				<?php print render($feature_details['content']); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if(!empty($feature_details_no_img)):?>
		<br>
		<br>
		<div class="bg-white">
			<div class="padding-60 no-padding-left no-padding-right">
				<div class="container">
					<h3 class="no-margin-top uppercase align-center fw-500"><?php print render($content['field_sub_headline']); ?></h3>
					<br>
					<?php print render($feature_details_no_img['content']); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<div id="book" class="bg-dark-grey color-white padding-60 no-padding-left no-padding-right">
	<div class="clearfix">
		<div class="col-md-8 col-md-offset-2">
			<h4 class="no-margin font-size-30 uppercase">Contact</h4>
			<p class="font-size-12">Fill in the form and our specialist will get back to you as soon as possible.</p>
			<br>
			<?php 
				$block = module_invoke('entityform_block', 'block_view', 'contact_us');
				print render($block['content']); 
			?>
		</div>
	</div>
</div>
<?php if ($node->status == 0): ?>
	<div class=" alert error"><i class="fa fa-lg fa-exclamation-triangle"></i> This page is pending and still waiting for approval therefore not viewable by others.</div>
	<!-- Unpublish Modal -->
	<div id="status-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-body rtecenter font-size-12 color-red">
		      	This page is pending and still waiting for approval therefore not viewable by others.
		      </div>
		    </div>
		</div>
	</div>
<?php endif; ?>