<?php 
	global $base_url;
	global $user;
	$user_page = user_load(arg(1));
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
	$seller_role = array_intersect(array('seller'), array_values($user_page->roles));
	$prof_role = array_intersect(array('professional dealer'), array_values($user_page->roles));
	$username = $user->name;
	$str_username = str_replace(' ', '-', strtolower($username));
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
<div class="bg-medium-grey align-center">
	<div class="padding-10 no-padding-left no-padding-right uppercase border-bottom-dark-grey"><?php print render($profile_menu_block['content']); ?></div>
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
		<br>
		<div class="align-center">
			<div class="uppercase font-size-18 align-center font-alt letter-spacing-5 fw-500"><?php print $user_page->name; ?></div>
			<?php if((!empty($user_page->field_gov_id_photo)) && (!empty($user_page->field_thumbnail)) && (!empty($user_page->mail)) && (!empty($user_page->field_contact_number))): ?>
				<div class="padding-5 no-padding-left no-padding-right no-padding-bottom"><i class="fa fa-lg fa-check-circle color-deep-sky-blue" aria-hidden="true"></i> <span class="uppercase letter-spacing-3">LXV Verified</span></div>
			<?php endif; ?>
		</div>
		<br>
		<?php if((!empty($user_page->field_gov_id_photo)) || (!empty($user_page->field_thumbnail)) || (!empty($user_page->mail)) || (!empty($user_page->field_contact_number))): ?>
			<div class="uppercase align-center letter-spacing-3"><?php print $user_page->name;?> Provided</div>
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
			<?php if(!empty($user_page->field_contact_number)): ?>
				<div class="padding-5 no-padding-left no-padding-right">
					<i class="fa fa-lg fa-check-square-o color-deep-sky-blue" aria-hidden="true"></i> Phone Number
				</div>
			<?php endif; ?>
			<br>
		<?php endif; ?>
	</div>
	<div class="col-md-10">
		<?php if($user->uid == $user_page->uid): ?>
			<div class="padding-40 no-padding-left-sm no-padding-right-sm">
				<div class="font-size-30 letter-spacing-5 font-alt uppercase">Edit My Account</div>
			</div>
			<div class="padding-40 no-padding-top no-padding-bottom no-padding-left-sm no-padding-right-sm">
				<?php print render($form['form_id']); ?>
				<?php print render($form['form_build_id']); ?>
				<?php print render($form['form_token']); ?>
				<?php hide($form['timezone']['timezone']); ?>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Profile Picutre</h3>
					<br>
					<?php print render($form['picture']['picture_current']); ?>
					<?php print render($form['picture']['picture_upload']); ?>
					<?php print render($form['picture']['picture_delete']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Account Information</h3>
					<br>
					<div>
						<div class="font-size-10">
							<div>Your public username is the same as your profile address:</div>
							<div>• lxv.com.ph/profile/username</div>
						</div>
						<?php print drupal_render($form['account']['name']); ?>
					</div>
					<div class="row clearfix">
						<div class="col-md-6">
							<?php print drupal_render($form['field_first_name']); ?>
						</div>
						<div class="col-md-6">
							<?php print drupal_render($form['field_last_name']); ?>
						</div>
						<div class="col-md-6">
							<?php print drupal_render($form['account']['mail']); ?>
						</div>
						<div class="col-md-6">
							<?php print drupal_render($form['account']['current_pass']); ?>
						</div>
					</div>
					<?php print drupal_render($form['field_contact_number']); ?>
					<?php print drupal_render($form['field_description']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Selfie Verfication</h3>
					<br>
					<?php print drupal_render($form['field_thumbnail']); ?>
				</div>
				<br>
				<br>
				<div class="bg-light-grey border-radius-3 padding-15">
					<h3 class="no-margin uppercase">Government ID Verification</h3>
					<br>
					<?php print drupal_render($form['field_gov_id_photo']); ?>
					<?php print drupal_render($form['field_gov_id_number']); ?>
				</div>
				<br>
				<br>
				<div class="row clearfix align-center">
					<div class="col-md-offset-3 col-md-6">
						<div class="align-center full-width-btn">
							<?php print drupal_render($form['actions']['submit']); ?>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="hide"><?php print drupal_render_children($form);?></div>
			</div>
		<?php else: ?>
				<div class="padding-40 no-padding-bottom no-padding-left-sm no-padding-right-sm align-center">
					<div class="clearfix">
						<div class="col-md-5 col-sm-12- col-xs-12 col-centered no-float">
							<div class="font-size-30 letter-spacing-5 font-alt uppercase">Access Denied</div>
						</div>
					</div>
				</div>
		<?php endif; ?>
	</div>
</div>