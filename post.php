<!DOCTYPE html>
<html lang="en">
    <?php include 'components/base/header.php'; ?>
    <body>
        <div class="main-wrapper">
            <?php include 'components/nav/nav.php'?>

            <!-- Start Post Single Wrapper  -->
            <div class="post-single-wrapper axil-section-gap bg-color-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Start Banner Area -->
                            <div class="banner banner-single-post post-formate post-video axil-section-gapBottom">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Start Single Slide  -->
                                            <div class="content-block">
                                                <!-- Start Post Content  -->
                                                <div class="post-content">
                                                    <div class="post-cat">
                                                        <div class="post-cat-list">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                <span class="hover-flip-item">
                                                                    <span data-text="FEATURED POST">FEATURED POST</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h1 class="title"><?php echo $post_view->getTitle() ?></h1>
                                                    <!-- Post Meta  -->
                                                    <div class="post-meta-wrapper">
                                                        <div class="post-meta">
                                                            <div class="post-author-avatar border-rounded">
                                                                <img src="assets/images/post-images/author/author-image-3.png" alt="Author Images">
                                                            </div>
                                                            <div class="content">
                                                                <h6 class="post-author-name">
                                                                    <a class="hover-flip-item-wrapper" href="#">
                                                                        <span class="hover-flip-item">
                                                                            <span data-text="<?php echo $post_view->getAuthor() ?>"><?php echo $post_view->getAuthor() ?></span>
                                                                        </span>
                                                                    </a>
                                                                </h6>
                                                                <ul class="post-meta-list">
                                                                    <li><?php echo $util->setDatePublished($post_view->getPublishedDate()) ?></li>
                                                                    <li><?php echo $util->formatViews($post_view->getViewsCount()) ?></li>
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
                                                <!-- End Post Content  -->
                                            </div>
                                            <!-- End Single Slide  -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Area -->

                            <div class="axil-post-details">
                                <p class="has-medium-font-size">Winners are recognized for outstanding app design, innovation, ingenuity, and technical achievement</p>
                                <p> Apple today named eight app and game developers receiving an Apple Design Award, each
                                    one selected for being thoughtful and creative. Apple Design Award winners bring
                                    distinctive new ideas to life and demonstrate deep mastery of Apple technology. The apps
                                    spring up from developers large and small, in every part of the world, and provide users
                                    with new ways of working, creating, and playing.</p>
                                <p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re
                                    honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide
                                    Developer Relations. “Receiving an Apple Design Award is a special and laudable
                                    accomplishment. Past honorees have made some of the most noteworthy apps and games of
                                    all time. Through their vision, determination, and exacting standards, the winning
                                    developers inspire not only their peers in the Apple developer community, but all of us
                                    at Apple, too.”</p>
                                <blockquote>
                                    <p>“Most of us felt like we could trust each other to be quarantined together, so we
                                        didn’t need to wear masks or stay far apart.”</p>
                                </blockquote>
                                <figure class="wp-block-image">
                                    <img src="assets/images/post-single/post-single-02.jpg" alt="Post Images">
                                    <figcaption>The Apple Design Award trophy, created by the Apple Design team, is a symbol
                                        of achievement and excellence.</figcaption>
                                </figure>
                                <p> <a href="#">Apple today named</a> eight app and game developers receiving an Apple
                                    Design Award, each one selected for being thoughtful and creative. Apple Design Award
                                    winners bring distinctive new ideas to life and demonstrate deep mastery of Apple
                                    technology. The apps spring up from developers large and small, in every part of the
                                    world, and provide users with new ways of working, creating, and playing.</p>
                                <p>“Every year, app and game developers demonstrate exceptional craftsmanship and we’re
                                    honoring the best of the best,” said Ron Okamoto, Apple’s vice president of Worldwide
                                    Developer Relations. “Receiving an Apple Design Award is a special and laudable
                                    accomplishment. Past honorees have made some of the most noteworthy apps and games of
                                    all time. Through their vision, determination, and exacting standards, the winning
                                    developers inspire not only their peers in the Apple developer community, but all of us
                                    at Apple, too.”</p>
                                <p>More than 250 developers have been recognized with Apple Design Awards
                                    over the past 20 years. The recognition has proven to be an accelerant for developers
                                    who are pioneering innovative designs within their individual apps and influencing
                                    entire categories. Previous winners such as Pixelmator, djay, Complete Anatomy,
                                    HomeCourt, “Florence,” and “Crossy Road” have set the standard in areas such as
                                    storytelling, interface design, and use of Apple tools and technologies.</p>
                                <p>For more information on the apps and games, visit the <a href="#">App Store</a>.</p>

                                <div class="tagcloud">
                                    <?php foreach ($post_tags as $k=>$tag){ ?>
                                        <a href="#"><?php echo $tag['name'] ?></a>
                                    <?php } ?>
                                </div>

                                <div class="social-share-block">
                                    <div class="post-like">
                                        <a href="#"><i class="fal fa-thumbs-up"></i><span>2.2k Like</span></a>
                                    </div>
                                    <ul class="social-icon icon-rounded-transparent md-size">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Start Author  -->
                                <div class="about-author">
                                    <div class="media">
                                        <div class="thumbnail">
                                            <a href="#">
                                                <img src="assets/images/post-images/author/author-b1.png" alt="Author Images">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="author-info">
                                                <h5 class="title">
                                                    <a class="hover-flip-item-wrapper" href="#">
                                                        <span class="hover-flip-item">
                                                            <span data-text="<?php echo $post_view->getAuthor() ?>"><?php echo $post_view->getAuthor() ?></span>
                                                        </span>
                                                    </a>
                                                </h5>
                                                <span class="b3 subtitle">Sr. UX Designer</span>
                                            </div>
                                            <div class="content">
                                                <p class="b1 description">At 29 years old, my favorite compliment is being
                                                    told that I look like my mom. Seeing myself in her image, like this
                                                    daughter up top, makes me so proud of how far I’ve come, and so thankful
                                                    for where I come from.</p>
                                                <ul class="social-share-transparent size-md">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="far fa-envelope"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Author  -->

                                <!-- Start Comment Form Area  -->
                                <div class="axil-comment-area">
                                    <div class="axil-total-comment-post">
                                        <div class="title">
                                            <h4 class="mb--0">30+ Comments</h4>
                                        </div>
                                        <div class="add-comment-button cerchio">
                                            <a class="axil-button button-rounded" href="post-details.html" tabindex="0"><span>Add Your Comment</span></a>
                                        </div>
                                    </div>

                                    <!-- Start Comment Respond  -->
                                    <div class="comment-respond">
                                        <h4 class="title">Post a comment</h4>
                                        <form action="#">
                                            <p class="comment-notes"><span id="email-notes">Your email address will not be
                                                    published.</span> Required fields are marked <span
                                                    class="required">*</span></p>
                                            <div class="row row--10">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="name">Your Name</label>
                                                        <input id="name" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="email">Your Email</label>
                                                        <input id="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="website">Your Website</label>
                                                        <input id="website" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="message">Leave a Reply</label>
                                                        <textarea id="message" name="message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="comment-form-cookies-consent">
                                                        <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                                                        <label for="wp-comment-cookies-consent">Save my name, email, and
                                                            website in this browser for the next time I comment.</label>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-submit cerchio">
                                                        <input name="submit" type="submit" id="submit" class="axil-button button-rounded" value="Post Comment">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Comment Respond  -->

                                    <!-- Start Comment Area  -->
                                    <div class="axil-comment-area">
                                        <h4 class="title">2 comments</h4>
                                        <ul class="comment-list">
                                            <!-- Start Single Comment  -->
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <div class="single-comment">
                                                        <div class="comment-img">
                                                            <img src="assets/images/post-images/author/author-b2.png" alt="Author Images">
                                                        </div>
                                                        <div class="comment-inner">
                                                            <h6 class="commenter">
                                                                <a class="hover-flip-item-wrapper" href="#">
                                                                    <span class="hover-flip-item">
                                                                        <span data-text="Cameron Williamson">Cameron Williamson</span>
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <div class="comment-meta">
                                                                <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                                <div class="reply-edit">
                                                                    <div class="reply">
                                                                        <a class="comment-reply-link hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Reply">Reply</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="comment-text">
                                                                <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                                    libero venenatis. Nulla facilisi. Phasellus viverra
                                                                    magna commodo dui lacinia tempus. Donec malesuada nunc
                                                                    non dui posuere, fringilla vestibulum urna mollis.
                                                                    Integer condimentum ac sapien quis maximus. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <!-- Start Single Comment  -->
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="assets/images/post-images/author/author-b3.png" alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                                            </span>
                                                                        </a>
                                                                    </h6>
                                                                    <div class="comment-meta">
                                                                        <div class="time-spent">Nov 23, 2018 at 12:23 pm
                                                                        </div>
                                                                        <div class="reply-edit">
                                                                            <div class="reply">
                                                                                <a class="comment-reply-link hover-flip-item-wrapper" href="#">
                                                                                    <span class="hover-flip-item">
                                                                                        <span data-text="Reply">Reply</span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-text">
                                                                        <p class="b2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse lobortis cursus lacinia. Vestibulum vitae leo id diam pellentesque ornare.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End Single Comment  -->
                                                </ul>
                                            </li>
                                            <!-- End Single Comment  -->

                                            <!-- Start Single Comment  -->
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <div class="single-comment">
                                                        <div class="comment-img">
                                                            <img src="assets/images/post-images/author/author-b2.png" alt="Author Images">
                                                        </div>
                                                        <div class="comment-inner">
                                                            <h6 class="commenter">
                                                                <a class="hover-flip-item-wrapper" href="#">
                                                                    <span class="hover-flip-item">
                                                                        <span data-text="Rahabi Khan">Rahabi Khan</span>
                                                                    </span>
                                                                </a>
                                                            </h6>
                                                            <div class="comment-meta">
                                                                <div class="time-spent">Nov 23, 2018 at 12:23 pm</div>
                                                                <div class="reply-edit">
                                                                    <div class="reply">
                                                                        <a class="comment-reply-link hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Reply">Reply</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="comment-text">
                                                                <p class="b2">Duis hendrerit velit scelerisque felis tempus, id porta
                                                                    libero venenatis. Nulla facilisi. Phasellus viverra
                                                                    magna commodo dui lacinia tempus. Donec malesuada nunc
                                                                    non dui posuere, fringilla vestibulum urna mollis.
                                                                    Integer condimentum ac sapien quis maximus. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- End Single Comment  -->
                                        </ul>
                                    </div>
                                    <!-- End Comment Area  -->
                                </div>
                                <!-- End Comment Form Area  -->


                            </div>
                        </div>
                        <div class="col-lg-4">
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
                                <div class="axil-single-widget widget widget_newsletter mb--30">
                                    <!-- Start Post List  -->
                                    <div class="newsletter-inner text-center">
                                        <h4 class="title mb--15">Never Miss A Post!</h4>
                                        <p class="b2 mb--30">Sign up for free and be the first to <br /> get notified about updates.</p>
                                        <form action="#">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Your Email ">
                                            </div>
                                            <div class="form-submit">
                                                <button class="cerchio axil-button button-rounded"><span>Subscribe</span></button>
                                            </div>
                                        </form>
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

                                <!-- Start Single Widget  -->
                                <div class="axil-single-widget widget widget_postlist mb--30">
                                    <h5 class="widget-title">Recent Post</h5>
                                    <!-- Start Post List  -->
                                    <div class="post-medium-block">

                                        <!-- Start Single Post  -->
                                        <div class="content-block post-medium mb--20">
                                            <div class="post-content">
                                                <h6 class="title"><a href="post-details.html">The underrated design book that transformed the way I
                                                        work </a></h6>
                                                <div class="post-meta">
                                                    <ul class="post-meta-list">
                                                        <li>Feb 17, 2019</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->

                                        <!-- Start Single Post  -->
                                        <div class="content-block post-medium mb--20">
                                            <div class="post-content">
                                                <h6 class="title"><a href="post-details.html">Here’s what you should (and shouldn’t) do when</a>
                                                </h6>
                                                <div class="post-meta">
                                                    <ul class="post-meta-list">
                                                        <li>Feb 17, 2019</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->

                                        <!-- Start Single Post  -->
                                        <div class="content-block post-medium">
                                            <div class="post-content">
                                                <h6 class="title"><a href="post-details.html">How a developer and designer duo at Deutsche Bank keep
                                                        remote</a></h6>
                                                <div class="post-meta">
                                                    <ul class="post-meta-list">
                                                        <li>Feb 17, 2019</li>
                                                        <li>300k Views</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Post  -->
                                    </div>
                                    <!-- End Post List  -->
                                </div>
                                <!-- End Single Widget  -->
                            </div>
                            <!-- End Sidebar Area  -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Post Single Wrapper  -->

            <!-- Start More Stories Area  -->
            <div class="axil-more-stories-area axil-section-gap bg-color-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2 class="title">More Stories</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($post_related as $k=>$post){ $related_cat = $category->getCategoryById($post['category_id']); ?>
                            <!-- Start Stories Post  -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <!-- Start Post List  -->
                                <div class="post-stories content-block mt--30">
                                    <div class="post-thumbnail">
                                        <a href="#">
                                            <img src="assets/images/post-single/stories-<?php $usedNumbers=[]; echo $util->genRand(1,4,$usedNumbers) ?>.jpg" alt="Post Images">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-cat">
                                            <div class="post-cat-list">
                                                <a href="#"><?php echo $related_cat->getName() ?></a>
                                            </div>
                                        </div>
                                        <h5 class="title"><a href="#"><?php echo $post['title'] ?></a></h5>
                                    </div>
                                </div>
                                <!-- End Post List  -->
                            </div>
                            <!-- Start Stories Post  -->
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End More Stories Area  -->
            <?php include 'components/base/footer.php' ?>
        </div>
        <?php include 'components/base/js.php' ?>
    </body>
</html>