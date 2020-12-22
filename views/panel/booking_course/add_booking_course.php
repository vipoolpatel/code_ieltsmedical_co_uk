<?php
$this->load->view('panel/header/header');
?>
<body>
   <div class="page-container">
      <?php
$this->load->view('panel/header/sidebar');
?>
      <div class="page-content">
         <?php
$this->load->view('panel/header/top_header');
?>        <ul class="breadcrumb">
            <li><a>Booking Course</a></li>
          </ul>
       <div class="page-title">
          <h2><span class="fa fa-arrow-circle-o-left"></span> Create Course Booking </h2>
       </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/bookingcourse/course_submit" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Create Course Booking </h3>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Course Main <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="main_course_id" id="main_course_id" required class="form-control select" data-live-search="true">
                                       <option value="">Select Course Booking</option>
                                       <?php
                  foreach ($course_get as $row) {?>
                    <option value="<?=$row->id?>"><?=$row->course_main?></option>
                    <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Course  <span style="color: red;"> *</span></label>
        <div class="col-md-6 col-xs-12">
           <select name="course_id" id="course_id" required  class="form-control select" data-live-search="true">
              <option data-val="0" value="">Select Course *</option>
           </select>
        </div>
     </div>
                           <hr />
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Client </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="customer_id" id="getCustomerDetail" class="form-control select" data-live-search="true">
                                       <option value="">Select Client</option>
                                       <?php
foreach ($customer as $row) {?>
  <option value="<?=$row->id?>"><?=$row->username?> <?=$row->lastname?> (<?=$row->email?>) (<?=$row->phone?>)</option>
  <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>

                        <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label"></label>
                              <div class="col-md-6 col-xs-12">
                                 Or
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">First Name</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="first_name" type="text" id="getFirstName"  placeholder="First Name" class="form-control" value="<?=set_value('first_name');?>" />
                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Last Name </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="last_name" type="text" id="getLastName" placeholder="Last Name" class="form-control" value="<?=set_value('last_name');?>" />
                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Email ID </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="email" type="text" id="getEmail" placeholder="Email ID " class="form-control" value="<?=set_value('email');?>" />
                                    <div class="error"><?php echo form_error('email'); ?></div>
                                 </div>
                              </div>
                           </div>


                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Phone Number </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="phone" type="text" id="getPhone" placeholder="Phone Number" class="form-control" value="<?=set_value('phone');?>" />
                                    <div class="error"><?php echo form_error('phone'); ?></div>
                                 </div>
                              </div>
                           </div>

<hr />
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Do you have an upcoming exam?  <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="radio" checked="" name="upcoming_exam" required="" value="Yes" class="upcoming_exam"> Yes &nbsp; &nbsp;
                                    <input type="radio" name="upcoming_exam" required="" value="No" class="upcoming_exam"> No<br>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group exam_date_show">
                              <label class="col-md-3 col-xs-12 control-label">Exam Date </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="exam_date" type="text"  placeholder="Exam Date" class="form-control datepicker_new" value="<?=set_value('exam_date');?>" />
                                    <div class="error"><?php echo form_error('exam_date'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Taken exam before?  <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="radio" name="osce_exam_before" required="" value="Yes" class=""> Yes &nbsp; &nbsp;
                                    <input type="radio" name="osce_exam_before" required="" value="No" class=""> No<br>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Fee &pound; <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12 getValueFee">
                                 <div  style="margin-top: 7px;">
                                    <span style="margin-top:10px;" id="getFee">0</span>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Shared accommodation required </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="radio" class="Accomodation AccomodationChecked" data-val="27" name="accomodation" value="1"> Yes &nbsp;
                                    <input type="radio" class="Accomodation" data-val="27" checked="" name="accomodation" value="0"> No &nbsp;
                                    <input type="text" class="form-control" id="keyAccomodation" name="accomodation_qty" style="display: inline-block;width: 100px;">&nbsp;
                                    at &pound;27 per night &nbsp;
                                    <input type="text" class="form-control" id="getAccomodation" readonly="" name="total_accomodation" style="display: inline-block;width: 100px;">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Private accommodation required</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="radio" class="private_accomodation PrivateAccomodationChecked" name="private_accomodation" value="1"> Yes &nbsp;
                                    <input type="radio" class="private_accomodation" checked="" name="private_accomodation" value="0"> No &nbsp;
                                    <input type="text" class="form-control" id="keyPrivateAccomodation" name="private_accomodation_qty" style="display: inline-block;width: 100px;">&nbsp;
                                    at &pound;44 per night &nbsp;
                                    <input type="text" class="form-control" readonly="" id="getPrivateAccomodation" name="total_private_accomodation" style="display: inline-block;width: 100px;">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Meals required</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="radio" class="meals PrivateMealsChecked" name="meals" value="1"> Yes &nbsp;
                                    <input type="radio" class="meals PrivateMealsChecked" checked="" name="meals" value="0"> No &nbsp;
                                    <input type="text" class="form-control " id="keyMeals" name="meals_qty" style="display: inline-block;width: 100px;">&nbsp;
                                    at &pound;4.95 per day &nbsp;
                                    <input type="text" class="form-control" readonly="" id="getMeals" name="total_meals" style="display: inline-block;width: 100px;">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Company Code</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input placeholder="Company Code" type="text" name="company_code" class="form-control" id="getDiscountCode" style=" width: 200px;display: initial;">
                                    <button type="button" class="btn btn-info ApplyDiscount">Apply</button>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Total Payable  </label>
                              <div class="col-md-6 col-xs-12" style="margin-top:7px;">
                              &pound;<span id="getFinalTotal">0</span>
                                 <div class="">
                                    <input type="hidden" id="getPayableAmount" name="final_total" value="0">
                                    <input type="hidden" id="getVat" name="total_vat" value="0">
                                    <input type="hidden" id="getPrice" name="price" value="0">
                                    <input type="hidden" id="company_price" name="company_price" value="0">
                                    <input type="hidden" id="company_type" name="company_type" value="0">
                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Send Payment Link </label>
                              <div class="col-md-6 col-xs-12">
                                 <div  style="margin-top: 6px;">
                                    <input type="checkbox" name="send_invoice">
                                 </div>
                              </div>
                           </div>


                        </div>
                        <div class="panel-footer">
                           <button class="btn btn-primary pull-right">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
$this->load->view('panel/header/footer');
?>
</body>
</html>
<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>
<!-- <script>
   $(document).ready(function() {
         $('.datepicker_new').datepicker({
           format: 'dd-mm-yyyy',
       });


   </script>


    -->
<script type="text/javascript">
   $(document).ready(function () {


     $('#main_course_id').change(function(){
          var id = $(this).val();
          $.ajax({
            url:"<?php echo base_url(); ?>panel/bookingcourse/booking_courses_session",
            method:"POST",
            data:{id:id},
            success:function(data){
               $('#course_id').html(data).selectpicker('refresh');
            }
         });
   });

   $('#course_id').change(function(){
     var price = $('option:selected', this).attr('data-val');
     $('#getPrice').val(price);
     $('#getFee').html(price);
     caltotal();
   });

       $('.datepicker_new').datepicker({
         format: 'dd-mm-yyyy',
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
         var company_price           = $('#company_price').val();
         var company_type            = $('#company_type').val();




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
