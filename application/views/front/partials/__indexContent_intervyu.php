<section class="space-lg-ptb bg-holder video-section" style="background-image: url(<?php echo base_url('public/front/') ?>images/bg/02_gg.png);">
  <div class="container">
    <div class="row">
      <!-- <div class="col-lg-6 col-xl-6">
        <div class="video-box">
          <div class="section-title">
            <h2 class="mb-0 text-white"><i class="fa-solid fa-video text-primary"></i>
              <a href="<?= base_url($lang . '/' . ($lang == 'az' ? 'bolme' : 'section') . '/interview'); ?>">
                <?= ($lang == 'az') ? 'Bütün müsahibələr' : 'All interviews'; ?>
              </a>
            </h2>
          </div>
          <div class="video-image">
            <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/bg/video-bg.jpg" alt="image">
            <a class="video-btn popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0">
              <i class="fas fa-play"></i>
            </a>
          </div>
        </div>
      </div> -->
      <style>

      </style>

      <?php if (!empty($last_interview)): ?>
        <div class="col-lg-6 col-xl-6">
          <div class="video-box">
            <div class="section-title">
              <h2 class="mb-0 text-white">
                <i class="fa-solid fa-video text-primary"></i>
                <a href="<?= base_url($lang . '/' . ($lang == 'az' ? 'bolme' : 'section') . '/interview'); ?>">
                  <?= ($lang == 'az') ? 'Bütün müsahibələr' : 'All interviews'; ?>
                </a>
              </h2>
            </div>

            <div class="video-image">
              <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $last_interview['slug']); ?>">
                <img width="100%" class="img-fluid"
                  src="<?= !empty($last_interview['img'])
                          ? base_url('public/uploads/news/' . $last_interview['img'])
                          : base_url('public/front/images/bg/video-bg.jpg'); ?>"
                  alt="<?= htmlspecialchars($last_interview['title_' . $lang] ?? $last_interview['title_az'], ENT_QUOTES, 'UTF-8'); ?>">
              </a>

              <?php if (!empty($last_interview['video'])): ?>
                <a class="video-btn popup-youtube"
                  href="<?= $last_interview['video']; ?>">
                  <i class="fas fa-play"></i>
                </a>
              <?php endif; ?>
            </div>
          </div>

          <h6 class="blog-title mt-2 post_inter_title">
            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $last_interview['slug']); ?>">
              <?= htmlspecialchars($last_interview['title_' . $lang] ?? $last_interview['title_az'], ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </h6>
        </div>
      <?php endif; ?>






      <div class="col-lg-6 col-xl-6">
        <div class="blog-style-vertical">

          <!-- <div class="blog-post post-style-05">
            <div class="blog-image"> <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/blog/20.jpg" alt="">
              <div class="video-icon"><a href="#"><i class="fa-solid fa-video text-orange"></i></a></div>
            </div>
            <div class="blog-post-details"> <span class="badge badge-small bg-orange">GAME</span>
              <h6 class="blog-title"><a href="#">Gaming is our passion. We create fun games that you'll love</a></h6>
              <div class="blog-view"> <a href="#">10 M Views</a> <a class="" href="#">6Days Ago</a> </div>
            </div>
          </div> -->
          <style>
            .inte {
              color: white;
            }

            .pos_re {
              position: absolute;
              background: white;
              padding: 0px 4px;
              border-radius: 4px;
              left: 10px;
              top: 10px;

            }
          </style>
          <?php if (!empty($other_interviews)): ?>
            <?php foreach ($other_interviews as $news): ?>
              <div class="blog-post post-style-05">

                <!-- Şəkil -->
                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                  <div class="blog-image">

                    <img class="img-fluid aspect_ratio"
                      src="<?= !empty($news['img']) ? base_url('public/uploads/news/' . $news['img']) : base_url('public/front/images/blog/20.jpg'); ?>"
                      alt="<?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>">

                    <!-- Video icon varsa göstər -->

                  </div>
                </a>


                <?php if (!empty($news['video'])): ?>
                  <div class="video-icon pos_re">
                    <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                      <i class="fa-solid fa-video text-orange"></i>
                    </a>
                  </div>
                <?php endif; ?>

                <div class="blog-post-details">

                  <!-- Kateqoriya etiketi -->
                  <?php if (!empty($news['cate_slug'])): ?>
                    <?php
                    // ✅ Helperdən dinamik rəngi al
                    $bg_color = category_color($news['cate_slug']);
                    ?>
                    <a href="<?= base_url($lang . '/' . t('category_link') . '/' . $news['cate_slug']); ?>">
                      <span class="badge badge-small text-white cate-bg-<?= $news['cate_slug']; ?>"
                        style="background: <?= $bg_color ?>;">
                        <?= htmlspecialchars($news['category_name_' . $lang] ?? $news['category_name_az'], ENT_QUOTES, 'UTF-8'); ?>
                      </span>
                    </a>
                  <?php endif; ?>

                  <!-- Başlıq -->
                  <h6 class="blog-title">
                    <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                      <?= htmlspecialchars($news['title_' . $lang] ?? $news['title_az'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                  </h6>

                  <!-- Baxış sayı və tarix -->
                  <div class="blog-view inte">
                    <i class="fa-solid fa-eye"></i> <?= $news['view_count']; ?>



                    <?php if (!empty($news['created_at'])): ?>

                      &nbsp;

                      <i class="fa-solid fa-calendar-days"></i>
                      <?= date('d.m.Y', strtotime($news['created_at'])); ?>
                      &nbsp;
                      <i class="fa-solid fa-clock"></i>
                      <?= date('h:i', strtotime($news['created_at'])); ?>

                    <?php endif; ?>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>
          <?php endif; ?>



        </div>
      </div>
    </div>
  </div>
</section>