<?php
defined('ABSPATH') or die();
/**
* Default Page Header
*
* @author Julian-Anthony Hespenheide <www.julian-h.de>
* @package WordPress
* @subpackage Reduced
*/
global $main_image;
?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? if(!empty($main_image)): ?><meta property="og:image" content="<? echo $main_image ?>"><? endif; ?>
    <title><? wp_title( '', true, 'left' )?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrap" class="container">
        <div id="main" class="clearfix">
            <section class="section-header">
                <!-- Logo -->
                <div class="logo"><a href="<?php bloginfo('url'); ?>"><? echo get_bloginfo( "name" ) ?></a><div>
                    
                <!-- Menu -->
                <?php if (has_nav_menu('main-menu')) { ?>
                <div class="top-main-menu">
                    <?php
                    wp_nav_menu(array(
                        'menu' => '',
                        'theme_location'    => 'main-menu',
                        'depth'             => 2,
                        'container'         => false,
                        'menu_class'        => 'main-menu',
                        'fallback_cb'       => 'wp_page_menu'
                    ));
                    ?>
                </div><!-- /.top-main-menu -->
                <?php } ?>
            </section><!-- /.section-header -->
<!-- End Header. Begin Template Content -->

<!-- menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-40 -->