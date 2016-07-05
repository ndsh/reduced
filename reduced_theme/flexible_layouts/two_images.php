<?php
        $gallery = get_sub_field('selection');
if($gallery):
    ?>
    <section class="post two-images">
            <article>
    <?
            foreach($gallery as $image):
                if($image) $imgLarge = $image['sizes']['large'];
                if($image) $imgThumb = $image['sizes']['thumbnail'];
        ?>
                <div class="background-img-cover item reveal" data-src="<? echo $imgLarge; ?>" style="background-image: url('<? echo $imgLarge; ?>');">
                </div>
        <?
            unset($imgLarge, $image, $imageThumb);
            endforeach;
        ?>
            </article>
        </section>
        <?
        endif;
?>