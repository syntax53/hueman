<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <?php wp_head(); $blog_desc = is_front_page() ? get_bloginfo('description') : wp_title('', FALSE); if (!empty($blog_desc)) { $blog_desc = " | ".$blog_desc; } ?>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" id="viewport" content="width=<?php echo ot_get_option('container-width'); ?>">
    <script type="text/javascript">
		if (screen.width < 481) {
			var mvp = document.getElementById('viewport');
			mvp.setAttribute('content','width=device-width, initial-scale=1');
		}
	</script>
	<title><?php bloginfo('name'); echo $blog_desc; ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
</head>

<body <?php body_class(); ?>>
<div id="wrapper">

	<header id="header">
	
		<?php if ( has_nav_menu('topbar') ): ?>
			<nav class="nav-container group" id="nav-topbar">
				<div class="nav-toggle"><i class="fa fa-bars"></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
				
				<div class="container">
					<div class="container-inner">		
						<div class="toggle-search"><i class="fa fa-search"></i></div>
						<div class="search-expand">
							<div class="search-expand-inner">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div><!--/.container-inner-->
				</div><!--/.container-->
				
			</nav><!--/#nav-topbar-->
		<?php endif; ?>
		
		<div class="container group">
			<div class="container-inner">
            	<div class="header_logos">
                    <div class="header_left">
                        <?php if ( ot_get_option('header-image') == '' ): ?>
                            <div class="group pad">
                                <?php echo alx_site_title(); ?>
                                <?php if ( ot_get_option('site-description') != 'off' && !empty(bloginfo( 'description' )) ): ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( ot_get_option('header-image') ): ?>
                            <a href="<?php echo home_url('/'); ?>" rel="home">
                                <img class="site-image" src="<?php echo ot_get_option('header-image'); ?>" alt="<?php get_bloginfo('name'); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
					<?php if (file_exists(get_stylesheet_directory() . '/sites/'.asd_custom_identify_site().'/header.php' ) ) {
							include( get_stylesheet_directory() . '/sites/'.asd_custom_identify_site().'/header.php' );
						}
					?>
                </div>
				<?php if ( has_nav_menu('header') ): ?>
					<nav class="nav-container group" id="nav-header">
						<div class="nav-toggle"><i class="fa fa-bars"></i></div>
						<div class="nav-text"><!-- put your mobile menu text here --></div>
						<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'header','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
                        <div class="container">
                            
                            <?php //$layout = alx_layout_class();	if ( $layout == 'col-1c'): ?>
                            <div class="container-inner">		
                                <div class="toggle-search"><i class="fa fa-search"></i></div>
                                <div class="search-expand">
                                    <div class="search-expand-inner">
                                        <?php get_search_form(); ?>
                                    </div>
                                </div>
                            </div><!--/.container-inner-->
                            <?php //endif; ?>
                        </div><!--/.container-->
					</nav><!--/#nav-header-->
				<?php endif; ?>
			</div><!--/.container-inner-->
		</div><!--/.container-->
		
	</header><!--/#header-->
	
	<div class="container" id="page">
		<div class="container-inner">			
			<div class="main">
            	<!--[if lt IE 9]>
                    <div style="background: #F4F4F4; padding: 12px 15px; color: #7E7E7E;">Your internet browser is outdated. <a href="http://browsehappy.com/">Upgrade to a newer browser</a> to experience this site as designed. If you believe this may be an error, try <a href="//www.abington.k12.pa.us/information/how-to-turn-off-internet-explorer-compatibility-mode/">turning off compatibility mode</a>.</div>
                <![endif]-->
                <?php if ($_SERVER['HTTP_HOST'] == 'w3.abington.k12.pa.us'): ?>
                	<div style="background: #F4F4F4; padding: 12px 15px; font-size:18px; font-weight:bold; color: #E40003;">
                    	<span style="font-weight:bolder;">NOTE:</strong> You are viewing the ASD Development Website.
                    </div>
                <?php endif; ?>
				<div class="main-inner group">