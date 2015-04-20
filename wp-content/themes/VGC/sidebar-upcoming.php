<?php
global $postsDisplay;
$paged = get_query_var('paged', 1);
$catSlug = get_query_var('category_name', 'events');
$postsPerPage = 3; //get_option( 'posts_per_page' );
$args = array(
    'posts_per_page' => $postsPerPage,
    'orderby' => 'viewed_count_num',
    'order' => 'DESC',
    'post_status' => 'publish',
    'paged' => $paged,
    'post_type' => 'post',
    'category_name' => $catSlug,
    'post__not_in' => $postsDisplay
);
// the query
$the_query = new WP_Query($args);
?>
<div class="ma-featured-products">
    <div class="popular-title">
        <h2>Upcoming Events</h2>
    </div>
    <?php if ($the_query->have_posts()) : ?>
    <ul class="popular-post events">
        <?php while ($the_query->have_posts()) :
            $the_query->the_post();
            $postDate = get_the_date('F j, Y', $post);?>
        <li class="post-box">
            <div class="cnt-inner">
                <div class="post-data">
                    <div class="post-title"><a href="<?php the_permalink();?>"
                                               title="<?php the_title();?>"><?php the_title();?></a></div>
                    <div class="post-info"><span class="thetime"><?php echo $postDate;?></span></div>
                </div>
            </div>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</div>
<?php get_template_part('templates/banner', 'sale');?>