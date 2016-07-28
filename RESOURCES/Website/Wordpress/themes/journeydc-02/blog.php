<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>


<div id="content" class="inner-page">
						
						
						<div class="main-content">
							
							<div class="article-title"><h1><?php the_title(); ?></h1></div>







<?php
if (!is_home()) {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts("paged=$paged");
}
?>
  <?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p><?php the_time('F jS, Y') ?></p>

				
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>











						</div>
						
						
						
						
						
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