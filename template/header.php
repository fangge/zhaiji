<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Zhai_ji
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html lang="zh-cmn-Hans">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title><?php if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜索结果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '页面未找到!';
	} else {
		wp_title('',true);
	} ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="front-end" content="MrFangge">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700,600,800,400,300%7CRoboto:700,400,300%7CMerriweather:400,400italic' rel='stylesheet'>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/revolution/css/settings.css?t=1532332338679" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css?t=1532332338679">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>
</head>

<body class="relative<?php if ( is_category() || is_page() ) {
		echo " list";
	} elseif (is_single() ) {
		echo " art";
	} ?>">
<!-- Preloader -->
<div class="loader-mask">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<aside class="sidenav">
    <img src="<?php bloginfo('template_url'); ?>/img/reg.jpg?t=1519784610547" class="reg">
    <p class="reg-intro">更多精彩尽在微信公众号</p>
    <address class="info-address">中国广东省广州市天河区<br>
        临江大道临江上品683号2108室</address>
    <p><i class="phone"></i>15920181080</p>
    <p><i class="email"></i><a href="mailto:ZJzakea@163.com">ZJzakea@163.com</a></p>
    <p><i class="fax"></i>+ 02029003152</p>
    <h6 class="mt-40">在线咨询</h6>
    <ul class="links-list nopadding">
        <li><a href="#">吴总监</a></li>
        <li><a href="#">李经理</a></li>
        <li><a href="#">潘总程</a></li>
        <li><a href="#">冼小姐</a></li>
    </ul>

    <div class="social-icons dark rounded mt-40">
        <a href="#"><i class="fa fa-weibo"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-vimeo"></i></a>
    </div>

    <a href="#" id="sidenav-close">
        <i class="ti-close"></i>
    </a>
</aside>
<div class="main-wrapper">
    <header class="nav-type-1 transparent">
        <nav class="navbar navbar-static-top">
            <div class="navigation">
                <div class="container-fluid semi-fluid relative">

                    <div class="row">

                        <div class="navbar-header">
                            <!-- Logo -->
                            <div class="logo-container">
                                <div class="logo-wrap">
                                    <a href="/">
                                        <img class="logo" src="<?php bloginfo('template_url'); ?>/img/logo_light.png?t=1519784610547" alt="logo">
                                        <img class="logo-dark" src="<?php bloginfo('template_url'); ?>/img/logo_dark.png?t=1519784610547" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>



                        </div> <!-- end navbar-header -->

                        <div class="col-md-12 nav-wrap">
                            <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                                <ul class="nav navbar-nav">
                                    <li><a data-scroll="parallax-testimonials">关于宅寂</a></li>
                                    <li><a data-scroll="icon-boxes">服务内容</a></li>
                                    <li><a data-scroll="portfolio">案例作品</a></li>
                                    <li><a data-scroll="footer">联系我们</a></li>
                                    <li><a data-scroll="promo-section">ZAKEA BLOG</a></li>

                                </ul> <!-- end menu -->
                            </div> <!-- end collapse -->
                        </div> <!-- end col -->

                        <ul class="nav-right hidden-sm hidden-xs">

                            <li class="nav-icon-trigger">
                                <a href="#" id="nav-icon">
                                    <div class="nav-icon-inner">
                                        <div class="nav-icon-wrap">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div> <!-- end navigation -->
        </nav> <!-- end navbar -->
    </header>
    <div class="content-wrapper oh">
