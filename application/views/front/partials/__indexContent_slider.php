<style>
    .f_size-18px {
        font-size: 18px !important;
        line-height: 25px !important;
    }

    .f_size-20px {
        font-size: 20px !important;
        line-height: 25px !important;
    }

    .f_size-17px {
        font-size: 17px !important;
    }

    .SliderImg_size {
        height: 370px !important;
        object-fit: cover;
        object-position: top;

    }

    .setir a {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Maksimum 2 sətir */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.4em;
        max-height: 2.8em;
        /* 1.4em × 2 sətir */
    }

    .cateTransformTitle {
        text-transform: none !important;
    }

    .fontSystem_ui {
        font-family: system-ui !important;
    }
</style>
<!-- <section class="news-latest-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="blog-post post-style-01">
                    <div class="blog-image"> <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/banner/01.jpg" alt=""> </div>
                    <div class="blog-post-details"> <span class="badge badge-large bg-primary">Technology</span>
                        <h3 class="blog-title f_size-20px"><a href="#">Welcome to the .3D world. We’re waiting for you to join us</a></h3>
                        <div class="blog-post-meta">
                            <div class="blog-post-author"> <span><a href="#"><img src="<?php echo base_url('public/front/') ?>images/avatar/04.jpg" alt="">Melanie Byrd</a></span> </div>
                            <div class="blog-post-time"> <a href="#"><i class="fa-solid fa-calendar-days"></i>Jan 26 2022</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row mb-lg-4 mb-0">
                    <div class="col-lg-12">
                        <div class="blog-post post-style-01">
                            <div class="blog-image"> <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/banner/02.jpg" alt=""> </div>
                            <div class="blog-post-details"> <span class="badge badge-large bg-yellow">Intervyu</span>
                                <h4 class="blog-title f_size-18px"><a href="#" class="f_size">I do think Bitcoin is the first that has the potential to do something like changing the world</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="blog-post post-style-01">
                            <div class="blog-image"> <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/banner/03.jpg" alt=""> </div>
                            <div class="blog-post-details"> <span class="badge badge-large bg-purple">Sport</span>
                                <h4 class="blog-title f_size-18px"><a href="#">You won’t understand the love of hockey</a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="blog-post post-style-01 mb-0">
                            <div class="blog-image"> <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/banner/04.jpg" alt=""> </div>
                            <div class="blog-post-details"> <span class="badge badge-large bg-orange">Entertainment</span>
                                <h4 class="blog-title f_size-18px"><a href="#">Time is greater than money</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

