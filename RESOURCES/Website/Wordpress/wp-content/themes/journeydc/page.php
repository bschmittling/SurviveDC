<?php get_header(); ?>

<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="770" valign="top"><img src="<?php bloginfo('template_url'); ?>/images/page/top.gif" width="770" height="69" /></td>
  </tr>

  <tr>
    <td valign="top"><!-- // BEGIN // Header // -->
      <table width="770" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="125" valign="top"><img src="<?php bloginfo('template_url'); ?>/images/page/left_shim.gif" width="125" height="305" /></td>
    <td width="520" valign="top"><table width="520" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="520" valign="top"><a href="<?php bloginfo('url'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','<?php bloginfo('template_url'); ?>/images/page/nav/home_over.gif',1)"><img src="<?php bloginfo('template_url'); ?>/images/page/nav/home.gif" alt="Home" name="home" width="520" height="27" border="0" id="home" /></a></td>
        </tr>

        <tr>
          <td valign="top"><a href="<?php bloginfo('url'); ?>/participate" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('participate','','<?php bloginfo('template_url'); ?>/images/page/nav/participate_over.gif',1)"><img src="<?php bloginfo('template_url'); ?>/images/page/nav/participate.gif" alt="Participate" name="participate" width="520" height="69" border="0" id="participate" /></a></td>
        </tr>
        <tr>
          <td valign="top"><a href="<?php bloginfo('url'); ?>/navigate" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('navigate','','<?php bloginfo('template_url'); ?>/images/page/nav/navigate_over.gif',1)"><img src="<?php bloginfo('template_url'); ?>/images/page/nav/navigate.gif" alt="Navigate" name="navigate" width="520" height="80" border="0" id="navigate" /></a></td>
        </tr>
        <tr>
          <td valign="top"><a href="<?php bloginfo('url'); ?>/survive" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('survive','','<?php bloginfo('template_url'); ?>/images/page/nav/survive_over.gif',1)"><img src="<?php bloginfo('template_url'); ?>/images/page/nav/survive.gif" alt="Survive" name="survive" width="520" height="92" border="0" id="survive" /></a></td>
        </tr>

        <tr>
          <td valign="top"><img src="<?php bloginfo('template_url'); ?>/images/page/btm.gif" width="520" height="37" /></td>
        </tr>
      </table></td>
    <td width="125" valign="top"><img src="<?php bloginfo('template_url'); ?>/images/page/right_shim.gif" width="125" height="305" /></td>
  </tr>
</table>
      <!-- // END // Header // -->
    </td>

  </tr>
  <tr>
    <td valign="top" background="<?php bloginfo('template_url'); ?>/images/page/page_bg.gif"><table width="770" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="125" valign="top"><img src="<?php bloginfo('template_url'); ?>/images/shared/clear.gif" width="125" height="10" /></td>
          <td width="520" valign="top">
          <div class="content" id="content">
              
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="main-content">
							
							
							<div class="article-title"><h1><?php the_title(); ?></h1></div>
							<div class="article">
							
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php edit_post_link('Edit this entry', '<p>', '</p>'); ?>

							</div>
							
							
							
							<?php comments_template(); ?>							
							
						</div>
						
						
						<?php endwhile; endif; ?>
    
              
            </div></td>
          <td width="125" valign="top"><img src="<?php bloginfo('template_url'); ?>/images/shared/clear.gif" width="125" height="10" /></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><img src="<?php bloginfo('template_url'); ?>/images/shared/clear.gif" width="15" height="15" /></td>
  </tr>
</table>




























						
												
						
						


<?php get_footer(); ?>