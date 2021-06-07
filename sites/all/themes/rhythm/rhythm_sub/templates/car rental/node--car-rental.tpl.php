<?php
	global $base_url;
	global $user;
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$img_style = 'image_gallery';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_thumb_default = image_style_url($img_style, $image_default_uri);
	if(!empty($content['field_images'])) {
		$image_thumb = image_style_url($img_style, $node->field_images[LANGUAGE_NONE][0]['uri']);
	}
	$feature_details = module_invoke('views', 'block_view', 'field_collection-feature_details');
	$feature_details_no_img = module_invoke('views', 'block_view', 'field_collection-feature_details_no_img');
	$car_services_price = module_invoke('views', 'block_view', 'field_collection-car_service_price');
?>
<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<?php if(!empty($content['field_drive_link'])) : ?>
				<div class="inline-block">
					<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print render($content['field_drive_link']); ?>">Go To Google Drive</a>
				</div>
			<?php endif; ?>
			<div class="inline-block">
				<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="clearfix row-eq-height bg-light-grey">
	<div class="col-md-9 no-padding">
		<div class="row-eq-height clearfix">
			<div class="col-md-6 no-padding">
				<?php if(!empty($content['field_images'])): ?>
					<div class="full-width festive-filter"><img src="<?php print $image_thumb; ?>" /></div>
				<?php else: ?>
					<div class="full-width festive-filter"><img src="<?php print $image_thumb_default; ?>"></div>
				<?php endif; ?>
			</div>
			<div class="col-md-6 no-padding column-vertical-align bg-dark-grey color-white">
				<div class="align-center clearfix padding-60 padding-15-sm">
					<div class="uppercase font-size-12 letter-spacing-3 align-center color-deep-sky-blue">- Car Rental -</div>
					<h1 class="no-margin"><?php print($title);?></h1>
					<div class="font-size-12">(Reference ID: <?php print $node->nid; ?>)</div>
					<?php if(!empty($content['field_price'])): ?>
						<br>
						<div class="align-center font-size-18 font-alt padding-10 uppercase">
							From <?php print render($content['field_currency']); ?> <?php print render($content['field_price']); ?>
						</div>
						<?php if(!empty($content['field_price_label'])) : ?>
							<div class="align-center font-size-12 uppercase"><?php print render($content['field_price_label']); ?></div>
						<?php endif; ?>	
					<?php else: ?>
						<br>
						<div class="align-center font-size-18 font-alt padding-10 uppercase">
							Price on Request
						</div>
						<br>
					<?php endif;?>
					<br>
					<?php print render($content['sharethis']); ?>
				</div>
			</div>
		</div>
		<div class="container">
			<br>
			<?php if(!empty($content['body'])) : ?>
				<br>
				<h4 class="no-margin fw-500 uppercase">About the <?php print($title);?></h4>
				<br>
				<div class="align-justify"><?php print render($content['body']); ?></div>
				<br>
			<?php endif; ?>
			<!-- Specifics Types-->
			<?php $car_specifics = ((!empty($content['field_type_of_car_service'])) || (!empty($content['field_max_capacity'])) || (!empty($content['field_year'])) || (!empty($content['field_car_type'])) || (!empty($content['field_luggage'])) || (!empty($content['field_units'])) || (!empty($content['field_connectivity'])) || (!empty($content['field_exterior_color']))); ?>
			<!-- End of Specifics Types-->
			<?php if((!empty($car_specifics))): ?>
				<br>
				<h4 class="no-margin fw-500 uppercase">Specifics</h4>
				<br>
				<!-- Cars -->
					<?php if(!empty($content['field_type_of_car_service'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Service(s):</div>
								<div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right">
									<?php
									    $car_service = field_info_field('field_type_of_car_service');
									    $car_items = field_get_items('node', $node, 'field_type_of_car_service');
									    foreach ($car_items as $car_item) {
									        $value_array[] = $car_service['settings']['allowed_values'][$car_item['value']];
									    }
									    print implode(", " , $value_array);
									?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_max_capacity'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Maximum Capacity:</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_max_capacity']); ?> pax</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_year'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Year / Model:</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_year']); ?></div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_car_type'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Car Type:</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_car_type']); ?></div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_luggage'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Luggage(s):</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_luggage']); ?> pcs.</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_units'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Unit(s):</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_units']); ?></div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_connectivity'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Connectivity:</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_connectivity']); ?></div>
							</div>
						</div>
					<?php endif; ?>
					<?php if(!empty($content['field_exterior_color'])) : ?>
						<div class="padding-5 no-padding-left no-padding-right">
							<div class="clearfix padding-10 bg-light-grey border-radius-3">
								<div class="clearfix col-md-6 col-sm-6 col-xs-6 no-padding">Exterior Color:</div><div class="col-md-6 col-sm-6 col-xs-6 no-padding align-right"><?php print render($content['field_exterior_color']); ?></div>
							</div>
						</div>
					<?php endif; ?>
				<!-- End Cars -->
				<br>
			<?php endif; ?>
			<?php if(!empty($content['field_inclusions'])) : ?>
				<br>
				<h4 class="no-margin fw-500 uppercase">Inclusions</h4>
				<br>
				<div class="align-justify"><?php print render($content['field_inclusions']); ?></div>
				<br>
			<?php endif; ?>
			<?php if(!empty($content['field_availability'])) : ?>
				<br>
				<h4 class="no-margin fw-500 uppercase">Availability</h4>
				<br>
				<div class="align-justify"><?php print render($content['field_availability']); ?></div>
				<br>
			<?php endif; ?>
			<?php if(!empty($content['field_rules'])) : ?>
				<br>
				<h4 class="no-margin fw-500 uppercase">Rules & Conditions</h4>
				<br>
				<div class="overflow-height-container align-justify">
					<?php print render($content['field_rules']); ?>
				</div>
				<br>
			<?php endif; ?>
			<br>
		</div>
		<?php if((!empty($content['field_rates_details'])) || (!empty($car_services_price))) : ?>
			<div class="bg-dark-grey color-white">
				<div class="container">
					<br>
					<br>
					<h4 class="no-margin fw-500 uppercase">Rates</h4>
					<br>
					<?php if(!empty($car_services_price)):?>
						<div class="padding-60 no-padding-top no-padding-left no-padding-right">
							<?php print render($car_services_price['content']); ?>
						</div>
						<br>
					<?php endif; ?>
					<?php if(!empty($content['field_rates_details'])) : ?>
						<div class="align-justify"><?php print render($content['field_rates_details']); ?></div>
					<?php endif; ?>
					<br>
					<br>
				</div>
			</div>
		<?php endif; ?>
		<?php if(!empty($feature_details)):?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<h3 class="no-margin uppercase align-center fw-500"><?php print render($content['field_title']); ?></h3>
				<?php print render($feature_details['content']); ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($feature_details_no_img)):?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<div class="container">
					<h3 class="no-margin uppercase align-center fw-500"><?php print render($content['field_sub_headline']); ?></h3>
					<?php print render($feature_details_no_img['content']); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if((!empty($content['field_brands'])) || (!empty($content['field_establishments_connected']))): ?>
			<div class="container">
				<br>
				<?php if(!empty($content['field_brands'])) : ?>
					<br>
					<h4 class="no-margin fw-500 uppercase">About the Brand</h4>
					<br>
					<?php
						$block = module_invoke('views', 'block_view', 'rental-con_brands');
						print render($block['content']);
					?>
					<br>
					<br>
				<?php endif; ?>
				<?php if(!empty($content['field_establishments_connected'])) : ?>
					<br>
					<h4 class="no-margin fw-500 uppercase">About the Establishment</h4>
					<br>
					<?php
						$block = module_invoke('views', 'block_view', 'rental-con_establishment');
						print render($block['content']);
					?>
					<br>
					<br>
				<?php endif; ?>
				<br>
			</div>
		<?php endif; ?>
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
		<?php if(!empty($content['field_images'])) : ?>
			<div class="bg-medium-grey">
				<div class="container">
					<br>
					<br>
					<h4 class="no-margin fw-500 uppercase align-center">Gallery</h4>
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
		<?php if(!empty($content['field_virtual_tour'])) : ?>
			<div class="virtual-tour">
				<?php print render($content['field_virtual_tour']['#items'][0]['value']); ?>
			</div>
		<?php endif; ?>
		<?php
			$block = module_invoke('views', 'block_view', 'articles-listing_article');
			if ($block):
		?>
			<div class="container">
				<br>
				<br>
				<h4 class="no-margin fw-500 uppercase align-center">Related Magazines</h4>
				<br>
				<?php print render($block['content']); ?>
				<br>
			</div>
		<?php endif; ?>
	</div>

	<div class="col-md-3 js-sticky-container">
		<div class="js-sticky padding-15 no-padding-left no-padding-right">
			<div class="bg-white padding-10 no-padding-left no-padding-right border-radius-3">
				<div class="padding-10">
					<div class="uppercase font-size-16 align-center">Contact Us</div>
					<div class="fw-600 padding-5 no-padding-left no-padding-right border-top-grey">
						<div class="border-bottom-grey"><div class="padding-10 no-padding-left no-padding-right"><strong><i class="fas fa-phone-alt"></i></strong> <a href="tel:+639171627737">+63 917 162 7737</a></div></div>
						<div class="padding-10 no-padding-left no-padding-right"><strong><i class="fas fa-envelope"></i></strong> <a href="mailto:inquiries@lxvlifestyle.com">inquiries@lxvlifestyle.com</a></div>
					</div>
				</div>
			</div>
			<br>
			<div class="bg-white padding-10 no-padding-left no-padding-right border-radius-3">
				<div class="padding-10">
					<div class="uppercase font-size-16 align-center">Inquire Now</div>
					<?php 
						$block = module_invoke('entityform_block', 'block_view', 'get_a_quote');
						print render($block['content']); 
					?>
				</div>
			</div>
			<br>
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