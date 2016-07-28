<?php get_header(); ?>


<div id="content" class="inner-page">
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="main-content">
							
							
							
							<div class="article-title"><h1><?php the_title(); ?></h1>
							<p>Posted <?php the_time('F jS, Y'); ?> by <?php the_author_posts_link(); ?> <span>at <?php the_time('g:ia'); ?>
							</span></p></div>

							<div class="article">								

				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php edit_post_link('Edit this entry', '<p>', '</p>'); ?>

							</div>
							
							<p class="tags">Tags: <?php the_tags(' ',', ',''); ?></p>
							<div class="details"><p>Details: <a href="<?php the_permalink(); ?>">Permalink</a>

							<a href="<?php trackback_url(); ?> " rel="trackback">Trackback</a>

							<a href="#comments_area"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a>
							</p>
							
							
							<?php if( function_exists('ADDTOANY_SHARE_SAVE_BUTTON') ) { ADDTOANY_SHARE_SAVE_BUTTON(); } ?>
							</div>
							
							

							
							<ul class="links">
								<li><a href="<?php echo get_month_link('', ''); ?>">Posts This Month</a></li>
								<li><a href="<?php bloginfo('url'); ?>/<?php the_time('Y'); ?>">Yearly Archive</a></li>
								<li><a href="<?php bloginfo('url'); ?>/blog/calendar">Calendar</a></li>
								<li><a href="<?php bloginfo('url'); ?>/?feed=rss2&cat=<?php echo wt_get_category_ID(); ?>">Category RSS</a></li>
							</ul>
							
							
							<?php comments_template(); ?>
							
							
							
								
							
	
						</div>						
<?php endwhile; endif; ?>					
					
					<div class="side-bar">
							<?php include (TEMPLATEPATH . '/search_area.php'); ?>
							<div class="banner"><img src="<?php bloginfo('template_url'); ?>/images/side-banner.jpg" alt="" /></div>
							<div class="post-categories">
								<div>
									<h2>Post Categories</h2>
									<ul>
										<?php wp_list_categories('&title_li='); ?>
									</ul>
								</div>
							</div>
							<?php include (TEMPLATEPATH . '/side_content.php'); ?>
						</div>
					</div>	

<?php get_footer(); ?>