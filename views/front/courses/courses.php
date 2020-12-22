<?php
$this->load->view('header/header');
?>
<section class="generic-banner relative">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row height align-items-center justify-content-center">
         <div class="col-lg-10">
            <div class="generic-banner-content">
               <h2 class="text-white"><?=$course_main->course_main?></h2>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Start faq Area -->
<section class="faq-area section-gap" id="faq">
   <div class="container">
      <div class="row">
         <!-- ielts_medical-1.jpg -->
         <div class="col-lg-12" >
         <?php
if (!empty($course_main->photo_image)) {
	?>
            <img src="<?=base_url()?>img/coursemain/<?=$course_main->photo_image?>" class="img-fluid" style="width: 100%;">
            <?php }
?>
         </div>
      </div>
      <br><br>
      <div class="row">
         <div class="col-lg-4">
            <div class="video-content">
               <!-- Wtc9-yaorPw -->
               <div class="embed-responsive embed-responsive-16by9">
                  <iframe  src="https://www.youtube.com/embed/<?=$course_main->url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
            </div>
         </div>
         <div class="col-lg-8">
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
               <!-- Accordion card -->
               <div class="card">
                  <!-- Card header -->
                  <div class="card-header" role="tab" id="headingTwo1">
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                        aria-expanded="false" aria-controls="collapseTwo1">
                        <h5 class="mb-0" style="color: #777777;">
                           <?=$course_main->sub_title?><i class="fa fa-angle-down" style="float: right;"></i>
                        </h5>
                     </a>
                  </div>
                  <!-- Card body -->
                  <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
                     data-parent="#accordionEx1">
                     <div class="card-body">
                        <?=$course_main->sub_title_description?>
                     </div>
                  </div>
               </div>
               <br>
               <!-- Accordion card -->
               <!-- Accordion card -->
               <div class="card">
                  <!-- Card header -->
                  <div class="card-header" role="tab" id="headingTwo2">
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                        aria-expanded="false" aria-controls="collapseTwo21">
                        <h5 class="mb-0" style="color: #777777;">
                           Testimonials<i class="fa fa-angle-down" style="float: right;"></i>
                        </h5>
                     </a>
                  </div>
                  <!-- Card body -->
                  <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
                     data-parent="#accordionEx1">
                     <div class="card-body" style="text-align: justify;">
                        <?=$course_main->testimonials?>
                     </div>
                  </div>
               </div>
               <br>
               <!-- Accordion card -->
               <!-- Accordion card -->
               <div class="card">
                  <!-- Card header -->
                  <div class="card-header" role="tab" id="headingThree31">
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                        aria-expanded="false" aria-controls="collapseThree31">
                        <h5 class="mb-0" style="color: #777777;">
                           Work<i class="fa fa-angle-down" style="float: right;"></i>
                        </h5>
                     </a>
                  </div>
                  <!-- Card body -->
                  <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31"
                     data-parent="#accordionEx1">
                     <div class="card-body">
                        <?=$course_main->work?>
                     </div>
                  </div>
               </div>
               <br>
               <!-- Accordion card -->
               <div class="card">
                  <!-- Card header -->
                  <div class="card-header" role="tab" id="headingThree31">
                     <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree41"
                        aria-expanded="false" aria-controls="collapseThree31">
                        <h5 class="mb-0" style="color: #777777;">
                           Register <i class="fa fa-angle-down" style="float: right;"></i>
                        </h5>
                     </a>
                  </div>
                  <!-- Card body -->
                  <div id="collapseThree41" class="collapse" role="tabpanel" aria-labelledby="headingThree41"
                     data-parent="#accordionEx1">
                     <div class="card-body">
                        <form method="post" action="<?=base_url()?>home/course_submit">
                           <div class="row">
                              <div class="col">
                                 <div class="mt-10">
                                    <input type="text" name="first_name" placeholder="First Name*"  required class="single-input">
                                 </div>
                              </div>
                              <div class="col">
                                 <div class="mt-10">
                                    <input type="text" name="last_name" placeholder="Last Name"  required class="single-input">
                                 </div>
                              </div>
                           </div>
                           <div class="mt-10">
                              <input type="text" name="phone" placeholder="Phone Number*" required class="single-input">
                           </div>
                           <div class="mt-10">
                              <input type="email" name="email" placeholder="Email address*" required class="single-input">
                           </div>


                            <div class="input-group-icon mt-10">
                              <p style="font-weight: 300; margin-left: 25px;">Course *</p>
                              <div class="form-select" >
                                 <select name="course_id" id="course_id" required  class="single-input" style="padding: 9px;">
                                    <option data-val="0" value="">Select Course *</option>
                                    <?php
foreach ($course as $value) {
	?>
                                    <option data-val="<?=$value->price?>" value="<?=$value->id?>"><?=$value->course_name?> (<?=date('d-m-Y', strtotime($value->start_date))?> - <?=date('d-m-Y', strtotime($value->end_date))?>)</option>
                                    <?php }
