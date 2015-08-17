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
		<a href="http://www.hm.com/se/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/HM_logo.png" alt="HM logga"></a>
		<ul>
			<?php

			foreach ( $termchildren as $child ) {
				$term = get_term_by( 'id', $child, $taxonomy_name );
				//echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
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
				$term_list = wp_get_post_terms( get_the_ID(), 'gender_category', array("fields" => 'all'));

				?>
				<div class="cover <?php echo $term_list[1]->slug; ?>">
					<img class='hanger' src="<?php echo get_template_directory_uri(); ?>/img/hanger.png"></br>
					<?php
					if( has_post_thumbnail() ) {
						the_post_thumbnail( 'thumbnail', array( 'id' => 'drag'.$i++ ));
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
</div><!-- .wrapper -->
<?php get_footer(); ?>