<?php 
use app\models\Category;
use app\models\Post;

$c = new Category();
$p = new Post();

?>

<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<div id="my_switcher" class="my_switcher">
    <ul>
        <li>
            <a href="javascript: void(0);" data-theme="light" class="setColor light">
                <span title="Light Mode">Light</span>
            </a>
        </li>
        <li>
            <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                <span title="Dark Mode">Dark</span>
            </a>
        </li>
    </ul>
</div>
<!-- Start Header -->
<header class="header axil-header header-style-6  header-light header-sticky ">
    <div class="header-top">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xl-4">
                <ul class="social-icon color-white md-size justify-content-center justify-content-sm-start">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>


            <div class="col-lg-2 col-md-6 col-sm-6 col-xl-4">
                <div class="logo text-center">
                    <a href="index">
                        <img class="dark-logo" src="assets/images/blog.sntaks-logo.png" alt="Blog.Sntaks.Logo">
                        <img class="light-logo" src="assets/images/blog.sntaks-logo.png" alt="Blog.Sntaks.Logo">
                    </a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 col-sm-12 col-xl-4">
                <div class="header-top-bar d-flex justify-content-center justify-content-lg-end flex-wrap align-items-center">
                    <ul class="header-top-date liststyle d-flex flrx-wrap align-items-center mr--20">
                        <li><a href="#"><?php echo date('jS F Y'); ?></a></li>
                    </ul>
                    <ul class="header-top-nav liststyle d-flex flrx-wrap align-items-center">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-7 col-12">
                <div class="mainmenu-wrapper d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                            <li>
                                <a href="home">Home</a>
                            </li>

                            <li class="menu-item-has-children"><a href="#">Posts</a>
                                <ul class="axil-submenu">
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Recent Posts">Recent Posts</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Top Posts">Top Posts</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="hover-flip-item-wrapper" href="#">
                                            <span class="hover-flip-item">
                                                <span data-text="Popular Posts">Popular Posts</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children megamenu-wrapper"><a href="#">Categories</a>
                                <ul class="megamenu-sub-menu">
                                    <li class="megamenu-item">

                                        <!-- Start Verticle Nav  -->
                                        <div class="axil-vertical-nav">
                                            <ul class="vertical-nav-menu">
                                                <?php
                                                $categories = $c->getCategories(); $i=1;
                                                foreach($categories as $k=>$v){ $categoryIds[] = $v['uid']; ?>
                                                    <li class="vertical-nav-item <?php echo $k==0?'active':''; ?>">
                                                        <a class="hover-flip-item-wrapper" href="<?php echo "#tab".++$i; ?>">
                                                            <span class="hover-flip-item">
                                                                <span data-text="<?php echo $v['name'] ?>"><?php echo $v['name'] ?></span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <!-- Start Verticle Nav  -->

                                        <!-- Start Verticle Menu  -->
                                        <div class="axil-vertical-nav-content">
                                            <?php $i=1; foreach($category_ids as $k=>$categoryId){ $categoryPosts = $p->getPosts("categoryId=$categoryId"); ?>
                                                <!-- Start One Item  -->
                                                <div class="axil-vertical-inner tab-content" id="tab<?php echo $i++ ?>" <?php echo $k==0?'style="display: block;"':'' ?>>
                                                    <div class="axil-vertical-single">
                                                        <div class="row">
                                                            <?php $l=1; foreach($categoryPosts as $j=>$v){ ?>
                                                                <!-- Start Post List  -->
                                                                <div class="col-lg-3">
                                                                    <div class="content-block image-rounded">
                                                                        <div class="post-thumbnail mb--20">
                                                                            <a href="#">
                                                                                <img class="w-100" src="assets/images/others/mega-post-0<?php echo $l++; ?>.jpg" alt="Post Images">
                                                                            </a>
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <div class="post-cat">
                                                                                <div class="post-cat-list">
                                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                                <span class="hover-flip-item">
                                                                                    <span data-text="<?php echo $v['title'] ?>"><?php echo $v['title'] ?></span>
                                                                                </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="title"><a href="#"><?php echo shortenString($v['content'], 60) ?></a></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End Post List  -->
                                                            <?php if($j>=3) break; else continue; } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End One Item  -->
                                            <?php } ?>
                                        </div>
                                        <!-- End Verticle Menu  -->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                </div>
            </div>
            <div class="col-xl-5 col-12">
                <div class="header-search d-flex flex-wrap align-items-center justify-content-center justify-content-xl-end">
                    <form class="header-search-form d-sm-block d-none">
                        <div class="axil-search form-group">
                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                    <div class="mobile-search-wrapper d-sm-none d-block">
                        <button class="search-button-toggle"><i class="fal fa-search"></i></button>
                        <form class="header-search-form">
                            <div class="axil-search form-group">
                                <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <ul class="metabar-block">
                        <li class="icon"><a href="#"><i class="fas fa-bookmark"></i></a></li>
                        <li class="icon"><a href="#"><i class="fas fa-bell"></i></a></li>
                        <li><a href="#"><img src="<?php echo get_gravatar('vincentkioko51@gmail.com') ?>" alt="Author Images"></a></li>
                    </ul>
                    <!-- Start Hamburger Menu  -->
                    <div class="hamburger-menu d-block d-xl-none">
                        <div class="hamburger-inner">
                            <div class="icon"><i class="fal fa-bars"></i></div>
                        </div>
                    </div>
                    <!-- End Hamburger Menu  -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start Header -->

<!-- Start Mobile Menu Area  -->
<div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            <div class="logo">
                <a href="index-2.html">
                    <img class="dark-logo" src="assets/images/logo/logo-black.png" alt="Logo Images">
                    <img class="light-logo" src="assets/images/logo/logo-white2.png" alt="Logo Images">
                </a>
            </div>
            <div class="mobile-close">
                <div class="icon">
                    <i class="fal fa-times"></i>
                </div>
            </div>
        </div>
        <ul class="mainmenu">
            <li class="menu-item-has-children"><a href="#">Home</a>
                <ul class="axil-submenu">
                    <li><a href="index-2.html">Home Default</a></li>
                    <li><a href="home-creative-blog.html">Home Creative Blog</a></li>
                    <li><a href="home-seo-blog.html">Home Seo Blog</a></li>
                    <li><a href="home-tech-blog.html">Home Tech Blog</a></li>
                    <li><a href="home-lifestyle-blog.html">Home Lifestyle Blog</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Categories</a>
                <ul class="axil-submenu">
                    <li><a href="post-details.html">Accessibility</a></li>
                    <li><a href="post-details.html">Android Dev</a></li>
                    <li><a href="post-details.html">Accessibility</a></li>
                    <li><a href="post-details.html">Android Dev</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Post Format</a>
                <ul class="axil-submenu">
                    <li><a href="post-format-standard.html">Post Format Standard</a></li>
                    <li><a href="post-format-video.html">Post Format Video</a></li>
                    <li><a href="post-format-gallery.html">Post Format Gallery</a></li>
                    <li><a href="post-format-text.html">Post Format Text Only</a></li>
                    <li><a href="post-layout-1.html">Post Layout One</a></li>
                    <li><a href="post-layout-2.html">Post Layout Two</a></li>
                    <li><a href="post-layout-3.html">Post Layout Three</a></li>
                    <li><a href="post-layout-4.html">Post Layout Four</a></li>
                    <li><a href="post-layout-5.html">Post Layout Five</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Pages</a>
                <ul class="axil-submenu">
                    <li><a href="post-list.html">Post List</a></li>
                    <li><a href="archive.html">Post Archive</a></li>
                    <li><a href="author.html">Author Page</a></li>
                    <li><a href="about.html">About Page</a></li>
                    <li><a href="maintenance.html">Maintenance</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </li>
            <li><a href="404.html">404 Page</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
        <div class="buy-now-btn">
            <a href="#">Buy Now <span class="badge">$15</span></a>
        </div>
    </div>
</div>
<!-- End Mobile Menu Area  -->