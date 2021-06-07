<?php 
	global $base_url; 
	global $user;
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
?>
<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
		</div>
	</div>
<?php endif; ?>
<!-- Navigation -->
<!-- Main nav -->
<div class="hide">
	<div class="slider-show-navigation">
		<div class="main-nav-owl-slider font-size-12">
			<?php
				$block = module_invoke('menu_block', 'block_view', '1');
				print render($block['content']);
			?>
		</div>
	</div>
</div>
<div class="slider-show-navigation">
	<div class="main-nav-owl-slider font-size-12">
		<?php
			$block = module_invoke('menu_block', 'block_view', '2');
			print render($block['content']);
		?>
	</div>
</div>
<!-- End of main nav -->
<!-- Sub nav -->
<?php
	$block = module_invoke('menu_block', 'block_view', '3');
	$block_render = render($block['content']); 
	if ($block_render):
?>
	<div class="slider-show-navigation"><?php print render($block['content']); ?></div>
<?php endif; ?>
<?php
	$menu_5_block = module_invoke('menu_block', 'block_view', '5');
	$menu_5 = render($menu_5_block['content']); 
	if(!empty($menu_5)):
?>
	<div class="clearfix">
		<?php
			$block = module_invoke('menu_block', 'block_view', '4');
			$block_render = render($block['content']); 
			if ($block_render):
		?>
			<div class="col-md-6 col-sm-6 col-xs-6 padding-1 no-padding-left no-padding-top">
				<?php print render($block['content']); ?>
			</div>
		<?php endif; ?>
		<?php
			$block = module_invoke('menu_block', 'block_view', '5');
			$block_render = render($block['content']); 
			if ($block_render):
		?>
			<div class="col-md-6 col-sm-6 col-xs-6 padding-1 no-padding-right no-padding-top">
				<?php print render($block['content']); ?>
			</div>
		<?php endif; ?>
	</div>
<?php else: ?>
	<?php
		$block = module_invoke('menu_block', 'block_view', '4');
		$block_render = render($block['content']); 
		if ($block_render):
	?>
		<?php print render($block['content']); ?>
	<?php endif; ?>
<?php endif; ?>
<!-- End of sub nav -->
<!-- End of navigation -->

<div class="clearfix row-eq-height">
	<?php if((!empty($content['field_listings_connected'])) || (!empty($content['field_establishments_connected'])) || (!empty($content['field_brands'])) || (!empty($content['field_brand_models_connected'])) || (!empty($content['field_property_developer'])) ): ?>
		<?php $body_container_class = "col-md-10 no-padding"; ?>
	<?php else: ?>
		<?php $body_container_class = "col-md-offset-1 col-md-10 no-padding"; ?>
	<?php endif; ?>
	<div class="<?php print $body_container_class; ?>">
		<?php if(!empty($content['field_video_link'])) : ?>
			<?php $video_field = trim(render($content['field_video_link'])); ?>
			<?php if (strpos($video_field,'youtu.be') || strpos($video_field,'www.youtube.com') == true): ?>
				<?php
					$old_str = ["youtu.be", "watch?v="];
					$new_str = ["www.youtube.com/embed", "embed/"];
					$str_replace_video = str_replace($old_str, $new_str, $video_field);
					$video = substr($video_field, strpos($video_field, "=") + 1);
				?>
				<div class="embed-responsive embed-responsive-size-16x9 bg-black">
					<iframe class="embed-responsive-item" src="<?php print $str_replace_video; ?>?controls=0&showinfo=0&rel=0&autoplay=0&loop=1&mute=0&playlist=<?php print $video; ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php else: ?>
				<?php
					$video_field = trim(render($content['field_video_link']));
					$str_replace_video = str_replace("vimeo.com", "player.vimeo.com/video", $video_field);
					$video = substr($video_field, strpos($video_field, "=") + 1);
				?>
				<div class="embed-responsive embed-responsive-size-16x9 bg-black">
					<iframe class="embed-responsive-item" src="<?php print $str_replace_video; ?>?autoplay=0&amp;loop=1" allowfullscreen="" frameborder="0" mozallowfullscreen="" width="100%" height="700" webkitallowfullscreen=""></iframe>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="container">
			<div class="padding-60 no-padding-left no-padding-right">
				<div class="container">
					<h1 class="no-margin uppercase align-center"><?php print($title);?></h1>
					<br>
					<div class="align-center"><?php print render($content['sharethis']); ?></div>
				</div>
			</div>
			<?php if(!empty($content['field_image'])) : ?>
				<div class="padding-60 no-padding-top no-padding-left no-padding-right">
					<div class="container align-center"><?php print render($content['field_image']); ?></div>
				</div>
			<?php endif; ?>
			<?php if(!empty($content['body'])) : ?>
				<div id="general" class="padding-60 no-padding-top no-padding-left no-padding-right">
					<div class="container"><?php print render($content['body']); ?></div>
				</div>
			<?php endif; ?>
		</div>
		<?php if(!empty($content['field_images'])) : ?>
			<div class="bg-medium-grey">
				<div class="container">
					<br>
					<br>
					<br>
					<?php
						$block = module_invoke('views', 'block_view', 'gallery-gallery_grid');
						print render($block['content']);
					?>
					<br>
					<br>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php if((!empty($content['field_listings_connected'])) || (!empty($content['field_establishments_connected'])) || (!empty($content['field_brands'])) || (!empty($content['field_brand_models_connected'])) || (!empty($content['field_property_developer'])) ): ?>
		<div class="col-md-2 bg-light-grey js-sticky-container">
			<?php
				$host = module_invoke('views', 'block_view', 'dealers-host_left');
			?>
			<?php if($host) : ?>
				<?php print render($host['content']); ?>
			<?php endif; ?>
			<br>
			<div class="js-sticky padding-15 no-padding-left no-padding-right align-center">
				<div class="bg-white padding-10 border-radius-3">
					<div class="uppercase font-size-16">Share Now</div>
					<br>
					<?php print render($content['sharethis']); ?>
				</div>
				<br>
				<?php if(!empty($content['field_listings_connected'])) : ?>
					<div class="bg-white padding-10 border-radius-3">
						<div class="widget-title fw-600 font-size-12">Listings</div>
						<div >
							<?php
								$block = module_invoke('views', 'block_view', 'articles-sidebar_listings');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_establishments_connected'])) : ?>
					<div class="bg-white padding-10 border-radius-3">
						<div class="widget-title fw-600 font-size-12">Establishments</div>
						<div>
							<?php
								$block = module_invoke('views', 'block_view', 'articles-sidebar_est');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_brands'])) : ?>
					<div class="bg-white padding-10 border-radius-3">
						<div class="widget-title fw-600 font-size-12">Brands</div>
						<div>
							<?php
								$block = module_invoke('views', 'block_view', 'articles-sidebar_brand');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_brand_models_connected'])) : ?>
					<div class="bg-white padding-10 border-radius-3">
						<div class="widget-title fw-600 font-size-12">Models</div>
						<div>
							<?php
								$block = module_invoke('views', 'block_view', 'articles-sidebar_model');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_property_developer'])) : ?>
					<div class="bg-white padding-10 border-radius-3">
						<div class="widget-title fw-600 font-size-12">Developers</div>
						<div>
							<?php
								$block = module_invoke('views', 'block_view', 'articles-sidebar_developer');
								print render($block['content']);
							?>
						</div>
					</div>
					<br>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
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