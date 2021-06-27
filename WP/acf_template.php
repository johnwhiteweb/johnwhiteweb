	<?php
	$sections = get_field('sections', $postID);
	//print_r($sections);

	foreach ($sections as $key => $value) {
		#print_r($key);
		//echo "----------------<br />";
	?>

    
		<?php
		if ($value['type'] == 'Top Banner') {
			//print_r($value);
		?>

<?php
		} //if
?>
<?php if ($value['top_banner']['top_banner_bg'] !== '') { ?>



    <?php
		} //if
?>

<?php 	} //  foreach
?>
