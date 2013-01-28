<!-- start bottom content -->
<div><?php echo "<img src='".get_bloginfo("template_directory")."/images/hr_mid.png' alt='Middle HR' />"; ?></div>
<div id="content_bottom">
    <div id="contact_us">
    	<h3 class="textheader"><?php echo "Contact Us"; ?></h3>
        <?php echo "<p><strong>Tel</strong>: +971 4 3393208</p>
<p><strong>Fax:</strong> +971 4 3392586</p>
<p><strong>Email:</strong> <a href='mailto:info@biston.net?subject=Inquiry'>info@biston.net</a></p>"; ?>
  </div>
    <div id="latest_blog_posts">
    	<?php if(false): ?>
        <h3 class="textheader">Latest News</h3>
        <ul id="latest_blog_list">
        <li class="latest_blog_post"><a href="#"><span class="latest_blog_date">10.13.08</span><span class="latest_blog_entrytitle">New Project</span><span class="latest_blog_comments">(No Comments)</span></a></li>
        <li class="latest_blog_post"><a href="#"><span class="latest_blog_date">10.13.08</span><span class="latest_blog_entrytitle">New Project</span><span class="latest_blog_comments">(No Comments)</span></a></li>
        <li class="latest_blog_post"><a href="#"><span class="latest_blog_date">10.13.08</span><span class="latest_blog_entrytitle">New Project</span><span class="latest_blog_comments">(No Comments)</span></a></li>
        <li class="latest_blog_post"><a href="#"><span class="latest_blog_date">10.13.08</span><span class="latest_blog_entrytitle">New Project</span><span class="latest_blog_comments">(No Comments)</span></a></li>
        </ul>
        <?php endif; ?>
    </div>
    <div id="newsletter">
        <h3 class="textheader"><?php echo "Stay Updated" ?></h3>
		<?php echo '<p style="line-height:24px; text-align:justify;
text-justify:inter-word;"><span style="font-size:18px">SUBSCRIBE NOW</span><br />
and get the latest updates from us</p>'; ?>
		<form id="subscriptionForm" class="left" action="<?php echo site_url('subscription/subscribe') ?>">
        	<input type="text" name="email" class="auto-clear left" size="22"/>
        </form>
        <div class="button right"><a href="javascript:void(0);" class="subscribeBtn"><span>Add</span></a></div>
    </div>
</div>
<!-- end bottom content -->