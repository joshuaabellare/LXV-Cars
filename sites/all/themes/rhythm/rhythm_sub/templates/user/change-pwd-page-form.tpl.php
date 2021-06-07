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
			<div class="letter-spacing-3 font-size-18 uppercase"><?php print render($user_page->field_first_name[und][0][value]); ?> <?php print render($user_page->field_last_name[und][0][value]); ?></div>
			<?php if((!empty($user_page->field_gov_id_photo)) && (!empty($user_page->field_thumbnail)) && (!empty($user_page->mail)) && (!empty($user_page->field_contact_number))): ?>
				<div class="padding-5 no-padding-left no-padding-right no-padding-bottom font-size-12"><i class="fa fa-lg fa-check-circle color-deep-sky-blue" aria-hidden="true"></i> <span class="uppercase letter-spacing-3">LXV Verified</span></div>
			<?php endif; ?>
		</div>
		<br>
		<?php if((!empty($user_page->field_gov_id_photo)) || (!empty($user_page->field_thumbnail)) || (!empty($user_page->mail)) || (!empty($user_page->field_contact_number))): ?>
			<div class="uppercase align-center letter-spacing-3"><?php print render($user_page->field_first_name[und][0][value]); ?> Provided</div>
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
					<?php print render($user_page->field_contact_number[und][0][value]); ?>
				</div>
			<?php endif; ?>
			<br>
		<?php endif; ?>
	</div>
	<div class="col-md-10 no-padding">
		<div class="container padding-60 no-padding-left no-padding-right">
			<div class="widget-title font-size-18">Update / Change Password</div>
			<div class="font-size-12">Please fill in the fields correctly.</div>
			<br>
			<?php print drupal_render_children($form);?>
		</div>
	</div>
</div>

















