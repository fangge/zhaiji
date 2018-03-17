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
                query_posts('category_name=notice&posts_per_page=3'); 
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
                    <a class="read-more sliding-link">Read More</a>
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

        <?php query_posts('category_name=news&showposts=5&orderby=post_modified&order=DESC'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img src="<?php 
                            $img_id = get_post_thumbnail_id();
                            $img_url = wp_get_attachment_image_src($img_id, 'full');
                            $img_url = $img_url[0];
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
                                <div class="art-like"><i class="fa fa-heart"></i><span><?php echo(rand(1000, 100000)); ?></span></div>
                                <div class="art-time"><?php the_time('y/n/j') ?></div>
                            </div>
                            <div class="art-box">
                                <h2 class="mt-20"><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                                <p>……</p>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="btn btn-md art-btn btn btn-md btn-icon mt-40 mt-mdm-20">MORE CONTENT<i class="fa fa-angle-right"></i></a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section> <!-- end promo section -->
        <!-- Testimonials -->
<section class="section-wrap parallax-testimonials nopadding relative">

    <div class="relative">
        <div id="owl-testimonials" class="owl-carousel owl-theme light-arrows text-center">

            <div class="item">
                <div class="container testimonial">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Who we are</h2>
                            <p class="testimonial-text">宅寂ZAKEA（广州宅寂品牌策划有限公司）是品牌视觉设计，概念创意传达，互联网用户体验，市场营销策划分析的高端品牌定制机构。<br>
                                致力于为注重“企业形象”和“品牌气质”的客户提供相互尊敬值得信任的网站革新服务。<br>
                                公司成立于2001年，始由历任国际4A广告互动公司的资深总监合伙创办。<br>
                                创意始终坚持颠覆传统，超越平庸，深度融合创新思维与互动技术，致力于为客户呈现有效且具针对性的互动创意。
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container testimonial">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Our creativity</h2>
                            <p class="testimonial-text">我们是天生的完美主义者，我们有着本能的创造力。对我们而言，挑战自己的设计创作极限是种心灵愉悦。我们乐于分享自己<br>
                                的创作果实和战略思想，只为创作更直观友好的用户体验。<br>
                                这势必成为品牌策划之先驱。简而言之，我们是数字化创新的梦想家和探索家，致力于成为行业发展的典范。这些年里，
                                我们不断超越强劲对手，将荣誉和声望尽收囊中。
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container testimonial">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Our idea</h2>
                            <p class="testimonial-text">宅寂（广州宅寂品牌策划有限公司）源自人们对万物敏锐而深刻的观察。痴迷为“宅”，蕴含着不沉湎于世俗财物、
                                社会地位，追求美好之物的超凡心境；极简为“寂”，传达“简约就是美”的脱俗审美态度。<br>
                                “宅寂”在赋予人们对艺术佳作或景致优雅之美的鉴赏能力的同时，不忘向世人传达那些终将转瞬即逝的深刻哲理。<br>
                                宅寂崇尚“少即是多”的审美理念，有着和“大道至简”的异曲同工之妙。它们无不告诫人们摒弃世俗的杂乱无章，褪去
                                浮华和喧嚣，取得不娇柔、无藻饰的简约之美。带着“宅寂”的理念设计出来的作品 ，绝不是偶然随意的肤浅行为，<br>
                                它不花哨不累赘，反而充满宁静和协调，把设计精髓的“极简”艺术诠释得淋漓尽致。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="parallax" data-stellar-background-ratio="0.5"></div>
</section> <!-- end testimonials -->

<!-- Partners -->
<section class="section-wrap partners bg-dark">
    <div class="container">
        <div class="row">

            <div id="owl-partners" class="owl-carousel owl-theme">

                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_1.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_2.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_3.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_4.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_5.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_6.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_1.png?t=1519784610547" alt="">
                    </a>
                </div>
                <div class="item">
                    <a>
                        <img src="<?php bloginfo('template_url'); ?>/img/partner_logo_dark_2.png?t=1519784610547" alt="">
                    </a>
                </div>

            </div> <!-- end carousel -->

        </div>
    </div>
</section> <!-- end partners -->

        <!-- Portfolio 3 Columns-->
<section class="section-wrap bg-light portfolio" id="portfolio1">
    <div class="container-fluid">

        <div class="row heading-row">
            <div class="col-md-12 text-center">
                <h2 class="heading uppercase bottom-line">Best Works</h2>
            </div>
        </div>

        <!-- filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-filter">
                    <a href="#" class="filter active sliding-link" data-filter="*">全部</a>
                    <a href="#" class="filter sliding-link" data-filter=".web-design">游戏作品</a>
                    <a href="#" class="filter sliding-link" data-filter=".branding">其他作品</a>
                    <a href="#" class="filter sliding-link" data-filter=".photography">插画艺术</a>
                    <a href="#" class="filter sliding-link" data-filter=".animation">三维动画</a>
                </div>
            </div>
        </div> <!-- end filter -->

        <div class="row">
            <div id="portfolio-container" class="works-grid grid-4-col no-gutter">

                <?php 
                    $allArr = array();
                    $maxCount = 8;
                    $verticalArr = array();
                    $works_type = array(
                        'web-design',
                        'branding',
                        'photography',
                        'animation'
                    );

                    $mypost = array( 
                        'post_type' => 'zhaiji_works', 
                        'posts_per_page'=>2,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => array_merge( $works_type ),
                                'operator' => 'IN'
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => array_merge( array( 'vertical' ) )
                            )
                        )
                    ); 
                    $loop = new WP_Query( $mypost ); 
                ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php
                        $terms = get_the_terms(get_the_ID(), 'zhaiji_works_media_genre', ' ');
                        if ($terms) {
                            foreach ($terms as $term) {
                                $class .= ' ' . $term->slug;
                            }
                        }

                        $img_id = get_post_thumbnail_id();
                        $img_url = wp_get_attachment_image_src($img_id, 'full');
                        $img_url = $img_url[0];


                        array_push($verticalArr, array(
                            'class' => $class,
                            'img_url' => $img_url,
                            'title' => get_the_title(),
                            'is_photo' => 'photo' == esc_html( get_post_meta( get_the_ID(), 'works_category', true )),
                            'resource' => esc_html( get_post_meta( get_the_ID(), 'works_resource', true ) ),
                        ))
                    ?>

                <?php 
                    endwhile;
                    wp_reset_query();
                ?>

                <?php 

                    $maxCount -= count($verticalArr) * 2;

                    $landscapeArr = array();
                    $mypost = array( 
                        'post_type' => 'zhaiji_works', 
                        'posts_per_page'=> $maxCount,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => array_merge( $works_type ),
                                'operator' => 'IN'
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'zhaiji_works_media_genre',
                                'field' => 'slug',
                                'terms' => array_merge( array( 'landscape' ) )
                            )
                        )
                    ); 
                    $loop = new WP_Query( $mypost ); 
                ?>

                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php 
                        $terms = get_the_terms(get_the_ID(), 'zhaiji_works_media_genre', ' ');
                        if ($terms) {
                            foreach ($terms as $term) {
                                $class = ' ' . $term->slug;
                            }
                        }

                        $img_id = get_post_thumbnail_id();
                        $img_url = wp_get_attachment_image_src($img_id, 'full');
                        $img_url = $img_url[0];

                        array_push($landscapeArr, array(
                            'class' => $class,
                            'img_url' => $img_url,
                            'title' => get_the_title(),
                            'is_photo' => 'photo' == esc_html( get_post_meta( get_the_ID(), 'works_category', true )),
                            'resource' => esc_html( get_post_meta( get_the_ID(), 'works_resource', true ) ),
                        ))
                    ?>

                <?php 
                    endwhile; 
                    wp_reset_query();
                ?>

                <?php 
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
                ?>

                <?php foreach ($allArr as $item) { ?>
                    <div class="work-item<?php echo $item['class']; ?>">
                        <div class="work-container">
                            <div class="work-img rounded">
                                <img src="<?php echo $item['img_url']; ?>" alt="">
                                <div class="work-overlay">
                                    <div class="project-icons">
                                        <?php if ($item['is_photo']) { ?>
                                        <a href="<?php echo $item['img_url']; ?>" class="lightbox-gallery" title="<?php echo $item['title']; ?>"><i class="fa fa-search"></i></a>
                                        <?php } else { ?>
                                        <a href="<?php echo $item['resource']; ?>" class="lightbox-video mfp-iframe"><i class="fa fa-play"></i></a>
                                        <?php } ?>
                                        <a href="#" class="project-icon"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="work-description">
                                    <h2><a href="#"><?php echo $item['title']; ?></a></h2>
                                    <span>
                                        <a href="#"><?php echo $item['class']; ?></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end work-item -->
                <?php } ?>
            </div> <!-- end portfolio container -->
        </div> <!-- end row -->

        <div class="row mt-40">
            <div class="col-md-12 text-center">
                <a href="/works/" class="btn btn-lg btn-icon btn-white" id="load-more"><span>More Works</span><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</section> <!-- end portfolio-->

<?php get_footer();
