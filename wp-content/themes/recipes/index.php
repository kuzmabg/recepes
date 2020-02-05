<?php get_header(); ?>
	<div class="row">
		<div class="col-sm-8 blog-main">

			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();
             get_template_part( 'content', get_post_format() );
            endwhile; endif;
            
            add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
 
                function add_my_post_types_to_query( $query ) {
                    if ( is_home() && $query->is_main_query() )
                        $query->set( 'post_type', array( 'post', 'recipes' ) );
                    return $query;
                }
            ?>

		</div> <!-- /.blog-main -->

		<?php get_sidebar(); ?>
	</div> <!-- /.row -->
<?php get_footer(); ?>