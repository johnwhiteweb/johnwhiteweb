<?php
/*
  Template Name:Box
 */

get_header("box");
global $post;
$postID = $post->ID;

//$json_url = get_template_directory_uri().'/json.json';

$json_url = get_template_directory().'/json.json';


$json = file_get_contents($json_url);

$json = json_decode($json,true);

$orgin = array();

foreach($json as $row){

$orgin[$row['orign']] = $row;

}

$to_show = 'generic';

$pCode = '0';

$form_origin = 'new_portal';

$get_orign = 'new_portal';

$date_expired  = '31/08/2019';

$termsurl  = 'operating_regulations.pdf';

$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
if(!empty($_GET)){
	foreach($_GET as $key=>$val){
		$_GET[$key] = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
	}
}

if(isset($_GET['orign']) ){

$get_orign = $_GET['orign'] ;	

$form_origin = $_GET['orign'] ;	

	if(isset($orgin[$get_orign])){

		$to_show = $orgin[$get_orign]['product'];

		$form_origin = $get_orign;

		$pCode = $orgin[$get_orign]['code'];

		$date_expired = $orgin[$get_orign]['expiredate'];

		$termsurl = $orgin[$get_orign]['termsurl'];

	}

}



$utm_source = '';
if(isset($_GET['utm_source']) && !empty($_GET['utm_source']) ){
	$utm_source = $_GET['utm_source'];
}

$utm_medium = '';
if(isset($_GET['utm_medium']) && !empty($_GET['utm_medium']) ){
	$utm_medium = $_GET['utm_medium'];
}

$utm_term = '';
if(isset($_GET['utm_term']) && !empty($_GET['utm_term']) ){
	$utm_term = $_GET['utm_term'];
}

$utm_campaign = '';
if(isset($_GET['utm_campaign']) && !empty($_GET['utm_campaign']) ){
	$utm_campaign = $_GET['utm_campaign'];
}

$cid = '';
if(empty($cid) || $cid=='undefined'){
    $cid = $_COOKIE['cid'];
}

?>


