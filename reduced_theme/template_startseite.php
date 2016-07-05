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
    $args = array(
        'post_type' => 'collection',
        'posts_per_page'=>1
        // 'meta_key'   => 'year',
        // 'orderby'    => array(
        //     'year' => 'DESC'
        //     ),
        // 'meta_query' => array(
        //     array(
        //         'key'     => 'anzeigen',
        //         'value'   => 1,
        //         'compare' => '='
        //     )
        // )
    );
    $loop = new WP_Query($args);
    if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
        $main_image = get_field('main_image');
        if(!empty($main_image)) $main_image = $main_image['sizes']['large'];
        get_header();

        ?>
<section class="content section-start">
    <?
        // $current_post_number = $loop->current_post;
        // get_template_part('content', 'serien');
        
    ?>
        <article>
            <header>
                <h1><a href="<? echo get_post_permalink($loop->ID) ?>"><? the_title() ?></a></h1>
            </header>
            <a href="<? echo get_post_permalink($loop->ID) ?>"><div class="background-img-cover" style="background-image: url('<? echo $main_image; ?>');">
                <img class="img-thumbnail" src="<? echo $main_image; ?>" />
            </div></a>
        </article>
    <?
        endwhile;
    } else {
        ?>
        <article class="error">
        <h1>Well…</h1>
        <p>apparently you came a bit too early to the party.</p>
        <p>This means, that there is nothing to see here <em>yet</em>.</p>
        <p>But quite soon there will be! Come back later</p>
        </article>
        <?
    }
?>
</section>
<?php get_footer(); ?>