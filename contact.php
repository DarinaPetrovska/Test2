<?php
	/*
Template Name: Kontakt
*/
?>
<?php get_header('in'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<!--main-->
<div class="main background_none">
	
	<article class="cases_text_wrap cases_tabs_txt">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
				 <?php the_content();?>
				</div>
			</div>
		</div>
	</article>
    
	<div class="form">
		<div class="container">			
			<?php echo do_shortcode( '[contact-form-7 id="124" title="Test"]' ); ?>			
		</div>
	</div>
	
</div>
<!--end-main-->   
<?php endwhile; endif; ?>		
<?php get_footer(); ?>