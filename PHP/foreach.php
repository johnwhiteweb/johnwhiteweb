<?php
		$i = 1;
		foreach($value['unlock_hidden_potential']['items'] as $item){
		?>
			<li id="box-<?php echo $i; ?>" class="box<?php echo ($i==1 ? " current" : ""); ?> col">
			  <div class="icon-box">
				<img class="svgClass icon-<?php echo $i; ?>" type="image/svg+xml" src="<?php echo $item['icon']; ?>"/>
			  </div>
			  <div class="text-box">
				<h5><?php echo $item['title']; ?></h5>
				<p class="font-weight-bold-item"><?php echo $item['text']; ?></p>
			  </div>
			</li>
			
		<?php
		$i++;
		}
		?>