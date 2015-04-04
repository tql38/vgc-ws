<?php
/**
 * The template for displaying Taxonomy pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
    <div class="main-container col2-left-layout">
        <div class="container">
            <div class="container-inner">
                <div class="main">
                    <div class="row">
                        <?php if ( have_posts() ) : ?>

                            <header class="archive-header">
                                <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>

                                <?php
                                // Show an optional term description.
                                $term_description = term_description();
                                if ( ! empty( $term_description ) ) :
                                    printf( '<div class="taxonomy-description">%s</div>', $term_description );
                                endif;
                                ?>
                            </header><!-- .archive-header -->
                            Product taxonomy
                            <?php
                            // Start the Loop.
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the post format-specific template for the content. If you want to
                                 * use this in a child theme, then include a file called called content-___.php
                                 * (where ___ is the post format) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format() );

                            endwhile;
                            // Previous/next page navigation.
                            twentyfourteen_paging_nav();

                        else :
                            // If no content, include the "No posts found" template.
                            get_template_part( 'content', 'none' );

                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end main-container-->
<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
