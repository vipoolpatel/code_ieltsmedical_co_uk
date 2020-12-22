<?php
$this->load->view('header/header');
?>
  <link rel="stylesheet" href="<?=base_url()?>file/css/dashboard.css">

<!-- Start faq Area -->
      <section class="faq-area section-gap" id="faq" style="margin-top: 50px;">
        <div class="container">
          <div class="row">

<?php
$this->load->view('header/sidebar');
?>
           <div class="col-lg-9  col-md-12">
                    <div class="d_body">
                      <p>
                        Hello <?=$getuser->username?>! <br><br>
                        From your account dashboard you can view your <a href="<?=base_url()?>user/book-order">recent orders</a> and manage your <a href="<?=base_url()?>user/profile">Profile</a>
                      </p>

                    </div>

          </div>
          </div>
        </div>
      </section>
      <!-- End faq Area -->




<?php
$this->load->view('header/footer');
?>