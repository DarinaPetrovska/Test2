<!--footer-->
<footer class="footer">
	<div class="container">
    <div class="float_left">
			<?php if(!dynamic_sidebar('contact_f1')): ?><?php endif;?>
		</div>
		<div class="contact_us">
			<?php if(!dynamic_sidebar('contact_f2')): ?><?php endif;?>
		</div>	
		<figure class="prestashop_foot">
            <?php if ( ot_get_option( 'partner_img_footer' ) ) : $partner_img_footer = ot_get_option( 'partner_img_footer' ); ?><img src="<?php echo ( $partner_img_footer );?>" alt=""><?php endif; ?>
           <figcaption><?php if(!dynamic_sidebar('contact_f3')): ?><?php endif;?></figcaption>			
		</figure>
	</div>
</footer>
<?php wp_footer(); ?> 
<!--end-footer-->
</div>
</body>
</html>