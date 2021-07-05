<?php

function getusercountrycode(){
	$ip = $_SERVER['REMOTE_ADDR'];
	$ch = curl_init();
	$curlConfig = array(
	    CURLOPT_URL            => "http://www.geoplugin.net/json.gp?ip=".$ip,
	    CURLOPT_POST           => true,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_POSTFIELDS     => false
	);
	curl_setopt_array($ch, $curlConfig);
	$result = curl_exec($ch);
	curl_close($ch);
	$json_a=json_decode($result,true);
	$countrycode = $json_a['geoplugin_countryCode'];
	return $countrycode;
}


	
			//jQuery(document).on('click', '.BuyNowButton a,.buy_now_action', function(e){
				//e.preventDefault();
				var countryId = '<?= getusercountrycode() ?>';
				//console.log ("Country=" + countryId);
				var link = '';
				

				$.ajax({
					url: 'https://api.ipstack.com/check?access_key=7fd59cb421f5e5bf71eb68e7ac8ad605&format=2&language=en&outpu=json',   
					dataType: 'jsonp',
					success: function(json) {

						countryId = json.country_code;
						if(localStorage.getItem('country-ck')!=1)
						localStorage.setItem('country-ck', 0);

						console.log(countryId);
						
					
						
				if(countryId == 'CN'){
					link = 'https://www.fitboxx.com/en/beauty-apps/brand-beauty/silkn-beauty.html';
				}else if(countryId == 'USA' || countryId == 'US'){
					link = 'https://silkn.com/products/toothwave-with-dentalrf-technology-toothbrush?_pos=1&_sid=2c0982f78&_ss=r';
				}else if(countryId == 'CA'){
					link = 'https://silkn.ca/products/toothwave/?';
				}else if( countryId == 'HK'){
					link = 'https://silkn.ca/products/toothwave?_pos=1&_sid=207e6f917&_ss=r';
				}else if(countryId == 'EU'){
					link = 'https://silkn.eu/eu/silkn-toothwave';
				}else if(countryId == 'JP'){
					link = 'http://silkn.jp/products/wave/';
				}else if(countryId == 'IL'){
					link = 'https://www.silkn.co.il/tooth-wave.html/';
				}else if(countryId == 'SG'){
					link = 'https://www.silknasia.com/products/silk-n-toothwave-first-rf-dental-technology-electronic-toothbrush?category=dental-care';
				}else{
					//jQuery('.BuyNowButton a').click();
				}
				
				
				if(countryId == 'CA' && !sessionStorage.getItem('country-ck') && $('body').hasClass('strollik-front-page')){
					sessionStorage.setItem('country-ck', 1);
					let newLink = 'https://www.toothwave.com/en-CA/'
					createCookie("wp-wpml_current_language","en-CA",1);
					window.location.replace(newLink); 
				}
				