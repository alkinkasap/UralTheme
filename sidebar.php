<aside class="sidebar"> 


			<div class="sidebar-profile">

				<div class="profile-bg-pic"></div>

				<div class="profile-pic">
					<img src="<?php echo of_get_option( 'profilepic' ); ?>" alt="" class="profile">
				</div>
				
				<div class="text-me">

					<p class="who"><?php echo of_get_option( 'profile_name', 'no entry' ); ?></p>
					<div><p class="job"><?php echo of_get_option( 'profile_job', 'no entry' ); ?></p></div>
					<div class="clear"></div>
					<p class="idea"><?php echo of_get_option( 'profile_motto', 'no entry' ); ?></p> 

				</div>

			</div>
		
			
				<?php wp_nav_menu(array(
					    'theme_location' => 'sidebar-menu',
					    'menu_class' => 's-menu',
					    'container_class' => 'sidebar-menu',
					    'fallback_cb' => 'wp_page_menu',
				)); ?>
				


			<div class="text-widget">
<?php if (!function_exists('dynamic_sidebar') or !dynamic_sidebar("Sidebar")) { ?>
<?php } ?>
			</div>

		</aside>