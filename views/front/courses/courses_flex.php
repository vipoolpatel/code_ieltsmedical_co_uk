<?php
$this->load->view('header/header');
?>
<section class="generic-banner relative">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row height align-items-center justify-content-center">
         <div class="col-lg-10">
            <div class="generic-banner-content">
               <h2 class="text-white"><?=$flex_course->title?></h2>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Start faq Area -->
<section class="faq-area section-gap" id="faq">
   <div class="container">
      <div class="row">
         <div class="col-lg-12  col-md-12">
            <h2><?=$flex_course->short_title?></h2>
            <br>
            <?php
$this->load->view('message');
?>
            <form action="<?=base_url()?>home/course_flex_submit" method="post">
               <div class="row">
                  <div class="col">
                     <div class="mt-10">

                      <input type="hidden" value="<?=$flex_course->id?>" name="flex_course_id">


                        <input type="text" name="first_name" placeholder="First Name*" required class="single-input">
                     </div>
                  </div>
                  <div class="col">
                     <div class="mt-10">
                        <input type="text" name="last_name" placeholder="Last Name*" required  class="single-input">
                     </div>
                  </div>
               </div>
               <div class="mt-10">
                  <input type="text" name="phone" placeholder="Phone Number*" required class="single-input">
               </div>
               <div class="mt-10">
                  <input type="email" name="email" placeholder="Email address*" required class="single-input">
               </div>
               <div class="mt-10">
                  <input type="text" name="address_capture" placeholder="Your address" class="single-input">
               </div>
               <div class="mt-10">
                  <p style="font-weight: 300; margin-left: 25px;"> Availability / Notify </p>
                  <input type="radio" class="availability_notify" name="avail_notify" value="Enter availability now" style=" margin-left: 25px;" required checked="">&nbsp;&nbsp;Enter availability now &nbsp;&nbsp;
                  <input type="radio" class="availability_notify" name="avail_notify" required value="Notify us week by week (Please note Sunday at 12:00pm is the deadline for the following week)" style=" margin-left: 25px;">&nbsp;&nbsp;Notify us week by week (Please note Sunday at 12:00pm is the deadline for the following week)
               </div>
               <div class="mt-10 number_of_note_show"  >
                  <br />
                  <p style="margin-left: 25px;">Enter your availability here and our administrator will contact you to confirm your chosen dates and times. </p>
                  <input type="text" name="availability_date_time" placeholder="Date or Time *"  class="single-input">
               </div>
               <div class="mt-10">
                  <select name="flex_course_session_id" id="flex_name" required class="single-input" style="padding: 9px;">
                     <option data-val="0" value="">Select Package* </option>
                     <?php
foreach ($flex_course_session as $value) {
	?>
<option data-val="<?=$value->price?>" value="<?=$value->id?>"><?=$value->flex_name?> (&pound;<?=$value->price?>)</option>
<?php
}
?>
                  </select>
               </div>
<?php
if (!empty($flex_course_skill)) {
	?>
               <div class="mt-10">
                  <select name="flex_course_skill_id" id="#" class="single-input" style="padding: 9px;">
                     <option data-val="0" value="">Select Skill </option>
                     <?php
foreach ($flex_course_skill as $value) {
		?>
<option value="<?=$value->id?>"><?=$value->skill_name?> </option>
<?php
}
	?>
                  </select>
               </div>
               <?php }
?>



                  <?php
if (!empty($setting->flex_courses_on_off)) {
	?>
  <input type="hidden" id="getRegistrationFeeValue" name="registration_fee" value="<?=$setting->flex_courses_price?>">
               <div class="mt-10">
                  <label>Registration Fee: &pound;<?=$setting->flex_courses_price?></label>
               </div>
               <?php } else {?>
<input type="hidden" name="registration_fee" id="getRegistrationFeeValue" value="0">
               <?php }
?>
               <div class="mt-10">
                  <label>Total Payable Amount: <span id="getTotalPayableAmount">&pound;0</span></label>
               </div>

               <div class="mt-10" >
                  <input type="checkbox" required=""> By clicking book now, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
                  <br>
               </div>
               <br/>



               <button type="submit" name="submit" class="genric-btn info"> Book Now</button>
            </form>
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
<script type="text/javascript">
   $(document).ready(function(){

  $('#flex_name').change(function(){
      var fee = $('#getRegistrationFeeValue').val();
      var price = $('#flex_name option:selected').attr('data-val');
      if(fee == '')
      {
        fee = 0;
      }
      var total = parseFloat(price) + parseFloat(fee);
      $('#getTotalPayableAmount').html('&pound;'+total);

  });

      $('.availability_notify').change(function(){
           var value = $(this).val();

           if(value == 'Enter availability now')
           {
               $('.number_of_note_show').show();
           }
           else
           {
               $('.number_of_note_show').hide();
           }

       });





   });


</script>
