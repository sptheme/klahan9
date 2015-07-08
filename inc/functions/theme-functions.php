<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Klahan9
 */


if ( ! function_exists( 'wpsp_excerpt_length' ) ) :
/**
 * Excerpt length
 *
 */
add_filter( 'excerpt_length', 'wpsp_excerpt_length', 999 );

function wpsp_excerpt_length( $length ) {
	return 23;
}
endif;

/**
 *	Different Post Formats per Post Type
 */
function wpsp_adjust_post_formats() {
    if (isset($_GET['post'])) {
		$post = get_post($_GET['post']);
		if ($post)
			$post_type = $post->post_type;
    } elseif ( !isset($_GET['post_type']) )
        $post_type = 'post';
    elseif ( in_array( $_GET['post_type'], get_post_types( array('show_ui' => true ) ) ) )
        $post_type = $_GET['post_type'];
    else
        return; // Page is going to fail anyway
 
    if ( 'team' == $post_type )
        add_theme_support( 'post-formats', array( 'gallery', 'video' ) );
}
add_action( 'load-post.php','wpsp_adjust_post_formats' );
add_action( 'load-post-new.php','wpsp_adjust_post_formats' );


if ( ! function_exists( 'wpsp_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function wpsp_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
	    <div class="post-nav-box clearfix">
	        <h1 class="screen-reader-text"><?php _e( 'Post navigation', WPSP_TEXT_DOMAIN ); ?></h1>
	        <div class="nav-links">
	            <?php
	            previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', WPSP_TEXT_DOMAIN ) . '</div><h1>%link</h1></div>', '%title' );
				next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Post:', 'Next post', WPSP_TEXT_DOMAIN ) . '</div><h1>%link</h1></div>', '%title' );
	            ?>
	        </div><!-- .nav-links -->
	    </div><!-- .post-nav-box -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wpsp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wpsp_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', WPSP_TEXT_DOMAIN ),
		$time_string
	);

	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', WPSP_TEXT_DOMAIN ) );
	

	$byline = sprintf(
		esc_html_x( '%s', 'post author', WPSP_TEXT_DOMAIN ),
		'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
	);

	if ( 'post' == get_post_type() ) {
		echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span><span class="category-list">' . $categories_list . '</span>'; // WPCS: XSS OK.
	} else {
		echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';
	}

}
endif;

