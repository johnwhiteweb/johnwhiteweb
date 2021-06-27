// 	$sub_title = get_field('sub_title', $item->ID);

// 	if( strlen($sub_title) > 0 || $sub_title ){
// 		$content = substr($sub_title, 0, strpos($sub_title, ' ', 20));
// 	}else{
// 		$content=strpos($item->post_content, ' ', 100);
// 		$content = strip_tags($item->post_content);
// 		$content = substr($content, 0, 100);

// }

// $sub_title = get_field('sub_title', $item->ID);
// $sub_length = strlen($sub_title);

// if(!empty($sub_title)){
// 	if($sub_length<20){
// 		$content = substr($sub_title, 0, strpos($sub_title, ' ', 19));
// 		// echo 'short sub: '.$sub_length."\n";
// 	}
// 	if($sub_length >= 20 && $sub_length<37 ){
// 		$content = substr($sub_title, 0, strpos($sub_title, ' ', 20));
// 		// echo 'med sub1: '.$sub_length."\n";
// 	}
// 	if($sub_length >= 37 && $sub_length < 100 ){
// 		$content = substr($sub_title, 0, strpos($sub_title, ' ', 50));
// 		// echo 'med sub2: '.$sub_length."\n";
// 	}
// 	if($sub_length >= 100 ){
// 		$content = substr($sub_title, 0, strpos($sub_title, ' ', 100));
// 				// echo 'huge sub: '.$sub_length."\n";	
// 	}

// }else{