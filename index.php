<?php get_header(); ?>
		



		
		<main class="content">
			<div class="content-inner">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post">
				<div class="post-featured">
					
					<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); }  ?></a>
				</div>

				<div class="post-header">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<p class="details">
						<i class="fa fa-calendar-o"></i> <?php the_time('j F Y') ?>  / 
						<i class="fa fa-list-alt"></i>  <?php the_category(', ') ?>  / 
						<i class="fa fa-comment-o"></i>  <?php comments_popup_link('Yorum Yok', '1 Yorum', '% Yorum'); ?>
					</p>
				</div>


				<div class="post-inner">
					<?php the_content('', ''); ?> <a href="<?php the_permalink(); ?>">devamını oku <i class="fa fa-arrow-right"></i></a>
				</div>
			</article>

			<?php endwhile; ?>
			<?php else : ?>
			<article class="post">
				<div class="post-header">
					<h1>The Page You're Looking For Not Exists</h1>
					<p class="details">				
					</p>
				</div>
				<div class="post-inner">
					<p>
						Try to search again or head back to <a href="<?php echo get_option('home'); ?>">home page</a>
					</p>
					</div>
			</article>
			<?php endif; ?>

			<div class="navigation"><?php posts_nav_link(); ?></div>

			</div>
		</main>

		


		
<?php get_sidebar(); ?>




<?php get_footer(); ?>