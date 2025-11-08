  <!--=================================
  Header -->
  <style>
    .active_class {
      color: #30c96a !important;
      background: rgba(48, 201, 106, 0.07) !important;
      padding-left: 10px !important;
      border-radius: 6px !important;
      -webkit-border-radius: 6px !important;
      -moz-border-radius: 6px !important;
      -ms-border-radius: 6px !important;
      -o-border-radius: 6px !important;
    }
  </style>

  <header class="header header-sticky">
    <div class="topbar d-none d-md-block">
      <div class="container">
        <div class="topbar-inner">
          <div class="row">
            <div class="col-12">
              <div class="d-lg-flex align-items-center text-center">
                <div class="topbar-left mb-2 mb-lg-0">
                  <div class="topbar-date d-inline-flex"> <span class="date"><i class="fa-solid fa-calendar-days"></i> <?= format_full_date(time(), $lang); ?></span> </div>
                  <div class="me-auto d-inline-flex">
                    <ul class="list-unstyled top-menu">
                      <!-- <li><a href="<?php echo base_url('about'); ?>">Haqqımızda</a></li>
                      <li><a href="#">Reklam</a></li> -->
                      <li>
                        <a href="">
                          <button class="btn btn-danger live"> <i class="fa fa-video-camera" aria-hidden="true"></i> LIVE</button>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <?php $lang = isset($lang) ? $lang : 'az'; ?>
                <div class="topbar-right ms-auto justify-content-center">
                  <!-- <div class="dropdown right-menu d-inline-flex news-language">
                    <a class="dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="img-fluid country-flag" src="<?php echo base_url('public/front/') ?>images/country-flags/02.jpg" alt=""> English<i class="fas fa-chevron-down fa-xs"></i> </a>
                    <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton2">
                      <a class="dropdown-item" href="<?= base_url('language/switch/en'); ?>"><img class="img-fluid country-flag" src="<?php echo base_url('public/front/') ?>images/country-flags/02.jpg" alt="">English</a>
                      <a class="dropdown-item" href="<?= base_url('language/switch/az'); ?>"><img class="img-fluid country-flag" src="<?php echo base_url('public/') ?>shared/flags/az.svg" alt="">Azərbaycan</a>
                    </div>
                  </div> -->

                  <div class="dropdown right-menu d-inline-flex news-language">
                    <a class="dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php if ($lang == 'az'): ?>
                        <img class="img-fluid country-flag" src="<?php echo base_url('public/shared/flags/az.svg'); ?>" alt="">
                        Azərbaycan
                      <?php else: ?>
                        <img class="img-fluid country-flag" src="<?php echo base_url('public/front/images/country-flags/02.jpg'); ?>" alt="">
                        English
                      <?php endif; ?>
                      <i class="fas fa-chevron-down fa-xs"></i>
                    </a>
                    <style>
                      .selectedLang_s {
                        background: transparent !important;
                        color: #30c96a !important;
                      }
                    </style>
                    <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton2">
                      <a class="dropdown-item <?= ($lang == 'en') ? 'active selectedLang_s' : ''; ?>" href="<?= base_url('language/switch/en'); ?>">
                        <img class="img-fluid country-flag" src="<?php echo base_url('public/front/images/country-flags/02.jpg'); ?>" alt=""> English
                      </a>
                      <a class="dropdown-item <?= ($lang == 'az') ? 'active selectedLang_s' : ''; ?>" href="<?= base_url('language/switch/az'); ?>">
                        <img class="img-fluid country-flag" src="<?php echo base_url('public/shared/flags/az.svg'); ?>" alt=""> Azərbaycan
                      </a>
                    </div>
                  </div>
                  <div class="social d-inline-flex">
                    <ul class="list-unstyled">
                      <li>
                        <a href="#"> <i class="fa-brands fa-facebook-f"></i> </a>
                      </li>
                      <li>
                        <a href="#"> <i class="fab fa-twitter"></i> </a>
                      </li>
                      <li>
                        <a href="#"> <i class="fa-brands fa-linkedin-in"></i> </a>
                      </li>
                      <li>
                        <a href="#"> <i class="fab fa-instagram"></i> </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <nav class="navbar navbar-expand-lg">
      <div class="container position-relative">
        <a class="navbar-brand" href="<?php echo base_url(''); ?>">
          <img class="img-fluid" src="<?php echo base_url('public/front/') ?>images/logo-dark.png" alt="logo">
        </a>
        <div class="collapse navbar-collapse" style="justify-content: space-between; padding: 0 25px;" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('index') ?>"><?php echo $this->lang->line('home'); ?></a></li>

            <?php
            $current_slug = $this->uri->segment(3) ?? null; // kateqoriya slug
            ?>

            <?php if (!empty($main_categories) && is_array($main_categories)): ?>
              <?php foreach ($main_categories as $cat): ?>
                <li class="nav-item <?= ($current_slug === $cat['cate_slug']) ? 'active' : '' ?>">
                  <a class="nav-link" href="<?php echo base_url($lang . '/' . ($lang == 'az' ? 'kateqoriya' : 'category') . '/' . $cat['cate_slug']) ?>">
                    <?php echo html_escape($cat['name_' . $lang]) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>




            <?php if (!empty($other_categories) && is_array($other_categories)): ?>
              <li class="nav-item dropdown <?= ($current_slug && in_array($current_slug, array_column($other_categories, 'cate_slug'))) ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                  <?php echo ($lang == 'az') ? 'Digər' : 'Other'; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php foreach ($other_categories as $cat): ?>
                    <li>
                      <a class="dropdown-item <?= ($current_slug === $cat['cate_slug']) ? 'active_class' : '' ?>"
                        href="<?php echo base_url($lang . '/' . ($lang == 'az' ? 'kateqoriya' : 'category') . '/' . $cat['cate_slug']) ?>">
                        <?php echo html_escape($cat['name_' . $lang]) ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endif; ?>

          </ul>

          <style>
            .menu_border_style {
              border: 2px solid #30c96a;
              border-radius: 4px;
            }
            .menu_mar_right_5{
              margin-right: 5px;
            }
          </style>

          <?php $current_slug = $this->uri->segment(3); ?>

          <ul class="navbar-nav">
            <li class="nav-item menu_mar_right_5 <?= ($current_slug == 'nakhchivan') ? 'active' : '' ?>">
              <a class="nav-link menu_border_style" style="padding: 5px 10px;"
                href="<?= base_url($lang . '/' . ($lang == 'az' ? 'bolme' : 'section') . '/nakhchivan'); ?>">
                <?= ($lang == 'az') ? "Naxçıvan" : "Nakhchivan"; ?>
              </a>
            </li>

            <li class="nav-item <?= ($current_slug == 'zangezur_corridor') ? 'active' : '' ?>">
              <a class="nav-link menu_border_style" style="padding: 5px 10px;"
                href="<?= base_url($lang . '/' . ($lang == 'az' ? 'bolme' : 'section') . '/zangezur_corridor'); ?>">
                <?= ($lang == 'az') ? "Zəngəzur dəhlizi" : "Zangezur Corridor"; ?>
              </a>
            </li>
          </ul>









        </div>
        <div class="add-listing">
          <div class="weather">
            <img class="img-fluid weather-icon" src="<?php echo base_url('public/front/') ?>images/weather-icon.png" alt="">
            <span class="weather-temprecher">25</span>
            <!-- <span class="weather-address">
              <span class="place">NEW YORK,</span> 
              <span class="date">Mon. 10 jun 2022</span> 
            </span> -->
          </div>
          <!-- <div id="weathertime" class="clock"></div> -->
          <div class="header-search">
            <div class="search">
              <a href="#search"> <i class="fa-solid fa-magnifying-glass"></i> </a>
            </div>
          </div>
          <!-- <div class="side-menu d-none d-lg-inline-block">
            <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"> <i class="fa-solid fa-align-right"></i> </a>
          </div>           -->
        </div>
      </div>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa-solid fa-align-right"></i> </button>
    </nav>
  </header>
  <!--=================================
  Header -->