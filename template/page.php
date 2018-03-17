<?php
/**
 * The template for displaying all medias
 *
 * @package WordPress
 * @subpackage Zhai_ji
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="art-banner">
    <h2>Filling our days.<span>Feeding our passion.</span></h2>
    <p>我们是天生的完美主义者，我们有着本能的创造力。对我们而言，挑战自己的设计创作极限是种心灵愉悦。我们乐于分享自己的创作果实和战略思想，只为创作更直观友好的用户体验。<br>这势必成为品牌策划之先驱。</p>
    <img src="<?php bloginfo('template_url'); ?>/img/reg.jpg?t=1519897112210" alt="">
</section>

<div class="container-fluid pt-100">

    <div class="row heading-row">
        <div class="col-md-12 text-center">
            <h2 class="heading uppercase bottom-line">ZAKEA WORKS & BLOG</h2>
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

        <?php if ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endif; ?>

    </div> <!-- end row -->

</div>
<div class="page-load-status">
    <div class="loader-ellips infinite-scroll-request">
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
    </div>
    <p class="infinite-scroll-last">End of content</p>
    <p class="infinite-scroll-error">No more pages to load</p>
</div>
<a href="list2.html" class="pagination__next"></a>

<?php get_footer();
