<?php
$this->load->view('header/header');
?>
				<section class="faq-area section-gap" id="faq" style="margin-top: 50px;">
				<div class="container">
				 <form action="<?=base_url()?>home/checkout" method="post">
					<div class="row">

                     <div class="col-lg-8  col-md-12">
                     	<div class="cart-title mt-50">
                            <h2>Checkout</h2>
                        </div><br>


                                    <div class="row">
                                        <div class="col"><div class="mt-10">
                                        <input type="text" name="first_name" placeholder="First Name"  required class="single-input">
                                        </div></div>
                                        <div class="col"><div class="mt-10">
                                        <input type="text" name="last_name" placeholder="Last Name"  required class="single-input">
                                    </div></div>
                                    </div>
                                    <div class="mt-10">
                                        <input type="email" name="email" placeholder="Email address" required class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
                                        <input type="text" name="address" placeholder="Address" required class="single-input">
                                    </div>

                                     <div class="mt-10">
                                        <input type="text" name="zip_code" placeholder="Post code" required class="single-input">
                                    </div>

                                    <div class="mt-10">

                                        <select style="height: 38px;" class="single-input" name="country" id="ChangeCountry" required="">
                                            <option value="">Select Country</option>
                                            <?php
foreach ($country as $value) {
	?>
                                <option value="<?=$value->country_name?>"><?=$value->country_name?></option>
                                                    <?php
}
?>
                                        </select>


                                    </div>

                                     <div class="mt-10">
                                        <input type="text" name="phone" placeholder="Phone number" required class="single-input">
                                    </div>

                                    <div class="mt-10">
                                        <textarea class="single-textarea" name="message" placeholder="Message"  ></textarea>
                                    </div>

                                    <div class="mt-10" >
                                        <input type="checkbox" required=""> By clicking payment, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
                                        <br>
                                    </div>


					</div>
					<div class="col-lg-4  col-md-12">

<input type="hidden" value="<?=$this->cart->total();?>" id="getTotal">

						<div class="cart-summary">
	                        <h5>Total</h5>
                            <ul class="summary-table">
                               <li><span>subtotal:</span> <span>&pound;<?=$this->cart->total();?></span></li>
                                <li><span>delivery:</span> <span id="getDelivery">Free</span></li>
                                <li><span>total:</span> <span id="getFinalTotal">&pound;<?=$this->cart->total();?></span></li>
                            </ul>
                          <br>
                            <img src="<?=base_url()?>img/pay.png" class="img-fluid">
                            <div class="cart-btn mt-100" style="margin-top: 50px;">
                                <button type="submit" class="genric-btn info">Payment</button>
                            </div>
                        </div>

					</div>


					</div>
					  </form>
				</div>
			</section>


<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>

<script type="text/javascript">

$('#ChangeCountry').change(function(){
    var country = $(this).val();
    var total = $('#getTotal').val();
    if(country == 'United Kingdom') {
        $('#getDelivery').html('Free');
        $('#getFinalTotal').html('&pound;'+total);
    }
    else
    {
        $('#getDelivery').html('&pound;14.95');
        var final_total = parseFloat(total) + 14.95;
        $('#getFinalTotal').html('&pound;'+final_total);
    }
});

</script>