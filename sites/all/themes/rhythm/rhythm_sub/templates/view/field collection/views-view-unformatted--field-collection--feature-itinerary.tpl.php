<?php $img_style = 'image_gallery'; ?>
<?php $image_banner_default_uri = "public://LXVDefaultImage.jpg" ?>
<?php $image_banner_default = image_style_url($img_style, $image_banner_default_uri); ?>
<?php
	$count = 1;
	$arr_rows = $view->style_plugin->rendered_fields; ?>
		<?php
		foreach ($arr_rows as $key => $arr_row): ?>
			<?php if (($count % 2) == 0): ?>
				<div class="bg-white">
					<div class="clearfix row-eq-height">
						<div class="col-md-6 col-md-push-6 col-sm-12 col-xs-12 no-padding column-vertical-align">
							<?php if(!empty($arr_row['field_thumbnail'])): ?>
								<div class="align-center full-width festive-filter"><?php print $arr_row['field_thumbnail']; ?></div>
							<?php else: ?>
								<div class="align-center full-width festive-filter"><img src="<?php print $image_banner_default; ?>"></div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 col-md-pull-6 col-sm-12 col-xs-12 no-padding column-vertical-align">	
							<br>
							<div class="clearfix">
								<div class="col-md-10 col-md-offset-1 overflow-height-container">
									<div class="clearfix align-center">
										<?php if((!empty($arr_row['field_duration_days_start'])) || (!empty($arr_row['field_duration_days_end']))): ?>
											<span class="vertical-align-top">(Day: <?php if(!empty($arr_row['field_duration_days_start'])): ?><?php print $arr_row['field_duration_days_start']; ?><?php endif; ?><?php if(!empty($arr_row['field_duration_days_end'])): ?> - <?php endif; ?> <?php if(!empty($arr_row['field_duration_days_end'])): ?><?php print $arr_row['field_duration_days_end']; ?><?php endif; ?>)</span>
										<?php endif; ?>
										<h4 class="no-margin uppercase inline-block fw-500"><?php print $arr_row['field_title']; ?></h4>
									</div>
									<div class="align-center font-size-12">(Itinerary)</div>
									<?php if(!empty($arr_row['field_description'])): ?>
										<br>
										<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
									<?php endif; ?>
									<?php if(!empty($arr_row['field_visited_locations'])): ?>
										<br>
										<div>Visited Area(s): <?php print $arr_row['field_visited_locations']; ?></div>
									<?php endif; ?>
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="bg-white">
					<div class="clearfix row-eq-height">
						<div class="col-md-6 col-sm-12 col-xs-12 no-padding column-vertical-align">
							<?php if(!empty($arr_row['field_thumbnail'])): ?>
								<div class="align-center full-width festive-filter"><?php print $arr_row['field_thumbnail']; ?></div>
							<?php else: ?>
								<div class="align-center full-width festive-filter"><img src="<?php print $image_banner_default; ?>"></div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 no-padding column-vertical-align">
							<br>
							<div class="clearfix">
								<div class="col-md-10 col-md-offset-1 overflow-height-container">
									<div class="clearfix align-center">
										<h4 class="no-margin uppercase inline-block fw-500"><?php print $arr_row['field_title']; ?></h4>
										<?php if((!empty($arr_row['field_duration_days_start'])) || (!empty($arr_row['field_duration_days_end']))): ?>
											<span class="vertical-align-top">(Day: <?php if(!empty($arr_row['field_duration_days_start'])): ?><?php print $arr_row['field_duration_days_start']; ?><?php endif; ?><?php if(!empty($arr_row['field_duration_days_end'])): ?> - <?php endif; ?> <?php if(!empty($arr_row['field_duration_days_end'])): ?><?php print $arr_row['field_duration_days_end']; ?><?php endif; ?>)</span>
										<?php endif; ?>
									</div>
									<div class="align-center font-size-12">(Itinerary)</div>
									<?php if(!empty($arr_row['field_description'])): ?>
										<br>
										<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
									<?php endif; ?>
									<?php if(!empty($arr_row['field_visited_locations'])): ?>
										<br>
										<div>Visited Area(s): <?php print $arr_row['field_visited_locations']; ?></div>
									<?php endif; ?>
								</div>
							</div>
							<br>
						</div>
					</div>
				</div>
		    <?php endif; ?>
<?php $count++;endforeach;?>