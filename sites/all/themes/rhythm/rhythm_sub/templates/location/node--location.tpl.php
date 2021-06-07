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

<?php if(!empty($content['field_image'])) : ?>
	<div class="padding-40 no-padding-left no-padding-right">
		<div class="container">
			<h1 class="no-margin uppercase align-center"><?php print($title);?></h1>
			<?php if(!empty($content['field_sub_headline'])) : ?>
				<h2 class="no-margin align-center"><?php print render($content['field_sub_headline']); ?></h2>
				<br>
			<?php endif; ?>
		</div>
	</div>
	<div class="full-width festive-filter"><?php print render($content['field_image']); ?></div>
	<?php if((!empty($content['body']))): ?>
		<div class="padding-60 no-padding-left no-padding-right">
			<div class="container"><?php print render($content['body']); ?></div>
		</div>
	<?php endif; ?>
<?php else: ?>
	<?php if((!empty($content['field_thumbnail']))) : ?>
		<div class="row-eq-height clearfix">
			<div class="col-md-6 no-padding">
				<?php if(!empty($content['field_thumbnail'])): ?>
					<div class="full-width festive-filter"><?php print render($content['field_thumbnail']); ?></div>
				<?php endif; ?>
			</div>
			<div class="col-md-6 no-padding column-vertical-align bg-dark-grey color-white">
				<div class="align-center clearfix padding-60 padding-15-sm">
					<h1 class="no-margin uppercase align-center font-size-40">LXV in <?php print($title);?></h1>
					<?php if(!empty($content['field_sub_headline'])) : ?>
						<br>
						<h2 class="no-margin align-center"><?php print render($content['field_sub_headline']); ?></h2>
						<br>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if((!empty($content['body']))): ?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<div class="container"><?php print render($content['body']); ?></div>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<div class="padding-40 no-padding-left no-padding-right">
			<div class="container">
				<h1 class="no-margin uppercase align-center font-size-40">LXV in <?php print($title);?></h1>
				<?php if(!empty($content['field_sub_headline'])) : ?>
					<br>
					<h2 class="no-margin align-center"><?php print render($content['field_sub_headline']); ?></h2>
					<br>
				<?php endif; ?>
			</div>
		</div>
		<?php if((!empty($content['body']))): ?>
			<div class="padding-60 no-padding-top no-padding-left no-padding-right">
				<div class="container"><?php print render($content['body']); ?></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<div class="bg-black padding-60 no-padding-left no-padding-right color-white">
	<div class="clearfix">
		<div class="col-md-8 col-md-offset-2">
			<h4 class="no-margin font-size-30 uppercase">List your car</h4>
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