<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zhai_ji
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- Revolution Slider -->
<section>
    <div class="rev_slider_wrapper">
        <div class="rev_slider" id="slider1" data-version="5.0">
            <ul>
                <?php 
                    $mypost = array( 
                        'post_type' => 'zhaiji_works', 
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => array( 'index-banner' )
                            )
                        )
                    ); 
                    $loop = new WP_Query( $mypost ); 
                ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <!-- SLIDE 1 -->
                    <li data-fstransition="fade"
                        data-transition="zoomout"
                        data-slotamount="1"
                        data-masterspeed="1000"
                        data-delay="8000"
                        data-title="<?php the_title(); ?>">

                        <!-- MAIN IMAGE -->
                        <img src="<?php 
                                $img_id = get_post_thumbnail_id();
                                $img_url = wp_get_attachment_image_src($img_id, 'full');
                                $img_url = $img_url[0];
                                echo $img_url;
                            ?>"
                             alt=""
                             data-bgrepeat="no-repeat"
                             data-bgfit="cover"
                             data-bgparallax="7"
                             class="rev-slidebg"
                        >
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</section>

<!-- Icon Boxes -->
<section class="section-wrap icon-boxes bg-light pb-40 pb-sml-80">
    <div class="container">

        <div class="row">

            <?php 
                query_posts('category_name=brand&posts_per_page=3'); 
                $i = 0;
            ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="col-md-4 col-sm-6 mb-50">
                <div class="service-item-box style-1 text-center <?php 
                                if ($i == 0) { echo 'red'; }
                                if ($i == 1) { echo 'turquoise'; }
                                if ($i == 2) { echo 'violet'; }
                            ?>">
                    <img src="<?php 
                                $img_id = get_post_thumbnail_id();
                                $img_url = wp_get_attachment_image_src($img_id, 'full');
                                $img_url = $img_url[0];
                                echo $img_url;
                            ?>" alt="">
                    <h3><?php the_title(); ?></h3>
                    <blockquote><?php echo esc_html( get_post_meta( $post->ID, 'title_en', true ) ); ?></blockquote>
                    <p class="mb-10"><?php echo esc_html( get_the_excerpt() ); ?></p>
                    <a class="read-more sliding-link" href="/works/" target="_blank">Read More</a>
                </div>
            </div> <!-- end service item -->
            <?php $i++ ?>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section> <!-- end icon boxes -->

