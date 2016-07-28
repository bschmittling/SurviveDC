<!-- menu tree -->
<ul id="menu" class="udm">

<?php
	$post_ID = $post->ID;
	$parent = $post->post_parent;
	$grandparent = get_parent_id($parent);
	
	$category_name;
	foreach((get_the_category()) as $category) { 
    	$category_name = $category->cat_name; 
	}
?>


<li>
<a href="<?php bloginfo('url'); ?>/about" title="About">

	<?php if (is_page("2") || $post->post_parent=="2" || $grandparent=="2") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-about.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-about.gif" alt="" />
	<?php } ?>

</a>
<?php
$children = wp_list_pages('title_li=&child_of=2&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>
</li>			



<li>
<a href="<?php bloginfo('url'); ?>/performances">

	<?php if (is_page("21") || $post->post_parent=="21" || $grandparent=="21") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-performance.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-performance.gif" alt="" />
	<?php } ?>

</a>
<?php
$children = wp_list_pages('title_li=&child_of=21&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>
</li>



<li>
<a href="<?php bloginfo('url'); ?>/classes">

	<?php if (is_page("68") || $post->post_parent=="68" || $grandparent=="68") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-classes.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-classes.gif" alt="" />
	<?php } ?>

</a>
<?php
$children = wp_list_pages('title_li=&child_of=68&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>	
</li>




<li>
<a href="<?php bloginfo('url'); ?>/community-programs">

	<?php if (is_page("136") || $post->post_parent=="136" || $grandparent=="136") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-community.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-community.gif" alt="" />
	<?php } ?>
	
</a>
<?php
$children = wp_list_pages('title_li=&child_of=136&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>
</li>



<li>
<a href="<?php bloginfo('url'); ?>/corporate-programs">

	<?php if (is_page("84") || $post->post_parent=="84" || $grandparent=="84") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-programs.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-programs.gif" alt="" />
	<?php } ?>

</a>
<?php
$children = wp_list_pages('title_li=&child_of=84&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>			
</li>



<li>
<a href="<?php bloginfo('url'); ?>/blog">

	<?php if (is_page("98") || $post->post_parent=="98" || $grandparent=="98") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-blog.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-blog.gif" alt="" />
	<?php } ?>

</a>
<?php
$children = wp_list_pages('title_li=&child_of=98&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>
</li>


<li>
<a href="<?php bloginfo('url'); ?>/support" title="Support">

	<?php if (is_page("106") || $post->post_parent=="106" || $grandparent=="106") { ?>
	<div class="active"><img src="<?php bloginfo('template_url'); ?>/images/menu-support.gif" alt="" /></div>
	<?php } else { ?>
	<img src="<?php bloginfo('template_url'); ?>/images/menu-support.gif" alt="" />
	<?php } ?>

</a>
<?php
$children = wp_list_pages('title_li=&child_of=106&echo=0');
if ($children) {
?>
<ul>
<?php echo $children; ?>
</ul>
<?php } ?>        
</li>



</ul>