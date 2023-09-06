<section class="right-side right-sidenav">
	<div class="sidenav right">
		<a href="micro-site-update.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'micro-site') ? 'active':''; ?>">
			<div class="icon"><img src="images/icon/list.png"></div><div class="description">Basic</div>
			</div>
		</a>
		
		<a href="banner.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'banner') ? 'active':''; ?>"><div class="icon"><img src="images/icon/about.png"></div><div class="description">Banner</div>
			</div>
		</a>
		
		<a href="overview.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'overview') ? 'active':''; ?>"><div class="icon"><img src="images/icon/about.png"></div><div class="description">Overview</div>
			</div>
		</a>

		<a href="micro-itehr.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'overview') ? 'active':''; ?>"><div class="icon"><img src="images/icon/about.png"></div><div class="description">Others</div>
			</div>
		</a>
		
		
		<a href="keep-highlights.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'keep-highlights') ? 'active':''; ?>"><div class="icon"><img src="images/icon/about.png"></div><div class="description">Highlights</div>
			</div>
		</a>
		<a href="micro-specifications.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'micro-specifications') ? 'active':''; ?>"><div class="icon"><img src="images/icon/about.png"></div><div class="description">Specifications</div>
			</div>
		</a>

		<a href="transaction.php?id=<?php echo $update_id ?>" class="d-none">
			<div class="nav <?= ($activePage == 'transaction') ? 'active':''; ?>">
				<div class="icon"><img src="images/icon/transaction.png"></div><div class="description">Transaction</div>
			</div>
		</a>

		<a href="price-insight.php?id=<?php echo $update_id ?>" class="d-none">
			<div class="nav <?= ($activePage == 'price-insight') ? 'active':''; ?>"><div class="icon"><img src="images/icon/rupee-indian.png"></div><div class="description">Price List</div>
			</div>
		</a>

		<a href="location-advantage.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'location-advantage') ? 'active':''; ?>"><div class="icon"><img src="images/icon/location.png"></div><div class="description">Location</div></div>
		</a>

		<a href="amenities.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'amenities') ? 'active':''; ?>"><div class="icon"><img src="images/icon/resources.png"></div><div class="description">Amenities</div></div>
		</a>

		<a href="floor-plan.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'floor-plan') ? 'active':''; ?>"><div class="icon"><img src="images/icon/blueprint.png"></div><div class="description">Floor Plan</div></div>
		</a>

		<a href="micro-site-gallery.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'micro-site-gallery') ? 'active':''; ?>"><div class="icon"><img src="images/icon/constructor.png"> </div><div class="description">Gallery</div></div>
		</a>
		<a href="price-list.php?id=<?php echo $update_id ?>">
			<div class="nav <?= ($activePage == 'price-list') ? 'active':''; ?>"><div class="icon"><img src="images/icon/constructor.png"> </div><div class="description">Price List</div></div>
		</a>
	</div>
</section>