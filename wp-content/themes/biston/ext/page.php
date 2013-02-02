<?php get_header(); ?>
  
<?php if(is_page('projects')){
	  while ( have_posts() ) : the_post(); ?>
     
<div id="banner"><?php the_post_thumbnail(); ?></div>
<?php endwhile; // end of the loop. ?>
<div id="content">
	<div id="portfolio_content" class="left-col">
        <ul id="portfolio_list">
     <?php  $temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query('paged='.$paged.'&post_type=projects&posts_per_page=50&orderby=date&order=DESC');
			
			while ($wp_query->have_posts()) : $wp_query->the_post();?>
                <li class="portfolio_item">
                    <div class="portfolio_thumb">
                        <a href="<?php the_permalink(); ?>" title=" " class="imgAnchor">
                             <?php
                             $image_id = get_post_thumbnail_id(); 
                             $image_url = wp_get_attachment_image_src($image_id,$size); ?>
                             <img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" />
                        </a>
                    </div>
                    
                    <div class="portfolio_details">
                            <p class="title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </p>
                    <p class="category"> <?php $scope_of_work = get_post_meta($post->ID, 'scope_of_work', true); // Get Scope of Work ?>
					<?php
                        if($scope_of_work != '') {
						echo  $scope_of_work;
						} 
                    ?></p>
                            <p class="description"></p>
                            <p><?php the_excerpt(); ?></p>
                            <br/><br/>
                            <a href="<?php the_permalink(); ?>" class="readMore">Read more...</a>
                            <p></p>                        
                    </div>
                </li> 
      <?php endwhile; ?>           
        </ul>
    </div>
</div>
<?php } 

else if(is_page('clients')){
	  while ( have_posts() ) : the_post(); ?>
     
<div id="banner"><?php the_post_thumbnail(); ?></div>
<?php endwhile; // end of the loop. ?>
<div id="content">
	<div id="clientsPanel" class="left-col">
    <h3 class="title">List of Clients</h3>
        <ul id="clientList">
     <?php  $temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query('paged='.$paged.'&post_type=clients&posts_per_page=40&orderby=date&order=DESC');
			
			while ($wp_query->have_posts()) : $wp_query->the_post();?>
                <li>
                    <div class="client_thumb">
                       
                             <?php
                             $image_id = get_post_thumbnail_id(); 
                             $image_url = wp_get_attachment_image_src($image_id,$size); ?>
                             <img src="<?php echo $image_url[0]; ?>" class="autoSizeImage" alt="<?php //the_title(); ?>" />
                       
                    </div>
                    
                            <p class="title">
                                <?php the_title(); ?>
                            </p>
                    
                </li> 
      <?php endwhile; ?>           
        </ul>
    </div>
</div>
<?php } else {?>
    
<?php while ( have_posts() ) : the_post(); ?>
     
<div id="banner"><?php the_post_thumbnail(); ?></div>
<div id="content">
<?php the_content();?>
</div>
<?php endwhile; } // end of the loop.
get_footer(); ?>