<!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ2SRD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

 
<div class="main">
        <div class="row no-gutters">
            <div class="col-lg-9 right-box text-right">
                <?php
                
                ?>
                <?php
                $Show_top_section = get_field("show_top_section", $postID);
                //print_r($Show_package_section);

                if($Show_top_section == "Yes"){
				
				$custom_height = get_field("height_of_top_section", $postID);
				
                if($custom_height=="100%"){
				
                    $class = "custom-100";
					
                }elseif($custom_height=="75%"){
				
                    $class = "custom-75";

                }elseif($custom_height=="50%"){
				
					$class = "custom-50";
				
                }
				
				
				if( !empty(get_field("top_section_background_image_for_desktop", $postid)) ) {
				
					$bgClass = 'top-section-bg-img';
				}
				else if ( !empty(get_field("top_section_background", $postid)) && trim(get_field("top_section_background", $postid)) != 'Select' ){
				
					$bgClass = 'top-section-bg-color';
				}
				else if ( !empty(get_field("top_section_background_gradient_colour_1", $postid)) && !empty(get_field("top_section_background_gradient_colour_2", $postid))){
				
					$bgClass = 'top-section-bg-gredient';
				}
				
                ?>

                <section class="top-section <?php echo $class; ?> <?php echo $bgClass; ?>">
                    <div class="box">
                        <div class="blue-icon">
                            <img class="img-fluid" src="<?php echo get_field("top_section_logo", $postID); ?>" alt="Logo" />
                        </div>
                        <div class="titles">
                            <h1 class="font-Bold"><?php echo get_field("main_heading", $postID); ?></h1>
                        </div>
                        <div class="subtitle">
                            <h3><?php echo get_field("sub_heading", $postID); ?></h3>
                        </div>

                    </div>
                    <div class="img-box<?php if(get_field("image_aligned_with_top_background", $postID)=="Yes"){ echo " img-aligned";};?>">
                        <img class="img-fluid" src="<?php echo get_field("top_section_image", $postID); ?>" />
                    </div>
				</section>
				<?php 
				
				$top_sec_bg_gd_clor = get_field("top_section_background_gradient_colour", $postid);
				if($top_sec_bg_gd_clor){
					$top_sec_bg_gd_clor = explode(",", $top_sec_bg_gd_clor);
					$top_sec_bg_gd_clor_1 = $top_sec_bg_gd_clor[0];
					$top_sec_bg_gd_clor_2 = $top_sec_bg_gd_clor[1];
				}else{
					$top_sec_bg_gd_clor_1 = "#ef265c";
					$top_sec_bg_gd_clor_2 = "#81d742";

				}

				
				?>
				<style>
				/*=====top-section-css-start=====*/
				
				.top-section-bg-color {
				    background: <?php echo get_field("top_section_background", $postid); ?> !important;
				}
				
				.top-section-bg-gredient {
				    background: -moz-linear-gradient(to right, <?php echo $top_sec_bg_gd_clor_1; ?>, <?php echo $top_sec_bg_gd_clor_2; ?>);
				    background: -webkit-linear-gradient(to right, <?php echo $top_sec_bg_gd_clor_1; ?>, <?php echo $top_sec_bg_gd_clor_2; ?>);
				    background: linear-gradient(to right, <?php echo $top_sec_bg_gd_clor_1; ?>, <?php echo $top_sec_bg_gd_clor_2; ?>)
				}
				
				.top-section-bg-img {
				    background-image: url('<?php echo get_field("top_section_background_image_for_desktop", $postid); ?>');
				}
				
				.top-section .titles h1 {
			    	color: <?php echo get_field("main_heading_font_color", $postid); ?>;
			    	font-size: <?php echo get_field("main_heading_font_size", $postid); ?>px;
				}
				
				
				.top-section .subtitle h3 {
				    color: <?php echo get_field("sub_heading_color", $postid); ?>;
				    font-size: <?php echo get_field("sub_heading_font_size", $postid); ?>px;
				}


				<?php if(get_field("show_header", $global_id)=="Yes"){ ?>
					

					.custom-50 {
					<?php
					echo (get_field("image_aligned_with_top_background", $postID) == "Yes" ? 'height: 60vh;' : 'height: 45vh;');
					?>
					}

					.custom-75 {
						
					<?php
					echo (get_field("image_aligned_with_top_background", $postID) == "Yes" ? 'height: 62vh;' : 'height: 47vh;');
					?>
					}

					.custom-100 {
					
					<?php
					echo (get_field("image_aligned_with_top_background", $postID) == "Yes" ? 'height: 100vh;' : 'height:100vh;');
					?>

					}

				<?php 
					}else{ 
				?>
					.custom-50 {
					<?php
					echo (get_field("image_aligned_with_top_background", $postID) == "Yes" ? 'height: 65vh;' : 'height: 50vh;');
					?>
					}

					.custom-75 {
						
					<?php
					echo (get_field("image_aligned_with_top_background", $postID) == "Yes" ? 'height: 75vh;' : 'height: 75vh;');
					?>
					}

					.custom-100 {
						
					<?php
					echo (get_field("image_aligned_with_top_background", $postID) == "Yes" ? 'height:100vh;' : 'height: 100vh;');
					?>
						
					}

				<?php } ?>
				

				@media screen and (max-width: 1450px) {
					.top-section .titles h1 {
						font-size: <?php echo get_field("main_heading_font_size", $postid) -7; ?>px;
					}
				}

				@media screen and (max-width: 1199px) {
					.top-section .titles h1 {
						font-size: <?php echo get_field("main_heading_font_size", $postid) -15; ?>px;
					}
					.top-section .subtitle h3 {
						font-size: <?php echo get_field("sub_heading_font_size", $postid)  -10; ?>px;
					}
				}

				@media screen and (max-width: 991px) {
					<?php if(get_field("show_header", $global_id)=="Yes"){ ?>
					.custom-50 {
						height: 35vh;
					}
					.custom-75 {
						height: 45vh;
					}
					.custom-100 {
						height: calc(100vh - 45px);height:-moz-calc(100vh - 45px);height:-webkit-(100vh - 45px);
					}
					<?php 
					}else{ 
					?>
					.custom-50 {
						height: 50vh;
					}
					.custom-75 {
						height: 70vh;
					}
					.custom-100 {
						height: calc(100vh - 45px);height:-moz-calc(100vh - 45px);height:-webkit-(100vh - 45px);
						
					}

					<?php 
					}
					?>

				}
				@media screen and (max-width: 768px) {
					<?php if(get_field("show_header", $global_id)=="Yes"){ ?>
					.custom-50 {
						height: 40vh;
					}
					.custom-75 {
						height: 50vh;
					}
					.custom-100 {
						height: calc(100vh - 45px);height:-moz-calc(100vh - 45px);height:-webkit-(100vh - 45px);
					}
					<?php 
					}else{ 
					?>
					.custom-50 {
						height: 50vh;
					}
					.custom-75 {
						height: 70vh;
					}
					.custom-100 {
						height: calc(100vh - 45px);height:-moz-calc(100vh - 45px);height:-webkit-(100vh - 45px);
					}

					<?php 
					}
					?>

				}

				@media screen and (max-width: 480px) {
					.top-section .titles h1 {
						font-size: <?php echo get_field("main_heading_font_size", $postid) -20; ?>px;
					}
					.top-section .subtitle h3 {
				    font-size: <?php echo get_field("sub_heading_font_size", $postid)  -15; ?>px;
					}
					
					<?php if(get_field("show_header", $global_id)=="Yes"){ ?>
					.custom-50 {
						height: 40vh;
					}
					.custom-75 {
						height: 55vh;
					}
					.custom-100 {
						height: calc(100vh - 50px);height:-moz-calc(100vh - 50px);height:-webkit-(100vh - 50px);
					}
					<?php 
					}else{ 
					?>
					.custom-50 {
						height: 50vh;
					}
					.custom-75 {
						height: 70vh;
					}
					.custom-100 {
						height: calc(100vh - 50px);height:-moz-calc(100vh - 50px);height:-webkit-(100vh - 50px);
					}

					<?php 
					}
					?>

				}
				
				@media screen and (max-width: 360px ) and (min-width: 350px) {
					.top-section .titles h1 {
						font-size: <?php echo get_field("main_heading_font_size", $postid) -20; ?>px;
					}
					.top-section .subtitle h3 {
				    font-size: <?php echo get_field("sub_heading_font_size", $postid)  -15; ?>px;
					}
					
					<?php if(get_field("show_header", $global_id)=="Yes"){ ?>
					.custom-50 {
						height: 40vh;
					}
					.custom-75 {
						height: 55vh;
					}
					.custom-100 {
						height: calc(100vh - 50px);height:-moz-calc(100vh - 50px);height:-webkit-(100vh - 50px);
					}
					<?php 
					}else{ 
					?>
					.custom-50 {
						height: 50vh;
					}
					.custom-75 {
						height: 70vh;
					}
					.custom-100 {
						height: calc(100vh - 50px);height:-moz-calc(100vh - 50px);height:-webkit-(100vh - 50px);
					}

					<?php 
					}
					?>

				}
				
				@media screen and (max-height: 900px ) and (min-height: 760px) {
					.top-section .titles h1 {
						font-size: <?php echo get_field("main_heading_font_size", $postid) -20; ?>px;
					}
					.top-section .subtitle h3 {
				    font-size: <?php echo get_field("sub_heading_font_size", $postid)  -15; ?>px;
					}
					
					<?php if(get_field("show_header", $global_id)=="Yes"){ ?>
					.custom-50 {
						height: 40vh;
					}
					.custom-75 {
						height: 55vh;
					}
					.custom-100 {
						height: calc(100vh - 50px);height:-moz-calc(100vh - 50px);height:-webkit-(100vh - 50px);
					}
					<?php 
					}else{ 
					?>
					.custom-50 {
						height: 50vh;
					}
					.custom-75 {
						height: 70vh;
					}
					.custom-100 {
						height: calc(100vh - 50px);height:-moz-calc(100vh - 50px);height:-webkit-(100vh - 50px);
					}

					<?php 
					}
					?>

				}
				
			/* iphone7 */
			@media only screen and (device-width : 375px) and (device-height : 667px) {
				.custom-100 {
					height: calc(100vh - 11vh);height:-moz-calc(100vh - 11vh);height:-webkit-(100vh - 11vh);
				}

			}
			
			/* iphone7 Plus */
			@media only screen and (device-width : 414px) and (device-height : 736px) {
				.custom-100 {
					height: calc(100vh - 17vh);height:-moz-calc(100vh - 17vh);height:-webkit-(100vh - 17vh);
				}

			}
				
			/* 1792x828px at 326ppi iphoneXR */
			@media only screen and (device-width : 414px) and (device-height : 896px) and (-webkit-device-pixel-ratio : 2) { 
				
				.custom-100 {
					height: calc(100vh - 18vh);height:-moz-calc(100vh - 18vh);height:-webkit-(100vh - 18vh);
				}
				
				
			}
			
			/* 2436x1125px at 458ppi iphoneXS */
			@media only screen and (device-width : 375px) and (device-height : 812px) and (-webkit-device-pixel-ratio : 3) {

				.custom-100 {
					height: calc(100vh - 14vh);height:-moz-calc(100vh - 14vh);height:-webkit-(100vh - 14vh);
				}

			}
			
				
				
				/*=====top-section-css-end=====*/
				</style>
                <?php
                } //if

                ?>


				<?php
				$sections = get_field('page_sections');
				
				//print_r($sections);
				?>
				
				<?php
				
				foreach($sections as $key => $value){
				
					//print_r($key);
					//echo "----------------<br />";
					//print_r($value['section']);
				
				?>
				
					<?php	
					if($value['section']['section'] == 'Content'){
					?>
					<section class="content-section">
					<?php
					//print_r($value['section']['content']);
					$i=1;
					$total_item = count($value['section']['content']['items']);
					foreach($value['section']['content']['items'] as $item){
					?>
						<div class="container content<?php echo $i; ?>">
							
							<?php
							if(!empty($item['title'])){
							?>
							<div class="text-box">
							<?php if($item['image_with_title']){ ?>
							<span class="iconBox"><img src="<?php echo $item['image_with_title']; ?>" alt=""></span>
							<?php } ?>
							<h3 class="font-Bold"><?php echo $item['title'];?></h3>
							</div>
							<?php
							}//
							?>
							
							<?php
							if(!empty($item['sub_title'])){
							?>
							<div class="text-box">
							<h4 class="font-Light"><?php echo $item['sub_title'];?></h4>
							</div>
							<?php
							}//
							?>
							
							<?php
							if(!empty($item['text'])){
							?>
							<div class="text-box">
							<?php echo $item['text'];?>
							</div>
							<?php
							}//
							?>
						<?php if($total_item!=$i){ ?>
							<hr>
						<?php } ?>
						</div>
						<style>
						/*=====content-section-css-start=====*/
	
						.content-section .content<?php echo $i; ?> .text-box h3 {
							color: <?php echo $item['title_color']; ?>;
							font-size: <?php echo $item['title_font_size']; ?>px;
						}
						.content-section .content<?php echo $i; ?> .text-box h4 {
							color:  <?php echo $item['sub_title_color']; ?>;
							font-size: <?php echo $item['sub_title_font_size']; ?>px;
						}
						.content-section .text-box p {
							color: #17244e;
							font-size: 25px;
						}


						@media screen and (max-width: 1450px) {
							.content-section .content<?php echo $i; ?> .text-box h3 {
								font-size: <?php echo $item['title_font_size']-5; ?>px;
							}
							.content-section .content<?php echo $i; ?> .text-box h4 {
								font-size: <?php echo $item['sub_title_font_size']-2; ?>px;
							}
							.content-section .text-box p {
								font-size: 23px;
							}
						}

						@media screen and (max-width: 1199px) {
							.content-section .content<?php echo $i; ?> .text-box h3 {
								font-size: <?php echo $item['title_font_size']-7; ?>px;
							}
						}

						@media screen and (max-width: 480px) {
							.content-section .content<?php echo $i; ?> .text-box h3 {
								font-size: <?php echo $item['title_font_size']-11; ?>px;
							}
							.content-section .content<?php echo $i; ?> .text-box h4 {
								font-size: <?php echo $item['sub_title_font_size']-5; ?>px;
							}
							.content-section .text-box p {
								font-size: 20px;
							}
						}

	
						/*=====content-section-css-end=====*/
						
					</style>
					
					<?php
					$i++;
					}//foreach
					?>
					
				</section>
				<style>
						/*=====Line Seprator Css Start=====*/
						hr {
							border-color: <?php echo get_field("line_color", $postID); ?>;
							width:<?php echo get_field("line_width", $postID); ?>%;
						}

						@media screen and (max-width: 1280px) {
							hr {
								width:<?php echo get_field("line_width", $postID)+7; ?>%;
							}
						}	

						@media screen and (max-width: 991px) {
							hr {
								width:<?php echo get_field("line_width", $postID)+42; ?>%;
							}
						}	

						/*=====Line Seprator Css End=====*/
					</style>
				<?php
				}//section Content
				?>
				
				
				
				<?php	
				if($value['section']['section'] == 'Round Box'){
				
				//print_r($value['section']['round_box']);
				
				$BoxValues = $value['section']['round_box'];
				
				?>
				<section class="roundbox-section">
                <div class="container">
                    <div class="text-box round-box">
                        <div class="starIcon mb-3"><img class="img-fluid" src="<?php echo $BoxValues['top_image']; ?>" /></div>
                        <h3 class="font-Bold"><?php echo $BoxValues['heading']; ?></h3>
                        <?php echo $BoxValues['text']; ?>
                    </div>

                    <!-- <hr> -->
                </div>
                </section>
				<style>
                    /*=====roundbox-section-css-start=====*/

                    	.roundbox-section .round-box {
                            background:  <?php echo $BoxValues['background_color']; ?>;
                        }

                        .roundbox-section .text-box h3 {
                            font-size: <?php echo $BoxValues['heading_font_size']; ?>px;
                            color: <?php echo $BoxValues['heading_colour']; ?>;
                        }
                        .roundbox-section .text-box p {
                            font-size: <?php echo $BoxValues['text_font_size']; ?>px;
                            color: <?php echo $BoxValues['text_colour']; ?>;
						}
						
						@media screen and (max-width: 1680px) {
							.roundbox-section .text-box h3 {
								font-size: <?php echo $BoxValues['heading_font_size'] -12; ?>px;
							}
							.roundbox-section .text-box p {
								font-size: <?php echo $BoxValues['text_font_size'] -7; ?>px;
							}
						}
						@media screen and (max-width: 1450px) {
							.roundbox-section .text-box h3 {
								font-size: <?php echo $BoxValues['heading_font_size'] -15; ?>px;
							}
							.roundbox-section .text-box p {
								font-size: <?php echo $BoxValues['text_font_size'] -10; ?>px;
							}

						}
						
						@media screen and (max-width: 480px) {
							.roundbox-section .text-box h3 {
								font-size: <?php echo $BoxValues['heading_font_size'] -6; ?>px;
							}
							.roundbox-section .text-box p {
								font-size: <?php echo $BoxValues['text_font_size'] -3; ?>px;
							}

						}	

                    /*=====roundbox-section-css-end=====*/
                </style>
				
				<?php
				
				}//section Round Box
				?>
				
				<?php	
				if($value['section']['section'] == 'Benefits'){
				?>
				<section class="facts-section">
				<div class="container">
				<div class="text-box blue_color">
					<h3 class="title font-Bold"><?php echo $value['section']['benefits']['heading'];?></h3>
				</div>
				
				<?php
				$i = 1;
				 foreach($value['section']['benefits']['items'] as $item){
				?>
					<div class="n-box">

					<?php if($item['icon']){ ?>
						<span class="number-list num-img"><img class="img-fluid" src="<?php echo $item['icon']; ?>" atl=""></span>
					<?php }elseif($item['number']){ ?>
						<span class="number-list number"><?php echo $item['number'];?></span>
					<?php }else{ ?>
						<span class="number-list number"><?php echo $i;?></span>
					<?php } ?>
					<h4 class="subtitle font-Bold"><?php echo $item['titel'];?></h4>
					
					<?php echo $item['text'];?>
					
					</div>
				
				<?php
				$i++;
				}//foreach
				?>
				  <!-- <hr> -->
				</div>
				</section>
				
				<style>
				  /*=====facts-section-css-start=====*/
				
					.facts-section .text-box .title {
						font-size: <?php echo $value['section']['benefits']['heading_font_size'];?>px;
						color: <?php echo $value['section']['benefits']['heading_font_colour'];?>;
					}
					.facts-section .n-box .subtitle  {
						font-size: <?php echo $value['section']['benefits']['item_title_font_size'];?>px;
						color: <?php echo $value['section']['benefits']['item_title_color'];?>;
					}
					.facts-section .n-box p {
						font-size: 18px;
						color: #414141;
					}
					.facts-section .n-box  .number-list {
						background: linear-gradient(to right, #42a3ff, #90ebff);
						font-size: 75px;
					}


					@media screen and (max-width: 1280px) {
						.facts-section .text-box .title {
							font-size: 30px;
						}

					}
	
					@media screen and (max-width: 480px) {
						.facts-section .text-box .title {
							font-size: 24px;
						}

					}
				
				
				/*=====facts-section-css-end=====*/
				</style>
				<?php
				
				}//section Benefits
				?>
				
				<?php	
				if($value['section']['section'] == 'FAQ'){
				?>
				<section class="faq-data faq">
				<div class="container">
				<h2 class="title text-center"><?php echo $value['section']['faq']['heading'];?></h2>
				
				
				
				
				
				<div class="panel-group panel-group-1" data-h2="h2-panel-1" id="accordion" role="tablist" aria-multiselectable="true">
				
				<?php
				$i = 1;
				 foreach($value['section']['faq']['questions_and_answers'] as $item){
				?>
					
					<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
					<a role="button" data-toggle="collapse" data-parent="#accordion"  class="panel-title collapsed"
					href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>"><?php echo $item['question']; ?></a>
					
					</div>
					
					<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
					<div class="panel-body"><?php echo $item['answer']; ?></div>
					</div>
					</div>
				
				<?php
				$i++;
				}//foreach
				?>
	
				</div>
				</div>
				</section>
				
				<style>
                                    
                    /*=====faq-section-css-start=====*/

                    .faq-data .title {
                        font-size: <?php echo $value['section']['faq']['heading_font_size'];?>px;
                        color: <?php echo $value['section']['faq']['heading_colour'];?>;
                    }
                    .faq-data .panel-heading a {
                        font-size: 18px;
                        color: #484848;
                    }
                    .faq-data .panel-body {
                        font-size: 18px;
                        color: #484848;
					}
					
					@media screen and (max-width: 480px) {
						.faq-data .title {
							font-size: <?php echo $value['section']['faq']['heading_font_size'] -6;?>px;
						}

					}

                    /*=====faq-section-css-end=====*/

                </style>
				<?php
				
				}//section FAQ
				?>

				<?php	
				if($value['section']['section'] == 'Packages'){

					//print_r($value['section']['packages']['choose_package']);
				
					if(!empty($value['section']['packages']['choose_package'])){
						$args = array(
							'post_type' => 'package',
							'post__in'      => $value['section']['packages']['choose_package'],
							'post_status' => 'publish'
						 );

					}else{
						$args = array(
							'post_type' => 'package',
							'posts_per_page' => 3,
							'post_status' => 'publish'
							);

					}			
				
					$loop = new WP_Query($args);
					if ($loop->have_posts()):
				?>
				<section class="select-package text-center">
						<div class="container">
						<h2 class="title"><?php echo $value['section']['packages']['heading'];?></h2>
						<script type="application/ld+json">
							{
							"@context":"http://schema.org",
							"@type":"ItemList",
							"itemListElement":[
							{
							"@type":"ListItem",
							"position":1,
							"name":"פרסום עסק ב-B144",
							"url":"https://digital.b144.co.il/digital-presence/b144-business-cards/business-promotion/",
							"image":"https://digital.b144.co.il/wp-content/uploads/2018/06/dad-1.png"
							},
							{
							"@type":"ListItem",
							"position":2,
							"name":"פרסום בפייסבוק",
							"url":"https://digital.b144.co.il/digital-marketing/facebook-advertising/facebook-ads/",
							"image":"https://digital.b144.co.il/wp-content/uploads/2018/06/dad-2.png"
							},
							{
							"@type":"ListItem",
							"position":3,
							"name":"פרסום בגוגל",
							"url":"https://digital.b144.co.il/digital-marketing/google-advertising/google-campaign/",
							"image":"https://digital.b144.co.il/wp-content/uploads/2018/06/dad-3.png"
							},
							{
							"@type":"ListItem",
							"position":4,
							"name":"סרטוני תדמית",
							"url":"https://digital.b144.co.il/content-marketing/promotional-videos/business-video/",
							"image":"https://digital.b144.co.il/wp-content/uploads/2018/06/dad-4.png"
							},    {
							"@type":"ListItem",
							"position":5,
							"name":"ג'ינגל עסקי",
							"url":"https://digital.b144.co.il/content-marketing/voice-branding/business-jingle/",
							"image":"https://digital.b144.co.il/wp-content/uploads/2018/06/dad-5.png"
							},    {
							"@type":"ListItem",
							"position":6,
							"name":"בניית אתרים",
							"url":"https://digital.b144.co.il/digital-presence/website-development/website-creating/",
							"image":"https://digital.b144.co.il/wp-content/uploads/2018/06/dad-6.png"
							}
							]
							}
						</script>
						<div class="row row-flex">
							<?php
							$i = 0;
							while ($loop->have_posts()) : $loop->the_post();
								$icon1 = types_render_field('package-icon1', array("url" => true));
								$icon2 = types_render_field('package-icon2', array("url" => true));
								$price = types_render_field('package-price', array("url" => true));
								$description = types_render_field('package-bottom-description', array("url" => true));
								$url = types_render_field('package-url', array("output" => "raw"));
								$code = types_render_field('package_product_code');
								$origin = types_render_field('package_product_origin');
								$title = get_the_title();
								$secondary_title = types_render_field('secondary-title');
								$content_post = get_post(get_the_ID());
								$content = $content_post->post_content;
								$content = apply_filters('the_content', $content);
								$content = str_replace(']]>', ']]&gt;', $content);
								?>
								<div class="package-box col-sm-6 col-md-4">
									<div class="package-content">
										<div class="heading hi">
											<figure> <img src="<?php echo $icon1; ?>" alt="" class="img-responsive"> </figure>
											<p><?php echo $title; ?>
											<?php echo $secondary_title; ?>
											</p>
										</div>
										<div class="content-hide">
											<div class="pack-icon"> <img src="<?php echo $icon2; ?>" alt="" class="img-responsive"> </div>
											<div class="pack-price"> <sup>עד</sup> <span><?php echo $price; ?></span> ש"ח / לחודש </div>
											<div class="pack-price-tag text-center">
												<?php echo $content; ?>
												<a href="javascript:void(0);" class="btn btn-danger org-btn" data-product="<?php echo $code; ?>" data-origin="<?php echo $origin; ?>">חזרו אליי לפרטים 
													<span class="arrow-effect">&gt;</span> </a>
												<div class="price-form">
				
												</div>
											</div>
											<?php echo $description; ?>
											<!--<div class="terms"> <a href="< ?php echo $url; ?>" target="_blank">לתנאי החבילה</a> </div>-->
										</div>
										<a href="javascript:void(0);" class="content-opner"> 
											<img src="<?php echo IMAGES_URL; ?>/icon-content-down.png" alt="" class="img-responsive icon-open"> 
											<img src="<?php echo IMAGES_URL; ?>/icon-content-up.png" alt="" class="img-responsive icon-down"> 
										</a> </div>
								</div>
								<?php
								$i++;
							endwhile;
							?>
							<div style="display:none;" id="initialdiv">
								<div id="package_frm">
									<button class="form-close text-center" style="border: none;background: none;"> <img src="<?php echo IMAGES_URL; ?>/icon-form-close.png" alt="לחץ לסגירת טופס" class="img-responsive"> </button>
									<h4>השארת פרטים</h4>
									<p>ליצירת קשר עם יועץ פרסום דיגיטלי</p>
									<div class="form-content">
										<?php echo do_shortcode('[contact-form-7 id="2310" title="Package Form"]'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
							<style>
								/*=====select-package-section-css-start=====*/
				
									.select-package .title {
										font-size: <?php echo $value['section']['packages']['heading_font_size'];?>px;
										color: <?php echo $value['section']['packages']['heading_colour'];?>;
									}
									.price-form .form-content label {padding-right:20px;}
								/*=====select-package-section-css-end=====*/
							</style>
				
				<?php
				endif;
				wp_reset_query();
				?>
				<?php
				
				}//section Packages
                ?>
                
                
                <?php	
				if($value['section']['section'] == 'Facts'){
                    $args = array(
                        'post_type' => 'b144-statistics',
                        'posts_per_page' => 3
                    );
                    
                    
                    
                    $loop = new WP_Query($args);
                    if ($loop->have_posts()):
                        
                    
                    $html .= '<section class="ad-solution digitalMareketing_gr">
                                <div class="container">
                                <h2 class="heading text-center">'.$value['section']['facts']['heading'].'</h2>
                                    ';
                    $tagData = get_term_by('slug',$tag,'post_tag');
                    if(!empty($tagData)){
                        $html .= '<h2 class="text-center">'.$tagData->description.'</h2> <br><br>';
                    }
                    
                    $html .= '<div class="row">
                                    <div class="col-lg-12 col-lg-offset-1">
                                    <div class="row row-flex">';
                                    
                        $i = 0;
                        while ($loop->have_posts()) : $loop->the_post();
                        $icon_or_image = get_field('icon_or_image');
                        $icon = get_field('icon');
                        $image = get_field('image');
                        $val = get_field('value');
                        $sympol = get_field('sympol');
                        $text = get_field('text');
                        
                        $show = '<div class="digitalMareketing_gr_image image"><img src="'.$image.'"></div>';
                        if($icon_or_image=='icon')
                        $show = '<div class="digitalMareketing_gr_image icon">'.$icon.'</div>';
                
                            $html .='<div class=" col-md-4">
                                        <div class="digitalMareketing_gr_item">
                                        <div class="digitalMareketing_gr_item_body">
                                        '.$show.'
                                        <div class="digitalMareketing_gr_value"> <span class="timer">'.$val.'</span>'.$sympol.' </div>
                                        <div class="digitalMareketing_gr_text"> '.$text.' </div>
                                        
                                        </div>
                                        </div>
                                        </div>';
                        $i++;
                        endwhile;
                        
                        
                        $html .='
                        </div>
                                    </div>
                                    </div>
                                </div>
                        </section>
                        <script>
                            const animationDuration = 3000;
                
                            const frameDuration = 1000 / 60;
                            
                            const totalFrames = Math.round(animationDuration / frameDuration);
                            
                            const easeOutQuad = (t) => t * (2 - t);
                            
                            const animateCountUp = (el) => {
                            let frame = 0;
                            const countTo = parseInt(el.innerHTML, 10);
                            
                            const counter = setInterval(() => {
                                frame++;
                            
                                const progress = easeOutQuad(frame / totalFrames);
                            
                                const currentCount = Math.round(countTo * progress);
                            
                                if (parseInt(el.innerHTML, 10) !== currentCount) {
                                el.innerHTML = currentCount;
                                }
                            
                                if (frame === totalFrames) {
                                clearInterval(counter);
                                }
                            }, frameDuration);
                            };
                            
                            const countupEls = document.querySelectorAll(".timer");
                            countupEls.forEach(animateCountUp);
							
							
							document.addEventListener( "wpcf7invalid ", function( event ) {
								
							});
                        </script>
                        ';
                        
                    endif;
                    wp_reset_query();
                        
                    echo $html;
                    ?>


                    <style>
            
                    /*=====ad-solution-section-css-start=====*/
                    .ad-solution .heading {
                        font-size: <?php echo $value['section']['facts']['heading_font_size'];?>px;
                        color: <?php echo $value['section']['facts']['heading_colour'];?>;
                    }
                    .ad-solution  .digitalMareketing_gr_item {
                        background: transparent linear-gradient(90deg, #55B5FF 0%, #89E4FF 100%) 0% 0% no-repeat padding-box;
                    }
                    .ad-solution  .digitalMareketing_gr_value {
                        color: <?php echo $value['section']['facts']['_number_color'];?>;
                        font-size:  <?php echo $value['section']['facts']['number_font_size'];?>px;
                    }
                    .ad-solution .digitalMareketing_gr_text {
                        color: <?php echo $value['section']['facts']['text_color'];?>;
                        font-size:  <?php echo $value['section']['facts']['text_font_size'];?>px;
					}
					
					@media screen and (max-width: 1199px) {
					.ad-solution  .digitalMareketing_gr_value {
                        font-size:  <?php echo $value['section']['facts']['number_font_size'] -13;?>px;
					}
					.ad-solution .digitalMareketing_gr_text {
                        font-size:  <?php echo $value['section']['facts']['text_font_size'] -2;?>px;
					}

					}

					@media screen and (max-width: 480px) {
					.ad-solution .heading {
                        font-size: <?php echo $value['section']['facts']['heading_font_size'] -6;?>px;
                    }
					.ad-solution  .digitalMareketing_gr_value {
                        font-size:  <?php echo $value['section']['facts']['number_font_size'] -18;?>px;
					}
					.ad-solution .digitalMareketing_gr_text {
                        font-size:  <?php echo $value['section']['facts']['text_font_size'] -4;?>px;
					}

					}
                    
                    /*=====ad-solution-section-css-end=====*/
            
                    </style>
                <?php
                			
                }//section Facts
				?>
				
				<?php if($value['section']['section'] == 'Line Separator'){ ?>
					<section class="seprator-section">
						<div class="container">
							<hr class="hr<?php echo $key; ?>">
						</div>
					</section>
					<style>
						/*=====Line Seprator after content section Css Start=====*/
						hr.hr<?php echo $key; ?> {
							border-color: <?php echo $value['section']['line_separator']['line_color']; ?>;
							width:<?php echo $value['section']['line_separator']['line_width']; ?>%;
							/* margin-right: 46px; */
						}

						@media screen and (max-width: 1280px) {
							hr.hr<?php echo $key; ?> {
								width:<?php echo $value['section']['line_separator']['line_width']+7; ?>%;
							}
						}	

						@media screen and (max-width: 991px) {
							hr.hr<?php echo $key; ?> {
								width:<?php echo $value['section']['line_separator']['line_width']+42; ?>%;
							}
						}	

						/*=====Line Seprator after content section Css End=====*/
					</style>

				<?php } ?>


				<?php
				}//foreach sections
				?>

            
					

                    <button type="submit" class="mobileBtn btn-fixed btn gradient_btn font-Bold blue_color d-lg-none"  data-toggle="modal" data-target="#form-popup">לקבלת הצעה <span>&gt;</span></button>
       
						<style>
							/*=====Call to action Button for popup Css start=====*/
						.mobileBtn {
							background: #f67323;
							background: linear-gradient(to right, #ff495c, #ff692f);
							font-size: 25px;
						}

						@media screen and (max-width: 1450px) { 
							.mobileBtn {
								font-size: 20px;
							}
						}

						@media screen and (max-width: 480px) { 
							.mobileBtn {
								font-size: 23px;
							}
						}
						/*=====all to action Button for popup Css End=====*/
						
						</style>
       
        
			</div>

			<?php 
			
			$form_fields = get_field("form_fields", $postID);
			//print_r($form_fields);

			$keys = array_column($form_fields, 'order');

			array_multisort($keys, SORT_ASC, $form_fields);

			//print_r($form_fields);

		
			?>
			

		<div class="mobileFrom">
		<div class="modal fade" id="form-popup" tabindex="-1" role="dialog" aria-labelledby="form-popup" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<div class="form-container text-center">
                    <form id="mobilecontactform" class="mobile-contactform">
						<div class="col-12">
							<div class="title-box">
								<h3 class="heading">
									<b class="font-Bold"><?php echo get_field("form_heading", $postID); ?></b> <br />
									<?php echo get_field("form_sub_heading", $postID); ?>
								</h3>
								<div class="sub-heading"><?php echo get_field("form_text", $postID); ?></div>
							</div>
						</div>
						<?php 
						
						foreach($form_fields as $key => $field){
							
							//print_r($key);
							//echo "<br>";
							//print_r($field);
						
						?>

						<?php
						//condtion 
						if($key=="business_name" && $field['show_field']=="yes"){ 
							
						?>

                        <div class="col-12">
                            <div class="form-group">
                                <input name="business_name" id="business_name" class="form-control blue_color"
                                    type="text" placeholder="<?php echo $field['field_label']; ?>" data-rule-required="true"
                                    data-msg-required="שדה חובה." />
                            </div>
						</div>
						<?php }elseif($key=="contact" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="contact_name" id="contact_name" class="form-control blue_color" type="text"
                                    placeholder="<?php echo $field['field_label']; ?>" data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php }elseif($key=="mobile_phone" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="mobile_phone" id="mobile_phone" class="form-control blue_color" type="text"
                                    placeholder="<?php echo $field['field_label']; ?>" data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php }elseif($key=="line_of_business" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="BusinessDescription" id="BusinessDescription"
                                    class="form-control blue_color" type="text" placeholder="<?php echo $field['field_label']; ?>"
                                    data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php }elseif($key=="address" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="address" id="address"
                                    class="form-control blue_color" type="text" placeholder="<?php echo $field['field_label']; ?>"
                                    data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php } ?>


						<?php 
						} //foreach
						
						?>

                        <div class="col-12">
                            <div class="custom-control custom-checkbox text-right">
                                <input type="checkbox" class="custom-control-input" id="customCheck3"
                                    name="customCheck2" />
                                <label class="custom-control-label" for="customCheck3">
									<?php echo get_field("form_agree_text", $postID); ?>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="form_package_type" value="<?php  echo $get_orign; ?>">

                        <input type="hidden" name="crm_product_id" value="<?php echo $pCode; ?>">

                        <input type="hidden" name="form_origin" value="<?php echo $form_origin; ?>">
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                        <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>">
                        <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>">
                        <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>">
                        <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>">
                        <div class="co-12">
                            <button type="submit" class="submit-btn btn gradient_btn font-Bold blue_color"><?php echo get_field("form_button_text", $postID); ?>
                                <span>&gt;</span></button>
                        </div>
                    </form>
					<p class="bottom_p white_color">
                   <!-- **   למצטרפים חדשים חבילת B144  במבצע של 50% על יחידות פרסום ל 3 חודשים הראשונים . עד ל 600 חבילות  או ה 10.9 המוקדם מבניהם.  <br>-->
				   <?php echo get_field("form_info_text", $postID); ?> <br>
					   <a href="<?php echo get_field("form_subject_to_the_terms_url", $postID); ?>" target="_blank"><?php echo get_field("form_subject_to_the_terms_text", $postID); ?></a>
                    </p>
                </div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<style>
				/*=====Mobile popup Css Start=====*/
				.modal-content {
					background: #17244e;
				}
				/*=====Mobile popup Css End=====*/
			</style>


            <div class="col-lg-3 left-box">
                <div class="form-container form-desktop text-center" style="z-index:99999999;">
                    <form id="contactform" class="contact-form">
                        <div class="col-12">
                            <div class="title-box">
                                <h3 class="heading">
                                    <b class="font-Bold"><?php echo get_field("form_heading", $postID); ?></b> <br />
									<?php echo get_field("form_sub_heading", $postID); ?>
                                </h3>
								<div class="sub-heading"><?php echo get_field("form_text", $postID); ?></div>
                            </div>
                        </div>
						<?php 
						
						foreach($form_fields as $key => $field){
							//print_r($key);
							//echo "<br>";
							//print_r($field);
						
						?>

<?php
						//condtion 
						if($key=="business_name" && $field['show_field']=="yes"){ 
							
						?>

                        <div class="col-12">
                            <div class="form-group">
                                <input name="business_name" id="business_name" class="form-control blue_color"
                                    type="text" placeholder="<?php echo $field['field_label']; ?>" data-rule-required="true"
                                    data-msg-required="שדה חובה." />
                            </div>
						</div>
						<?php }elseif($key=="contact" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="contact_name" id="contact_name" class="form-control blue_color" type="text"
                                    placeholder="<?php echo $field['field_label']; ?>" data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php }elseif($key=="mobile_phone" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="mobile_phone" id="mobile_phone" class="form-control blue_color" type="text"
                                    placeholder="<?php echo $field['field_label']; ?>" data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php }elseif($key=="line_of_business" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="BusinessDescription" id="BusinessDescription"
                                    class="form-control blue_color" type="text" placeholder="<?php echo $field['field_label']; ?>"
                                    data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php }elseif($key=="address" && $field['show_field']=="yes"){ ?>

						<div class="col-12">
                            <div class="form-group">
                                <input name="address" id="address"
                                    class="form-control blue_color" type="text" placeholder="<?php echo $field['field_label']; ?>"
                                    data-rule-required="true" data-msg-required="שדה חובה." />
                            </div>
						</div>

						<?php } ?>
						


						<?php 
						} //foreach
						
						?>

                        <div class="col-12">
                            <div class="custom-control custom-checkbox text-right">
                                <input type="checkbox" class="custom-control-input" id="customCheck2"
                                    name="customCheck2" />
                                <label class="custom-control-label" for="customCheck2">
								<?php echo get_field("form_agree_text", $postID); ?>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="form_package_type" value="<?php  echo $get_orign; ?>">

                        <input type="hidden" name="crm_product_id" value="<?php echo $pCode; ?>">

                        <input type="hidden" name="form_origin" value="<?php echo $form_origin; ?>">
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                        <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>">
                        <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>">
                        <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>">
                        <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>">
                        <div class="co-12">
                            <button type="submit" class="submit-btn btn gradient_btn font-Bold blue_color"><?php echo get_field("form_button_text", $postID); ?>
                                <span>&gt;</span></button>
                        </div>
                    </form>
                    <p class="bottom_p white_color">
                   <!-- **   למצטרפים חדשים חבילת B144  במבצע של 50% על יחידות פרסום ל 3 חודשים הראשונים . עד ל 600 חבילות  או ה 10.9 המוקדם מבניהם.  <br>-->
				   <?php echo get_field("form_info_text", $postID); ?> <br>
					   <a href="<?php echo get_field("form_subject_to_the_terms_url", $postID); ?>" target="_blank"><?php echo get_field("form_subject_to_the_terms_text", $postID); ?></a>
                    </p>
                </div>
			</div>
				<?php
					$form_sub_btn_bg_gd_clr = get_field("form_button_gradient_color", $postID);
					if($form_sub_btn_bg_gd_clr){
						$form_sub_btn_bg_gd_clr = explode(",", $form_sub_btn_bg_gd_clr);
						$form_sub_btn_bg_gd_clr_1 = $form_sub_btn_bg_gd_clr[0];
						$form_sub_btn_bg_gd_clr_2 = $form_sub_btn_bg_gd_clr[1];

					}else{
						$form_sub_btn_bg_gd_clr_1 = "#ff495c";
						$form_sub_btn_bg_gd_clr_2 = "#ff692f";

					}
				?>
		
				<style>
				/*=====left-form-box-css-start=====*/

				.main .left-box {
					background-color: <?php echo get_field("form_background_color", $postID); ?> !important;
					}
				.form-container .title-box .heading {
					color: <?php echo get_field("form_heading_color", $postID); ?>;
					}
				.form-container .sub-heading {
					font-size: <?php echo get_field("form_sub_heading_font_size", $postID); ?>px;
					color: <?php echo get_field("form_sub_heading_color", $postID); ?>;
					}
				.form-container .custom-control-label {
					font-size: <?php echo get_field("text_font_size", $postID); ?>px;
					color: <?php echo get_field("form_text_color", $postID); ?>;
				}
				.form-container .submit-btn {
					font-size: <?php echo get_field("form_button_text_font_size", $postID); ?>px;
					background-color: <?php echo get_field("form_button_color", $postID); ?>;
					background-image: linear-gradient(to right, <?php echo $form_sub_btn_bg_gd_clr_1; ?>, <?php echo $form_sub_btn_bg_gd_clr_2; ?>);
				}
				.form-container .bottom_p {
					font-size: <?php echo get_field("form_info_text_font_size", $postID); ?>px;
					color: <?php echo get_field("form_info_text_color", $postID); ?>;
				}

				/*=====left-form-box-css-end=====*/
				</style>

        </div>
    </div>


    <script src="<?php echo get_template_directory_uri(); ?>/box/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/box/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/box/js/validate.min.js"></script>
    <script type="text/javascript"
        src="https://digital.b144.co.il/common/accessibility/accessibility.load.js?location=left&theme=white&btnSize=small&btnSelecteor=.header_accessiblity_new&env=prod">
    </script>
    <!-- <script type="text/javascript" src="//digital.b144.co.il/common/accessibility/accessibilityV2.js"></script> -->
    <script type="text/javascript">
            jQuery(document).ready(function(e){e(".content-opner").click(function(){e(this).parent().find(".content-hide").slideToggle(),e(this).parent().toggleClass("open")}),e(".pack-price-tag .btn").click(function(){var t=e(this).parent();console.log(t.parent().parent());var n=e(this).data("product"),o=e(this).data("origin");e("#product_code").val(n),e("#product_origin").val(o),e(".pack-price-tag.open").length>0?(e(".pack-price-tag.open").addClass("formcontentnow"),e(".pack-price-tag.open").removeClass("open"),e(t).parent().parent().removeClass("open"),e("#reset").trigger("click"),e(".package-content .price-form .form-control.wpcf7-not-valid").removeClass("wpcf7-not-valid"),setTimeout(function(){e(".pack-price-tag.formcontentnow .price-form #package_frm").appendTo(t.find(".price-form")),e(".pack-price-tag.formcontentnow").removeClass("formcontentnow"),t.parent().parent().addClass("open")},300)):e("#package_frm").appendTo(t.find(".price-form")),setTimeout(function(){t.addClass("open"),t.parent().parent().addClass("open")},500)}),e(".form-close").click(function(){e(this).parent().parent().parent().removeClass("open"),e(this).parent().parent().parent().parent().parent().removeClass("open");var t=e(this).parent().parent().parent();setTimeout(function(){e("#reset").trigger("click"),e(".package-content .price-form .form-control.wpcf7-not-valid").removeClass("wpcf7-not-valid"),t.find(".price-form #package_frm").appendTo(e("#initialdiv"))},300)})}),document.addEventListener("wpcf7mailsent",function(e){if("2310"==e.detail.contactFormId){console.log("2310");var t=e.detail.inputs;jQuery.ajax({url:"<?php echo get_site_url(); ?>/send_ajax.php",type:"post",data:t,success:function(e){console.log(t),console.log(e)}})}"2298"==e.detail.contactFormId&&$(".digital-form .form-box").html("<h4>תודה! הפרטים שלך הועברו בהצלחה.</h4>")},!1);
        </script>

    <script>
        jQuery(document).ready(function ($) {
			
			
			$('.panel-heading a').click(function () {
				$('.panel-collapse').collapse('hide');
			});


            $(".scrollDown").click(function () {
                $('html, body').animate({
                    scrollTop: $("#contactform").offset().top
                }, 2000);


            });

            $('#contactform').validate({
                highlight: function (element) {
                    $(element).addClass('error');
                },
                unhighlight: function (element) {
                    $(element).removeClass('error');
                },

                submitHandler: function () {
					//alert("hello");
                    $('.contactform .submit-btn').attr('disabled', 'disabled');
                    $.post('https://digital.b144.co.il/lp/email-contact-email.php',
                        $("#contactform").serialize(),
                        function (data) {
                            console.log(data);
							//alert(data.msg);
                            if (data.msg == 'Sent') {
                                $("#contactform").html(
                                    '<div class="col-12"> <div class="title-box"><h3 class="blue_color text-white">הפרטים שלך נשלחו בהצלחה, נחזור אליך בקרוב.</h3> <br> <a href="/lp/2020/new/documentation.pdf" onclick="dataLayer.push({\'event\':\'pdf_download\', \'form_name\':\'lp-package\'})" class="btn-submit gradient_btn documentation">להורדת המדריך לחצו כאן <span>&gt;</span></a></div></div>'
                                    );
                                dataLayer.push({
                                    'event': 'formsuccessful',
                                    'formtype': '',
                                    'formname': '<?php echo the_title(); ?>'
                                })
                            } else {

                                $('.contact_us_form_desktop .submit-btn').removeAttr(
                                "disabled");

                            }


                        }, "json");



                }

            });

			$('#mobilecontactform').validate({
                highlight: function (element) {
                    $(element).addClass('error');
                },
                unhighlight: function (element) {
                    $(element).removeClass('error');
                },

                submitHandler: function () {
                    $('.mobilecontactform .submit-btn').attr('disabled', 'disabled');
                    $.post('https://digital.b144.co.il/lp/email-contact-email.php',
                        $("#mobilecontactform").serialize(),
                        function (data) {
                            console.log(data);
                            if (data.msg == 'Sent') {
                                $("#mobilecontactform").html(
                                    '<div class="col-12"> <div class="title-box"><h3 class="blue_color text-white">הפרטים שלך נשלחו בהצלחה, נחזור אליך בקרוב.</h3> <br> <a href="/lp/2020/new/documentation.pdf" onclick="dataLayer.push({\'event\':\'pdf_download\', \'form_name\':\'lp-package\'})" class="btn-submit gradient_btn documentation">להורדת המדריך לחצו כאן <span>&gt;</span></a></div></div>'
                                    );
                                dataLayer.push({
                                    'event': 'formsuccessful',
                                    'formtype': '',
                                    'formname': '<?php echo the_title(); ?>'
                                })
                            } else {

                                $('.contact_us_form_desktop .submit-btn').removeAttr(
                                "disabled");

                            }


                        }, "json");



                }

            });
			
        });
	</script>
	<?php get_footer("box");?>