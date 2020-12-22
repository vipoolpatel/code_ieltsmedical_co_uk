<?php
$this->load->view('header/header');
?>


     <section class="generic-banner relative">
	        <div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-10">
							<div class="generic-banner-content">
								<h2 class="text-white">Contact Us</h2>

							</div>
						</div>
					</div>
				</div>
			</section>


			<!-- Start faq Area -->
			<section class="faq-area section-gap" id="faq">
				<div class="container">

					<div class="row d-flex align-items-center">
						<div class="counter-left col-lg-3 col-md-3">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9931.195145742277!2d-0.1563661!3d51.5169074!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce80dd3358b96558!2sIELTS%20Medical%20London!5e0!3m2!1sen!2slk!4v1566895754779!5m2!1sen!2slk" frameborder="0" style="border:0; width: 300px; height: 400px;" allowfullscreen=""></iframe>
						</div>
						<div class="faq-content col-lg-9 col-md-9">
							<h3 class="mb-30">Get in Touch With Us!</h3>
<?php
$this->load->view('message');
?>
								<form method="post" action="<?=base_url()?>home/contact_us">
									<div class="mt-10">
										<input type="text" name="first_name" placeholder="First Name"  required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="last_name" placeholder="Last Name"  required class="single-input">
									</div>
									<div class="mt-10">
										<input type="email" name="email" placeholder="Email address" required class="single-input">
									</div>

									<div class="mt-10">
										<textarea class="single-textarea" name="message"  placeholder="Message"  required></textarea>
									</div>

									<div class="mt-10">
<?php
$firstNumber = mt_rand(0, 9);
$SecondNumber = mt_rand(0, 9);
echo $firstNumber . '+' . $SecondNumber;
?>
     <input type="hidden"  name="current_captcha"  value="<?=$firstNumber + $SecondNumber?>">
      <input type="text" name="captcha" required  class="single-input" value="" placeholder="Verification Code" >
<br />
                </div>


									<button type="submit"  class="genric-btn info"> Contact Now</button>
								</form>
						</div>
					</div>
				</div>
				</div>
			</section>
			<!-- End faq Area -->

<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>