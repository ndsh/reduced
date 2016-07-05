<?php defined('ABSPATH') or die();
/**
* Template Name: Start Page
* Description: Template for the Starting Page
* @author Julian-Anthony Hespenheide <www.julian-h.de>
* @package WordPress 
* @subpackage Reduced
*/
?>
<?
    $main_image = get_field('main_image');
    if(!empty($main_image)) $main_image = $main_image['sizes']['large'];
    get_header();
?>
<?
    $the_post_id = get_the_id();
?>
<section class="content section-collection-single lightgallery">
    <header> 
        <h1><? echo get_the_title(); ?></h1>            
    </header>
    <article>
        <?
            if( have_rows('content') ):
                while ( have_rows('content') ) : the_row();
                    if( get_row_layout() == 'big_image' ):
                        include(locate_template('flexible_layouts/big_image.php'));
                    elseif( get_row_layout() == 'two_images' ): 
                        include(locate_template('flexible_layouts/two_images.php'));
                    elseif( get_row_layout() == 'three_images' ): 
                        include(locate_template('flexible_layouts/three_images.php'));
                    endif;
                endwhile;
            endif;
        ?>
    </article>
    <aside>
        <? echo get_the_title(); ?>
    </aside>
</section>
<? get_footer(); ?>