<!-- ========================================== META ==================================================== -->
<title><?= html_escape($news['title'] ?? '') ?></title>
<meta name="description" content="<?= html_escape($news['long_description'] ?? '') ?>">
<link rel="canonical" href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']) ?>">

<!-- Open Graph for Social Media -->
<meta property="og:title" content="<?= html_escape($news['title'] ?? '') ?>">
<meta property="og:description" content="<?= html_escape(strip_tags($news['long_description'] ?? '')) ?>">
<meta property="og:url" content="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']) ?>">
<meta property="og:type" content="article">

<?php
$image = (!empty($news['img']) && file_exists(FCPATH . 'public/uploads/news/' . $news['img']))
  ? base_url('public/uploads/news/' . $news['img'])
  : base_url('public/front/images/demo/no-image.jpg');
?>
<meta property="og:image" content="<?= $image ?>">
<!-- ========================================== META ==================================================== -->
<?php $this->load->view('front/partials/headerStyle.php'); ?>


<?php $this->load->view('front/partials/loader.php'); ?>


<?php $this->load->view('front/partials/header.php'); ?>
<?php $this->load->view('front/partials/sideMenu.php'); ?>
<?php $this->load->view('front/partials/search.php'); ?>
<?php // $this->load->view('front/partials/breakingNews.php'); 
?>





<style>
  .im {
    width: 120px;
    height: 90px;
    /* background: red; */
    float: left;
    margin: 5px;
    object-fit: cover;
    object-position: top;
  }

  .img_si {
    height: 150px !important;
    width: 100%;
  }

  .img_size_2 {
    height: 150px !important;
    object-fit: cover;
    object-position: top;
  }
</style>


<!-- VOICE STYLE START -->
<style>
  .vcs-audio-player {
    /* background: #1894A0; */
    background: #041f42;
    color: #fff;
    padding: 10px 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    border-radius: 40px;
    width: 100%;
    margin-bottom: 15px;
  }

  .vcs-audio-player button {
    background: none;
    border: none;
    cursor: pointer;
    color: #fff;
    font-size: 18px;
  }

  .vcs-audio-player .seek {
    width: 100%;
    height: 4px;
    background: #fff;
    border-radius: 3px;
  }

  .vcs-audio-player .volume {
    width: 60px;
  }
</style>
<!-- VOICE STYLE END -->

<!-- container and reklam -->
<?php $this->load->view('front/partials/site_container/site_container_start.php'); ?>
<!-- container and reklam -->


<!--=================================
    Inner Header -->
<!-- <section class="inner-header border_radius_st">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url($lang . '/'); ?>">
              <i class="fas fa-home me-1"></i>
              <?= $lang == 'az' ? 'Ana səhifə' : 'Home'; ?>
            </a>
          </li>
          <li class="breadcrumb-item active"><i class="fa-solid fa-chevron-right me-2"></i><span>Xəbərin adı</span></li>
        </ol>
      </div>
    </div>
  </div>
</section> -->
<!--=================================
    Inner Header -->





