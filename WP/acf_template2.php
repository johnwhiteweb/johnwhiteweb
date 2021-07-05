
<?php if ($value['type'] == "Awards") { ?>

<section class="container trusted-section ">
	<div class="container row">
		<div class="section-heading col-2 align-middle text-box text-black">
			<h2 class="align-middle"><?php echo $value['Awards']['heading']; ?></h2>
		</div>
		<div class="trusted-slider desktop col-10">
			<?php
			print_r($value['Awards']['images'][0]);
			?>
			<!-- <php
			// foreach ($value['Awards']['images']['image'] as $item) {

			?>
				<div class="item">
					<div class="img-box ">
						<img class="img-fluid mx-auto d-block" src="<?php echo $item; ?>">
					</div>
				</div>

			<php } // awards
			?>

		</div>
		<div class="trusted-slider mobile">

			<php
			$y = 1;
			$total = count($value['Awards']['images']);
			foreach ($value['Awards']['images'] as $item) {
			?>
				<div class="item">
					<div class="img-box">
						<img class="img-fluid" src="<php echo $item; ?>">

					</div>
				</div>

		</div>
	</div>
</section>
<?php } //  if awards
?> 





<?php if ($value['type'] == "Our solution") { ?>
			<?php
			foreach ($value['trusted_by']['items'] as $item) { ?>
			<?php } // trusted by logos
			?>
		<?php } // About us video
		?>