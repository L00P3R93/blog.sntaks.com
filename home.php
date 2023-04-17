<!DOCTYPE html>
<html lang="en">
    <?php include 'components/base/header.php'; ?>
    <body>
        <div class="main-wrapper">
            <?php include 'components/nav/nav.php'?>

            <h1 class="d-none">Home Blog.Sntaks</h1>
            <div class="axil-seo-post-banner seoblog-banner axil-section-gap bg-color-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                            <?php $post_viewed_category = $category->getCategoryById($post_viewed->getCategoryId()); $post_viewed_category_name = $post_viewed_category->getName(); ?>
                            <!-- Start Post Grid  -->
                            <div class="content-block post-grid post-grid-large">
                                <div class="post-thumbnail">
                                    <a href="#">
                                        <img src="assets/images/post-images/post-seo-grid-01.jpg" alt="Post Images">
                                    </a>
                                </div>
                                <div class="post-grid-content">
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                    <span class="hover-flip-item">
                                                        <span data-text="<?php echo $post_viewed_category_name ?>"><?php echo $post_viewed_category_name ?></span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h3 class="title"><a href="#"><?php echo $post_viewed->getTitle() ?></a></h3>
                                        <div class="post-meta-wrapper">
                                            <div class="post-meta">
                                                <div class="post-author-avatar border-rounded">
                                                    <img src="assets/images/post-images/author/author-image-2.png" alt="Author Images">
                                                </div>
                                                <div class="content">
                                                    <h6 class="post-author-name">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="<?php echo $post_viewed->getAuthor() ?>"><?php echo $post_viewed->getAuthor() ?></span>
                                                            </span>
                                                        </a>
                                                    </h6>
                                                    <ul class="post-meta-list">
                                                        <li><?php echo date('jS M, Y', strtotime($post_viewed->getPublishedDate())) ?></li>
                                                        <li><?php echo $util->formatViews($post_viewed->getViewsCount())?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="social-share-transparent justify-content-end">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fas fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Post Grid  -->
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-12 col-12 mt_md--30 mt_sm--30">
                            <?php $i=1; foreach($categories_with_posts as $k=>$v){ $category_id = $v['uid']; $category = $category->getCategoryById($category_id); ?>
                                <!-- Start Single Post  -->
                                <div class="content-block post-medium post-medium-border">
                                    <div class="post-thumbnail">
                                        <a href="#">
                                            <img src="assets/images/post-images/post-seo-sm-0<?php echo $i++; ?>.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <span data-text="<?php echo $v['name'] ?>"><?php echo $v['name']."-$category_id" ?></span>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="#"><?php echo $util->shortenString($category->getDescription(), 50)  ?></a></h4>
                                    </div>
                                </div>
                                <!-- End Single Post  -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Tab Area  -->
            <div class="axil-tab-area axil-section-gap bg-color-white">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-lg-12">
                            <div class="axil-banner mb--30">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="w-100" src="assets/images/add-banner/banner-03.png" alt="Banner Images">
                                    </a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title">What's new at Blog.Sntaks</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Tab Button  -->
                            <ul class="axil-tab-button nav nav-tabs mt--20" id="axilTab" role="tablist">
                                <?php $i=1; $category_ids = []; foreach($recent_categories as $k=>$v){ $category_ids[] = $v['uid']; ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link <?php echo $k==0?'active':''; ?>" id="tab-<?php echo $util->intToWord($i) ?>" data-bs-toggle="tab" href="#tab<?php echo $util->intToWord($i) ?>" role="tab" aria-controls="tab-<?php echo $util->intToWord($i) ?>" aria-selected="true"><?php echo $v['name'] ?></a>
                                    </li>
                                <?php $i++; } ?>
                            </ul>
                            <!-- End Tab Button  -->

                            <!-- Start Tab Content Wrapper  -->
                            <div class="tab-content" id="axilTabContent">
                                <?php $i=1; foreach($category_ids as $k=>$category_id){ $category_post = $category->getCategoryById($category_id); $category_posts = $post->getPostByCategoryId($category_id); ?>
                                    <div class="single-tab-content tab-pane fade <?php echo $k==0?'show active':''; ?>" id="tab<?php echo $util->intToWord($i) ?>" role="tabpanel" aria-labelledby="tab-<?php echo $util->intToWord($i) ?>">
                                        <div class="modern-post-activation slick-layout-wrapper axil-slick-arrow arrow-between-side">
                                            <?php foreach($category_posts as $j=>$v){ ?>
                                                <!-- Start Single Post  -->
                                                <div class="slick-single-layout">
                                                    <div class="content-block modern-post-style text-center content-block-column">
                                                        <div class="post-content">
                                                            <div class="post-cat">
                                                                <div class="post-cat-list">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="<?php echo $category_post->getName() ?>"><?php echo $category_post->getName() ?></span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h4 class="title"><a href="#"><?php echo $util->shortenString($v['title'], 25); ?></a></h4>
                                                        </div>
                                                        <div class="post-thumbnail">
                                                            <a href="#">
                                                                <img src="assets/images/post-images/post-column-<?php $usedNumbers = []; echo $util->genRand(1, 11, $usedNumbers) ?>.jpg" alt="Post Images">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Single Post  -->
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php $i++; } ?>
                            </div>
                            <!-- End Tab Content Wrapper  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Area  -->

            <!-- Start Post Grid Area  -->
            <div class="axil-post-grid-area axil-section-gap bg-color-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title">Most Popular</h2>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <ul class="axil-tab-button nav nav-tabs mt--20" role="tablist">
                                <?php $i=1; $category_ids = []; foreach($category_viewed as $k=>$v){ $category_ids[] = $v['uid']; ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link <?php echo $k==0?'active':''; ?>" id="grid-<?php echo $util->intToWord($i) ?>" data-bs-toggle="tab" href="#grid<?php echo $util->intToWord($i) ?>" role="tab" aria-controls="grid-<?php echo $util->intToWord($i) ?>" aria-selected="true"><?php echo $v['name'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- Start Tab Content  -->
                            <div class="grid-tab-content tab-content mt--10">
                                <?php $i=1; foreach($category_ids as $k=>$category_id){ $category_post = $category->getCategoryById($category_id); $category_posts = $post->getPostByCategoryId($category_id, "0,3"); ?>
                                    <!-- Start Single Tab Content  -->
                                    <div class="single-post-grid tab-pane fade <?php echo $k==0?'show active':''; ?>" id="grid<?php echo $util->intToWord($i) ?>" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                                <div class="row">
                                                    <?php for($l=0;$l<2; $l++){ ?>
                                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12">
                                                            <!-- Start Post Grid  -->
                                                            <div class="content-block post-grid mt--30">
                                                                <div class="post-thumbnail">
                                                                    <a href="#">
                                                                        <img src="assets/images/post-images/post-grid-<?php $usedNumbers = []; echo $util->genRand(1, 11, $usedNumbers) ?>.jpg" alt="Post Images">
                                                                    </a>
                                                                </div>
                                                                <div class="post-grid-content">
                                                                    <div class="post-content">
                                                                        <div class="post-cat">
                                                                            <div class="post-cat-list">
                                                                                <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="<?php echo $category_post->getName() ?>"><?php echo $category_post->getName() ?></span>
                                                                            </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h4 class="title"><a href="#"><?php echo $util->shortenString($category_posts[$l]['title'], 25) ?></a></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Start Post Grid  -->
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-12">
                                                <!-- Start Post Grid  -->
                                                <div class="content-block post-grid post-grid-large mt--30">
                                                    <div class="post-thumbnail">
                                                        <a href="#">
                                                            <img src="assets/images/post-images/post-grid-<?php $usedNumbers = []; echo $util->genRand(12, 12, $usedNumbers) ?>.jpg" alt="Post Images">
                                                        </a>
                                                    </div>
                                                    <div class="post-grid-content">
                                                        <div class="post-content">
                                                            <div class="post-cat">
                                                                <div class="post-cat-list">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                    <span class="hover-flip-item">
                                                                        <span data-text="<?php echo $category_post->getName() ?>"><?php echo $category_post->getName() ?></span>
                                                                    </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <h3 class="title"><a href="#"><?php echo $util->shortenString($category_posts[2]['title'], 35) ?></a></h3>
                                                            <div class="post-meta-wrapper">
                                                                <div class="post-meta">
                                                                    <div class="post-author-avatar border-rounded">
                                                                        <img src="assets/images/post-images/author/author-image-2.png" alt="Author Images">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h6 class="post-author-name">
                                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Arlene McCoy"><?php echo $category_posts[2]['author'] ?></span>
                                                                            </span>
                                                                            </a>
                                                                        </h6>
                                                                        <ul class="post-meta-list">
                                                                            <li><?php echo date('jS M, Y', strtotime($category_posts[2]['published_date'])) ?></li>
                                                                            <li><?php echo $util->formatViews($post->getPostViews($category_posts[2]['uid']))?></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <ul class="social-share-transparent justify-content-end">
                                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                                    <li><a href="#"><i class="fas fa-link"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start Post Grid  -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Tab Content  -->
                                <?php } ?>
                            </div>
                            <!-- End Tab Content  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Post Grid Area  -->

            <!-- Start Categories List  -->
            <div class="axil-categories-list axil-section-gap bg-color-grey">
                <div class="container">
                    <div class="row align-items-center mb--30">
                        <div class="col-lg-6 col-md-8 col-sm-8 col-12">
                            <div class="section-title">
                                <h2 class="title">Trending Topics</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-4 col-12">
                            <div class="see-all-topics text-start text-sm-end mt_mobile--20">
                                <a class="axil-link-button" href="#">See All Topics</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start List Wrapper  -->
                            <div class="list-categories categories-activation axil-slick-arrow arrow-between-side">
                                <?php foreach ($all_categories as $k=>$c){ ?>
                                    <!-- Start Single Category  -->
                                    <div class="single-cat">
                                        <div class="inner">
                                            <a href="#">
                                                <div class="thumbnail">
                                                    <img src="assets/images/small-images/blog-sm-<?php $usedNumbers=[]; echo $util->genRand(1, 10, $usedNumbers) ?>.jpg" alt="post categories images">
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><?php echo $c['name'] ?></h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Single Category  -->
                                <?php } ?>
                            </div>
                            <!-- Start List Wrapper  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Categories List  -->

            <!-- Start Post List Wrapper  -->
            <div class="axil-post-list-area post-listview-visible-color axil-section-gap bg-color-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xl-8">
                            <!--<div class="axil-banner">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="w-100" src="assets/images/add-banner/banner-01.png" alt="Banner Images">
                                    </a>
                                </div>
                            </div>-->
                            <?php foreach ($random_posts as $k=>$v){ $rand_category = $category->getCategoryById($v['category_id']);?>
                                <!-- Start Post List  -->
                                <div class="content-block post-list-view <?php echo $k==0?'is-active':'axil-control'; ?> mt--30">
                                    <div class="post-thumbnail">
                                        <a href="">
                                            <img src="assets/images/small-images/post-seo-list-<?php $usedNumbers=[]; echo $util->genRand(1,3, $usedNumbers) ?>.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a class="hover-flip-item-wrapper" href="#">
                                                <span class="hover-flip-item">
                                                    <span data-text="<?php echo $rand_category->getName() ?>"><?php echo $rand_category->getName() ?></span>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="#"><?php echo $util->shortenString($v['title'], 25) ?></a></h4>
                                        <div class="post-meta-wrapper">
                                            <div class="post-meta">
                                                <div class="content">
                                                    <h6 class="post-author-name">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                        <span class="hover-flip-item">
                                                            <span data-text="<?php echo $v['author'] ?>"><?php echo $v['author'] ?></span>
                                                        </span>
                                                        </a>
                                                    </h6>
                                                    <ul class="post-meta-list">
                                                        <li><?php echo $util->setDatePublished($v['published_date']) ?></li>
                                                        <li>3 min read</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="social-share-transparent justify-content-end">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fas fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Post List  -->
                            <?php } ?>

                        </div>
                        <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40">
                            <!-- Start Sidebar Area  -->
                            <div class="sidebar-inner">
                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget widget widget_search mb--30">
                                    <h5 class="widget-title">Search</h5>
                                    <form action="#">
                                        <div class="axil-search form-group">
                                            <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </form>
                                </div>
                                <!-- End Single Widget  -->

                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget widget widget_postlist mb--30">
                                    <h5 class="widget-title">Popular on Blog.Sntaks</h5>
                                    <!-- Start Post List  -->
                                    <div class="post-medium-block">
                                        <?php foreach ($viewed_posts as $k=>$v){ ?>
                                            <!-- Start Single Post  -->
                                            <div class="content-block post-medium mb--20">
                                                <div class="post-thumbnail">
                                                    <a href="#">
                                                        <img src="assets/images/small-images/blog-sm-<?php $usedNumbers=[]; echo $util->genRand(1,4,$usedNumbers) ?>.jpg" alt="Post Images">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h6 class="title">
                                                        <a href="#"><?php echo $util->shortenString($v['title'], 25) ?></a>
                                                    </h6>
                                                    <div class="post-meta">
                                                        <ul class="post-meta-list">
                                                            <li><?php echo $util->setDatePublished($v['published_date']) ?></li>
                                                            <li><?php echo $util->formatViews($v['view_count']) ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Post  -->
                                        <?php } ?>
                                    </div>
                                    <!-- End Post List  -->

                                </div>
                                <!-- End Single Widget  -->

                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget widget widget_social mb--30">
                                    <h5 class="widget-title">Stay In Touch</h5>
                                    <!-- Start Post List  -->
                                    <ul class="social-icon md-size justify-content-center">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-slack"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                    <!-- End Post List  -->
                                </div>
                                <!-- End Single Widget  -->
                            </div>
                            <!-- End Sidebar Area  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Post List Wrapper  -->

            <?php include 'components/base/footer.php' ?>
        </div>
        <?php include 'components/base/js.php' ?>
    </body>
</html>