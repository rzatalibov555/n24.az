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
<section class="space-ptb pad_top_side_detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-404 text-center">
                    

                    <h2 class="mb-4">
                        <?= ($lang == 'az') ? 'Oops! Səhifə tapılmadı :(' : 'Oops! Page Not Found :('; ?>
                    </h2>

                    <p>
                        <?= ($lang == 'az')
                            ? 'Axtardığınız səhifə tapılmadı. Axtarış edin və ya əsas səhifəyə keçin:'
                            : 'Can’t find what you’re looking for? Try searching or go to the home page:'; ?>
                        <a href="<?= base_url($lang . '/'); ?>">
                            <?= ($lang == 'az') ? 'Ana Səhifə' : 'Home Page'; ?>
                        </a>
                    </p>

                    <a href="<?= base_url($lang . '/'); ?>" class="btn btn-primary">
                        <i class="fas fa-home pe-2"></i>
                        <?= ($lang == 'az') ? 'Ana səhifəyə qayıt' : 'Back to Home'; ?>
                    </a>

                    <img class="img-fluid" src="<?= base_url('public/front/images/404.png'); ?>" alt="404">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- container and reklam -->
<?php $this->load->view('front/partials/site_container/site_container_end.php'); ?>
<!-- container and reklam -->

<?php $this->load->view("front/partials/footer"); ?>
<?php $this->load->view("front/partials/footerStyle"); ?>