<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="initial-scale=1"/>
		<title><?php wp_title(); ?></title>
		<!--Favicon-->
         <?php
  	$favicon = ot_get_option( 'favicon' );
	if($favicon){ ?>
			<link rel="icon" type="image/png" href="<?php echo esc_url( $favicon ); ?>"><?php } ?>      
		<!--End Favicon-->
		<!--[if IE]>  
				<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>  
			<![endif]--> 
		<?php wp_head();?>
	</head>
<body>
<div class="wrapper about_page">
<!--load-page-->
<div class="load_page_wrap">
	<div class="container">
		<section>
			<?php if ( ot_get_option( 'load_url' ) ) : $load_url = ot_get_option( 'load_url' ); ?><a href="<?php echo ( $load_url );?>" class="load_logo"><?php endif; ?><?php if ( ot_get_option( 'load_logo' ) ) : $load_logo = ot_get_option( 'load_logo' ); ?><img src="<?php echo ( $load_logo );?>" alt=""><?php endif; ?></a>
			<div class="typed-strings"><p>
				<?php if ( ot_get_option( 'load_title' ) ) : $load_title = ot_get_option( 'load_title' ); ?><span class="load_title"><?php echo ( $load_title );?></span><?php endif; ?>
				<?php if ( ot_get_option( 'load_text' ) ) : $load_text = ot_get_option( 'load_text' ); ?><span class="load_subtitle"><?php echo ( $load_text );?></span><?php endif; ?>
			</p></div>
			<div class="load_text"></div>
		</section>	
	</div>
</div>
<!--end-load-page-->
<!--header-->
<header class="header">
	<div class="container">
		<?php if ( ot_get_option( 'logo' ) ) : $logo = ot_get_option( 'logo' ); ?><a href="/" class="logo"><img src="<?php echo ( $logo );?>" alt=""></a><?php endif; ?>
		<nav class="head_menu">
			<ul>
				<?php if(!dynamic_sidebar('menu')): ?><?php endif;?>	
			</ul>
		</nav>
		<div class="menu_item">
			<div class="hamburger hamburger--spin">
			  <div class="hamburger-box">
			    <div class="hamburger-inner"></div>
			  </div>
			</div>
		</div>
	</div>
</header>
<div class="fixed_menu_overlay"></div>
<div class="fixed_menu">
	<div class="fixed_menu_inner">
		<div class="fixed_menu_top">
			<?php if ( ot_get_option( 'logo_text' ) ) : $logo_text = ot_get_option( 'logo_text' ); ?><a href="/" class="logo_text"><img src="<?php echo ( $logo_text );?>" alt=""></a><?php endif; ?>
			<div class="menu_item">
				<div class="hamburger hamburger--spin">
				  <div class="hamburger-box">
				    <div class="hamburger-inner"></div>
				  </div>
				</div>
			</div>
		</div>	
		<nav>
			<ul>
				<?php 
					$page_id = get_the_ID();
					$menu_items = carat_get_menu_items('top-menu');					
					$top_menu=array();
					if(isset($menu_items)){
						$is_sub=0;
						$id=0;
						foreach ( (array) $menu_items as $key => $menu_item ) {
							if ($menu_item->object_id == $page_id){$active='1';}else{$active='0';}
								if($menu_item->menu_item_parent!=0){
									$top_menu[$id]['children'][$menu_item->ID]=array('title'=>$menu_item->title,'url'=>$menu_item->url);
								}else{
									$id=$menu_item->object_id;
									$top_menu[$id]=array('active'=>$active,'title'=>$menu_item->title,'url'=>$menu_item->url);
								}
							}
						}
						foreach ( (array) $top_menu as $key => $menu_item ) {
							if($menu_item['active']==1){$active='active';}else{$active='';}
							if(is_array($menu_item['children'])){$is_children='menuparent has-regularmenu';}else{{$is_children='';}}
							echo "<li class='$active $is_children'><a class='$active $is_children' href='".$menu_item['url']."'>".$menu_item['title']."</a>";
							if(is_array($menu_item['children'])){
								echo '<ul>';
									foreach ( (array) $menu_item['children'] as $key => $menu_sub_item ) {
										echo "<li ><a  href='".$menu_sub_item['url']."'>".$menu_sub_item['title']. "</a>";
									}
									echo '</ul>';
								}
								echo "</li> ";
							} 
							?>	
			</ul>
			<ul>
				<?php if ( ot_get_option( 'contact_left_menu' ) ) : $contact_left_menu = ot_get_option( 'contact_left_menu' ); ?><?php echo ( $contact_left_menu );?><?php endif; ?>
			</ul>
		</nav>
	</div>
</div>
<div class="prestashop_fixed">
            <?php if ( ot_get_option( 'partner_url' ) ) : $partner_url = ot_get_option( 'partner_url' ); ?><a href="<?php echo ( $partner_url );?>"><?php endif; ?>
            <?php if ( ot_get_option( 'partner_img' ) ) : $partner_img = ot_get_option( 'partner_img' ); ?><img src="<?php echo ( $partner_img );?>" alt=""><?php endif; ?>
            <?php if ( ot_get_option( 'partner_text' ) ) : $partner_text = ot_get_option( 'partner_text' ); ?><span><?php echo ( $partner_text );?></span><?php endif; ?></div>
<div class="pencil">
	 <?php if ( ot_get_option( 'question_url' ) ) : $question_url = ot_get_option( 'question_url' ); ?><a href="<?php echo ( $question_url );?>"><?php endif; ?>
		<?php if ( ot_get_option( 'question_img' ) ) : $question_img = ot_get_option( 'question_img' ); ?><img src="<?php echo ( $question_img );?>" alt=""><?php endif; ?>
        <?php if ( ot_get_option( 'question_text' ) ) : $question_text = ot_get_option( 'question_text' ); ?><span><?php echo ( $question_text );?></span><?php endif; ?>
	</a>
</div>
<!--end-header-->     