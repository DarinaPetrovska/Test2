<?php
	/*
Template Name: Page
*/
?>
<?php get_header(''); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>  
<!--main-->   
    <div class="main">
         <div class="container">
            <?php the_content();?>
         </div> 
    </div> 
<!--end-main-->    
<?php endwhile; endif; ?>		
<?php get_footer(''); ?>