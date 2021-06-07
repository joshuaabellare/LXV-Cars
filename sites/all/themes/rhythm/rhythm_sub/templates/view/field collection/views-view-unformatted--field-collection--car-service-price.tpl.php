<?php
	$count = 1;
	$arr_rows = $view->style_plugin->rendered_fields; ?>
		<?php
		foreach ($arr_rows as $key => $arr_row): ?>
			<div class="color-white border-white align-center">
				<div class="clearfix row-eq-height">
					<div class="col-md-6 col-sm-12 col-xs-12 padding-10 column-vertical-align  border-white no-border-left no-border-top no-border-bottom">
						<?php if(!empty($arr_row['field_type_of_car_service'])): ?>
							<div><?php print $arr_row['field_type_of_car_service']; ?></div>
						<?php endif; ?>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 padding-10 column-vertical-align">	
						<div class="clearfix">
							<div class="col-md-10 col-md-offset-1 overflow-height-container">
								<?php if(!empty($arr_row['field_price'])): ?>
									<div class="align-justify"><?php print $arr_row['field_price']; ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php $count++;endforeach;?>