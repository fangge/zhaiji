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

<section class="art-col row"><div class="col-sm-12 col-md-10 pt-70"><h2 class="heading uppercase bottom-line">ZAKEA WORKS & BLOG</h2>
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
						<div class="art-like">
    <i data-action="ding" data-id="<?php the_ID(); ?>" class="fa fa-heart specsZan <?php if(isset($_COOKIE['specs_zan_'.$post->ID])) echo 'done';?>"><span class="count">
        <?php if( get_post_meta($post->ID,'specs_zan',true) ){
            		echo get_post_meta($post->ID,'specs_zan',true);
                } else {
					echo '0';
				}?></span>
    </i>
</div>
                    </div>
                </div>
                <?php the_content(); ?>
                <p><br></p>
            <?php endwhile; // End of the loop. ?>
			
			
			<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"<?php the_title(); ?>","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","tsina","qzone","sqq"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
			

        </article>
    </div>
    
    <?php get_sidebar(); ?>

</section>

<?php get_footer();
