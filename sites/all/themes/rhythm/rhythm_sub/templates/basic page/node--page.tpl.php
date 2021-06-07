<?php 
	global $base_url; 
	global $user;
	$path = current_path();
	$admin_role = array_intersect(array('administrator', 'website admin'), array_values($user->roles));
?>
<?php if (empty($admin_role) ? FALSE : TRUE) : ?>
	<div class="position-fixed z-index-above no-right">
		<div class="align-center padding-20">
			<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle scroll" target="_blank" href="<?php print $base_url; ?>/node/<?php print $node->nid; ?>/edit">Edit Page</a>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($content['field_top_advertisement'])) : ?>
	<div class="padding-20 no-padding-left no-padding-right bg-light-grey">
		<div class="font-size-10 align-center color-grey">Advertisement</div>
		<div class="padding-left-15-sm padding-right-15-sm">
			<?php print render($content['field_top_advertisement']); ?>	
		</div>
		<br>
	</div>
<?php endif; ?>
<?php if((!empty($content['field_video_link'])) || (!empty($content['field_thumbnail']))) : ?>
	<div class="row-eq-height clearfix">
		<div class="col-md-6 no-padding">
			<?php if(!empty($content['field_video_link'])) : ?>
				<?php $video_field = trim(render($content['field_video_link'])); ?>
				<?php if (strpos($video_field,'youtu.be') || strpos($video_field,'www.youtube.com') == true): ?>
					<?php
						$old_str = ["youtu.be", "watch?v="];
						$new_str = ["www.youtube.com/embed", "embed/"];
						$str_replace_video = str_replace($old_str, $new_str, $video_field);
						$video = substr($video_field, strpos($video_field, "=") + 1);
					?>
					<div class="embed-responsive embed-responsive-size-4x3 bg-black">
						<iframe class="embed-responsive-item-zoom pointer-events-none" src="<?php print $str_replace_video; ?>?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1&playlist=<?php print $video; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php else: ?>
					<?php
						$video_field = trim(render($content['field_video_link']));
						$str_replace_video = str_replace("vimeo.com", "player.vimeo.com/video", $video_field);
						$video = substr($video_field, strpos($video_field, "=") + 1);
					?>
					<div class="embed-responsive embed-responsive-size-4x3 bg-black">
						<iframe class="embed-responsive-item-zoom" src="<?php print $str_replace_video; ?>?autoplay=1&amp;loop=1&amp;background=1" allowfullscreen="" frameborder="0" mozallowfullscreen="" width="100%" height="700" webkitallowfullscreen=""></iframe>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<?php if(!empty($content['field_thumbnail'])): ?>
					<div class="full-width festive-filter"><?php print render($content['field_thumbnail']); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="col-md-6 no-padding column-vertical-align bg-light-grey">
			<div class="align-center clearfix padding-60 padding-15-sm">
				<h1 class="no-margin uppercase align-center"><?php print($title);?></h1>
				<?php if(!empty($content['field_sub_headline'])) : ?>
					<h2 class="align-center letter-spacing-3 font-size-18 fw-500 no-margin-bottom"><?php print render($content['field_sub_headline']); ?></h2>
				<?php endif; ?>
				<?php if(!empty($content['field_description'])) : ?>
					<br>
					<div><?php print render($content['field_description']); ?></div>
				<?php endif; ?>
				<?php if(!empty($content['field_php_menu'])) : ?>
					<br>
					<div class="clearfix">
						<?php print render($content['field_php_menu']); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if(!empty($content['field_php_sidebar'])) : ?>
	<div class="filter-btn-sticky position-fixed-bottom-centered hide">
		<a class="btn btn-mod btn-deep-sky-blue btn-small btn-circle">Filter</a>
	</div>
	<div class="clearfix row-eq-height">
		<div class="col-md-10 col-md-push-2 no-padding relative">
			<div class="padding-60 no-padding-left no-padding-right no-padding-bottom">
				<?php if((empty($content['field_video_link'])) && (empty($content['field_thumbnail']))) : ?>
					<div class="padding-60 no-padding-top no-padding-left no-padding-right">
						<div class="container">
							<h1 class="no-margin uppercase align-center"><?php print($title);?></h1>
							<?php if(!empty($content['field_sub_headline'])) : ?>
								<h2 class="align-center letter-spacing-3 font-size-18 fw-500 no-margin-bottom"><?php print render($content['field_sub_headline']); ?></h2>
							<?php endif; ?>
							<div class="align-center padding-10 no-padding-left no-padding-right">
								<?php print render($content['sharethis']); ?>
							</div>
							<?php if(!empty($content['field_php_menu'])) : ?>
								<br>
								<div class="clearfix">
									<?php print render($content['field_php_menu']); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if(!empty($content['body'])) : ?>
					<div class="padding-60 no-padding-top no-padding-left no-padding-right">
						<div class="container"><?php print render($content['body']); ?></div>
					</div>
				<?php endif; ?>
				<?php print render($content['field_middle_advertisement']); ?>
				<?php print render($content['field_php_filter']); ?>
				<?php if(!empty($content['field_content'])) : ?>
					<div class="padding-60 no-padding-top no-padding-left no-padding-right">
						<div class="container"><?php print render($content['field_content']); ?></div>
					</div>
				<?php endif; ?>
				<?php if(!empty($content['field_bottom_advertisement'])) : ?>
					<div class="padding-20 no-padding-left no-padding-right bg-light-grey">
						<div class="font-size-10 align-center color-grey">Advertisement</div>
						<div class="padding-left-15-sm padding-right-15-sm">
							<?php print render($content['field_bottom_advertisement']); ?>	
						</div>
						<br>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-2 col-md-pull-10 js-sticky-container bg-light-grey z-index-above">
			<div class="js-sticky">
				<br>
				<?php print render($content['field_php_sidebar']); ?>
				<br>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="padding-60 no-padding-left no-padding-right no-padding-bottom">
		<?php if((empty($content['field_video_link'])) && (empty($content['field_thumbnail']))) : ?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<div class="container">
					<h1 class="no-margin uppercase align-center"><?php print($title);?></h1>
					<?php if(!empty($content['field_sub_headline'])) : ?>
						<h2 class="align-center letter-spacing-3 font-size-18 fw-500 no-margin-bottom"><?php print render($content['field_sub_headline']); ?></h2>
					<?php endif; ?>
					<?php if(!empty($content['field_php_menu'])) : ?>
						<br>
						<div class="clearfix">
							<?php print render($content['field_php_menu']); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if(!empty($content['body'])) : ?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<div class="container"><?php print render($content['body']); ?></div>
			</div>
		<?php endif; ?>
		<?php print render($content['field_middle_advertisement']); ?>
		<?php print render($content['field_php_filter']); ?>
		<?php if(!empty($content['field_content'])) : ?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<div class="container"><?php print render($content['field_content']); ?></div>
			</div>
		<?php endif; ?>
		<?php if(!empty($content['field_bottom_advertisement'])) : ?>
			<div class="padding-20 no-padding-left no-padding-right bg-light-grey">
				<div class="font-size-10 align-center color-grey">Advertisement</div>
				<div class="padding-left-15-sm padding-right-15-sm">
					<?php print render($content['field_bottom_advertisement']); ?>	
				</div>
				<br>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
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