<section class="news-politics-post">
    <div class="container">
        <div class="row">
            <div class=" col-xl-8 col-lg-8  mb-xl-0 mb-4 order-xl-2">

                <div class="swiper blog-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($important_news_1 as $news): ?>
                            <div class="swiper-slide">
                                <div class="blog-post post-style-01">
                                    <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                        <div class="blog-image">
                                            <?php if ($news['img']) { ?>
                                                <img class="img-fluid SliderImg_size" src="<?php echo base_url('public/uploads/news/' . $news['img']); ?>" alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php } else { ?>
                                                <img class="img-fluid SliderImg_size" src="<?php echo base_url('public/uploads/news/no-image.jpg'); ?>" alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php } ?>

                                        </div>
                                    </a>
                                    <div class="blog-post-details">
                                        <span class="badge badge-large bg-blue cateTransformTitle fontSystem_ui">
                                            <?php
                                            echo htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'], ENT_QUOTES, 'UTF-8');
                                            ?>
                                        </span>
                                        <h4 class="blog-title setir fontSystem_ui">
                                            <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                                <?php
                                                echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8');
                                                ?>
                                            </a>
                                        </h4>
                                        <div class="blog-post-meta">
                                            <div class="blog-post-time fontSystem_ui">
                                                <a href="<?php echo base_url('detail/' . $news['slug']); ?>"><i class="fa-solid fa-calendar-days"></i><?php echo date('d M Y | H:i', strtotime($news['created_at'])); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- Dots -->
                    <div class="swiper-pagination"></div>
                </div>



                <div class="row">
                    <div class="col-md-4 col-xl-4">
                        <?php if (!empty($interview)): ?>
                            <?php
                            // Əgər modeldə result() qaytarırsa, ilk elementi götürək
                            $news = is_array($interview) ? $interview[0] : $interview;
                            ?>
                            <div class="blog-post post-style-02 mt-4">
                                <div class="blog-image">
                                    <?php if (!empty($news['img'])): ?>
                                        <img class="img-fluid"
                                            src="<?php echo base_url('public/uploads/news/' . $news['img']); ?>"
                                            alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php else: ?>
                                        <img class="img-fluid"
                                            src="<?php echo base_url('public/uploads/news/no-image.jpg'); ?>"
                                            alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php endif; ?>
                                </div>

                                <span class="badge badge-large bg-orange cateTransformTitle fontSystem_ui">
                                    <?php // echo htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'] ?? 'Interview', ENT_QUOTES, 'UTF-8'); 
                                    ?>
                                    <?php echo $this->lang->line('interview'); ?>
                                </span>

                                <div class="blog-post-details">
                                    <h6 class="blog-title setir fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>" class="f_size-17px">
                                            <?php
                                            echo htmlspecialchars(
                                                $news['title_' . $lang] ?? $news['title_az'],
                                                ENT_QUOTES,
                                                'UTF-8'
                                            );
                                            ?>
                                        </a>
                                    </h6>
                                    <div class="blog-post-time fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?php echo date('d M Y | H:i', strtotime($news['created_at'])); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="text-muted"><?php echo $this->lang->line('interview_not_found'); ?></p>
                        <?php endif; ?>
                    </div>


                    <div class="col-md-4 col-xl-4">
                        <?php if (!empty($important_news_3)): ?>
                            <?php
                            // Əgər modeldə result() qaytarırsa, ilk elementi götürək
                            $news = is_array($important_news_3) ? $important_news_3[0] : $important_news_3;
                            ?>
                            <div class="blog-post post-style-02 mt-4">
                                <div class="blog-image">
                                    <?php if (!empty($news['img'])) {  ?>
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <img class="img-fluid"
                                                src="<?php echo base_url('public/uploads/news/' . $news['img']); ?>"
                                                alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <img class="img-fluid"
                                                src="<?php echo base_url('public/uploads/news/no-image.jpg'); ?>"
                                                alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </a>
                                    <?php } ?>
                                </div>

                                <span class="badge badge-large bg-primary cateTransformTitle fontSystem_ui">
                                    <?php echo htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'], ENT_QUOTES, 'UTF-8'); ?>
                                </span>

                                <div class="blog-post-details">
                                    <h6 class="blog-title setir fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>" class="f_size-17px">
                                            <?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </h6>
                                    <div class="blog-post-time fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?php echo date('d M Y | H:i', strtotime($news['created_at'])); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="text-muted"><?php echo $this->lang->line('important_news_not_found'); ?></p>
                        <?php endif; ?>
                    </div>


                    <div class="col-md-4 col-xl-4">
                        <?php if (!empty($important_news_4)): ?>
                            <?php
                            // Modeldən gələn nəticə arraydirsə, ilk elementi götürürük
                            $news = is_array($important_news_4) ? $important_news_4[0] : $important_news_4;
                            ?>

                            <div class="blog-post post-style-02 mt-4">
                                <div class="blog-image">
                                    <?php if (!empty($news['img'])) { ?>
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <img class="img-fluid"
                                                src="<?php echo base_url('public/uploads/news/' . $news['img']); ?>"
                                                alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <img class="img-fluid"
                                                src="<?php echo base_url('public/uploads/news/no-image.jpg'); ?>"
                                                alt="<?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </a>
                                    <?php } ?>
                                </div>

                                <span class="badge badge-large bg-purple cateTransformTitle fontSystem_ui">
                                    <?php echo htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'], ENT_QUOTES, 'UTF-8'); ?>
                                </span>

                                <div class="blog-post-details">
                                    <h6 class="blog-title setir fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>" class="f_size-17px">
                                            <?php echo htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </h6>
                                    <div class="blog-post-time fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?php echo date('d M Y | H:i', strtotime($news['created_at'])); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>
                            <p class="text-muted"><?php echo $this->lang->line('important_news_not_found'); ?></p>
                        <?php endif; ?>
                    </div>


                </div>
            </div>



            <div class="col-xl-4 col-lg-8 col-md-12 mt-md-0 mt-4 order-xl-3">
                <?php if (!empty($important_news_lent)): ?>
                    <?php foreach ($important_news_lent as $index => $news): ?>
                        <div class="blog-post post-style-13 <?php echo ($index === 0) ? 'border-top-0 b-0 pt-0 mt-0' : ''; ?>">
                            <div class="blog-post-details">
                                <span class="badge text-blue cateTransformTitle fontSystem_ui">
                                    <?php
                                    echo htmlspecialchars(
                                        $news['category_name_' . $lang] ?? $news['category_name_az'] ?? 'News',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );
                                    ?>
                                </span>

                                <h6 class="blog-title setir fontSystem_ui">
                                    <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                        <?php
                                        echo htmlspecialchars(
                                            $news['title_' . $lang] ?? $news['title_az'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                        ?>
                                    </a>
                                </h6>

                                <div class="blog-post-meta">
                                    <div class="blog-post-time fontSystem_ui">
                                        <a href="<?php echo base_url('detail/' . $news['slug']); ?>">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <?php echo date('d M Y | H:i', strtotime($news['created_at'])); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted"><?php echo $this->lang->line('news_not_found'); ?></p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<!-- REKLAM -->
<section style="padding:25px 11px 0px 11px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="add-banner mt-0 " style="height: 96px;">
                    <a href="https://themeforest.net/item/ciyashop-responsive-multipurpose-woocommerce-wordpress-theme/22055376">
                        <!-- <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/bg/add.png" alt=""> -->
                        <iframe class="long_iframe_size" src="https://ads.newmedia.az/www/images/8747db0639abf487b28f4635d8221f0a/index.html?clickTag=https://ads2.newmedia.az/www/delivery/ck.php?oaparams=2__bannerid=16323__zoneid=1290__cb=2196263416__campaignid=3015801__p1=1758918374__p2=14fd1c49c3e098768d6f6e6bba33__p3=382751025.2fb16d7ab77caac2e0b92813efed1e4a98e9085e__oadest=https%3A%2F%2Fbit.ly%2F46qRBeX%3Futm_content%3DNewmedia%26utm_source%3Doxu.az%26utm_medium%3Diab_banner%26utm_campaign%3DOxu.az_invest%26utm_device%3Ddesktop" frameborder="0"></iframe>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- REKLAM -->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".blog-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        grabCursor: true, // Mouse drag üçün
    });
</script>