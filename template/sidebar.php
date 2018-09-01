<?php
/**
 * The template for displaying the sidebar
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Zhai_ji
 * @since 1.0
 * @version 1.2
 */
?>
<div class="col-sm-12 col-md-2 pt-70">
	<div class="top-info pb-30"><a href="/" target="_blank">首页</a>/<a href="/works/" target="_blank">列表</a>/<a href="" class="cur">详情</a></div>

    <div class="news-link art-aside">
        <h2>最新文章</h2>
        <ul>
        <?php
            /*$args = array(
                'category_name' => 'news',
                'showposts'=>5,
                'orderby' => 'post_modified',
                'order' => 'DESC'
            );
            query_posts($args);
            while (have_posts()) : the_post(); */
        ?>
        <?php 
            $works_type = array( 'blog-news' );

            $mypost = array( 
                'post_type' => 'zhaiji_works', 
                'posts_per_page'=>5,
						'orderby' => 'date',
						'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'zhaiji_works_media_genre',
                        'field' => 'slug',
                        'terms' => array_merge( $works_type ),
                        'operator' => 'IN'
                    )
                )
            ); 
            $loop = new WP_Query( $mypost ); 
        ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li><a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
    </div>

    <div class="art-aside art-show">
        <h2>最新作品</h2>

        <?php //query_posts(array('post_type'=>'zhaiji_works')); ?>
        <?php 
            $works_type = array(
                'web-design',
                'branding',
                'photography',
                'animation'
            );
            $mypost = array( 
                'post_type' => 'zhaiji_works', 
                'posts_per_page' => 2,
						'orderby' => 'date',
						'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'zhaiji_works_media_genre',
                        'field' => 'slug',
                        'terms' => $works_type
                    )
                )
            ); 
            $loop = new WP_Query( $mypost ); 
        ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="work-item<?php 
                        $terms = get_the_terms($post->ID, 'zhaiji_works_media_genre', ' ');
                        if ($terms) {
                            foreach ($terms as $term) {
                                if (in_array($term->slug, $works_type)) {
                                    echo ' ' . $term->slug;
                                }
                            }
                        }
                    ?>">
            <div class="work-container">
                <div class="work-img rounded">
                    <img src="<?php 
                                $img_id = get_post_thumbnail_id();
                                $img_url = wp_get_attachment_image_src($img_id, 'full');
                                $img_url = $img_url[0];
                                echo $img_url;
                            ?>" alt="">
                    <div class="work-overlay">
                        <div class="project-icons">
										<?php if ('video' == esc_html( get_post_meta( get_the_ID(), 'works_category', true ))) { ?>
											<a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'works_resource', true ) ); ?>" class="lightbox-video mfp-iframe"><i class="fa fa-play"></i></a>
                            <?php } else { ?>
                            <a href="<?php echo $img_url; ?>" class="lightbox-gallery" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
                            <?php } ?>
                            <?php $target_link = esc_html( get_post_meta( get_the_ID(), 'works_link', true ) ); ?>
                            <?php if ($target_link) { ?>
                            <a href="<?php echo $target_link; ?>" class="project-icon" target="_blank"><i class="fa fa-link"></i></a>
                            <?php } else { ?>
                            <a href="<?php echo get_permalink(); ?>" class="project-icon" target="_blank"><i class="fa fa-link"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="work-description">
                        <h2><a href="#"><?php the_title(); ?></a></h2>
                        <span><?php the_excerpt(); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>