<?php
/**
 * The template for displaying the footer
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

<div class="footer-banner">
    <img src="<?php bloginfo('template_url'); ?>/img/footer_banner.jpg?t=1519897112210" alt="">
</div>
<!-- Footer Type-1 -->
<footer class="footer footer-type-1 bg-dark">
    <div class="container-fluid semi-fluid">
        <div class="footer-widgets">
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget footer-about-us">
                        <h5 class="bottom-line left-align">Brand communication</h5>
                        <img src="<?php bloginfo('template_url'); ?>/img/reg.jpg?t=1519784610547" alt="">
                        <div class="social-icons dark rounded">
                            <a href="#"><i class="fa fa-weibo"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a><br>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>
                </div> <!-- end about us -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget recent-posts">
                        <h5 class="bottom-line left-align">Friendship link</h5>
                        <div class="entry-list">
                            <ul>
                                <li class="entry-li">
                                   <?php wpjam_blogroll();?>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div> <!-- end latest posts -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget footer-get-in-touch">
                        <h5 class="bottom-line left-align">Contact us</h5>
                        <div class="entry-list">
                            <ul>
                                <li class="entry-li">
                                    <address class="footer-address">中国广东省广州市天河区<br>
                                        临江大道临江上品683号2108室</address>
                                </li>
                                <li class="entry-li">
                                    <p><i class="fa fa-phone"></i> + 1 5920 181 080</p>
                                    <p><i class="fa fa-envelope"></i> <a href="mailto:ZJzakea@163.com" class="sliding-link">ZJzakea@163.com</a></p>
                                    <p><i class="fa fa-fax"></i> +020 2900 3152</p>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div> <!-- end stay in touch -->
                <div class="col-md-3 col-sm-6 col-xs-12 last">
                    <h5 class="bottom-line left-align">Where are we</h5>
                    <a href="https://j.map.baidu.com/yl2HO" target="_blank" class="address-img-link">
                        <img src="<?php bloginfo('template_url'); ?>/img/address.jpg?t=1519784610547" alt="" class="address-img">
                    </a>
                </div> <!-- end recent works -->

            </div>
        </div>
    </div> <!-- end container -->

    <div class="bottom-footer">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 copyright text-center">
                <span>
                  Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
                </span>
                </div>

            </div>
        </div>
    </div> <!-- end bottom footer -->
</footer> <!-- end footer -->

        <div id="back-to-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>
    </div>
</div>
<script src="<?php bloginfo('template_url'); ?>/js/base.min.js?t=1536813259978"></script>

<?php wp_footer(); ?>
</body>

</html>
