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
<!-- for slider css -->
<style>
    /* ✅ Kateqoriya Badge Sol Yuxarı */
    .slider-category-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #30c96a;
        /* Yaşıl */
        color: #fff;
        padding: 4px 9px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
        z-index: 15;
        /* text-transform: uppercase; */
    }

    /* ✅ Media Icons Sağ Yuxarı */
    .slider-media-wrapper {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 6px;
        align-items: center;
        z-index: 15;
    }

    .slider-media-icon i {
        background: rgba(0, 0, 0, .65);
        border-radius: 5px;
        padding: 6px;
        font-size: 13px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, .25);
    }

    .video-icon i {
        color: #007bff;
    }

    .gallery-icon i {
        color: #30c96a;
    }

    .slider-views {
        background: rgba(0, 0, 0, .65);
        color: #fff;
        padding: 5px 7px;
        font-size: 12px;
        border-radius: 5px;
        display: flex;
        gap: 4px;
        align-items: center;
    }

    .slider-views i {
        font-size: 12px;
    }

    .swiper-slide .ttime i {
        color: white !important;
    }


    .badge_style_x {
        top: 8px !important;
        right: 8px !important;
        padding: 7px 7px !important;
    }
</style>

<section class="news-politics-post">
    <div class="container">
        <div class="row">
            <div class=" col-xl-8 col-lg-8  mb-xl-0 mb-4 order-xl-2">

                <div class="swiper blog-swiper">
                    <div class="swiper-wrapper">

                        <?php foreach ($important_news_1 as $news): ?>
                            <div class="swiper-slide">
                                <div class="blog-post post-style-01 position-relative">


                                    <span class="slider-category-badge" style="cursor: auto;">
                                        <?= htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'], ENT_QUOTES, 'UTF-8'); ?>
                                    </span>


                                    <div class="slider-media-wrapper">
                                        <?php if (!empty($news['video'])): ?>
                                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                                <span class="slider-media-icon video-icon">
                                                    <i class="fa-solid fa-video video_icon_color_x"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($news['multi_img'])): ?>
                                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                                <span class="slider-media-icon gallery-icon">
                                                    <i class="fa-solid fa-images"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($news['view_count'])): ?>
                                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                                <span class="slider-views">
                                                    <i class="fa-solid fa-eye"></i>
                                                    <?= (int)$news['view_count']; ?>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>


                                    <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                        <div class="blog-image">
                                            <img class="img-fluid SliderImg_size slider_ratio"
                                                src="<?= !empty($news['img'])
                                                            ? base_url('public/uploads/news/' . $news['img'])
                                                            : base_url('public/front/images/demo/no-image.jpg'); ?>"
                                                alt="<?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </a>


                                    <div class="blog-post-details">
                                        <h4 class="blog-title setir fontSystem_ui">
                                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                                <?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                                            </a>
                                        </h4>

                                        <div class="blog-post-meta ttime">
                                            <?php if (!empty($news['created_at'])): ?>
                                                <time datetime="<?= $news['created_at']; ?>" class="news-date" style="color: white!important;">
                                                    <?= format_news_date($news['created_at'], $lang); ?>
                                                </time>
                                            <?php endif; ?>
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
                            <?php $news = is_array($interview) ? $interview[0] : $interview; ?>

                            <div class="blog-post post-style-02 mt-4 position-relative">

                                <!-- ✅ Şəkil -->

                                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                    <div class="blog-image">
                                        <img class="img-fluid slder_under_img"
                                            src="<?= !empty($news['img'])
                                                        ? base_url('public/uploads/news/' . $news['img'])
                                                        : base_url('public/uploads/news/no-image.jpg'); ?>"
                                            alt="<?= html_escape($news['title_' . $lang] ?? $news['title_az']); ?>">

                                    </div>
                                </a>
                                <!-- ✅ Media icons (əgər varsa) -->
                                <div class="media-overlay">

                                    <?php if (!empty($news['video'])): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <span class="media-small-icon video">
                                                <i class="fa-solid fa-video"></i>
                                            </span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($news['multi_img']) && count(json_decode($news['multi_img'], true)) > 1): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <span class="media-small-icon gallery">
                                                <i class="fa-solid fa-images"></i>
                                            </span>
                                        </a>
                                    <?php endif; ?>

                                </div>

                                <!-- ✅ Kateqoriya Badge -->
                                <span class="badge badge-large bg-orange cateTransformTitle fontSystem_ui badge_style_x">
                                    <?php echo ($lang == 'az') ? "Müsahibə" : "Interview"; ?>
                                </span>

                                <!-- ✅ Tarix -->
                                <div class="blog-post-meta time_style">
                                    <?php if (!empty($news['created_at'])): ?>
                                        <time datetime="<?= $news['created_at']; ?>" class="news-date">
                                            <?= format_news_date($news['created_at'], $lang); ?>
                                        </time>
                                    <?php endif; ?>
                                </div>

                                <!-- ✅ Başlıq -->
                                <div class="blog-post-details mar_Top_">
                                    <h6 class="blog-title setir fontSystem_ui f_size-17px">
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az']); ?>
                                        </a>
                                    </h6>
                                </div>

                            </div>

                        <?php else: ?>
                            <p class="text-muted">
                                <?= ($lang == 'az') ? "Müsahibə tapılmadı" : "No interviews found"; ?>
                            </p>
                        <?php endif; ?>
                    </div>


                    <div class="col-md-4 col-xl-4">
                        <?php if (!empty($important_news_3)): ?>
                            <?php
                            // Əgər modeldə result() qaytarırsa, ilk elementi götürək
                            $news = is_array($important_news_3) ? $important_news_3[0] : $important_news_3;
                            ?>

                            <div class="blog-post post-style-02 mt-4 position-relative">

                                <!-- ✅ Media Icons Overlay (Video + Gallery) -->
                                <div class="media-overlay">
                                    <?php if (!empty($news['video'])): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <span class="media-small-icon video">
                                                <i class="fa-solid fa-video"></i>
                                            </span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($news['multi_img']) && count(json_decode($news['multi_img'], true)) > 1): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <span class="media-small-icon gallery">
                                                <i class="fa-solid fa-images"></i>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <!-- ✅ Image -->

                                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                    <div class="blog-image">
                                        <img class="img-fluid slder_under_img"
                                            src="<?= !empty($news['img'])
                                                        ? base_url('public/uploads/news/' . $news['img'])
                                                        : base_url('public/front/images/demo/no-image.jpg'); ?>"
                                            alt="<?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">

                                    </div>
                                </a>
                                <!-- ✅ Category -->
                                <span class="badge badge-large bg-primary cateTransformTitle fontSystem_ui badge_style_x">
                                    <?= htmlspecialchars(
                                        $news['category_name_' . $lang] ?? $news['category_name_az'] ?? 'News',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ); ?>
                                </span>

                                <!-- ✅ Date -->
                                <div class="blog-post-meta time_style">
                                    <?php if (!empty($news['created_at'])): ?>
                                        <time datetime="<?= $news['created_at']; ?>" class="news-date">
                                            <?= format_news_date($news['created_at'], $lang); ?>
                                        </time>
                                    <?php endif; ?>
                                </div>

                                <!-- ✅ News Content -->
                                <div class="blog-post-details mar_Top_">
                                    <h6 class="blog-title setir fontSystem_ui">
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>" class="f_size-17px">
                                            <?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </h6>
                                </div>

                            </div>

                        <?php else: ?>
                            <p class="text-muted">
                                <?= ($lang == 'az') ? "Xəbər tapılmadı" : "No news found"; ?>
                            </p>
                        <?php endif; ?>
                    </div>


                    <div class="col-md-4 col-xl-4">
                        <?php if (!empty($important_news_4)): ?>
                            <?php $news = is_array($important_news_4) ? $important_news_4[0] : $important_news_4; ?>

                            <div class="blog-post post-style-02 mt-4 position-relative">

                                <!-- ✅ Media Icons Overlay (Video + Gallery) -->
                                <div class="media-overlay">
                                    <?php if (!empty($news['video'])): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <span class="media-small-icon video">
                                                <i class="fa-solid fa-video"></i>
                                            </span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($news['multi_img']) && count(json_decode($news['multi_img'], true)) > 1): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                            <span class="media-small-icon gallery">
                                                <i class="fa-solid fa-images"></i>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <!-- ✅ Image -->

                                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                    <div class="blog-image">
                                        <img class="img-fluid slder_under_img"
                                            src="<?= !empty($news['img'])
                                                        ? base_url('public/uploads/news/' . $news['img'])
                                                        : base_url('public/front/images/demo/no-image.jpg'); ?>"
                                            alt="<?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                </a>

                                <!-- ✅ Category Badge -->
                                <span class="badge badge-large bg-purple cateTransformTitle fontSystem_ui badge_style_x">
                                    <?= htmlspecialchars(
                                        $news['category_name_' . $lang] ?? $news['category_name_az'] ?? 'News',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ); ?>
                                </span>

                                <!-- ✅ Date -->
                                <div class="blog-post-meta time_style">
                                    <?php if (!empty($news['created_at'])): ?>
                                        <time datetime="<?= $news['created_at']; ?>" class="news-date">
                                            <?= format_news_date($news['created_at'], $lang); ?>
                                        </time>
                                    <?php endif; ?>
                                </div>

                                <!-- ✅ Title -->
                                <div class="blog-post-details mar_Top_">
                                    <h6 class="blog-title setir fontSystem_ui">
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>" class="f_size-17px">
                                            <?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </h6>
                                </div>

                            </div>

                        <?php else: ?>
                            <p class="text-muted"><?= ($lang == 'az') ? "Xəbər tapılmadı" : "No news found"; ?></p>
                        <?php endif; ?>
                    </div>


                </div>
            </div>



            <div class="col-xl-4 col-lg-8 col-md-12 mt-md-0 mt-4 order-xl-3">

                <?php if (!empty($important_news_lent)): ?>
                    <?php foreach ($important_news_lent as $index => $news): ?>
                        <div class="blog-post post-style-04" style="margin-bottom: 20px; position: relative;">

                            <div class="blog-post-details">

                                <!-- ✅ Kateqoriya Badge — Sol yuxarı -->
                                <?php if (!empty($news['category_name_' . $lang]) || !empty($news['category_name_az'])): ?>
                                    <span class="badge text-primary cateTransformTitle fontSystem_ui"
                                        style="font-size: 11px; font-weight:600; background: rgba(0,0,0,0.05); padding:4px 7px; border-radius:4px; color:#0066ff!important;">
                                        <?= htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'], ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                <?php endif; ?>

                                <!-- ✅ Media Icons (Video + Gallery + Views) -->
                                <div class="d-flex align-items-center mb-1 mt-1">

                                    <div class="d-flex gap-2">
                                        <?php if (!empty($news['video'])): ?>
                                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']) ?>">
                                                <span class="media-small-icon video">
                                                    <i class="fa-solid fa-video"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($news['multi_img']) && count(json_decode($news['multi_img'], true)) > 1): ?>
                                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']) ?>">
                                                <span class="media-small-icon gallery">
                                                    <i class="fa-solid fa-images"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($news['view_count'])): ?>
                                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']) ?>">
                                            <div class="media-views">
                                                <i class="fa-solid fa-eye"></i>
                                                <?= number_format((int)$news['view_count']); ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                </div>

                                <!-- ✅ Title -->
                                <h6 class="blog-title setir fontSystem_ui" style="margin-bottom: 4px;">
                                    <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                        <?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </h6>

                                <!-- ✅ Date -->
                                <div class="blog-post-meta">
                                    <?php if (!empty($news['created_at'])): ?>
                                        <time datetime="<?= $news['created_at']; ?>" class="news-date">
                                            <?= format_news_date($news['created_at'], $lang); ?>
                                        </time>
                                    <?php endif; ?>
                                </div>

                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">
                        <?= ($lang == 'az') ? "Xəbər tapılmadı" : "No news found"; ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>



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