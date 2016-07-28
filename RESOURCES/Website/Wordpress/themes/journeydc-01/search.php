<?php get_header(); ?>


<div id="content" class="inner-page">
						
					<div class="main-content">
					
					<?php if (have_posts()) : ?>

		<div class="article-title"><h1>Search Results</h1>
		<p>Search Results for <span>"<?php echo $s; ?>"</span></p>
		</div>
		

		<?php while (have_posts()) : the_post(); ?>

				<div class="search_results">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
				</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<div class="article-title"><h1>Search Results</h1></div>
		<div class="search_results"><h3>No posts found. Try a different search?</h3>
		<?php get_search_form(); ?>
		</div>
		

	<?php endif; ?>
	
	<h2>All Posts</h2>
	<div class="cal_wrapper">
<div class="cal_internal_padding">
<?php ajax_calendar(); ?>
</div>
</div>


					
					</div>
					
					<div class="side-bar">
							<?php include (TEMPLATEPATH . '/search_area.php'); ?>
							<div class="banner"><img src="<?php bloginfo('template_url'); ?>/images/side-banner.jpg" alt="" /></div>
							<div class="post-categories">
								<div>
									<h2>Post Categories</h2>
									<ul>
										<li><a href="#">In the News</a></li>
										<li><a href="#">Past Events</a></li>
										<li><a href="#">Stories</a></li>
										<li><a href="#">Diversion</a></li>
										<li><a href="#">Overheard</a></li>
									</ul>
								</div>
							</div>
							<?php include (TEMPLATEPATH . '/side_content.php'); ?>
						</div>
					</div>	

<?php get_footer(); ?>