<section class="space-ptb pad_top_side_detail">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-xl-8 blog-single">
        <div class="blog-post-info">
          <div class="blog-content pb-0">

            <div class="blog-post-image mb-4">
              <img style="width: 100%;" class="img-fluid"
                src="<?= base_url(!empty($news['img']) && file_exists(FCPATH . 'public/uploads/news/' . $news['img'])
                        ? 'public/uploads/news/' . $news['img']
                        : 'public/front/images/demo/no-image.jpg') ?>"
                alt="<?= html_escape($news['title'] ?? 'Xəbər') ?>">
            </div>

            <div class="blog-post-title">
              <h3 class="mb-0">
                <?= html_escape($news['title'] ?? 'Xəbər tapılmadı') ?>
              </h3>
            </div>
            <div class="blog-post post-style-07 border-0 py-4 px-0">
              <div class="blog-post-details">
                <div class="blog-post-meta p-0">

                  <div class="blog-post-time d-flex align-items-center gap-3">
                    <?php if (!empty($news['created_at'])): ?>
                      <time datetime="<?= $news['created_at']; ?>" class="news-date f_size_date">
                        <?= format_news_date($news['created_at'], $lang); ?>
                      </time>
                    <?php endif; ?>

                    <?php if (!empty($news['view_count'])): ?>
                      <a href="javascript:void(0)">
                        <i class="fa-solid fa-eye greyColor"></i>
                        <?= (int)$news['view_count'] ?>
                      </a>
                    <?php endif; ?>
                  </div>


                </div>
              </div>
            </div>




            <!-- VOICE HTML START -->
            <div class="vcs-audio-player"
              data-text="<?= strip_tags($news['long_description']); ?>">

              <button class="play-btn"><i class="fa-solid fa-play"></i></button>

              <audio preload="metadata">
                <?php if (!empty($news['audio'])): ?>
                  <source src="<?= $news['audio'] ?>" type="audio/mpeg">
                <?php endif; ?>
              </audio>

              <input type="range" class="seek" min="0" value="0">
              <span class="current">0:00</span> / <span class="duration">0:00</span>
              <input type="range" class="volume" min="0" max="1" step="0.05" value="1">
            </div>

            <script>
              document.querySelectorAll('.vcs-audio-player').forEach(player => {
                const btn = player.querySelector('.play-btn');
                const audio = player.querySelector('audio');
                const text = player.dataset.text; // ✅ Xəbər mətni
                const seek = player.querySelector('.seek');
                const current = player.querySelector('.current');
                const duration = player.querySelector('.duration');
                const volume = player.querySelector('.volume');

                let utterance = null;
                let ttsMode = false;

                if (!audio.src) {
                  ttsMode = true;
                  utterance = new SpeechSynthesisUtterance(text);
                  utterance.lang = document.documentElement.lang === 'en' ? 'en-US' : 'az-AZ'; // ✅ Dilə uyğun
                }

                btn.addEventListener('click', () => {
                  if (ttsMode) {
                    if (speechSynthesis.speaking) {
                      speechSynthesis.pause();
                      btn.innerHTML = `<i class="fa-solid fa-play"></i>`;
                    } else {
                      speechSynthesis.resume();
                      speechSynthesis.speak(utterance);
                      btn.innerHTML = `<i class="fa-solid fa-pause"></i>`;
                    }
                    return;
                  }

                  if (audio.paused) {
                    audio.play();
                    btn.innerHTML = `<i class="fa-solid fa-pause"></i>`;
                  } else {
                    audio.pause();
                    btn.innerHTML = `<i class="fa-solid fa-play"></i>`;
                  }
                });

                if (!ttsMode) {
                  audio.addEventListener('loadedmetadata', () => {
                    seek.max = Math.floor(audio.duration);
                    duration.innerText = formatTime(audio.duration);
                  });

                  audio.addEventListener('timeupdate', () => {
                    seek.value = audio.currentTime;
                    current.innerText = formatTime(audio.currentTime);
                  });

                  seek.addEventListener('input', () => {
                    audio.currentTime = seek.value;
                  });
                }

                volume.addEventListener('input', () => {
                  if (ttsMode) {
                    utterance.volume = volume.value;
                  } else {
                    audio.volume = volume.value;
                  }
                });

                function formatTime(sec) {
                  const m = Math.floor(sec / 60);
                  const s = Math.floor(sec % 60).toString().padStart(2, '0');
                  return `${m}:${s}`;
                }
              });
            </script>
            <!-- VOICE HTML END -->

            <!-- <button onclick="testVoice()">Səsi yoxla</button> -->

            <!-- <script>
            function testVoice() {
                const msg = new SpeechSynthesisUtterance('Diqqətimizi İslandiyaya yönəltməzdən əvvəl Azərbaycanla matça ciddi yanaşmalıyıq. Hər oyunun öz reallığı var və biz sabah qələbə qazanmalıyıq. Bu sözləri Fransa millisinin futbolçusu Kilian Mbappe DÇ-2026-nın seçmə mərhələsində Parisdə Azərbaycan millisinə qarşı keçirəcəkləri oyundan öncə təşkil olunan mətbuat konfransında deyib. 27 yaşlı hücumçu yığmamızın seçmə mərhələnin son turunda Bakıda Ukrayna ilə heç-heçə etməsini xüsusi vurğulayıb: Bu qarşılaşma İslandiya ilə matçdan az önəmli deyil. Məqsəd dünya çempionatına vəsiqə qazanmaqdır. ');
                msg.lang = "az-AZ";
                speechSynthesis.speak(msg);
            }
            </script> -->
            <style>
              .descr_style p {
                font-size: 18px;
              }
            </style>
            <div class="descr_style">
              <p style="margin: 0px; padding: 0px; ">
                <?= !empty($news['long_description']) ? $news['long_description'] : 'Təsvir mövcud deyil' ?>
              </p>
            </div>





            <div class="popup-video my-4">
              <?php if (!empty($news['video'])) { ?>
                <div class="ratio ratio-16x9">
                  <iframe src="<?php echo $news['video']; ?>"
                    frameborder="0"
                    allowfullscreen
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                  </iframe>
                </div>
              <?php } ?>

            </div>


            <!-- lightgallery -->
            <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css">
            <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
            <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
            <!-- lightgallery -->


            <?php if (!empty($news['multi_img'])): ?>
              <div id="lightgallery" class="row g-2 my-4 demo-lightgallery">
                <?php foreach ($news['multi_img'] as $img): ?>
                  <?php $src = base_url('public/uploads/news/' . $img); ?>
                  <a href="<?= $src ?>" class="col-4">
                    <img loading="lazy" src="<?= $src ?>" alt="<?= htmlspecialchars($news['title']); ?>" class="img-fluid border-radius img_si">
                  </a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>






            <div class="blog-post-share-box d-flex flex-wrap justify-content-between align-items-center mt-4">


              <div class="blog-post post-style-07 border-0 ps-0">
                <div class="blog-post-details">
                  <div class="blog-post-meta p-0">
                    <div class="blog-post-share">
                      <div class="share-box">
                        <a href="#"><i class="fa-solid fa-share-nodes"></i><?= ($lang == 'az') ? "Paylaş" : "Share"; ?></a>
                        <ul class="list-unstyled share-box-social">
                          <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                          <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                          <li> <a href="#"><i class="fa-brands fa-linkedin-in"></i></a> </li>
                          <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- ✅ Xəbərin kateqoriyası -->
              <div class="badges">
                <a href="<?= base_url($lang . '/' . t('category_link') . '/' . $news['category_slug']) ?>"
                  class="btn btn-primary ">
                  <!-- text-uppercase -->
                  <?= html_escape($news['category_name']) ?>
                </a>
              </div>
            </div>

            <?php if (!empty($related_news)): ?>
              <div class="bg-white mt-4">
                <div class="section-title">
                  <h2 class="mb-0" style="text-transform: none;">
                    <i class="fa-solid fa-list" style="color: #30c96a;"></i>
                    <?= ($lang == 'az') ? "Xəbər lenti" : "News Feed"; ?>
                  </h2>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="owl-carousel arrow-styel-02" data-nav-dots="false" data-nav-arrow="true"
                      data-items="3" data-xl-items="3" data-lg-items="2" data-md-items="2"
                      data-sm-items="2" data-xs-items="1" data-xx-items="1" data-autoheight="true">

                      <?php if (!empty($related_news)): ?>
                        <?php foreach ($related_news as $news): ?>
                          <?php
                          $img = (!empty($news['img']) && file_exists(FCPATH . 'public/uploads/news/' . $news['img']))
                            ? base_url('public/uploads/news/' . $news['img'])
                            : base_url('public/front/images/demo/no-image.jpg');
                          ?>
                          <div class="item">
                            <div class="blog-post post-style-02">

                              <!-- Şəkil -->

                              <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                <div class="blog-image">
                                  <img class="img-fluid aspect_ratio"
                                    src="<?= $img ?>"
                                    alt="<?= htmlspecialchars($news['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">

                                </div>
                              </a>
                              <!-- ✅ Media Overlay -->
                              <div class="media-overlay">

                                <?php if (!empty($news['video'])): ?>
                                  <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                    <span class="video-icon">
                                      <i class="fa-solid fa-video video-icon-color"></i>
                                    </span>
                                  </a>
                                <?php endif; ?>

                                <?php if (!empty($news['multi_img'])): ?>
                                  <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                    <span class="gallery-icon">
                                      <i class="fa-solid fa-images"></i>
                                    </span>
                                  </a>
                                <?php endif; ?>

                              </div>

                              <!-- ✅ Baxış sayı -->
                              <?php if (!empty($news['view_count'])): ?>
                                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                  <div class="views-tag">
                                    <i class="fa-solid fa-eye"></i>
                                    <?= (int)$news['view_count']; ?>
                                  </div>
                                </a>
                              <?php endif; ?>

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
                                <h6 class="blog-title fontSystem_ui setir">
                                  <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                                    <?= htmlspecialchars($news['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                                  </a>
                                </h6>
                              </div>

                            </div>
                          </div>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <p class="text-muted"><?= $lang == 'az' ? 'Xəbər tapılmadı.' : 'No news found.'; ?></p>
                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="sidebar mt-lg-0" style="padding: 14px;">
          <div class="widget post-widget">
            <h6 class="widget-title" style="text-transform: none;">

              <?= ($lang == 'az') ? "Ən çox oxunanlar" : "Most Viewed"; ?>
            </h6>
            <div class="news-tab">

              <div class="tab-content" id="pills-tabContent03">
                <div class="tab-pane fade show active" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab" tabindex="0">


                  <?php if (!empty($most_viewed_news)): ?>
                    <?php foreach ($most_viewed_news as $r): ?>
                      <div class="blog-post post-style-04" style="margin-bottom: 20px; position: relative;">

                        <div class="blog-post-details">
                          <!-- ✅ Kateqoriya Badge -->
                          <?php if (!empty($r['category_slug'])): ?>
                            <a href="<?= base_url($lang . '/' . t('category_link') . '/' . $r['category_slug']); ?>">
                              <span class="badge text-primary cateTransformTitle fontSystem_ui"
                                style="font-size: 11px; font-weight:600; background: rgba(0,0,0,0.05); padding:4px 7px; border-radius:4px; color:#0066ff!important; text-transform:none;">
                                <?= htmlspecialchars($r['category_name'], ENT_QUOTES, 'UTF-8'); ?>
                              </span>
                            </a>
                          <?php endif; ?>

                          <!-- ✅ Media Icons (Video + Gallery + Views) -->
                          <div class="d-flex align-items-center mb-1 mt-1">

                            <div class="d-flex gap-2">
                              <?php if (!empty($r['video'])): ?>
                                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $r['slug']) ?>">
                                  <span class="media-small-icon video">
                                    <i class="fa-solid fa-video"></i>
                                  </span>
                                </a>
                              <?php endif; ?>

                              <?php if (!empty($r['multi_img']) && count(json_decode($r['multi_img'], true)) > 1): ?>
                                <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $r['slug']) ?>">
                                  <span class="media-small-icon gallery">
                                    <i class="fa-solid fa-images"></i>
                                  </span>
                                </a>
                              <?php endif; ?>
                            </div>

                            <?php if (!empty($r['view_count'])): ?>
                              <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $r['slug']) ?>">
                                <div class="media-views">
                                  <i class="fa-solid fa-eye"></i>
                                  <?= number_format((int)$r['view_count']); ?>
                                </div>
                              </a>
                            <?php endif; ?>

                          </div>

                          <!-- ✅ Title -->
                          <h6 class="blog-title setir fontSystem_ui" style="margin-bottom: 4px;">
                            <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $r['slug']) ?>">
                              <?= htmlspecialchars($r['title'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                          </h6>

                          <!-- ✅ Date -->
                          <div class="blog-post-meta">
                            <?php if (!empty($r['created_at'])): ?>
                              <time datetime="<?= $r['created_at']; ?>" class="news-date">
                                <?= format_news_date($r['created_at'], $lang); ?>
                              </time>
                            <?php endif; ?>
                          </div>

                        </div>

                      </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <p class="text-muted">
                      <?= ($lang == 'az') ? "Oxşar xəbər tapılmadı" : "No related news found"; ?>
                    </p>
                  <?php endif; ?>

                </div>

              </div>
            </div>
          </div>


          <div class="widget widget-tag mb-0">
            <h6 class="widget-title"><?= ($lang == 'az') ? "Kateqoriyalar" : "Categories"; ?></h6>
            <ul class="list-unstyled font_s11">

              <?php foreach (array_merge($main_categories, $other_categories) as $cat): ?>
                <li>
                  <a href="<?= base_url($lang . '/' . ($lang == 'az' ? 'kateqoriya' : 'category') . '/' . $cat['cate_slug']) ?>">
                    <?= html_escape($cat['name_' . $lang]); ?>
                  </a>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>
      </div>




















      <div class="bg-white mt-4">
        <div class="section-title" style="border-top: 1px solid #d1d8e6; padding-top: 18px;">
          <h2 class="mb-0" style="text-transform: none;">
            <i class="fa-solid fa-list" style="color: #30c96a;"></i>
            <?= ($lang == 'az') ? "Digər xəbərlər" : "Other News"; ?>
          </h2>
        </div>
        <div class="row">
          <div class="col-lg-12 col-xl-12">
            <div class="row">


              <?php if (!empty($other_news)): ?>
                <?php foreach ($other_news as $news): ?>
                  <div class="col-md-4 mb-4">
                    <div class="blog-post post-style-02">

                      <!-- ✅ Şəkil -->
                      <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                        <div class="blog-image">

                          <img class="img-fluid aspect_ratio"
                            src="<?= !empty($news['img']) ? base_url('public/uploads/news/' . $news['img']) : base_url('public/front/images/blog/01.jpg'); ?>"
                            alt="<?= htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8'); ?>">

                        </div>
                      </a>

                      <!-- ✅ Media Overlay -->
                      <div class="vcs-media-overlay">

                        <?php if (!empty($news['video'])): ?>
                          <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>" class="vcs-media-badge vcs-video-badge">
                            <i class="fa-solid fa-video"></i>
                            <span><?= ($lang == 'az') ? 'Video' : 'Video'; ?></span>
                          </a>
                        <?php endif; ?>

                        <?php if (!empty($news['multi_img'])): ?>
                          <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>" class="vcs-media-badge vcs-photo-badge">
                            <i class="fa-solid fa-images"></i>
                            <span><?= ($lang == 'az') ? 'Foto' : 'Photo'; ?></span>
                          </a>
                        <?php endif; ?>

                      </div>
                      <!-- ✅ Baxış sayı -->
                      <?php if (!empty($news['view_count'])): ?>
                        <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                          <div class="views-tag">
                            <i class="fa-solid fa-eye"></i>
                            <?= (int)$news['view_count']; ?>
                          </div>
                        </a>
                      <?php endif; ?>

                      <!-- ✅ Tarix + Kateqoriya yan-yana -->
                      <div class="d-flex justify-content-between align-items-center blog-post-meta time_style">

                        <?php if (!empty($news['category_name'])): ?>
                          <a href="<?= base_url($lang . '/' . t('category_link') . '/' . $news['category_slug']); ?>">
                            <span class="text-primary cateTransformTitle fontSystem_ui icon_color_genera cate-bg-<?= $news['category_slug']; ?>">
                              <?= htmlspecialchars($news['category_name'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                          </a>
                        <?php endif; ?>

                        <?php if (!empty($news['created_at'])): ?>
                          <time datetime="<?= $news['created_at']; ?>" class="news-date">
                            <?= format_news_date($news['created_at'], $lang); ?>
                          </time>
                        <?php endif; ?>



                      </div>

                      <!-- ✅ Başlıq -->
                      <div class="blog-post-details mar_Top_other">
                        <h6 class="blog-title fontSystem_ui setir">
                          <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news['slug']); ?>">
                            <?= htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8'); ?>
                          </a>
                        </h6>
                      </div>

                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p class="text-muted">
                  <?= $lang == 'az' ? 'Xəbər tapılmadı.' : 'No news found.'; ?>
                </p>
              <?php endif; ?>


            </div>
            <!-- <div class="row mt-4">
              <div class="col-12">
                <nav class="nezzy-pagination">
                  <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-left"></i></a></li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div> -->
          </div>
        </div>
      </div>




    </div>
  </div>
</section>
<!--=================================
    Blog -->






<!-- container and reklam -->
<?php $this->load->view('front/partials/site_container/site_container_end.php'); ?>
<!-- container and reklam -->



<?php $this->load->view("front/partials/footer"); ?>
<?php $this->load->view("front/partials/footerStyle"); ?>






<script>
  var elements = document.getElementsByClassName('demo-lightgallery');
  for (let item of elements) {
    lightGallery(item, {
      share: false
    })
  }
</script>