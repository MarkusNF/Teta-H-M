<?php 
/**
* The template for displaying taxonomy (categories) menu of CPT.
*
* @package Teta
* @subpackage Outfitmaker
* @since PACKAGE VERSION 1.0
*
*/
get_header();

$term = get_queried_object();
$term_id = $term->term_id;
$taxonomy_name = $term->taxonomy;

$termchildren = get_term_children( $term_id, $taxonomy_name );

?>

<div class="wrapper mix">
	<div class="menu">
		<div class="pagelogo">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/litenloves.png" alt="HM logga"></a>
			<img class="pridemix" src="<?php echo get_template_directory_uri(); ?>/img/pride_liten.png" alt="Stockholm Pride">
		</div>
		<ul>
			<?php

			foreach ( $termchildren as $child ) {
				$term = get_term_by( 'id', $child, $taxonomy_name );
				echo '<li><a href="#" id="' . $term->slug . '">' . $term->name . '</a></li>';
			}
			?>
		</ul>
	</div>

	<img class='back' src="<?php echo get_template_directory_uri(); ?>/img/curtainrod.png"/>

	<div id="clothes">
		<?php
		if( have_posts() ) {
			$i = 0;
			while( have_posts() ) {
				the_post();
				$term_list = wp_get_post_terms( get_the_ID(), 'gender_category', array('fields' => 'all'));

				$slug_list = array();
				foreach ($term_list as $the_term) {
					if ($the_term->parent != 0) {
						$slug_list[] = $the_term->slug;
					}
				}

				?>
				<div class="cover <?php echo implode(' ', $slug_list); ?>">
					<img class='hanger' src="<?php echo get_template_directory_uri(); ?>/img/hanger.png"></br>
					<?php
					if( has_post_thumbnail() ) {
						the_post_thumbnail( 'clothes-thumb', array( 'id' => 'drag'.$i++ ));
					}
					?>
				</div><!-- .cover -->
				<?php
			}
		}
		?>
	</div><!-- #clothes -->

		<div id="bed"></div>
		<div id="bin"></div>

		<div class="clearfix"></div>
		<div id="order">
			<a href="https://www.hm.com/se/bag/login" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/hmButton.png" alt="Beställ"></a>
		</div>

</div><!-- .wrapper -->
<?php get_footer(); ?>