?>
                                 </select>
                              </div>
                           </div>






  <div class="mt-10">
      <p>Do you have an upcoming exam? * &nbsp; &nbsp;
         <input type="radio" name="upcoming_exam" required="" value="Yes" class="upcoming_exam"> Yes &nbsp; &nbsp;
         <input type="radio" name="upcoming_exam" required="" value="No" class="upcoming_exam"> No<br>
      </p>
   </div>
   <div class="mt-10 exam_date_show" style="display:none;">
      <input type="date" name="exam_date" placeholder="Exam Date *" class="single-input-primary  exam_date" >
      <br>
   </div>
   <div class="mt-10">
      <p>Taken the <?=$course_main->type?> exam before? * &nbsp; &nbsp;
         <input type="radio" name="osce_exam_before" required="" value="Yes" class=""> Yes &nbsp; &nbsp;
         <input type="radio" name="osce_exam_before" required="" value="No" class=""> No<br>
      </p>
   </div>
   <div class="getValueFee" style="">
      <div class="mt-10">
         <p><b style="color: #000;">Fee &pound;<span id="getFee">0</span></b></p>
      </div>
   </div>
   <div class="mt-10">
      <p>Shared accommodation required &nbsp;
         <input type="radio" class="Accomodation AccomodationChecked" data-val="27" name="accomodation" value="1"> Yes &nbsp;
         <input type="radio" class="Accomodation" data-val="27" checked="" name="accomodation" value="0"> No &nbsp;
         <input type="text" class="single-input-primary " id="keyAccomodation" name="accomodation_qty" style="display: inline-block;width: 100px;">&nbsp;
         at &pound;27 per night &nbsp;
         <input type="text" class="single-input-primary" id="getAccomodation" readonly="" name="total_accomodation" style="display: inline-block;width: 100px;">
      </p>
   </div>
   <div class="mt-10">
      <p>Private accommodation required &nbsp;
         <input type="radio" class="private_accomodation PrivateAccomodationChecked" name="private_accomodation" value="1"> Yes &nbsp;
         <input type="radio" class="private_accomodation" checked="" name="private_accomodation" value="0"> No &nbsp;
         <input type="text" class="single-input-primary " id="keyPrivateAccomodation" name="private_accomodation_qty" style="display: inline-block;width: 100px;">&nbsp;
         at &pound;44 per night &nbsp;
         <input type="text" class="single-input-primary" readonly="" id="getPrivateAccomodation" name="total_private_accomodation" style="display: inline-block;width: 100px;">
      </p>
   </div>
   <div class="mt-10">
      <p>Meals required &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" class="meals PrivateMealsChecked" name="meals" value="1"> Yes &nbsp;
         <input type="radio" class="meals PrivateMealsChecked" checked="" name="meals" value="0"> No &nbsp;
         <input type="text" class="single-input-primary " id="keyMeals" name="meals_qty" style="display: inline-block;width: 100px;">&nbsp;
         at &pound;4.95 per day &nbsp;
         <input type="text" class="single-input-primary " readonly="" id="getMeals" name="total_meals" style="display: inline-block;width: 100px;">
      </p>
   </div>
   <div class="mt-10">
      <input placeholder="Company Code" type="text" name="company_code" class="single-input-primary" id="getDiscountCode" style=" width: 200px;display: initial;">
      <button type="button" class="genric-btn info ApplyDiscount">Apply</button>
   </div>
   <br>
   <div class="mt-10">
      <p><b style="color: #000;">Total Payable  &pound;<span id="getFinalTotal">0</span></b></p>
      <input type="hidden" id="getPayableAmount" name="final_total" value="0">
      <input type="hidden" id="getVat" name="total_vat" value="0">
      <input type="hidden" id="getPrice" name="price" value="0">
      <input type="hidden" id="company_price" name="company_price" value="0">
      <input type="hidden" id="company_type" name="company_type" value="0">
   </div>




   <div class="mt-10" >
      <input type="checkbox" required=""> By clicking submit, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
      <br>
   </div>

    <br>



                           <button type="submit" class="genric-btn info"> Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <br>

            </div>
            <!-- Accordion wrapper -->
         </div>
      </div>
   </div>
</section>
<?php
$this->load->view('header/common_book');
?>
<?php
$this->load->view('header/footer');
?>



