<?php global $base_url; ?>
<div class="container">
	<br>
	<div class="font-alt font-size-18 widget-title">Listings for rent</div>
	<div class="row clearfix align-center">
		<!-- Cars for Rent -->
		<div class="col-md-6 col-sm-12 col-xs-12 col-centered no-float">
			<br>
			<div class="bg-light-grey clearfix row-eq-height border-radius-3">
				<div class="col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align border-radius-top-left-3 border-radius-bottom-left-3">
					<div class="align-center"><i class="fas fa-th fa-4x"></i></div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="padding-10 align-left">
						<div class="no-margin uppercase letter-spacing-3 font-size-16">Car for Rent Listings</div>
						<br>
						<div class="row clearfix font-size-12">
							<div class="col-md-8 col-sm-8 col-xs-8"><a class="uppercase fw-400" target="_blank" href="<?php print $base_url; ?>/node/add/car-rental?field_country=<?php echo $_GET['cid']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Create a Car Rental</a></div>
							<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="uppercase" target="_blank" href="<?php print $base_url; ?>/admin/all-car-rentals">View all <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
	<br>
	<h3 class="no-margin uppercase">Target Area</h3>
	<div class="row clearfix align-center">
		<!-- Countries -->
		<div class="col-md-6 col-sm-12 col-xs-12 col-centered no-float">
			<br>
			<div class="bg-light-grey clearfix row-eq-height border-radius-3">
				<div class="col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align border-radius-top-left-3 border-radius-bottom-left-3">
					<div class="align-center"><i class="fas fa-globe fa-4x"></i></div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="padding-10 align-left">
						<div class="no-margin uppercase letter-spacing-3 font-size-16">Countries</div>
						<br>
						<div class="row clearfix font-size-12">
							<div class="col-md-8 col-sm-8 col-xs-8"><a class="uppercase fw-400" target="_blank" href="<?php print $base_url; ?>/node/add/country"><i class="fa fa-plus" aria-hidden="true"></i> Create Country</a></div>
							<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="uppercase" target="_blank" href="<?php print $base_url; ?>/admin/all-countries">View all <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<!-- Cities -->
		<div class="col-md-6 col-sm-12 col-xs-12 col-centered no-float">
			<br>
			<div class="bg-light-grey clearfix row-eq-height border-radius-3">
				<div class="col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align border-radius-top-left-3 border-radius-bottom-left-3">
					<div class="align-center"><i class="fas fa-map-marker-alt fa-4x"></i></div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="padding-10 align-left">
						<div class="no-margin uppercase letter-spacing-3 font-size-16">Locations / Cities</div>
						<br>
						<div class="row clearfix font-size-12">
							<div class="col-md-8 col-sm-8 col-xs-8"><a class="uppercase fw-400" target="_blank" href="<?php print $base_url; ?>/node/add/location?field_country=<?php echo $_GET['cid']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> Create Location</a></div>
							<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="uppercase" target="_blank" href="<?php print $base_url; ?>/admin/all-locations">View all <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
	<br>
	<h3 class="no-margin uppercase">General</h3>
	<div class="row clearfix align-center">
		<!-- Basic Pages -->
		<div class="col-md-6 col-sm-12 col-xs-12 col-centered no-float">
			<br>
			<div class="bg-light-grey clearfix row-eq-height border-radius-3">
				<div class="col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align border-radius-top-left-3 border-radius-bottom-left-3">
					<div class="align-center"><i class="fas fa-code fa-4x"></i></div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="padding-10 align-left">
						<div class="no-margin uppercase letter-spacing-3 font-size-16">Basic Pages</div>
						<br>
						<div class="row clearfix font-size-12">
							<div class="col-md-8 col-sm-8 col-xs-8"><a class="uppercase fw-400" target="_blank" href="<?php print $base_url; ?>/node/add/page"><i class="fa fa-plus" aria-hidden="true"></i> Create Basic Page</a></div>
							<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="uppercase" target="_blank" href="<?php print $base_url; ?>/admin/all-basic-pages">View all <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<!-- Services -->
		<div class="col-md-6 col-sm-12 col-xs-12 col-centered no-float">
			<br>
			<div class="bg-light-grey clearfix row-eq-height border-radius-3">
				<div class="col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align border-radius-top-left-3 border-radius-bottom-left-3">
					<div class="align-center"><i class="fas fa-code fa-4x"></i></div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="padding-10 align-left">
						<div class="no-margin uppercase letter-spacing-3 font-size-16">Services</div>
						<br>
						<div class="row clearfix font-size-12">
							<div class="col-md-8 col-sm-8 col-xs-8"><a class="uppercase fw-400" target="_blank" href="<?php print $base_url; ?>/node/add/service"><i class="fa fa-plus" aria-hidden="true"></i> Create Basic Page</a></div>
							<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="uppercase" target="_blank" href="<?php print $base_url; ?>/admin/all-services">View all <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<!-- Vehicle Types -->
		<div class="col-md-6 col-sm-12 col-xs-12 col-centered no-float">
			<br>
			<div class="bg-light-grey clearfix row-eq-height border-radius-3">
				<div class="col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align col-md-3 hidden-xs bg-dark-grey color-white padding-5 column-vertical-align border-radius-top-left-3 border-radius-bottom-left-3">
					<div class="align-center"><i class="fas fa-code fa-4x"></i></div>
				</div>
				<div class="col-md-9 no-padding">
					<div class="padding-10 align-left">
						<div class="no-margin uppercase letter-spacing-3 font-size-16">Vehicle Types</div>
						<br>
						<div class="row clearfix font-size-12">
							<div class="col-md-8 col-sm-8 col-xs-8"><a class="uppercase fw-400" target="_blank" href="<?php print $base_url; ?>/node/add/vehicle-type"><i class="fa fa-plus" aria-hidden="true"></i> Create Vehicle Types</a></div>
							<div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="uppercase" target="_blank" href="<?php print $base_url; ?>/admin/all-vehicle-types">View all <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>
</div>