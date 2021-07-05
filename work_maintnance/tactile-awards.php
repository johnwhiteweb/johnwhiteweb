

<?php	
	if($value['type'] == 'Request A Demo'){
	?>
<section id="hidden-potential">

	<div class="hidden-potential desktop">
	  <div class="container">
		<div class="section-heading">
		  <h2><?php echo $value['request_a_demo']['heading']; ?></h2>
		</div>
		<div class="sub-heading">
			<p ><?php echo $value['request_a_demo']['sub_heading']; ?></p>
		</div>
		<ul class="row matchHeight">
		<?php
		$i = 1;
		foreach($value['request_a_demo']['items'] as $item){
		?>
			<li id="box-<?php echo $i; ?>" class="box<?php echo ($i==1 ? " current" : ""); ?> col">
			  <div class="icon-box">
				<img class="svgClass icon-<?php echo $i; ?>" type="image/svg+xml" src="<?php echo $item['icon']; ?>"/>
			  </div>
			  <div class="text-box match">
				<h5><?php echo $item['title']; ?></h5>
				<p class="font-weight-bold-item"><?php echo $item['text']; ?></p>
			  </div>
			</li>
			
		<?php
		$i++;
		}
		?>
			 
		</ul>
		
		<?php
		$j = 1;
		$total = count($value['request_a_demo']['items']);
		$count_type = "";
		if($total%2==0){
			$count_type = "even";
		}else{
			$count_type = "odd";
		}
		$half = round($total/2);
		foreach($value['request_a_demo']['items'] as $item){
		?>
		<?php 
		if( ($count_type=="odd" && $j < $half) || ($count_type=="even" && $j < ($half+1) ) ){
		?>
		<div class="row m-box<?php echo ($j==1 ? " current" : ""); ?> box-<?php echo $j; ?>">
		<div class="col-md-6">
		  <div class="text">
			<p><?php echo $item['slider_text_test']; ?></p>
		  </div>
		</div>
		<div class="col-md-6">
		  <div class="img-box">
			<img class="img-fluid" src="<?php echo $item['slider_image']; ?>">
		  </div>
		</div>
	  </div>
		<?php 
		}else{
		?>
		<div class="row m-box<?php echo ($j==1 ? " current" : ""); ?> box-<?php echo $j; ?>">
		<div class="col-md-6">
			<div class="img-box">
				<img class="img-fluid" src="<?php echo $item['slider_image']; ?>">
			 </div>
		</div>
		<div class="col-md-6">
		  <div class="text">
			<p><?php echo $item['slider_text_test']; ?></p>
			

		  </div>
		</div>
	  </div>
		
		<?php 
		}
		?>
			
		<?php
		$j++;
		}
		?>

	</div>
</div>
	
<div  class="hidden-potential mobile">
  <div class="container">
    <div class="section-heading">
      <h2><?php echo $value['request_a_demo']['heading']; ?></h2>
    </div>
    <div class="sub-heading">
        <p><?php echo $value['request_a_demo']['sub_heading']; ?></p>
    </div>
	
	<?php
	$p = 1;
	
	
	foreach($value['request_a_demo']['items'] as $item){
	?>
   
    <div class="btn-box" data-toggle="collapse" data-target="#box-<?php echo $p; ?>" aria-expanded="<?php /*echo ($p==1 ? "true" : "false");*/ ?>false" aria-controls="multiCollapseExample2"> <div class="img-box">
      <!--<img class="img-fluid" src="<?php echo $item['icon']; ?>">-->
	  <object class="svgClass icon-<?php echo $p; ?>" type="image/svg+xml" data="<?php echo $item['icon']; ?>"></object>
      <span><?php echo $item['title']; ?></span><i class="fa fa-angle-right"></i>
    </div></div>

  <div id="box-<?php echo $p; ?>" class="row collapse<?php /*echo ($p==1 ? " show" : "");*/ ?>">
    <div class="col-12">
      <div class="text font-weight-bold">
        <p><?php echo $item['text']; ?></p>
      </div>
    </div>
    <div class="col-12">
      <div class="img-box">
        <img class="img-fluid" src="<?php echo $item['slider_image']; ?>">
      </div>

	  <div class="text">
			<p><?php echo $item['slider_text_test']; ?></p>
			
		  </div>
		  
    </div>
  </div>
 
  <?php
  $p++;
	}
	?>
</div>
</div>


</section>
	<?php
		}//if
	?>




<?php	
	if($value['type'] == 'Request A Demo'){
	?>
	
<section id="hidden-potential">

</section>

<?php } //awards
						?>