if ( ! function_exists( 'wpsp_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wpsp_entry_footer() {
	edit_post_link( esc_html__( 'Edit', WPSP_TEXT_DOMAIN ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'wpsp_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function wpsp_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '← Previous', WPSP_TEXT_DOMAIN ),
		'next_text' => __( 'Next →', WPSP_TEXT_DOMAIN ),
        'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', WPSP_TEXT_DOMAIN ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'wpsp_soundcloud' ) ) :
/**
 * Embeded soundcloud
 *
 * @return html
 */
function wpsp_soundcloud($url , $autoplay = 'false' ) {
	return '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$url.'&amp;auto_play='.$autoplay.'&amp;show_artwork=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false""></iframe>';
}
endif;

if ( ! function_exists( 'wpsp_post_icon_format' ) ) :
/**
 * Display post format
 *
 * Option: show post thumbnail or icon with title base on post format
 * @return html
 */
function wpsp_radio_post( $category = 1, $post_num = 5 ) {
	global $post;
		
	if ( is_singular() ) :
		$args = array( 'cat' => $category, 'posts_per_page' => (int) $post_num, 'post__not_in' => array($post->ID) );	
	else : 
		$args = array( 'cat' => $category, 'posts_per_page' => (int) $post_num, 'post__not_in' => get_option( 'sticky_posts' ) );
	endif;

	$custom_query = new WP_Query( $args );
	
	if( $custom_query->have_posts() ) {
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
			get_template_part( 'partials/post-icon-audio', 'format' );
		endwhile; wp_reset_postdata();
	}
}
endif;

if ( ! function_exists( 'wpsp_get_page_bg_color' ) ) :
/**
 * Get page background color from page meta
 *
 * @return color code
 */
function wpsp_get_page_bg_color() {
	global $post;
		
	$page_bg_color = get_post_meta( $post->ID, 'sp_page_bg_color', true );

	return $page_bg_color;
}
endif;

if ( ! function_exists( 'wpsp_masthead_option' ) ) :
/**
 * On/Off Masthead for TV, Radio and Online page template
 *
 * @return html
 */
function wpsp_masthead_option() {
	global $post;
		
	$masthead = get_post_meta( $post->ID, 'sp_masthead', true ); 
	if ( ! empty( $masthead ) ) { ?>
	<div id="masthead" class="site-heading-image container">
		<img src="<?php echo $masthead; ?>">		
	</div> <!-- .site-heading-image -->
<?php } else {
		return null;
	}
}
endif;

if ( !function_exists('wpsp_get_related_posts') ) :
/**
 *  Get post related by post type
 */
function wpsp_get_related_posts( $post_id, $args=array(), $cols = 3 ) {

	$post = get_post($post_id);
	$post_type = $post->post_type;

	$taxonomy = get_object_taxonomies( $post_type );
	$terms = wp_get_post_terms($post_id, $taxonomy[0], array("fields" => "ids"));
	
	$defaults = array(
			'post_type' => $post_type, 
			'post__not_in' => array($post_id),
			'orderby' => 'rand',
			'posts_per_page' => 3,
			'tax_query' => array(
	  			array(
					'taxonomy' => $taxonomy[0],
					'field' => 'term_id',
	  				'terms' => $terms
				))
		);
	$args = wp_parse_args( $args, $defaults );
	extract( $args );

	$custom_query = new WP_Query($args);

	if ( $custom_query->have_posts() ) {
		echo '<section class="related-posts">';
		echo '<h2 class="heading">' . esc_html__( 'You may also see', WPSP_TEXT_DOMAIN ) . '</h2>';
		echo '<div class="post-grid-' . $cols . ' clearfix">';
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
			wpsp_switch_posttype_content( $post_type );
		endwhile; wp_reset_postdata();
		echo '</div>';
		echo '</section>';
	} else {
		echo esc_html__( 'There is no related post.', WPSP_TEXT_DOMAIN );
	} 
}	
endif;

if ( !function_exists('wpsp_switch_posttype_content') ) :
/**
 *	Switch post type
 *
 *	Render post type content
 *
 */
function wpsp_switch_posttype_content( $post_type ) {
	switch ( $post_type ) {
		case 'cp_gallery':
		get_template_part( 'partials/content', 'album' );
		break;

		case 'post':
		get_template_part( 'partials/post-thumb', 'blog' );
		break;
	}
}
endif;

if ( ! function_exists( 'wpsp_get_all_albums' ) ) :
/**
 *	All Albums
 *
 *	List all photos in each albums
 *
 */
function wpsp_get_all_albums( $post_num = -1, $cols = 3 ) {
	global $post;

	$args = array(
			'post_type' => 'cp_gallery',
			'posts_per_page' => $post_num,
			'post__not_in' => array( $post->ID )
		);
	$custom_query = new WP_Query($args);

	if ( $custom_query->have_posts() ) {
		echo '<div class="custom-post-gallery post-grid-' . $cols . ' clearfix">';
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
		    get_template_part( 'partials/content', 'album' );
		endwhile; wp_reset_postdata();
		echo '</div>';
	} // end loop;
}
endif;

if ( ! function_exists( 'wpsp_single_photo_album' ) ) :
/**
 *	Photo Album Detail
 *
 *	Get list of photos of the album
 *
 */
function wpsp_single_photo_album( $post_id, $post_num, $cols = 4 ) {
	$photos = explode( ',', get_post_meta( $post_id, 'sp_gallery', true ) );
	$out = '';
	if ( $photos[0] != '' ) { 
		$photo_num = 1;
		$out .= '<div class="gallery post-grid-' . $cols . ' clearfix">';
		foreach ( $photos as $photo ) { 
			$imageid = wp_get_attachment_image_src( $photo, 'small-thumb' );
			if ( $post_num >= $photo_num ) {
				$out .= '<article id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">';
				$out .= '<div class="thumb-effect">';
				$out .= '<img src="' . $imageid[0] . '">';
				$out .= '<div class="thumb-caption">';
				$out .= '<div class="inner-thumb">';
				$out .= '<a href="' .  wp_get_attachment_url( $photo ) . '">' .  esc_html__('View photo', WPSP_TEXT_DOMAIN ) . '</a>';
				$out .= '</div> <!-- .inner-thumb -->';
				$out .= '</div> <!-- .thumb-caption -->';
				$out .= '</div><!-- .thumb-effect -->';
				$out .= '</article><!-- #post-## -->';
			}
			$photo_num++;
		}
		$out .= '</div>';
	} else {
		$out .= '<h4>' . esc_html__( 'Sorry, there is no photo for this album.', WPSP_TEXT_DOMAIN ) . '</h4>';
	}
	echo $out;
}
endif;
