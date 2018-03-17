<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Zhai_ji
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php 
    $mypost = array( 
        'post_type' => 'zhaiji_works', 
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'zhaiji_works_media_genre',
                'field' => 'slug',
                'terms' => array( 'article-banner' )
            )
        )
    ); 
    $loop = new WP_Query( $mypost ); 
?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<section class="art-banner" 
         style="background-image: url(<?php 
                    $img_id = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_image_src($img_id, 'full');
                    $img_url = $img_url[0];
                    echo $img_url;
                ?>)"></section>
<?php endwhile; ?>
<?php wp_reset_query(); ?>

<section class="art-col row">
    <div class="col-sm-12 col-md-8 pt-70">
        <h2 class="heading uppercase bottom-line">ZAKEA WORKS & BLOG</h2>
        <article class="art-cont">
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="art-blockquote">
                    <div class="art-author">
                        <?php echo get_avatar( get_the_author_email(), '76' );?>
                        <p><?php the_author_nickname(); ?></p>
                    </div>
                    <div class="art-info">
                        <div class="art-time"><?php the_time('y/n/j') ?></div>
                        <div class="art-like"><i class="fa fa-heart"></i><span><?php echo(rand(1000, 100000)); ?></span></div>
                    </div>
                </div>
                <?php the_content(); ?>
                <p><br></p>
            <?php endwhile; // End of the loop. ?>
        </article>
    </div>
    
    <?php get_sidebar(); ?>

</section>

<?php get_footer();
