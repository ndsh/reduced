<?php defined('ABSPATH') or die();
/**
* Default Footer
*
* @author Julian-Anthony Hespenheide <www.julian-h.de>
* @package WordPress
* @subpackage Reduced
*/
?>
</div>
    </div> <!-- /container -->
    <!-- </div> --> <!-- / -->
    <div id="social">
        <?
            if( have_rows('socials', options) ):
                // loop through the rows of data
                ?>
                    <ul>
                <?
                while ( have_rows('socials', options) ) : the_row();
                    // display a sub field value
                    $name = get_sub_field('name', options);
                    $link = get_sub_field('link', options);
                    $icon = get_sub_field('icon', options);
                    ?>
                        <li><a target="_blank" href="<? echo $link ?>"><? echo $icon ?></a></li>
                    <?
                endwhile;
                ?>
                    </ul>
                <?
            endif;
        ?>
    </div>
    <div id="footer">
        <section class="section-footer container">
            <!-- <div class="container container-padding"> -->
            <article>
                <ul>
                    <li class="footer-text">&copy; <?php echo date('Y'); ?><sup>(+)</sup> <?php bloginfo(); ?></li>
                </ul><!-- end .credit -->
            </article>
            <aside>
                <?
                    $imprint_object = get_field('imprint', options);
                    if(!empty($imprint_object)) {
                        ?><a href="<? echo $imprint_object->guid ?>"><? echo $imprint_object->post_title ?></a><?
                    }
                ?>
            </aside>
        </section>
    </div>
<?php wp_footer(); ?>
</body>
</html>
