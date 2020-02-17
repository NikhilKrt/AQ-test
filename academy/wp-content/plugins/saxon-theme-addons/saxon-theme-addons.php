<?php
/*
Plugin Name: Saxon Theme Addons
Plugin URI: http://magniumthemes.com/
Description: 1-Click Demo Import and other extra theme features
Author: MagniumThemes
Version: 1.7.1
Author URI: http://magniumthemes.com/
Text Domain: saxon-ta
License: Themeforest Split License
*/

// Load translated strings
add_action( 'init', 'saxon_ta_load_textdomain' );

// Load init
add_action( 'init', 'saxon_ta_init' );

// After theme load
add_action('after_setup_theme', 'saxon_ta_after_setup_theme');

// Flush rewrite rules on deactivation
register_deactivation_hook( __FILE__, 'saxon_ta_deactivation' );

function saxon_ta_deactivation() {
	// Clear the permalinks to remove our post type's rules
	flush_rewrite_rules();
}

function saxon_ta_load_textdomain() {
	load_plugin_textdomain( 'saxon-ta', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

// Init
function saxon_ta_init() {
	global $pagenow;

	// Remove issues with prefetching adding extra views
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

	// Custom User social profiles
	function saxon_add_to_author_profile( $contactmethods ) {

        if(function_exists('saxon_author_social_services_list')) {
            $social_array = saxon_author_social_services_list();
        } else {
            $social_array = array();
        }

	    foreach ($social_array as $social_key => $social_value) {
	        # code...
	        $contactmethods[$social_key.'_profile'] = $social_value.' Profile URL';
	    }

	    return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'saxon_add_to_author_profile', 10, 1);

	// 1-click demo importer
	if (( $pagenow !== 'admin-ajax.php' ) && (is_admin())) {
		require plugin_dir_path( __FILE__ ).'inc/oneclick-demo-import/init.php';
	}

	// Load modules

	// CMB2 custom fields
	require plugin_dir_path( __FILE__ ).'inc/cmb2-attached-posts/init.php';
	require plugin_dir_path( __FILE__ ).'inc/cmb2-attached-posts/cmb2-attached-posts-field.php';

}

// After theme load
function saxon_ta_after_setup_theme() {

    // Theme widgets
    require plugin_dir_path( __FILE__ ).'inc/theme-widgets.php';
    require plugin_dir_path( __FILE__ ).'inc/theme-metaboxes.php';

	// Allow shortcodes in widgets
	add_filter('widget_text', 'do_shortcode');
	add_filter('widget_saxon_text', 'do_shortcode');
}

// Add theme settings link to system menus
add_action( 'admin_menu', 'saxon_themeoptions_submenu_page' );
function saxon_themeoptions_submenu_page() {
  add_submenu_page(
    'themes.php',
        esc_html__( 'Theme Settings', 'saxon-ta' ),
        esc_html__( 'Theme Settings', 'saxon-ta' ),
        'manage_options',
        'customize.php?autofocus[panel]=theme_settings_panel'
    );
}

// Custom shortcodes
function saxon_social_icons_shortcode( $atts ) {
	ob_start();
    echo '<div class="widget_saxon_social_icons shortcode_saxon_social_icons">';
    saxon_social_display(false, true);
    echo '</div>';
    $sc_content = ob_get_contents();
	ob_end_clean();
	return $sc_content;
}
add_shortcode( 'saxon_social_icons', 'saxon_social_icons_shortcode' );

/**
*	Social share links function
*/
function saxon_social_share_links() {

	$post_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID () ), 'saxon-blog-thumb');

	if(has_post_thumbnail( get_the_ID () )) {
	    $post_image = $post_image_data[0];
	} else {
		$post_image = '';
	}

	?>
	<div class="post-social-wrapper">
        <div class="post-social-title"><?php esc_html_e("Share:", 'saxon-ta'); ?></div>
		<div class="post-social">
			<?php if(get_theme_mod('social_share_facebook', true)):?><a title="<?php esc_attr_e("Share with Facebook", 'saxon-ta'); ?>" href="<?php the_permalink(); ?>" data-type="facebook" data-title="<?php the_title(); ?>" class="facebook-share"> <i class="fa fa-facebook"></i></a><?php endif; ?><?php if(get_theme_mod('social_share_twitter', true)):?><a title="<?php esc_html_e("Tweet this", 'saxon-ta'); ?>" href="<?php the_permalink(); ?>" data-type="twitter" data-title="<?php the_title(); ?>" class="twitter-share"> <i class="fa fa-twitter"></i></a><?php endif;?><?php if(get_theme_mod('social_share_google', true)):?><a title="<?php esc_html_e("Share with Google Plus", 'saxon-ta'); ?>" href="<?php the_permalink(); ?>" data-type="google" data-title="<?php the_title(); ?>" class="googleplus-share"> <i class="fa fa-google-plus"></i></a><?php endif; ?><?php if(get_theme_mod('social_share_linkedin', true)):?><a title="<?php esc_html_e("Share with LinkedIn", 'saxon-ta'); ?>" href="<?php the_permalink(); ?>" data-type="linkedin" data-title="<?php the_title(); ?>" data-image="<?php echo esc_attr($post_image); ?>" class="linkedin-share"> <i class="fa fa-linkedin"></i></a><?php endif;?><?php if(get_theme_mod('social_share_pinterest', true)):?><a title="<?php esc_html_e("Pin this", 'saxon-ta'); ?>" href="<?php the_permalink(); ?>" data-type="pinterest" data-title="<?php the_title(); ?>" data-image="<?php echo esc_attr($post_image); ?>" class="pinterest-share"> <i class="fa fa-pinterest"></i></a><?php endif; ?><?php if(get_theme_mod('social_share_vk', true)):?><a title="<?php esc_html_e("Share with VKontakte", 'saxon-ta'); ?>" href="<?php the_permalink(); ?>" data-type="vk" data-title="<?php the_title(); ?>" data-image="<?php echo esc_attr($post_image); ?>" class="vk-share"> <i class="fa fa-vk"></i></a><?php endif;?><?php if(get_theme_mod('social_share_whatsapp', false)):?><a title="<?php esc_html_e("Share to WhatsApp", 'saxon-ta'); ?>" href="whatsapp://send?text=<?php echo (urlencode(esc_attr(get_the_title())).': '.get_the_permalink()); ?>" data-type="link" class="whatsapp-share"> <i class="fa fa-whatsapp"></i></a><?php endif;?><?php if(get_theme_mod('social_share_telegram', false)):?><a title="<?php esc_html_e("Share to Telegram", 'saxon-ta'); ?>" href="tg://msg?text=<?php echo (urlencode(esc_attr(get_the_title())).': '.get_the_permalink()); ?>" data-type="link" class="telegram-share"> <i class="fa fa-telegram"></i></a><?php endif;?><?php if(get_theme_mod('social_share_email', true)):?><a title="<?php esc_html_e("Share by Email", 'saxon-ta'); ?>" href="mailto:?subject=<?php echo str_replace(" ", "⠀", get_the_title()); ?>&body=<?php the_permalink(); ?>" data-type="link" class="email-share"> <i class="fa fa-envelope-o"></i></a><?php endif;?>
		</div>
		<div class="clear"></div>
	</div>
	<?php
}
add_action('saxon_social_share', 'saxon_social_share_links');

