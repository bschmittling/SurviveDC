<?php get_header(); ?>

<div id="content" class="inner-page">

<div class="main-content">



		<?php if (have_posts()) : ?>
<div class="article-title">
<h1>
 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		Archive for <?php the_time('F jS, Y'); ?>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		Archive for <?php the_time('F, Y'); ?>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		Archive for <?php the_time('Y'); ?>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Blog Archives
 	  <?php } ?>
</h1>
</div>

<div class="article">

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
				<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p><?php the_time('l, F jS, Y') ?></p>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>
</div>
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
