<h4>Statistics</h4>

<div class="row justify-content-center">
	
	<div class="m-1 col-md-4 bg-light rounded shadow border text-center">
		<h1><i class="bi bi-person-circle"></i></h1>
		<div>
			Users
		</div>
		<?php 

			$query = "select count(id) as num from users";
			$res = query_row($query);
		?>
		<h1 class="text-primary"><?=$res['num'] ?? 0?></h1>	</div>
	
	<div class="m-1 col-md-4 bg-light rounded shadow border text-center">
		<h1><i class="bi bi-calendar-check"></i></h1>
		<div>
			Reservations
		</div>
		<?php 

			$query = "select count(id) as num from reservations";
			$res = query_row($query);
		?>
		<h1 class="text-primary"><?=$res['num'] ?? 0?></h1>	</div>

	<div class="m-1 col-md-4 bg-light rounded shadow border text-center">
		<h1><i class="bi bi-list"></i></h1>
		<div>
			Categories
		</div>
		<?php 

			$query = "select count(id) as num from categories";
			$res = query_row($query);
		?>
		<h1 class="text-primary"><?=$res['num'] ?? 0?></h1>	
	</div>

	<div class="m-1 col-md-4 bg-light rounded shadow border text-center">
		<h1><i class="bi bi-file-post"></i></h1>
		<div>
			Posts
		</div>
		<?php 

			$query = "select count(id) as num from posts";
			$res = query_row($query);
		?>
		<h1 class="text-primary"><?=$res['num'] ?? 0?></h1>
	</div>

</div>