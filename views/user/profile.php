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
           <?php
$this->load->view('message');
?>
                    <div class="d_body">
                        <div class="row" style="padding: 50px;">
                          <div class="col-lg-12 col-md-12">
                          <form action="" method="post">
                            <div class="row">
                              <div class="col">
                       <label>First name <b>*</b></label>
                    <input type="text" value="<?=$getuser->username?>" name="first_name" placeholder="First Name" required class="single-input">

                  </div>
                  <div class="col">
                      <label>Last name </label>
                    <input type="text" name="last_name" placeholder="Last Name"  value="<?=$getuser->lastname?>" class="single-input">

                  </div>
                  </div>
                  <div class="mt-10">
                    <label>Email <b>*</b></label>
                    <input type="text" name="email" value="<?=$getuser->email?>" readonly placeholder="Email" required class="single-input">
                  </div> <br>
                  <h5>Password</h5> <br>
                  <div class="mt-10">
                    <label>Password (leave blank to leave unchanged) <b></b></label>
                    <input type="text" name="Password" placeholder="Password"  class="single-input">
                  </div><br>

                  <button class="genric-btn info" type="submit" style="float: right;">Save</button>

                </form>

              </div>
                        </div>
                    </div>

          </div>
          </div>
        </div>
      </section>
      <!-- End faq Area -->





<?php
$this->load->view('header/footer');
?>