<?php 
/**
* The template for displaying taxonomy (categories) menu of CPT.
*
* @package Diana Castro
* @subpackage Portfolio2015
* @since PACKAGE VERSION 1.0
*
*/
get_header();

$term = get_queried_object();
$term_id = $term->term_id;
$taxonomy_name = $term->taxonomy;

$termchildren = get_term_children( $term_id, $taxonomy_name );

?>
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
			//the_title();
			?>
			<div class="cover ">
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
<div class="wrapper">
		<div id="bed"></div>
		<div id="bin"></div>

		<div class="clearfix"></div>
		
		<select name="categories" id="background">
			<option value="backgroundDefault">Choose background</option>
			<option value="summer">Summer</option>
			<option value="beach">Beach</option>
		</select>
		
		<div class="buttons"></div>

		<div id="sidebar">
			<div class="tips"></div>
			<div class="bloggers"></div>
		</div>

	</div><!-- .wrapper -->
<?php get_footer(); ?>