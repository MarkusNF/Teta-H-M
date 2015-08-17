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

<div class="wrapper front">
	<div id="banner">
		<!-- <a href="http://www.hm.com/se/" target="_blank"><img src="<?php //echo get_template_directory_uri(); ?>/img/hm_logo2.png" alt="HM logga"></a> -->
		<h1><?php bloginfo('name') ?></h1>
	</div><!-- #banner -->

	<div id="loves">
		
	</div>

	<div id="info">
		<p>Beställ din outfit här, hämta den på din slutdestination</p>
	</div>

	<div class="gender female"></div>
	<div class="gender male"></div>
	<div class="gender hen"></div>
	<div class="category">

		<?php
		$taxonomies = array( 
			'gender_category',
		);

		$args = array(
			'orderby'			=> 'id', 
			'order'				=> 'ASC',
			'hide_empty'		=> false,
			//'include'			=> array(6, 7, 17)
			'include'			=> array(2, 3, 17)
		); 

		$terms = get_terms($taxonomies, $args);

		?>
		<ul>
			<?php
			foreach( $terms as $term ) {

				// Get the term link
				$term_link = get_term_link( $term );

				echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li>';
			}
			?>
		</ul>
	</div><!-- .category -->
</div><!-- .wrapper -->



<?php get_footer(); ?>