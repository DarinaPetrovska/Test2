<?php
	/*
Template Name: Main page
*/
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>    
<!--main-->
<div class="main">	

	<div class="slogan">
		<div class="container">
			<article>
				 <?php the_content();?>
			</article>
			<div class="coffce cofce-hover" style="background: url(<?php the_field('text_map2_b'); ?>) no-repeat scroll 25px 48px;">
				<a href="<?php the_field('map'); ?>">
					<?php the_field('text_map'); ?>	
				</a>
			</div>	
		</div>	
    </div>
    
	<div class="ad_text_wrap wow fadeInUp"  >
		<div class="container">
			<section style="background: url(<?php the_field('text_b'); ?>) no-repeat bottom right;">
			<?php the_field('text'); ?>		
			</section>
		</div>
	</div>

	<div class="photo_grid">
		 <div class="container">
        <?php
            $args=array(                       
                'post_type' => 'project', 
                'orderby' => 'rand',
                'posts_per_page' => -1
                 );
                                     
            $query = new WP_Query( $args );
            $c =0;
            $k =0;
            while ( $query->have_posts() ) :$query->the_post();
        ?> 
        <?php $checkbox = get_field("checkbox1");
              if( $checkbox[0] == 'show' ) {?>
            <?php 
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                $img_url = $thumb['0'];
                echo '<a href="'.get_bloginfo("template_url").'/timthumb.php?h=400&src='.$img_url.'" '; ?>
                class="fancybox wow fadeInUp" data-fancybox-group="grid" <?php if($c==0){echo '';} else{echo 'data-wow-delay="0.'.$c.'s"';} ?>>
                  <?php
                        $k++;
                        $b=($k % 3);
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                        $img_url = $thumb['0'];
                        $checkbox2 = get_field("checkbox2");
                        $c++;    
                        if( $checkbox2[0] == 'Yes' && $b != 0 ){$c=$c+1; }
                        if( $checkbox2[0] == 'Yes' && ($k % 3) != 0 ){ $k=$k+1;}          
                    
                        if( $checkbox2[0] == 'Yes' && $b == 1 ){echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?h=429&w=860&q=100&src='.$img_url.'" alt="">';} 
                        elseif( $checkbox2[0] == 'Yes' && $b == 2 ){echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?h=429&w=860&q=100&src='.$img_url.'" alt="">';} 
                        elseif($checkbox2[0] == 'Yes'&& $b == 0) {echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?h=429&w=430&q=100&src='.$img_url.'" alt="">'; } 
                        else{echo '<img src="'.get_bloginfo("template_url").'/timthumb.php?h=429&w=430&q=100&src='.$img_url.'" alt="">';} 
                     ?>
                    <div>
        				<span>
        					<?php the_title(); ?></br>
                            <em>Se case</em>
        				</span>
                    </div>
    			</a>
               
                   <?php }                     
                       if ($c>=9 ){
						  break;
						}                    
						endwhile;
					?>	
			
        <?php wp_reset_query(); ?> 
     </div>	
	</div>

	<div class="see_all wow fadeInUp"  data-wow-duration="2s"">
		<div class="container text_center">
			<?php the_field('se_alle_text');  ?>
		</div>	
	</div>
	
</div>
<!--end-main-->
<?php endwhile; endif; ?>		
<?php get_footer(); ?>