<script type="text/javascript">
  $(document).ready(function () {

$('#course_id').change(function(){
    var price = $('option:selected', this).attr('data-val');
    $('#getPrice').val(price);
    $('#getFee').html(price);
    caltotal();
});

       $('.upcoming_exam').change(function(){
            var value = $(this).val();
            if(value == 'Yes'){
                $('.exam_date_show').show();
            }
            else
            {
                $('.exam_date').val('');
                $('.exam_date_show').hide();
            }
        });



        $('.BuyNowBook').click(function(){
            var name =  $(this).attr('data-title');
            var price =  $(this).attr('data-price');
            $('#book_name').val(name);
            $('#get_book_name').html(name);
            $('#book_price').val(price);
            $('#myModal').modal('show');
        });

        $('.ApplyDiscount').click(function(){
               var discount = $('#getDiscountCode').val();
               if(discount != '')
               {
                   $.ajax({
                        type:'POST',
                        url:"<?=base_url()?>home/getDiscount",
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






                 $(".SubscribEmail").click(function(event){
                            var email = $('.getSubscribEmail').val();
                            $.ajax({
                                type:'POST',
                                url:"<?=base_url()?>home/email_send",
                                data: {email: email},
                                dataType: 'JSON',
                                success:function(data){
                                    $(".cleartext").val("");
                                    alert ("Email successfully subscribe!");
                            }
                        });

                    });


  // thrid part

  $('#keyMeals').keyup(function(){
        if($('.PrivateMealsChecked').is(':checked'))
        {
            var value = $('#keyMeals').val();
            if(value == '' || value == 0)
            {
                value = 0;
            }
            var total  = 4.95 * parseFloat(value);

            $('#getMeals').val(total.toFixed(2));
            caltotal();
        }
    });

    $('.meals').change(function(){
        var total = 0;
        var value = $(this).val();
        var price = 4.95;
        if(value == 1){
            total  = price * 1;
            $('#keyMeals').val('1');
        }
        else{
            $('#keyMeals').val('');
        }
        $('#getMeals').val(total.toFixed(2));
        caltotal();
    });



    //second part

    $('#keyPrivateAccomodation').keyup(function(){
        if($('.PrivateAccomodationChecked').is(':checked'))
        {
            var value = $('#keyPrivateAccomodation').val();
            if(value == '' || value == 0)
            {
                value = 0;
            }
            var total  = 44 * parseFloat(value);
            $('#getPrivateAccomodation').val(total.toFixed(2));
            caltotal();
        }
    });

    $('.private_accomodation').change(function(){
        var total = 0;
        var value = $(this).val();
        var price = 44;
        if(value == 1){
            total  = price * 1;
            $('#keyPrivateAccomodation').val('1');
        }
        else{
            $('#keyPrivateAccomodation').val('');
        }
        $('#getPrivateAccomodation').val(total.toFixed(2));
        caltotal();
    });



    // one part
    $('#keyAccomodation').keyup(function(){
        if($('.AccomodationChecked').is(':checked'))
        {
            var value = $('#keyAccomodation').val();
            if(value == '' || value == 0)
            {
                value = 0;
            }
            var total  = 27 * parseFloat(value);
            $('#getAccomodation').val(total.toFixed(2));
            caltotal();
        }
    });

    $('.Accomodation').change(function(){
        var total = 0;
        var value = $(this).val();
        var price = $(this).attr('data-val');
        if(value == 1){
            total  = price * 1;
            $('#keyAccomodation').val('1');
        }
        else{
            $('#keyAccomodation').val('');
        }
        $('#getAccomodation').val(total.toFixed(2));

        caltotal();

    });

    function caltotal()
    {
        var total = 0;
        var getAccomodation         = $('#getAccomodation').val();
        var getPrivateAccomodation  = $('#getPrivateAccomodation').val();
        var getMeals                = $('#getMeals').val();

        // var getVat                = $('#getVat').val();
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
        if(getPrivateAccomodation == 0 || getPrivateAccomodation == '')
        {
            getPrivateAccomodation = 0;
        }
        if(getMeals == 0 || getMeals == '')
        {
            getMeals = 0;
        }
        total  = parseFloat(getPrice)+parseFloat(getAccomodation)+parseFloat(getPrivateAccomodation)+parseFloat(getMeals);

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
            var date = '';
            $('.RegisterCourse').click(function(){
                var id = $(this).attr('id');
                date = $('.getCourseDate'+id).val();
                $('.getCourseDetail').val(id);
                getDetail();
                if(date == "")
                {
                    alert('Please select date');
                }

            });



                    $('.getCourseDetail').change(function(){
                        getDetail();
                    });

                    $('#location_id').change(function(){
                        getDetail();
                    });


                    function getDetail(){
                        var id = $('.getCourseDetail').val();
                        var location_id = $('#location_id').val();
                        $.ajax({
                            type:'POST',
                            url:"<?=base_url()?>home/getinfo",
                            data: {id: id,location_id:location_id},
                            dataType: 'JSON',
                            success:function(data){
                                $('.getValueFee').show();
                                $('.getValueFee').html(data.fee);
                                $('#getFinalTotal').html(data.total);
                                $('#getPayableAmount').val(data.total);
                                $('#getPrice').val(data.total_price);
                                // $('#getVat').val(data.total_vat);
                                $('#course_date_id').html(data.html_option);
                                if(date != "")
                                {
                                    $('#course_date_id').val(date);
                                }
                                caltotal();
                            }
                        });

                    }

                    getDetail();




            });
        </script>
