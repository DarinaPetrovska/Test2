<?php
	/*
Template Name: Project
*/
?>
<?php get_header('in'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>   
<!--main--> 
<div class="main background_none">
	
	<article class="cases_text_wrap cases_tabs_txt">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php the_content();?>
				</div>
			</div>
		</div>
	</article>
	<nav class="tabs_navigation container">
		<ul class="c-nav-page_list u-background">
        <?php 
                  $term_id = get_queried_object()->term_id;
        		  $taxonomy = 'projects'; 
        		  $term = get_term( $term_id, $taxonomy );
                	$parentcat = $catobject->category_parent; 
                	if($parentcat!=0){ $term_id=$parentcat;}
                	$hiterms = get_terms("projects", array("orderby" => "name", "parent" => 0,'hide_empty'   => 0)); ?>                	
                    <?php foreach($hiterms as $key => $hiterm) :  //розбираємо категорію ?>
                	<?php $loterms = get_terms("projects", array("orderby" => "slug", "parent" => $hiterm->term_id));   ?>
                    <?php $category_link=get_term_link($hiterm); ?>
	        <li>
	            <a href="<?php echo $category_link; ?>" class="c-nav-page_link <?php if($term_id==$hiterm->term_id){echo 'active';}  ?>" >
	                <span class="c-nav-page_link_text"><?php echo $hiterm->name;  ?></span>
	                <sup class="c-nav-page_link_number"><?php  echo $hiterm->count; ?></sup>
	            </a>
	        </li>
            <?php endforeach; ?> 
	      
	    </ul>
	</nav>
    <div class="tab_grid ">
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
           
               <a href="<?php the_permalink();?>">
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
                   
                       <?php                    
                           if ($c>=100 ){
    						  break;
    						}                    
    						endwhile;
    					?>	
    			
            <?php wp_reset_query(); ?> 
         </div>	
    	</div>
       </div> 
	<div class="see_all wow fadeInUp"  data-wow-duration="2s">
		<div class="container text_center">
			<?php the_field('kontakt_os');  ?>
		</div>	
	</div>
	
</div> 
<!--end-main-->	    
<?php endwhile; endif; ?>		
<?php get_footer(''); ?>