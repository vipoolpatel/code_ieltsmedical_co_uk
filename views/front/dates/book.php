
<?php
$this->load->view('header/header');
?>
<section class="generic-banner relative">
<div class="overlay overlay-bg"></div>
<div class="container">
<div class="row height align-items-center justify-content-center">
<div class="col-lg-10">
<div class="generic-banner-content">
<h2 class="text-white">Book Course and Exam Date</h2>

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
<h2>Book Centre Course (<?=$getdata->course?> &pound;<?=number_format($getdata->fee, 2)?>)</h2> <br>
<form action="<?=base_url()?>home/centre_course_date_book" method="post">

<?php
$required = '';
if ($getdata->type != 'Other') {
	$required = 'required';
}
?>
<?php
if ($getdata->type == 'OET') {

	?>
<div class="row">
    <div class="col">
    <div class="mt-10">

<p>Thank you for booking as part of our next Official OET Exam group.</p>
<p>If you have taken the OET Exam before and already have a Candidate Number (which does not change), you may go directly to <b>step 3.</b></p>



<p> If this is your first time booking the OET Exam, for this booking to be valid, please visit: <a target="_blank" href="https://www.occupationalenglishtest.org/apply-oet/">https://www.occupationalenglishtest.org/apply-oet/</a></p>

<p>1) Choose Apply and complete the steps required by the OET.</p>
<p>2) Once you have completed the initial stage, you will automatically receive an email from OET with your Candidate Number.</p>
<p>3) Return to this page and enter your:</p>


    </div>
    </div>




</div>




 <div class="mt-10">
    <input type="text" name="candidate_number" placeholder="Candidate Number*" required class="single-input">
</div>

<?php
if ($getdata->location_type == 'Exam' || $getdata->mock_test == 'Yes') {?>
    <div class="input-group-icon mt-10 " >
    <p >Chosen Exam date: <?=date('d-m-Y', strtotime($getdata->start_date))?> </p>
</div>
<?php
}
	?>
<?php } else if ($getdata->type == 'OSCE') {

	?>
<?php
if ($getdata->location_type == 'Exam') {?>
    <div class="input-group-icon mt-10 " >
    <p >Chosen Exam date: <?=date('d-m-Y', strtotime($getdata->start_date))?> </p>
</div>



<div class="mt-10">
<input type="text" name="nmc_id_number" placeholder="NMC ID Number *" required class="single-input">
</div>
<div class="input-group-icon mt-10">
<p style="font-weight: 300; margin-left: 25px;">Nurse's DOB *</p>
<input type="date" name="dob" required class="single-input">
</div>


<div class="mt-10">
<input type="text" name="country_of_study" placeholder="Country of Study*" required class="single-input">
</div>
<?php
}
	?>
<div class="mt-10">
<input type="text" name="nationality" placeholder="Nationality *" required class="single-input">
</div>

<?php }
if ($getdata->type == 'Other') {
	$type = 'IELTS';
} else {
	$type = $getdata->type;
}
?>


<div class="mt-10">
   <?php
if ($getdata->location_type == 'Course' && !empty($getdata->venue)) {?>
        Location: <?=$getdata->venue?>
        <?php } else {
	?>

   <select name="location_id" required class="single-input" style="padding: 9px;">
   <?php
if ($getdata->location_type == 'Course') {?>
    <option value="">Preferred location?*</option>
    <?php } else {?>
        <option value="">Preferred test location?*</option>
    <?php }
	?>

        <?php
foreach ($getlocation as $row) {
		?>
          <option value="<?=$row->id?>"><?=$row->location?> - <?=$row->venue_name?></option>
        <?php }?>
    </select>
    <?php }
?>

</div>

 <?php
if ($getdata->location_type == 'Exam' || $getdata->mock_test == 'Yes') {
	?>

<div class="mt-10">
   <select name="exam_type_id" required class="single-input" style="padding: 9px;">
   <?php
if ($getdata->mock_test == 'Yes') {
		?>
     <option value="">Select Profession *</option>
     <?php } else {?>
<option value="">Exam Type *</option>
     <?php }
	?>
   <?php
foreach ($getExamType as $row) {
		?>

       <option value="<?=$row->id?>"><?=$row->exam_type_name?> </option>
    <?php
}
	?>
    </select>
</div>
  <?php }
?>

<input type="hidden" name="id" value="<?=$getdata->id?>">
<input type="hidden" name="fee" value="<?=$getdata->fee?>">

<div class="row">
    <div class="col"><div class="mt-10">
    <input type="text" name="first_name" placeholder="First Name*" required class="single-input">
    </div></div>
    <div class="col"><div class="mt-10">
    <input type="text" name="last_name" placeholder="Last Name*" required  class="single-input">
</div></div>
</div>
<div class="mt-10">
    <input type="text" name="phone" placeholder="Phone Number*" required class="single-input">
</div>

<div class="mt-10">
    <input type="email" name="email" placeholder="Email address*" required class="single-input">
</div>


<div class="input-group-icon mt-10" style="<?=($getdata->type == 'Other') ? 'display:none' : ''?>">
    <p style="font-weight: 300; margin-left: 25px;">Have you taken the <?=$type?> exam before?</p>
    <input type="radio" name="exam_before" class="exam_before" value="Yes" style=" margin-left: 25px;" <?=$required?>>&nbsp;Yes &nbsp;&nbsp;
    <input type="radio" name="exam_before" <?=$required?> class="exam_before" value="No" style=" margin-left: 25px;">&nbsp;No
</div><br>

