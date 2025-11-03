<!-- REKLAM -->
<section style="margin-top:25px!important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <a href="#">
                    <div class="add-banner mt-0 " style="height: 96px;">
                        <!-- <img class="img-fluid" src="<?php // echo base_url('public/front/') 
                                                            ?>images/bg/add.png" alt=""> -->
                        <iframe class="long_iframe_size" src="https://ads.newmedia.az/www/images/8747db0639abf487b28f4635d8221f0a/index.html?clickTag=https://ads2.newmedia.az/www/delivery/ck.php?oaparams=2__bannerid=16323__zoneid=1290__cb=2196263416__campaignid=3015801__p1=1758918374__p2=14fd1c49c3e098768d6f6e6bba33__p3=382751025.2fb16d7ab77caac2e0b92813efed1e4a98e9085e__oadest=https%3A%2F%2Fbit.ly%2F46qRBeX%3Futm_content%3DNewmedia%26utm_source%3Doxu.az%26utm_medium%3Diab_banner%26utm_campaign%3DOxu.az_invest%26utm_device%3Ddesktop" frameborder="0"></iframe>

                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- REKLAM -->


<section class="space-sm-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="mb-0"><i class="fa-solid fa-list" style="color: #30c96a;"></i>
                        <?= htmlspecialchars($cate1['category_name'] ?? ($lang == 'az' ? 'Siyasət' : 'Politics'), ENT_QUOTES, 'UTF-8'); ?>
                    </h2>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel arrow-styel-02 owl-loaded owl-drag" data-nav-dots="false" data-nav-arrow="true" data-items="4" data-xl-items="4" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-autoheight="true" data-autoplay="false">
                    <!-- item-01 -->
                    <?php if (!empty($cate1)): ?>
                        <?php foreach ($cate1 as $news): ?>
                            <div class="item">
                                <div class="blog-post post-style-02">

                                    <!-- Şəkil -->
                                    <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                        <div class="blog-image">
                                            <img class="img-fluid aspect_ratio" src="<?php echo !empty($news->img) ? base_url('public/uploads/news/' . $news->img) : base_url('public/front/images/blog/01.jpg'); ?>"
                                                alt="<?php echo htmlspecialchars($news->{'title_' . $lang} ?? $news->title_az, ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </a>


                                    <!-- ✅ Media Overlay -->
                                    <div class="media-overlay">

                                        <?php if (!empty($news->video)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="video-icon">
                                                    <i class="fa-solid fa-video video-icon-color"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (!empty($news->multi_img)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="gallery-icon">
                                                    <i class="fa-solid fa-images"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <!-- ✅ Baxış sayı -->
                                    <?php if (!empty($news->view_count)): ?>
                                        <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                            <div class="views-tag">
                                                <i class="fa-solid fa-eye"></i>
                                                <?= (int)$news->view_count; ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <div class="blog-post-meta time_style">
                                        <?php if (!empty($news->created_at)): ?>
                                            <time datetime="<?= $news->created_at; ?>" class="news-date">
                                                <?= format_news_date($news->created_at, $lang); ?>
                                            </time>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Xəbər məlumatları -->
                                    <div class="blog-post-details mar_Top_">
                                        <h6 class="blog-title fontSystem_ui setir">
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <?php
                                                echo htmlspecialchars(
                                                    $news->{'title_' . $lang} ?? $news->title_az,
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                );
                                                ?>
                                            </a>
                                        </h6>

                                        <!-- <div class="blog-post-time fontSystem_ui">
                                            <a href="<?php // echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); 
                                                        ?>">
                                                <i class="fa-solid fa-calendar-days greenColor"></i>
                                                <?php // echo date('d M Y | H:i', strtotime($news->created_at)); 
                                                ?>
                                            </a>
                                        </div> -->


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
    </div>
</section>

<section class="space-sm-ptb" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="mb-0"><i class="fa-solid fa-list" style="color: #30c96a;"></i>
                        <?= htmlspecialchars($cate2['category_name'] ?? ($lang == 'az' ? 'İqtisadiyyat' : 'Economy'), ENT_QUOTES, 'UTF-8'); ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel arrow-styel-02 owl-loaded owl-drag" data-nav-dots="false" data-nav-arrow="true" data-items="4" data-xl-items="4" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-autoheight="true" data-autoplay="false">
                    <!-- item-01 -->
                    <?php if (!empty($cate2)): ?>
                        <?php foreach ($cate2 as $news): ?>
                            <div class="item">
                                <div class="blog-post post-style-02">

                                    <!-- Şəkil -->
                                    <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                        <div class="blog-image">
                                            <img class="img-fluid aspect_ratio" src="<?php echo !empty($news->img) ? base_url('public/uploads/news/' . $news->img) : base_url('public/front/images/blog/01.jpg'); ?>"
                                                alt="<?php echo htmlspecialchars($news->{'title_' . $lang} ?? $news->title_az, ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </a>

                                    <div class="media-overlay">

                                        <?php if (!empty($news->video)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="video-icon">
                                                    <i class="fa-solid fa-video video-icon-color"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php
                                        $multi = !empty($news->multi_img) ? json_decode($news->multi_img, true) : [];
                                        if (!empty($multi)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="gallery-icon">
                                                    <i class="fa-solid fa-images"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <!-- ✅ Baxış sayı -->
                                    <?php if (!empty($news->view_count)): ?>
                                        <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                            <div class="views-tag">
                                                <i class="fa-solid fa-eye"></i>
                                                <?= (int)$news->view_count; ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>





                                    <div class="blog-post-meta time_style">
                                        <?php if (!empty($news->created_at)): ?>
                                            <time datetime="<?= $news->created_at; ?>" class="news-date">
                                                <?= format_news_date($news->created_at, $lang); ?>
                                            </time>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Xəbər məlumatları -->
                                    <div class="blog-post-details mar_Top_">
                                        <h6 class="blog-title fontSystem_ui setir">
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <?php
                                                echo htmlspecialchars(
                                                    $news->{'title_' . $lang} ?? $news->title_az,
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                );
                                                ?>
                                            </a>
                                        </h6>

                                        <!-- <div class="blog-post-time fontSystem_ui">
                                            <a href="<?php // echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); 
                                                        ?>">
                                                <i class="fa-solid fa-calendar-days greenColor"></i>
                                                <?php // echo date('d M Y | H:i', strtotime($news->created_at)); 
                                                ?>
                                            </a>
                                        </div> -->


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
    </div>
</section>

<!-- REKLAM -->
<!-- space-ptb_my -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <a href="#">
                    <div class="add-banner mt-0 " style="height: 96px;">
                        <iframe class="long_iframe_size" src="https://ads.newmedia.az/www/images/8747db0639abf487b28f4635d8221f0a/index.html?clickTag=https://ads2.newmedia.az/www/delivery/ck.php?oaparams=2__bannerid=16323__zoneid=1290__cb=2196263416__campaignid=3015801__p1=1758918374__p2=14fd1c49c3e098768d6f6e6bba33__p3=382751025.2fb16d7ab77caac2e0b92813efed1e4a98e9085e__oadest=https%3A%2F%2Fbit.ly%2F46qRBeX%3Futm_content%3DNewmedia%26utm_source%3Doxu.az%26utm_medium%3Diab_banner%26utm_campaign%3DOxu.az_invest%26utm_device%3Ddesktop" frameborder="0"></iframe>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- REKLAM -->


<section class="space-sm-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="mb-0"><i class="fa-solid fa-list" style="color: #30c96a;"></i>
                        <?= htmlspecialchars($cate3['category_name'] ?? ($lang == 'az' ? 'Maliyyə' : 'Finance'), ENT_QUOTES, 'UTF-8'); ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel arrow-styel-02 owl-loaded owl-drag" data-nav-dots="false" data-nav-arrow="true" data-items="4" data-xl-items="4" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-autoheight="true" data-autoplay="false">
                    <!-- item-01 -->
                    <?php if (!empty($cate3)): ?>
                        <?php foreach ($cate3 as $news): ?>
                            <div class="item">
                                <div class="blog-post post-style-02">

                                    <!-- Şəkil -->
                                    <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                        <div class="blog-image">
                                            <img class="img-fluid aspect_ratio" src="<?php echo !empty($news->img) ? base_url('public/uploads/news/' . $news->img) : base_url('public/front/images/blog/01.jpg'); ?>"
                                                alt="<?php echo htmlspecialchars($news->{'title_' . $lang} ?? $news->title_az, ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </a>

                                    <div class="media-overlay">

                                        <?php if (!empty($news->video)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="video-icon">
                                                    <i class="fa-solid fa-video video-icon-color"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php
                                        $multi = !empty($news->multi_img) ? json_decode($news->multi_img, true) : [];
                                        if (!empty($multi)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="gallery-icon">
                                                    <i class="fa-solid fa-images"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <!-- ✅ Baxış sayı -->
                                    <?php if (!empty($news->view_count)): ?>
                                        <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                            <div class="views-tag">
                                                <i class="fa-solid fa-eye"></i>
                                                <?= (int)$news->view_count; ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>


                                    <div class="blog-post-meta time_style">
                                        <?php if (!empty($news->created_at)): ?>
                                            <time datetime="<?= $news->created_at; ?>" class="news-date">
                                                <?= format_news_date($news->created_at, $lang); ?>
                                            </time>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Xəbər məlumatları -->
                                    <div class="blog-post-details mar_Top_">
                                        <h6 class="blog-title fontSystem_ui setir">
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <?php
                                                echo htmlspecialchars(
                                                    $news->{'title_' . $lang} ?? $news->title_az,
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                );
                                                ?>
                                            </a>
                                        </h6>

                                        <!-- <div class="blog-post-time fontSystem_ui">
                                            <a href="<?php // echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); 
                                                        ?>">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <?php // echo date('d M Y | H:i', strtotime($news->created_at)); 
                                                ?>
                                            </a>
                                        </div> -->





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
    </div>
</section>


<section class="space-sm-ptb" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="mb-0"><i class="fa-solid fa-list" style="color: #30c96a;"></i>
                        <?= htmlspecialchars($cate4['category_name'] ?? ($lang == 'az' ? 'Elm və Təhsil' : 'Science & Education'), ENT_QUOTES, 'UTF-8'); ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel arrow-styel-02 owl-loaded owl-drag" data-nav-dots="false" data-nav-arrow="true" data-items="4" data-xl-items="4" data-lg-items="3" data-md-items="3" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-autoheight="true" data-autoplay="false">
                    <!-- item-01 -->
                    <?php if (!empty($cate4)): ?>
                        <?php foreach ($cate4 as $news): ?>
                            <div class="item">
                                <div class="blog-post post-style-02">

                                    <!-- Şəkil -->
                                    <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                        <div class="blog-image">
                                            <img class="img-fluid aspect_ratio" src="<?php echo !empty($news->img) ? base_url('public/uploads/news/' . $news->img) : base_url('public/front/images/blog/01.jpg'); ?>"
                                                alt="<?php echo htmlspecialchars($news->{'title_' . $lang} ?? $news->title_az, ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                    </a>

                                    <div class="media-overlay">

                                        <?php if (!empty($news->video)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="video-icon">
                                                    <i class="fa-solid fa-video video-icon-color"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>

                                        <?php
                                        $multi = !empty($news->multi_img) ? json_decode($news->multi_img, true) : [];
                                        if (!empty($multi)): ?>
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <span class="gallery-icon">
                                                    <i class="fa-solid fa-images"></i>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <!-- ✅ Baxış sayı -->
                                    <?php if (!empty($news->view_count)): ?>
                                        <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                            <div class="views-tag">
                                                <i class="fa-solid fa-eye"></i>
                                                <?= (int)$news->view_count; ?>
                                            </div>
                                        </a>
                                    <?php endif; ?>

                                    <div class="blog-post-meta time_style">
                                        <?php if (!empty($news->created_at)): ?>
                                            <time datetime="<?= $news->created_at; ?>" class="news-date">
                                                <?= format_news_date($news->created_at, $lang); ?>
                                            </time>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Xəbər məlumatları -->
                                    <div class="blog-post-details mar_Top_">
                                        <h6 class="blog-title fontSystem_ui setir">
                                            <a href="<?php echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                                                <?php
                                                echo htmlspecialchars(
                                                    $news->{'title_' . $lang} ?? $news->title_az,
                                                    ENT_QUOTES,
                                                    'UTF-8'
                                                );
                                                ?>
                                            </a>
                                        </h6>

                                        <!-- <div class="blog-post-time fontSystem_ui">
                                            <a href="<?php // echo base_url($lang . '/' . t('news_link') . '/' . $news->slug); 
                                                        ?>">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <?php // echo date('d M Y | H:i', strtotime($news->created_at)); 
                                                ?>
                                            </a>
                                        </div> -->


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
    </div>
</section>

<!-- REKLAM -->
<!--  -->
<section class="space-ptb_my" style="padding-top: 0px!important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <a href="#">
                    <div class="add-banner mt-0">
                        <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/bg/add.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- REKLAM -->