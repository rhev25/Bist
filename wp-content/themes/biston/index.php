<?php get_header();
	
	if(is_home() AND !is_search()){
		include_once(dirname(__FILE__)."/ext/home.php");
	}
	elseif(is_single())
	{
		include_once(dirname(__FILE__)."/ext/single.php");
	}
	else{
		include_once(dirname(__FILE__)."/ext/page.php");
	}	

get_footer(); ?>