<div class="input-group-icon mt-10 " style="<?=($getdata->type == 'Other') ? 'display:none' : ''?>">
    <p style="font-weight: 300; margin-left: 25px;">Do you have an upcoming <?=$type?> exam?</p>
    <input type="radio" name="exam_upcoming"  <?=$required?> class="exam_upcoming" value="Yes" style=" margin-left: 25px;" >&nbsp;Yes &nbsp;&nbsp;
    <input type="radio" name="exam_upcoming"  class="exam_upcoming" value="No" <?=$required?> style=" margin-left: 25px;">&nbsp;No
    <br><br>
</div>


<div class="input-group-icon mt-10 showExamdate" style="display:none;">
	<p style="font-weight: 300; margin-left: 25px;">Your Exam Date?</p>
	<input type="date" name="exam_date" class="single-input exam_date">
</div>


<div class="input-group-icon mt-10">
    <p style="font-weight: 300; margin-left: 25px;">Would you like accommodation at &pound;44 per night.</p>
    <input type="radio" value="Yes" class="accommodation_need" name="accommodation_need" required style=" margin-left: 25px;" >&nbsp;Yes &nbsp;&nbsp;
    <input type="radio" value="No" class="accommodation_need" name="accommodation_need" required style=" margin-left: 25px;">&nbsp;No
</div><br>

 <div class="input-group-icon mt-10 number_of_nights_show" style="display:none" >
    <p style="font-weight: 300; margin-left: 25px;">Number of Nights?</p>
    <input type="text" id="keyAccomodation" placeholder="eg. 1" value="" name="number_of_nights" class="single-input number_of_nights">
 <input type="hidden" class="single-input-primary" id="getAccomodation" readonly="" name="total_accomodation">
</div>

<br>

<div class="mt-10" style="<?=($getdata->location_type == 'Exam') ? 'display:none;' : ''?>">
<input placeholder="Company Code" type="text" name="company_code" class="single-input-primary" id="getDiscountCode" style=" width: 200px;display: initial;">
<button type="button" class="genric-btn info ApplyDiscount">Apply</button>
<input type="hidden" id="company_price" name="company_price" value="0">
<input type="hidden" id="company_type" name="company_type" value="0">
<input type="hidden" id="getPrice" name="price" value="<?=$getdata->fee?>">
<br />
</div>


<div class="mt-10">
<p><b style="color: #000;">Total Payable  &pound;<span id="getFinalTotal"><?=number_format($getdata->fee, 2)?></span></b></p>
<input type="hidden" id="getPayableAmount" name="final_total" value="<?=$getdata->fee?>">
</div>

<div class="mt-10" >
<input type="checkbox" required=""> By clicking book now, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
<br><br>
</div>


<button type="submit" class="genric-btn info"> Book Now</button>

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

function keyAccomodation()
{
var value = $('#keyAccomodation').val();
if(value == '' || value == 0)
{
value = 0;
}
var total  = 44 * parseFloat(value);
$('#getAccomodation').val(total.toFixed(2));
caltotal();
}


$('.accommodation_need').change(function(){
var value = $(this).val();
if(value == 'Yes')
{
$('.number_of_nights').val('1');
$('.number_of_nights_show').show();
}
else
{
$('.number_of_nights').val('');
$('.number_of_nights_show').hide();
}


keyAccomodation();
});


$('#keyAccomodation').keyup(function(){
keyAccomodation();
caltotal();
});



$('.exam_before').change(function(){
var value = $(this).val();
if(value == 'Yes')
{
$('.exam_upcoming_show').show();
}
else
{
$('.exam_date').val('');
$('.showExamdate').hide();

$('.exam_upcoming_show').hide();
}

});

$('.exam_upcoming').change(function(){
var value = $(this).val();
if(value == 'Yes')
{
$('.showExamdate').show();
}
else
{
$('.exam_date').val('');
$('.showExamdate').hide();
}

});

                $('.ApplyDiscount').click(function(){
                var discount = $('#getDiscountCode').val();
                if(discount != '')
                {
                $.ajax({
                type:'POST',
                url:"<?=base_url()?>home/getDiscountCompany",
                data: {discount: discount},
                dataType: 'JSON',
                success:function(data){
                if(data.company_price != ""){
                $('#company_price').val(data.company_price);
                $('#company_type').val(data.company_type);
                $('#getDiscountCode').prop('readonly',true);
                $('.ApplyDiscount').html('Applied');
                $('.ApplyDiscount').prop('disabled',true);
                }
                else{
                $('#company_price').val('0');
                $('#company_type').val('0');
                $('#getDiscountCode').val('');
                alert('Company code invalid')
                }
                caltotal();
                }
                });
                }
                else
                {
                alert('Enter Company Code.');
                }
                });



function caltotal()
{
var total = 0;
var getAccomodation         = $('#getAccomodation').val();
var getPrice                = $('#getPrice').val();
var company_price                = $('#company_price').val();
var company_type                = $('#company_type').val();




if(company_price == 0 || company_price == '')
{
company_price = 0;
}
if(company_type == 0 || company_type == '')
{
company_type = 0;
}

if(getAccomodation == 0 || getAccomodation == '')
{
getAccomodation = 0;
}

total  = parseFloat(getPrice)+parseFloat(getAccomodation);

if(company_type == '0')
{
var finaltotal =  (parseFloat(total) * parseFloat(company_price))  / 100;
total = parseFloat(total) - parseFloat(finaltotal);
}
else
{
var finaltotal =  parseFloat(total) - parseFloat(company_price);
var total =  parseFloat(total) - parseFloat(company_price);
}



$('#getFinalTotal').html(total.toFixed(2));
$('#getPayableAmount').val(total.toFixed(2));
}

</script>