/**
*   Author social links function
*/
function saxon_author_social_links() {
?>
<div class="author-social">
    <ul class="author-social-icons">
        <?php

            if(function_exists('saxon_author_social_services_list')) {
                $social_array = saxon_author_social_services_list();

                foreach ($social_array as $social_profile => $value) {
                    $$social_profile = get_the_author_meta( $social_profile.'_profile' );

                    if ( $$social_profile && $$social_profile != '' ) {
                        echo '<li class="author-social-link-'.esc_attr($social_profile).'"><a href="' . esc_url($$social_profile) . '" target="_blank"><i class="fa fa-'.esc_attr($social_profile).'"></i></a></li>';
                    }
                }
            }
        ?>
    </ul>
</div>
<?php
}
add_action('saxon_author_social_links_display', 'saxon_author_social_links');

/*
*   Post review rating badge display
*/
if (!function_exists('saxon_post_review_rating_display')) :
function saxon_post_review_rating_display() {

    $post_review_enabled = get_post_meta( get_the_ID(), '_saxon_post_review_enabled', true );
    $post_review_color = get_post_meta( get_the_ID(), '_saxon_post_review_color', true );

    if($post_review_enabled) {

        $post_review_criteria_group = get_post_meta( get_the_ID(), '_saxon_review_criteria_group', true );

        $criterias = array();

        $criteria_value_total = 0;

        foreach ( (array) $post_review_criteria_group as $key => $value ) {

            $criteria_title = $criteria_value = '';

            if ( !empty( $value['criteria_value'] ) ) {
                $criteria_value = $value['criteria_value'];
                $criteria_value_total += $criteria_value;
            }

            if ( !empty( $value['criteria_title'] ) ) {
                $criteria_title = $value['criteria_title'];
                $criterias[$criteria_title] = $criteria_value;
            }

        }

        $post_review_rating = 0;

        if(count($criterias) > 0) {
            $post_review_rating = $criteria_value_total / count($criterias) / 10;
        } else {
            $post_review_rating = 0;
        }

        if($post_review_rating > 0) {
            echo '<div class="post-review-rating-badge headers-font" data-style="background-color: '.esc_attr($post_review_color).';">'.esc_html(sprintf("%0.1f",number_format($post_review_rating, 1))).'</div>';
        }
    }
}
endif;
add_action('saxon_post_review_rating', 'saxon_post_review_rating_display');

