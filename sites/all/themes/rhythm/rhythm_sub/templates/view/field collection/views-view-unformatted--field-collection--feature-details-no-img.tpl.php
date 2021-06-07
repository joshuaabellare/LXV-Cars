<?php
	$count = 1;
	$arr_rows = $view->style_plugin->rendered_fields; ?>
		<?php
		foreach ($arr_rows as $key => $arr_row): ?>
			<div class="bg-white">
				<div class="clearfix row-eq-height">
					<div class="col-md-3 col-sm-12 col-xs-12 no-padding column-vertical-align">
						<?php if(!empty($arr_row['field_title'])): ?>
							<h4 class="no-margin uppercase align-center fw-500"><?php print $arr_row['field_title']; ?></h4>
						<?php endif; ?>
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12 no-padding column-vertical-align">	
						<br>
						<div class="clearfix">
							<div class="col-md-10 col-md-offset-1 overflow-height-container">
								<?php if(!empty($arr_row['field_description'])): ?>
									<br>
									<div class="align-justify"><?php print $arr_row['field_description']; ?></div>
								<?php endif; ?>
							</div>
						</div>
						<br>
					</div>
				</div>
			</div>
<?php $count++;endforeach;?>