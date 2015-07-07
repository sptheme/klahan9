<?php
/**
 * Template part for displaying posts.
 *
 * @package Klahan9
 */

?>

<?php $album_location = get_post_meta( $post->ID, 'sp_album_location', true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<div class="thumb-effect">
	<?php
		echo '<a href="' . get_permalink() . '" title="' . esc_html__('View Photo ', WPSP_TEXT_DOMAIN) . esc_html( get_the_title() ) . '" rel="bookmark">';
		if (has_post_thumbnail()) {
		    echo the_post_thumbnail('small-thumb');
		} else { 
			echo '<img src="' . ot_get_option( 'post-placeholder' ) . '">';
		}
		echo '</a>'; 
	?>
	<?php the_title( sprintf( '<h4 class="entry-title" itemprop="name"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
		
		<div class="album-meta">
			<?php esc_html_e( 'at ', WPSP_TEXT_DOMAIN ); ?>
			<strong><?php echo esc_html__( $album_location ); ?></strong>
			<?php esc_html_e( ', on ', WPSP_TEXT_DOMAIN ); ?> 
			<?php echo esc_html( get_the_date() ); ?>
		</div><!-- .entry-meta -->
			
	</div><!-- .thumb-effect -->
</article><!-- #post-## -->