/**
*	Posts views count
*/
function saxon_getPostViews($postID){
    $count_key = '_saxon_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;
    }
    return $count;
}

function saxon_setPostViews() {
    global $post;
    $postID = $post->ID;

    $count_key = '_saxon_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
add_action('saxon_set_post_views', 'saxon_setPostViews');

/**
*	Posts views display
*/
function saxon_post_views_display($custompost = '') {

	global $post;

	if($custompost !== '' ) {
		$post = $custompost;
	}

	$post_views = saxon_getPostViews($post->ID);

	if($post_views < 1) {
	    $post_views = 0;
	}

	echo '<i class="fa fa-eye" aria-hidden="true"></i>'.esc_html($post_views);
}
add_action('saxon_post_views', 'saxon_post_views_display');

/**
*   Posts likes display
*/
function saxon_post_likes_display($custompost = '') {

    global $post;

    if($custompost !== '' ) {
        $post = $custompost;
    }

    $postid = $post->ID;

    $count_key = '_saxon_post_likes_count';
    $count = get_post_meta($postid, $count_key, true);

    if($count == ''){
        delete_post_meta($postid, $count_key);
        add_post_meta($postid, $count_key, '0');
        $post_likes = 0;
    } else {
        $post_likes = $count;
    }

    if($post_likes < 1) {
        $post_likes = 0;
    }

    $cookie_name = 'saxon-likes-for-post-'.esc_html($postid);

    if(isset($_COOKIE[$cookie_name])) {
        $like_icon = 'fa-heart';
    } else {
        $like_icon = 'fa-heart-o';
    }

    echo '<a href="#" class="post-like-button" data-id="'.esc_attr($postid).'"><i class="fa '.esc_attr($like_icon).'" aria-hidden="true"></i></a><span class="post-like-counter">'.esc_html($post_likes).'</span>';
}
add_action('saxon_post_likes', 'saxon_post_likes_display');

/*
* Theme update notifications
*/
if(defined('DEMO_MODE')) {
	delete_option('saxon_update_cache_date');
}

if (!function_exists('saxon_update_checker')) :
function saxon_update_checker() {

  // Update update cache after time
  update_option('saxon_update_cache_date', strtotime("+3 days"));

  ?>
  <script type="text/javascript" >
  (function($){
  $(document).ready(function($) {

  	$.getJSON('//api.magniumthemes.com/theme-versions.json', function(data){

	  	var items = data.themes;

		$.each(items, function(i, theme){

			if(theme.title == '<?php echo wp_get_theme(get_template());?>') {

				// Get version info
				var data = {
			      action: 'saxon_update_checker_cache',
			      version: theme.version,
			      version_message: theme.version_message,
			      message: theme.message,
			      message_id: theme.message_id
			    };

				$.post( ajaxurl, data, function(response) {

				});
			}
		});

	});

    $.ajax({
        url: "//api.magniumthemes.com/activation.php?act=update&c=<?php echo get_option('envato_purchase_code_saxon'); ?>",
        type: "GET",
        timeout: 10000,
        success: function(data) {
            if(data == 1) {

                alert('WARNING: Your theme purchase code blocked for illegal theme usage on multiple sites. Please contact theme support for more information: https://support.magniumthemes.com/');

                // Get version info
                var data = {
                  action: 'saxon_update',
                  var: 1
                };

                $.post( ajaxurl, data, function(response) {
                    window.location = "themes.php?page=saxon_activate_theme";
                });
            } else {
                var data = {
                  action: 'saxon_update',
                  var: 0
                };

            }
        },
        error: function(xmlhttprequest, textstatus, message) {
        }
    });

  });
  })(jQuery);
  </script>
  <?php

}

if(strtotime("now") > get_option( 'saxon_update_cache_date', 0 )) {
	add_action('admin_print_footer_scripts', 'saxon_update_checker', 99);
}

endif;

/**
 * Ajax update version cacher
 */
if (!function_exists('saxon_update_checker_cache_callback')) :
function saxon_update_checker_cache_callback() {
	$version = esc_html($_POST['version']);
	$version_message = ($_POST['version_message']);
	$message = ($_POST['message']);
	$message_id = esc_html($_POST['message_id']);

	update_option('saxon_update_cache_version', $version);
	update_option('saxon_update_cache_version_message', $version_message);
	update_option('saxon_update_cache_message', $message);
	update_option('saxon_update_cache_message_id', $message_id);

	wp_die();
}
add_action('wp_ajax_saxon_update_checker_cache', 'saxon_update_checker_cache_callback');
endif;

if (!function_exists('saxon_update_callback')) :
function saxon_update_callback() {

    $var = $_POST['var'];
    update_option('saxon_update', $var);

    if($var == 1) {
         update_option('saxon_license_key_status', '');
    }

    wp_die();
}
add_action('wp_ajax_saxon_update', 'saxon_update_callback');
endif;

/**
 * Display update notifications
 */
if (!function_exists('saxon_update_notify_display')) :
function saxon_update_notify_display() {

	// Hide update notice
	if(isset($_GET['update-notify-dismiss'])) {
		$notify_id = 'dismiss-update-notify-v'.$_GET['update-notify-dismiss'];
		update_option($notify_id, 1);
	}

	$latest_version = get_option('saxon_update_cache_version', '');
	$current_version = wp_get_theme(get_template())->get( 'Version' );
	$version_message = get_option('saxon_update_cache_version_message', '');

	$notify_id = 'dismiss-update-notify-v'.$latest_version;
	$notify_dismiss = get_option($notify_id, 0);

	if(version_compare($latest_version, $current_version, ">") && $latest_version !== '' && $notify_dismiss == 0) {

		$message_html = '<div class="notice notice-error"><p>You are using outdated <strong>Saxon '.esc_html($current_version).'</strong> theme version. Please update to <strong>'.esc_html($latest_version).'</strong> version. <a href="http://magniumthemes.com/go/theme-update-guide/" target="_blank">How to update theme</a>. '.$version_message.' <strong><span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;"><a href="'.esc_url( add_query_arg( 'update-notify-dismiss', esc_html($latest_version))).'">'.esc_html__('Dismiss this notice', 'saxon-ta').'</a></span></strong></p></div>';

		echo $message_html;

	}

	// Hide message notice
	if(isset($_GET['message-notify-dismiss'])) {
		$notify_id = 'dismiss-message-notify-v'.$_GET['message-notify-dismiss'];
		update_option($notify_id, 1);
	}

	$message = get_option('saxon_update_cache_message', '');
	$message_id = get_option('saxon_update_cache_message_id', 0);

	$notify_id = 'dismiss-message-notify-v'.$message_id;
	$notify_dismiss = get_option($notify_id, 0);

	if($notify_dismiss == 0 && $message !== '') {

		$message_html = '<div class="notice notice-success"><p>'.$message.'<strong><span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;"><a href="'.esc_url( add_query_arg( 'message-notify-dismiss', esc_html($message_id))).'">'.esc_html__('Dismiss this notice', 'saxon-ta').'</a></span></strong></p></div>';

		echo $message_html;

	}

}

if(!defined('ENVATO_HOSTED_SITE')) {
	add_action( 'admin_notices', 'saxon_update_notify_display' );
}

endif;

/**
 * Clean up output of stylesheet <link> tags for W3C Validator
 */
function saxon_clean_style_tag( $input ) {
    preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );
    if ( empty( $matches[2] ) ) {
        return $input;
    }
    // Only display media if it is meaningful
    $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';

    return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
if(!is_admin()) { // Gutenberg fix
    add_filter( 'style_loader_tag',  'saxon_clean_style_tag'  );
}

/**
 * Clean up output of <script> tags for W3C Validator
 */
function saxon_clean_script_tag( $input ) {
    $input = str_replace( "type='text/javascript' ", '', $input );

    return str_replace( "'", '"', $input );
}
if(!is_admin()) { // Gutenberg fix
    add_filter( 'script_loader_tag', 'saxon_clean_script_tag'  );
}

/**
 * Prevent Kirki plugin from auto updates (core theme options)
 */
if(!function_exists('saxon_filter_plugin_updates')):
function saxon_filter_plugin_updates( $value ) {
    if(!empty($value->response['kirki/kirki.php'])) {
        unset( $value->response['kirki/kirki.php'] );
        return $value;
    }
}
add_filter( 'site_transient_update_plugins', 'saxon_filter_plugin_updates' );
endif;
