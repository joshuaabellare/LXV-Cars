<?php
	global $base_url;
	global $str_username;
	$user_id = arg(1);
	$user_page = user_load(arg(1));
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$seller_role = array_intersect(array('seller'), array_values($user_page->roles));
	$prof_role = array_intersect(array('professional dealer'), array_values($user_page->roles));
	$username = $user->name;
	$str_username = str_replace(' ', '-', strtolower($username));
	$img_style_logo_small = 'small';
	$image_default_uri = "public://LXVAnonDefaultImage.jpg";
	$image_logo_default = image_style_url($img_style_logo_small, $image_default_uri);
?>
<?php if($user->uid == $user_page->uid): ?>
	<?php
		$profile_menu_block = module_invoke('menu', 'block_view', 'menu-profile-menu');
	?>
<?php else: ?>
	<?php
		$profile_menu_block = module_invoke('menu', 'block_view', 'menu-public-profile-menu');
	?>
<?php endif; ?>
<?php if($user->uid == $user_page->uid): ?>
	<div class="border-bottom-grey">
		<div class="padding-15">
			<div class="row row-eq-height clearfix">
				<div class="col-md-8">
					<div class="clearfix display-inline-block">
						<div class="profile-custom-select position-relative">
							<div class="profile-select-selected font-size-12 letter-spacing-2">
								<div class="display-inline-block vertical-align-middle padding-5">
									<div class="border-radius-img-50">
										<?php 
											$user_item = user_load($user_page->uid);
											$user_picture = theme('image_style', array('style_name' => 'small', 'path' => $user_item->picture->uri));
											if(!empty($user_picture)):
										?>
											<?php print $user_picture; ?>
										<?php else: ?>
											<?php $image_thumbnail_default_uri = "public://LXVAnonDefaultImage.jpg" ?>
											<?php $image_thumbnail_default = image_style_url($img_style_logo_small, $image_thumbnail_default_uri ); ?>
											<img src="<?php print $image_thumbnail_default ; ?>">
										<?php endif; ?>
									</div>
								</div>
								<div class="display-inline-block vertical-align-middle padding-5">
									<div class="letter-spacing-3 font-size-18 uppercase display-inline-block">
										<?php print render($user_page->field_first_name['und']['0']['value']); ?> 
										<?php print render($user_page->field_last_name['und']['0']['value']); ?>	
									</div>
									<div class="display-inline-block">
										<div class="padding-20 no-padding-top no-padding-bottom">
											<i class="fa-2x fas fa-sort-down"></i>
										</div>
									</div>
								</div>
							</div>
							<?php
								$node_query = new EntityFieldQuery;
								$node_query ->entityCondition('entity_type', 'node')
											->entityCondition('bundle', 'professional_page')
											->propertyCondition('uid', $user_id)
											->execute();
								$result = $node_query->execute();
								if (!empty($result['node'])): 
							?>
								<div class="profile-select-items select-hide font-size-12 letter-spacing-3">
									<?php $pro_page_nids = array_keys($result['node']); ?>
									<?php foreach ($pro_page_nids as $item): ?>
										<?php 
											$pro_page = node_load($item); 
											$pro_page_nid = $pro_page->nid;
											$pro_page_title = $pro_page->title;
											$path_alias = drupal_get_path_alias('node/' . $pro_page_nid);
										?>
										<a href="<?php print $base_url . '/' . $path_alias; ?>">
										<div class="profile-select-item" data-val="<?php print $pro_page_nid; ?> ">
											<span class="display-inline-block vertical-align-middle">
												<?php if(!empty($pro_page->field_thumbnail[LANGUAGE_NONE][0]['uri'])): ?>
													<?php 
														$img_style_logo_small = 'extra_small';
														$logo_small = image_style_url($img_style_logo_small, $pro_page->field_thumbnail[LANGUAGE_NONE][0]['uri']);
													?>
													<img src="<?php print $logo_small; ?>" />
													
												<?php else: ?>
													<img src="<?php print $image_logo_default ; ?>">
												<?php endif; ?>
											</span>
											<span class="display-inline-block vertical-align-middle padding-5">
												<span class="letter-spacing-3 uppercase"><?php print($pro_page_title);?></span>
											</span>
										</div>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="bg-medium-grey align-center">
	<div class="padding-10 no-padding-left no-padding-right uppercase border-bottom-dark-grey slider-show-navigation"><?php print render($profile_menu_block['content']); ?></div>
</div>

