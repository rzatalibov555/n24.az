<?php $this->load->view('front/partials/headerStyle.php'); ?>
<?php $this->load->view('front/partials/loader.php'); ?>


<?php $this->load->view('front/partials/header.php'); ?>
<?php $this->load->view('front/partials/sideMenu.php'); ?>
<?php $this->load->view('front/partials/search.php'); ?>
<?php // $this->load->view('front/partials/breakingNews.php'); 
?>

<style>
  .marLeft0 {
    margin-left: 0px !important;
  }
</style>

<!-- container and reklam -->
<?php $this->load->view('front/partials/site_container/site_container_start.php'); ?>
<!-- container and reklam -->


<!--=================================
    Inner Header -->
<section class="inner-header border_radius_st">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <!-- Ana səhifə / Home -->
          <li class="breadcrumb-item">
            <a href="<?php echo base_url($lang . '/'); ?>">
              <i class="fas fa-home me-1"></i>
              <?= $lang == 'az' ? 'Ana səhifə' : 'Home'; ?>
            </a>
          </li>

          <!-- Kateqoriya -->
          <li class="breadcrumb-item active">
            <i class="fa-solid fa-chevron-right me-2"></i>
            <span>
              <?=
              htmlspecialchars(
                $category['name_' . $lang] ?? $category['name_az'] ?? 'News',
                ENT_QUOTES,
                'UTF-8'
              );
              ?>
            </span>
          </li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!--=================================
    Inner Header -->

<!--=================================
    explore-products -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-xl-12">
        <div class="row">


          <?php if (!empty($news_list)): ?>
            <?php foreach ($news_list as $news): ?>
              <div class="col-md-4 mb-4">
                <div class="blog-post post-style-02">

                  <!-- ✅ Şəkil -->
                  <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                    <div class="blog-image">
                      <img class="img-fluid aspect_ratio"
                        src="<?= !empty($news->img) ? base_url('public/uploads/news/' . $news->img) : base_url('public/front/images/blog/01.jpg'); ?>"
                        alt="<?= htmlspecialchars($news->{'title_' . $lang} ?? $news->title_az, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>
                  </a>

                  <!-- ✅ Media Overlay -->
                  <div class="vcs-media-overlay">

                    <?php if (!empty($news->video)): ?>
                      <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>"
                        class="vcs-media-badge vcs-video-badge">
                        <i class="fa-solid fa-video"></i>
                        <span><?= ($lang == 'az') ? 'Video' : 'Video'; ?></span>
                      </a>
                    <?php endif; ?>

                    <?php if (!empty($news->multi_img)): ?>
                      <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>"
                        class="vcs-media-badge vcs-photo-badge">
                        <i class="fa-solid fa-images"></i>
                        <span><?= ($lang == 'az') ? 'Foto' : 'Photo'; ?></span>
                      </a>
                    <?php endif; ?>

                  </div>

                  <!-- ✅ Baxış sayı -->
                  <?php if (!empty($news->view_count)): ?>
                    <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                      <div class="views-tag">
                        <i class="fa-solid fa-eye"></i>
                        <?= (int)$news->view_count; ?>
                      </div>
                    </a>
                  <?php endif; ?>

                  <!-- ✅ Tarix + Kateqoriya -->
                  <div class="d-flex justify-content-between align-items-center blog-post-meta time_style">

                    <?php if (!empty($news->{'category_name_' . $lang})): ?>
                      <a href="<?= base_url($lang . '/' . t('category_link') . '/' . $news->category_slug); ?>">
                        <span class="text-primary cateTransformTitle fontSystem_ui icon_color_genera"
                          style="background: <?= category_color($news->category_slug); ?>;">
                          <?= htmlspecialchars($news->{'category_name_' . $lang}, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                      </a>
                    <?php endif; ?>

                    <?php if (!empty($news->created_at)): ?>
                      <time datetime="<?= $news->created_at; ?>" class="news-date">
                        <?= format_news_date($news->created_at, $lang); ?>
                      </time>
                    <?php endif; ?>

                  </div>

                  <!-- ✅ Başlıq -->
                  <div class="blog-post-details mar_Top_other">
                    <h6 class="blog-title fontSystem_ui setir"
                      style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                      <a href="<?= base_url($lang . '/' . t('news_link') . '/' . $news->slug); ?>">
                        <?= htmlspecialchars($news->{'title_' . $lang} ?? $news->title_az, ENT_QUOTES, 'UTF-8'); ?>
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
        <div class="row mt-4">
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
        </div>
      </div>

    </div>
  </div>
</section>
<!--=================================
    explore-products -->





<!-- container and reklam -->
<?php $this->load->view('front/partials/site_container/site_container_end.php'); ?>
<!-- container and reklam -->

<?php $this->load->view("front/partials/footer"); ?>
<?php $this->load->view("front/partials/footerStyle"); ?>