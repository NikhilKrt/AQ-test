<?php
/**
 * Post template: Overlay short
 */

?>
<?php

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'saxon-blog-thumb');

if(has_post_thumbnail( $post->ID )) {
    $image_bg ='background-image: url('.$image[0].');';
    $post_class = ' saxon-post-invert';
}
else {
    $image_bg = '';
    $post_class = ' saxon-post-no-image';
}

$categories_list = saxon_get_the_category_list( $post->ID );

echo '<div class="saxon-overlay-post saxon-overlay-short-post saxon-post'.esc_attr($post_class).'"'.saxon_add_aos(false).'>';

echo '<div class="saxon-post-wrapper-inner">';

if(get_theme_mod('blog_posts_review', true)) {
    do_action('saxon_post_review_rating'); // this action called from plugin
}

if(has_post_thumbnail( $post->ID )) {
  echo '<div class="saxon-post-image" data-style="'.esc_attr($image_bg).'"></div>';
}

// Post details
echo '<div class="saxon-post-details">
      <div class="saxon-post-details-inner">
     <div class="post-categories">'.wp_kses($categories_list, saxon_esc_data()).'</div>
     <h3 class="post-title"><a href="'.esc_url(get_permalink($post->ID)).'">'.wp_kses_post($post->post_title).'</a></h3>';
if(get_theme_mod('blog_posts_author', false)):
?>
<div class="post-author">
    <div class="post-author-image">
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php echo get_avatar( get_the_author_meta('email'), '28', '28' ); ?></a></div><?php echo esc_html__('By', 'saxon'); ?> <?php echo get_the_author_posts_link(); ?>
</div>
<?php
endif;

echo '<div class="post-date">'.get_the_time( get_option( 'date_format' ), $post->ID ).'</div>';

echo '</div>';
echo '</div>';
// END - Post details

echo '</div>';
echo '</div>';
