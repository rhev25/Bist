<?php get_header(); ?>
<?php global $post; ?>
    <div id="banner">   
	<?php if ( $post->post_parent == 'projects' ) {    
    // the page is "About", or the parent of the page is "About"
    echo"<img src='".get_bloginfo("template_directory")."/images/projects_banner.jpg' />"; }?>

	</div>

    <div id="content">
		<div id="portfolio_view_content" class="left-col">
        <?php while ( have_posts() ) : the_post(); ?>
        	<h3><?php the_title();?></h3>
            <p class="description"></p>
            <p><?php the_content();?></p>
            <p></p>
            <table class="projectDescription">
            	<tbody>
                	
                	<?php $main_cont = get_post_meta($post->ID, 'main_cont', true); // Get Main Contractor ?>
					<?php
                        if($main_cont != '') {
						echo  "<tr><td class='fieldName'>Main Contractor</td><td>".$main_cont."</td></tr>";
						} 
                    ?>
                    <?php $client = get_post_meta($post->ID, 'client', true); // Get Client ?>
					<?php
                        if($client != '') {
						echo  "<tr><td class='fieldName'>Client</td><td>".$client."</td></tr>";
						} 
                    ?>
                    <?php $end_user = get_post_meta($post->ID, 'end_user', true); // Get End User ?>
					<?php
                        if($end_user != '') {
						echo  "<tr><td class='fieldName'>End User</td><td>".$end_user."</td></tr>";
						} 
                    ?>
                    <?php $consultant = get_post_meta($post->ID, 'consultant', true); // Get Consultant ?>
					<?php
                        if($consultant != '') {
						echo  "<tr><td class='fieldName'>Consultant</td><td>".$consultant."</td></tr>";
						} 
                    ?>
                    <?php $location = get_post_meta($post->ID, 'location', true); // Get Location ?>
					<?php
                        if($location != '') {
						echo  "<tr><td class='fieldName'>Location</td><td>".$location."</td></tr>";
						} 
                    ?>
                    <?php $scope_of_work = get_post_meta($post->ID, 'scope_of_work', true); // Get Scope of Work ?>
					<?php
                        if($scope_of_work != '') {
						echo  "<tr><td class='fieldName'>Scope of Work</td><td>".$scope_of_work."</td></tr>";
						} 
                    ?>
                    <?php $duration = get_post_meta($post->ID, 'duration', true); // Get Duration ?>
					<?php
                        if($duration != '') {
						echo  "<tr><td class='fieldName'>Duration</td><td>".$duration."</td></tr>";
						} 
                    ?>
                    <?php $status = get_post_meta($post->ID, 'status', true); // Get Status ?>
					<?php
                        if($status != '') {
						echo  "<tr><td class='fieldName'>Status</td><td>".$status."</td></tr>";
						} 
                    ?>
                </tbody>
            </table>
            		<div id="imageBox"><div class="imageContainer"><?php the_post_thumbnail(); ?></div></div>
           <?php endwhile; ?>
        </div> <?php //end of project content ?>
        
        <div id="portfolio_introtext" class="right-col">
        	<h3 class="title">Our Projects</h3>
            <div id="projectShortCut">
           		<?php if(is_active_sidebar("side-bar-1")){
			dynamic_sidebar("side-bar-1");} 	 ?>
            </div>
        </div>   
    </div>
<?php get_footer(); ?>