<div class="clearfix row-eq-height">
	<div class="col-md-2 bg-light-grey">
		<div class="align-center border-radius-img-50">
			<br>
			<br>
			<div class="col-md-8 col-sm-6 col-xs-6 col-centered no-float">
				<?php 
					$user_item = user_load($user_page->uid);
					$user_picture = theme('user_picture', array('account' =>$user_item)); 
					if(!empty($user_picture)):
				?>
					<?php print $user_picture; ?>
				<?php else: ?>
					<?php $img_style = 'medium'; ?>
					<?php $image_thumbnail_default_uri = "public://LXVAnonDefaultImage.jpg" ?>
					<?php $image_thumbnail_default = image_style_url($img_style, $image_thumbnail_default_uri ); ?>
					<img src="<?php print $image_thumbnail_default ; ?>">
				<?php endif; ?>
			</div>
		</div>
		<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
			<br>
			<div class="align-center">
				<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/user/<?php print $user->uid; ?>/edit">Edit Account</a>	
			</div>
		<?php endif; ?>
		<br>
		<div class="align-center">
			<div class="letter-spacing-3 font-size-18 uppercase"><?php print render($user_page->field_first_name['und']['0']['value']); ?> <?php print render($user_page->field_last_name['und']['0']['value']); ?></div>
			<?php if((!empty($user_page->field_gov_id_photo)) && (!empty($user_page->field_thumbnail)) && (!empty($user_page->mail)) && (!empty($user_page->field_contact_number))): ?>
				<div class="padding-5 no-padding-left no-padding-right no-padding-bottom font-size-12"><i class="fa fa-lg fa-check-circle color-deep-sky-blue" aria-hidden="true"></i> <span class="uppercase letter-spacing-3">LXV Verified</span></div>
			<?php endif; ?>
		</div>
		<br>
		<?php if((!empty($user_page->field_gov_id_photo)) || (!empty($user_page->field_thumbnail)) || (!empty($user_page->mail)) || (!empty($user_page->field_contact_number))): ?>
			<div class="uppercase align-center letter-spacing-3"><?php print render($user_page->field_first_name['und']['0']['value']); ?> Provided</div>
			<hr>
			<?php if(!empty($user_page->field_gov_id_photo)): ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<i class="fa fa-lg fa-check-square-o color-deep-sky-blue" aria-hidden="true"></i> Government Id
				</div>
			<?php endif; ?>
			<?php if(!empty($user_page->field_thumbnail)): ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<i class="fa fa-lg fa-check-square-o color-deep-sky-blue" aria-hidden="true"></i> Selfie Verification
				</div>
			<?php endif; ?>
			<?php if(!empty($user_page->mail)): ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<i class="fa fa-lg fa-check-square-o color-deep-sky-blue" aria-hidden="true"></i> Email Address
				</div>
			<?php endif; ?>
			<?php if ((!empty($admin_role) ? TRUE : FALSE)) :  ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<?php print render($user_page->mail); ?>
				</div>
			<?php endif; ?>
			<?php if(!empty($user_page->field_contact_number)): ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<i class="fa fa-lg fa-check-square-o color-deep-sky-blue" aria-hidden="true"></i> Phone Number
				</div>
			<?php endif; ?>
			<?php if ((!empty($admin_role) ? TRUE : FALSE)) :  ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<?php print render($user_page->field_contact_number['und']['0']['value']); ?>
				</div>
			<?php endif; ?>
			<br>
		<?php endif; ?>
	</div>
	<div class="col-md-10 no-padding">
		<div class="container align-center">
			<br>
			<br>
			<h1 class="font-size-30 letter-spacing-3 no-margin padding-10 no-padding-top no-padding-left no-padding-right"><?php print render($user_page->field_first_name['und']['0']['value']); ?> <?php print render($user_page->field_last_name['und']['0']['value']); ?></h1>
			<div class="uppercase font-size-12 letter-spacing-3">Personal Account</div>
			<br>
			<?php if(!empty($user_page->field_description)): ?>
				<br>
				<div class="align-justify"><?php print $user_page->field_description['und'][0]['value']; ?></div>
				<br>
			<?php endif; ?>
			<?php
				$block = module_invoke('views', 'block_view', 'dealer-public_listings');
				if ($block):
			?>
				<br>
				<?php print render($block['content']); ?>
			<?php endif; ?>
			<br>
		</div>
	</div>
</div>
<!-- Modal -->
<div id="privatemsg" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Contact Seller</h4>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>