<!-- Promo Section -->
<section class="section-wrap promo-section pt-90 pb-130 pt-mdm-80 pb-mdm-80 relative">
    <h2 class="title">ZAKEA BLOG</h2>
    <div class="customNavigation">
        <a class="btn prev"></a>
        <a class="btn next"></a>
    </div>
    <div id="owl-promo" class="owl-carousel owl-theme">

        <?php //query_posts('category_name=news&showposts=5&orderby=post_modified&order=DESC'); ?>
        <?php //if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php 
            $works_type = array('blog-news');
            $mypost = array( 
                'post_type' => 'zhaiji_works', 
                'posts_per_page'=>5,
                'orderby'=>'date',
                'order'=>'DESC',
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
        <div class="item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img src="<?php 
                            $img_id = get_post_thumbnail_id();
                            // $img_url = wp_get_attachment_image_src($img_id, 'full');
                            // $img_url = $img_url[0];
                            $img_url = esc_html( get_post_meta( get_the_ID(), 'works_home_big_pic', true ) );
                            echo $img_url;
                        ?>" alt="" class="promo-img wow slideInLeft" data-wow-duration="1.2s" data-wow-delay="0s">
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <article>
                            <div class="art-author">
                                <!--<img src="" alt="">-->
                                <?php echo get_avatar( get_the_author_email(), '76' );?>
                                <p><?php the_author_nickname(); ?></p>
                            </div>
                            <div class="art-info">
                                <div class="art-like">
    <i data-action="ding" data-id="<?php the_ID(); ?>" class="fa fa-heart specsZan <?php if(isset($_COOKIE['specs_zan_'.$post->ID])) echo 'done';?>"><span class="count">
        <?php if( get_post_meta($post->ID,'specs_zan',true) ){
            		echo get_post_meta($post->ID,'specs_zan',true);
                } else {
					echo '0';
				}?></span>
    </i>
</div>
                                <div class="art-time"><?php the_time('y/n/j') ?></div>
                            </div>
                            <div class="art-box">
                                <h2 class="mt-20"><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                                <p>……</p>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-md art-btn btn btn-md btn-icon mt-40 mt-mdm-20" target="_blank">MORE CONTENT<i class="fa fa-angle-right"></i></a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php //endif; ?>
    </div>
</section> <!-- end promo section -->

<!-- Testimonials -->
<section class="section-wrap parallax-testimonials nopadding relative">

    <div class="relative">
        <div id="owl-testimonials" class="owl-carousel owl-theme light-arrows text-center">

            <?php query_posts('category_name=testimonial&showposts=5&orderby=post_modified&order=DESC'); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="item">
                    <div class="container testimonial">
                        <div class="row">
                            <div class="col-md-8">
                                <h2><?php the_title(); ?></h2>
                                <p class="testimonial-text"><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>

    <div class="parallax" data-stellar-background-ratio="0.5"></div>
</section> <!-- end testimonials -->

<!-- Partners -->
<section class="section-wrap partners bg-dark">
    <div class="container">
        <div class="row">

            <div id="owl-partners" class="owl-carousel owl-theme">

                <?php query_posts('category_name=partner&nopaging=true'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="item">
                        <a>
                            <img src="<?php 
                                            $img_id = get_post_thumbnail_id();
                                            $img_url = wp_get_attachment_image_src($img_id, 'full');
                                            $img_url = $img_url[0];
                                            echo $img_url;
                                        ?>" alt="">
                        </a>
                    </div>
                <?php endwhile; ?>
						<?php wp_reset_query(); ?>
                <?php endif; ?>

            </div> <!-- end carousel -->

        </div>
    </div>
</section> <!-- end partners -->

        <!-- Portfolio 3 Columns-->
<section class="section-wrap bg-light portfolio">
    <div class="container-fluid">

        <div class="row heading-row">
            <div class="col-md-12 text-center">
                <h2 class="heading uppercase bottom-line">Best Works</h2>
            </div>
        </div>

        <!-- filter -->
        <div class="row">
            <div class="col-md-12" id="portfolio1">
				<?php 
					$taxonomies = get_object_taxonomies('zhaiji_works'); //获取与文章类型相关联的分类法别名
					$tagitems = get_terms( $taxonomies, 'orderby=id&hide_empty=0' ); //获取该分类法的所有分类数组
					$tags = array();
					$tagfilters = array('list-banner','article-banner','landscape','vertical','index-banner','blog-news');
					foreach ($tagitems as $tagitem) { 
						if (!in_array($tagitem->slug, $tagfilters)) {
							array_push($tags, $tagitem);
						}
					}
				?>
                <div class="portfolio-filter">
                    <a class="active sliding-link" data-filter=".type_all">全部</a>
					<?php foreach ($tags as $tag) { ?>
						<a class="sliding-link" data-filter=".type_<?php echo $tag->slug;?>"><?php echo $tag->name;?></a>
					<?php } ?>
                </div>
            </div>
        </div> <!-- end filter -->

        <div class="row">
            <div id="portfolio-container" class="works-grid grid-4-col no-gutter">
<?php
		$works_type = array();
		foreach ($tags as $tag) {
			array_push($works_type, $tag->slug);
		}
		function getListByTypeAndDir($types,$num,$dir) {
			$list = array();
			$mypost = array(
                        'post_type' => 'zhaiji_works',
                        'posts_per_page'=>$num,
						'orderby' => 'date',
						'order' => 'DESC',
                        'tax_query' => array(
							'relation' => 'AND',
                            array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => $types,
                                'operator' => 'IN'
                            ),
							array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => array_merge( array( $dir ) )
                            )
                        )
                    );
                    $loop = new WP_Query( $mypost );
			while ( $loop->have_posts() ) : $loop->the_post();
			$terms = get_the_terms(get_the_ID(), 'zhaiji_works_media_genre', ' ');
                        $class = '';
                        if ($terms) {
                            foreach ($terms as $term) {
                                $class .= ' ' . $term->slug;
                            }
                        }

                        $img_id = get_post_thumbnail_id();
                        $img_url = wp_get_attachment_image_src($img_id, 'full');
                        $img_url = $img_url[0];
			$list[] = array(
                            'class' => $class,
                            'img_url' => $img_url,
                            'art_url' =>get_permalink(),
                            'title' => get_the_title(),
                            'excerpt' => get_the_excerpt(),
                            'is_video' => 'video' == esc_html( get_post_meta( get_the_ID(), 'works_category', true )),
                            'resource' => esc_html( get_post_meta( get_the_ID(), 'works_resource', true ) ),
                            'target_link' => esc_html( get_post_meta( get_the_ID(), 'works_link', true ) ),
                            'big_pic' => esc_html( get_post_meta( get_the_ID(), 'works_big_pic', true ) )
                        );
			endwhile;
			wp_reset_query();
			return $list;
		}
		function getListByType($types) {
			$verticalArr = getListByTypeAndDir($types,2,'vertical');
			$maxCount = 8-count($verticalArr) * 2;
			$landscapeArr = getListByTypeAndDir($types,$maxCount,'landscape');
			$allArr=array();
			if (count($verticalArr) < 2) {
				array_splice($landscapeArr, 0, 0, $verticalArr);
				$allArr = $landscapeArr;
			    } else {
				if (count($landscapeArr) > 1) {
				    array_splice($landscapeArr, 0, 0, array($verticalArr[0]));
				    array_splice($landscapeArr, 2, 0, array($verticalArr[1]));
				    $allArr = $landscapeArr;
				} else {
				    array_splice($verticalArr, 2, 0, $landscapeArr);
				    $allArr = $verticalArr;
				}
			    }
			return $allArr;
		}
                    /*$works_type = array(
                        'game-design',
                        'branding',
                        'photography',
                        'animation',
                        'web-design'
                    );*/
		    $allArr = getListByType($works_type);
		    $listArr = array();
		    $listArr['all'] = $allArr;
		    foreach($works_type as $type) {
			$lists = getListByType(array($type));
			$listArr[$type] = $lists;
		    }
		?>

                <?php foreach ($listArr as $ptype=>$lists) { ?>
                <?php foreach ($lists as $item) { ?>
                    <div class="type_<?php echo $ptype; ?> work-item<?php echo $item['class']; ?>">
                        <div class="work-container">
                            <div class="work-img rounded">
                                <img src="<?php echo $item['img_url']; ?>" alt="">
                                <div class="work-overlay">
                                    <div class="project-icons">
                                        <?php if ($item['is_video']) { ?>
                                        <a href="<?php echo $item['resource']; ?>" class="lightbox-video mfp-iframe"><i class="fa fa-play"></i></a>
                                        <?php } else { ?>
                                        <a href="<?php echo $item['big_pic']; ?>" class="lightbox-gallery" title="<?php echo $item['title']; ?>"><i class="fa fa-search"></i></a>
                                        <?php } ?>
										<?php if ($item['target_link']) { ?>
                                        <a href="<?php echo $item['target_link']; ?>" class="project-icon" target="_blank"><i class="fa fa-link"></i></a>
										<?php } else { ?>
										<a href="<?php echo $item['art_url']; ?>" class="project-icon" target="_blank"><i class="fa fa-link"></i></a>
										<?php } ?>
                                    </div>
                                </div>
                                <div class="work-description">
                                    <h2><?php echo $item['title']; ?></h2>
                                    <span>
                                        <?php echo $item['excerpt']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end work-item -->
                <?php } ?>
		 <?php } ?>
            </div> <!-- end portfolio container -->
        </div> <!-- end row -->

        <div class="row mt-40">
            <div class="col-md-12 text-center">
                <a href="/works/" class="btn btn-lg btn-icon btn-white" id="load-more" target="_blank"><span>More Works</span><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</section> <!-- end portfolio-->

<?php get_footer();
