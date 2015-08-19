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


	<div id="banner">
		<h1><?php bloginfo('name') ?></h1>
		<img id="logo" src="<?php echo get_template_directory_uri(); ?>/img/nyloves.png" alt="H&M logga"><br />
		<img id="pride" src="<?php echo get_template_directory_uri(); ?>/img/pride.png" alt="Stockholm Pride">
	</div><!-- #banner -->


	<div id="info">
		<p>Beställ din outfit nu, hämta den på Stockholm Central idag!</p>
	</div>

	<div class="gender female"></div>
	<div class="gender male"></div>
	<div class="gender hen"></div>
</div><!-- .wrapper -->

<?php get_footer(); ?>