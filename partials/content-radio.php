<?php
/**
 * The template used for displaying content format (standard, video, audio)
 *
 * Option: diplay as thumbnail or icon post
 * 
 * @package Klahan9
 */

?>
<?php $sound_url = get_post_meta( get_the_ID(), 'sp_sound_url', true ); ?>	
<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix', 'custom-format-audio' ) ); ?> itemscope itemtype="http://schema.org/Article">
	<?php if ( ! empty( $sound_url ) ) {
			the_title( sprintf( '<h3 class="entry-title" itemprop="name"><a itemprop="url" href="%1$s" rel="bookmark" title="%2$s">', esc_url( get_permalink() ), esc_attr( get_the_title() ) ), '</a></h3>' ); 
		} else {
			the_title( sprintf( '<h3 class="entry-title" itemprop="name">', esc_attr( get_the_title() ) ), '</h3>' ); 	
		}?>
	<div class="entry-meta">
		<!-- <span class="byline"><span class="author vcard"><?php echo esc_html( get_the_author() ); ?></span></span> -->
		<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
	</div>
</article><!-- #post-## -->