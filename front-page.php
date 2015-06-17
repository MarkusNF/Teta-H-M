<?php
/**
* The template for displaying one page layout.
* Contains startpage/about/portfolio/contact.
*
* @package Teta
* @subpackage Outfitmaker
* @since PACKAGE VERSION 1.0
*
*/
get_header(); ?>

<div class="clearfix"></div>

<div class="wrapper">
	<div id="banner">
		<a href="http://www.hm.com/se/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/hm_logo2.png" alt="HM logga"></a>
		<h1><?php bloginfo('name') ?></h1>
	</div><!-- #banner -->

	<div class="gender female"></div>
	<div class="gender male"></div>
	<div class="category">

	<?php
	$taxonomies = array( 
		'gender_category',
	);

	$args = array(
		'orderby'			=> 'id', 
		'order'				=> 'ASC',
		'hide_empty'		=> true,
		'include'			=> array(2, 3)
	); 

	$terms = get_terms($taxonomies, $args);

	foreach( $terms as $term ) {

		// Get the term link
		$term_link = get_term_link( $term );

		echo '<ul><li><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li></ul>';
	}
	?>
	</div><!-- .category -->
</div><!-- .wrapper -->



<?php get_footer(); ?>