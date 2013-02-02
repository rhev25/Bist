<?php get_header(); ?>

        <!-- start banner -->
        <div id="banner">
          <?php echo"<img src='".get_bloginfo("template_directory")."/images/biston6.jpg' />"; ?>
        </div>
        <!-- end banner -->
        
        <!-- start content -->    
        <div id="content">
        
            <!-- start introtext -->
            <div id="introtext">
              	<h3></h3>
                <?php echo "<p>The Company started it's activity in year 2006 in construction field as general and steel structure contracting.</p>

<p>Based on the company's highly educated and experienced professionals and also business links with other group of  companies the company is capable of executing any type of steel or concrete projects with any design or complexity to highest quality and standard.</p>

<p>The company within a short period of time could establish high profile in constructing of different sophisticated projects both in RCC and Steel structures.</p>"; ?>
		    </div>
            <!-- start introtext -->
            
            <!-- start latest work -->
            <div id="latestwork">
              <h3>Featured Projects</h3>
              <?php   query_posts( array( 'post_type' => 'projects', 'project_category' => 'featured', 'posts_per_page' => 4 ) );
						  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="latest">
                <div class="portfolio_thumb">
                    <a href="<?php the_permalink(); ?>" title=" " class="imgAnchor">
                        <?php
				 $image_id = get_post_thumbnail_id(); 
				 $image_url = wp_get_attachment_image_src($image_id,$size); ?>
				 <img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>" />
                    </a>
                </div>
                <div class="clear"></div>
                <p class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p class="category"><?php $scope_of_work = get_post_meta($post->ID, 'scope_of_work', true); // Get Scope of Work ?>
					<?php
                        if($scope_of_work != '') {
						echo  $scope_of_work;
						} 
                    ?></p>
				<p class="description"><a href="<?php the_permalink(); ?>" class="readMore">Read more..</a></p>
              </div>
              <?php endwhile; endif; ?>
            </div>
            <!-- end latest work -->
         
        </div>
        <!-- end content -->
          
        <?php include_once(dirname(__FILE__)."/bottom.php"); ?>
		<script>
			var loaderCSS = { 
				border: 'none', 
				padding: '15px', 
				backgroundColor: '#000', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				opacity: .5, 
				color: '#fff' 
			} 
			var myOverlayCSS = {
	 			backgroundColor: '#fff' 
			}
	
			$(".subscribeBtn").click(function(){
				
				var emailStr = $('input[name="email"]').val();
				
				//validate
				if(emailStr ==""){
					alert("Please enter valid email.");
					return false;
				}
			
				$('#newsletter').block({ 
					message: '<h1><img src="images/busy.gif" /></h1>', 
					css: loaderCSS,
					overlayCSS:myOverlayCSS
				}); 
				
				$.ajax({
					url:$("#subscriptionForm").attr("action"),
					type:"post",
					dataType:"json",
					async:true,
					data:{email:emailStr},
					success:function(result){
						$('#newsletter').unblock(); 
					
						if(result['success'] == 1){
							$('input[name="email"]').val("");
							alert(result['message']);
						}
						else{
							alert(result['error']);
						}	
						
					},
					error:function(){
						$('#newsletter').unblock(); 
						alert("Error");
					}
				});
				
				return false;			
			});
		</script>
<?php get_footer(); ?>