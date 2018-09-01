<?php
/*
Template Name: Works Template
*/

get_header(); ?>

<?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $mypost = array( 
        'post_type' => 'zhaiji_works', 
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'zhaiji_works_media_genre',
                'field' => 'slug',
                'terms' => array( 'list-banner' )
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

<div class="container-fluid pt-100">

    <div class="row heading-row">
        <div class="col-md-12 text-center">
            <h2 class="heading uppercase bottom-line">ZAKEA WORKS & BLOG</h2>
        </div>
    </div>

    <div id="portfolio2">
        <!-- filter -->
        <div class="row">
            <div class="col-md-12">
				<?php 
					$taxonomies = get_object_taxonomies('zhaiji_works'); //获取与文章类型相关联的分类法别名
					$tagitems = get_terms( $taxonomies, 'orderby=id&hide_empty=0' ); //获取该分类法的所有分类数组
					$tags = array();
					$tagfilters = array('list-banner','article-banner','landscape','vertical','index-banner');
					foreach ($tagitems as $tagitem) { 
						if (!in_array($tagitem->slug, $tagfilters)) {
							array_push($tags, $tagitem);
						}
					}
				?>
                <div class="portfolio-filter">
                    <a href="#" class="filter active sliding-link" data-filter="*">全部</a>
					<?php foreach ($tags as $tag) { ?>
					<a href="#" class="filter sliding-link" data-filter=".<?php echo $tag->slug;?>"><?php echo $tag->name;?></a>
					<?php } ?>
                </div>
            </div>
        </div> <!-- end filter -->

        <div class="row">
    		<div id="portfolio-container2" class="works-grid grid-4-col no-gutter">

    	        <?php 
					$works_type = array();
					foreach ($tags as $tag) {
						array_push($works_type, $tag->slug);
					}
                    /*$works_type = array(
                                    'web-design',
                                    'game-design',
                                    'branding',
                                    'photography',
                                    'animation',
                                    'blog-news'
                                );*/
                    $mypost = array( 
                        'post_type' => 'zhaiji_works',
                        'paged' => $paged,
                        'posts_per_page' => 16,
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
                                        <a href="<?php echo esc_html( get_post_meta( get_the_ID(), 'works_big_pic', true )); ?>" class="lightbox-gallery" title="<?php the_title(); ?>"><i class="fa fa-search"></i></a>
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
                                    <span>
                                         <?php the_excerpt(); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
    				</div> <!-- end work-item -->
    			<?php endwhile; ?>

    		</div>  <!-- end portfolio container -->
        </div> <!-- end row -->
    </div>
</div>
<div class="page-load-status">
    <div class="loader-ellips infinite-scroll-request">
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
    </div>
    <p class="infinite-scroll-last"><i>End of content</i></p>
    <p class="infinite-scroll-error"><i>No more pages to load</i></p>
</div>

<?php if ($loop->post_count > 0 && $loop->post_count <= 16) { ?>
<a href="/works/page/<?php echo ++$paged ?>/" class="pagination__next"></a>
<?php } ?>


<?php wp_reset_query(); ?>
<?php get_footer(); ?>
