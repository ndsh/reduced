<?php
defined('ABSPATH') or die();
/**
* Default Index template to display loop of blog posts
*
* @author Julian-Anthony Hespenheide <www.julian-h.de>
* @package WordPress
* @subpackage Reduced
*/
?>
<?php get_header(); ?>
<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
			get_template_part('content', get_post_format());
		endwhile;
	endif;
?>
<?php get_footer(); ?>