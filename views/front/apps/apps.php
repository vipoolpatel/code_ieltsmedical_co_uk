<?php
$this->load->view('header/header');
?>


          <section class="generic-banner relative">
          <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
              <div class="generic-banner-content">
                <h2 class="text-white">Apps</h2>

              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="service-area section-gap" id="service">
        <div class="container">
          <div class="row d-flex justify-content-center">

          </div>
          <div class="row">
            <?php
foreach ($getApps as $value) {
	?>
            <div class="col-lg-4 col-md-6">
              <div class="single-service">
                <img height="300px;" width="300px" src="<?=base_url()?>img/app/<?=$value->photo_image?>" class="img-fluid"><br/><br/>
                <div style="text-align: center;">
                                    <?php
if (!empty($value->app_store)) {
		?>
                            <a target="_blank" href="<?=$value->app_store?>">
                              <img src="<?=base_url()?>img/app-store-badge.svg"></a>
                    <?php
}
	if (!empty($value->google_play)) {
		?>
                  <a target="_blank" href="<?=$value->google_play?>">
                              <img src="<?=base_url()?>img/google-play-badge.svg"></a>
                              <?php }
	?>
               </div>
              </div>

            </div>
            <?php
}
?>

          </div>
        </div>
      </section>


<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>