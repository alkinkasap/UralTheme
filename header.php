<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>
		<?php $blogs_title = of_get_option('blog_title');   if ($blogs_title) { 
		 echo of_get_option( 'blog_title', 'no entry' ); 
		 } else { 
				global $page, $paged;
				wp_title( '|', true, 'right' );
				bloginfo( 'name' );
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
				if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', 'ural' ), max( $paged, $page ) );
				 } ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/font-awesome/css/font-awesome.min.css">	
	<!-- 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,800italic,400,800' rel='stylesheet' type='text/css'> 
	-->
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-min.js"></script>
	<script src ="<?php bloginfo('template_directory'); ?>/js/jquery.sticky.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script>

		$(document).ready(function(){
			$("#sticker").sticky({topSpacing:0});
		});
	</script>

<style>
	html,
	body{
		font-size: 1.1em;
		height: 100%;
		/*background-color: #34495e;*/
		margin: 0;
		background: url(<?php bloginfo('template_directory'); ?>/images/background.png)  repeat; /*
		font-family: 'Open Sans', sans-serif; */	
		font-weight: 400;
	}
	.profile-bg-pic {   
		background: url(<?php echo of_get_option( 'profilebg' ); ?>)no-repeat center; 
	  	-webkit-background-size: cover;
	  	-moz-background-size: cover;
	  	-o-background-size: cover;
	  	background-size: cover;
	  	height: 12em;
	  	width: 100%;
	}
</style>


</head>


<body>








	<div class="container">

		<aside class="header">
			<div class="header-top">
				<div class="logo">
					<a href="<?php echo get_option('home'); ?>"><img src="<?php echo of_get_option( 'blog_logo' ); ?>" alt=""></a>
				</div>
				<div class="top-social">
					<ul class="soc-icons"> 
						<?php $social_link = of_get_option('facebook_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'facebook_link', 'no entry' ); ?>" ><i class="fa fa-facebook fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('twitter_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'twitter_link', 'no entry' ); ?>" ><i class="fa fa-twitter fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('google-plus_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'google-plus_link', 'no entry' ); ?>" ><i class="fa fa-google-plus fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('vk_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'vk_link', 'no entry' ); ?>" ><i class="fa fa-vk fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('instagram_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'instagram_link', 'no entry' ); ?>" ><i class="fa fa-instagram fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('foursquare_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'foursquare_link', 'no entry' ); ?>" ><i class="fa fa-foursquare fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('tumblr_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'tumblr_link', 'no entry' ); ?>" ><i class="fa fa-tumblr fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('flickr_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'flickr_link', 'no entry' ); ?>" ><i class="fa fa-flickr fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('pinterest-square_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'pinterest-square_link', 'no entry' ); ?>" ><i class="fa fa-pinterest-square fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('linkedin_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'linkedin_link', 'no entry' ); ?>" ><i class="fa fa-linkedin fa-lg"></i></a></li> <?php } else {  } ?>  
						<?php $social_link = of_get_option('dribbble_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'dribbble_link', 'no entry' ); ?>" ><i class="fa fa-dribbble fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('github_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'github_link', 'no entry' ); ?>" ><i class="fa fa-github fa-lg"></i></a></li> <?php } else {  } ?>   
						<?php $social_link = of_get_option('trello_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'trello_link', 'no entry' ); ?>" ><i class="fa fa-trello fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('youtube-play_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'youtube-play_link', 'no entry' ); ?>" ><i class="fa fa-youtube-play fa-lg"></i></a></li> <?php } else {  } ?>
						<?php $social_link = of_get_option('vimeo-square_showhidden');   if ($social_link) { ?>    
							<li><a href="<?php echo of_get_option( 'vimeo-square_link', 'no entry' ); ?>" ><i class="fa fa-vimeo-square fa-lg"></i></a></li> <?php } else {  } ?>
				  	</ul>
				</div>
			</div>


			<div id="sticker">
				<div class="header-bottom">
					<div class="top-menu">
				<?php wp_nav_menu(array(
					    'theme_location' => 'header-menu',
					    'menu_class' => 't-menu',
					    'container_class' => 'top-menu',
					    'fallback_cb' => 'wp_page_menu',
				)); ?>
					</div>
					<?php $social_link = of_get_option('search_checkbox');   if ($social_link) { ?>
						<div class="searchbar">
							<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
								<fieldset>
									<input placeholder="&#61442;" type="text" value="" name="s" id="s" >
								</fieldset>
							</form>
						</div>    
					<?php } else { } ?>
				</div>
			</div>
			<div id="sticker2">
				<div class="header-bottom2">
					<div class="top-menu2">
				<?php wp_nav_menu(array(
					    'theme_location' => 'header-menu',
					    'menu_class' => 't-menu2',
					    'container_class' => 'top-menu2',
					    'fallback_cb' => 'wp_page_menu',
				)); ?>
					</div>
					<div class="searchbar2">
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
							<fieldset>
								<input placeholder="&#61442;" type="text" value="" name="s" id="s" >
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</aside>