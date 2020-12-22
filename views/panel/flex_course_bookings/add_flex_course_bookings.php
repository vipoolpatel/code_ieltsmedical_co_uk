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
            <li><a>Flex Course Bookings</a></li>
          </ul>
       <div class="page-title">
          <h2><span class="fa fa-arrow-circle-o-left"></span> Create Flex Course Bookings</h2>
       </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/flexcoursebookings/flex_course_submit" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Create Flex Course Bookings </h3>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Flex Course <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="flex_course_id" id="flex_course_id" class="form-control select" data-live-search="true">
                                       <option value="">Select Flex Course</option>
                                       <?php
foreach ($course_get as $row) {?>
                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                        <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                            <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Flex Session Course  <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <select name="flex_course_session_id" id="flex_course_session_id" class="form-control select" data-live-search="true">
                                    <option data-val="0" value="">Select Flex Session Course *</option>
                                 </select>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Skill  <span style="color: red;"></span></label>
                              <div class="col-md-6 col-xs-12">
                                 <select name="flex_course_skill_id" id="flex_course_skill_id" class="form-control select" data-live-search="true">
                                    <option data-val="0" value="">Select Skill </option>
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

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Your address </label>
                              <div class="col-md-6 col-xs-12">

                                 <textarea class="form-control" rows="2" name="address_capture"></textarea>
                                 </div>
                              </div>




                        <hr />
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Availability / Notify  <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="radio" checked="" name="avail_notify" required="" value="Yes" class="upcoming_exam">  Enter availability now &nbsp; &nbsp;<br/>
                                    <input type="radio" name="avail_notify" required="" value="No" class="upcoming_exam">  Notify us week by week (Please note Sunday at 12:00pm is the deadline for the following week) <br>
                                 </div>
                              </div>
                           </div>



                           <div class="form-group exam_date_show">
                              <label class="col-md-3 col-xs-12 control-label" style="margin-top: 18px;">Date or Time</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                   <b>Enter your availability here and our administrator will contact you to confirm your chosen dates and times. </b>
                                    <input name="availability_date_time" type="text"  placeholder="Date or Time" class="form-control" value="<?=set_value('exam_date');?>" />
                                    <div class="error"><?php echo form_error('exam_date'); ?></div>
                                 </div>
                              </div>
                           </div>
                                        <?php
if (!empty($setting->flex_courses_on_off)) {
	?>
                           <div class="form-group">
                            <input type="hidden" name="registration_fee" id="getRegistrationFeeValue" value="<?=$setting->flex_courses_price?>">
                              <label class="col-md-3 col-xs-12 control-label">Registration Fee: <span style="color: red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div  style="margin-top: 7px;">
                                  &pound; <?=$setting->flex_courses_price?>  <span style="margin-top:10px;"></span>
                                 </div>
                              </div>
                           </div>
                             <?php } else {?>
                        <input type="hidden" name="registration_fee" id="getRegistrationFeeValue" value="0">
                                       <?php }
?>






                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Total Payable  </label>
                              <div class="col-md-6 col-xs-12" style="margin-top:7px;">
                              &pound; <span id="getTotal">0</span>
                                 <div class="">
                                    <input type="hidden" id="getPayableAmount" name="final_total" value="0">

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

<script type="text/javascript">
   $(document).ready(function () {


     $('#flex_course_id').change(function(){
          var id = $(this).val();
          $.ajax({
            url:"<?php echo base_url(); ?>panel/flexcoursebookings/booking_courses_session",
            method:"POST",
            data:{id:id},
            success:function(data){
               $('#flex_course_session_id').html(data).selectpicker('refresh');
            }
         });
   });

     $('#flex_course_id').change(function(){
          var id = $(this).val();
          $.ajax({
            url:"<?php echo base_url(); ?>panel/flexcoursebookings/booking_courses_skill",
            method:"POST",
            data:{id:id},
            success:function(data){
               $('#flex_course_skill_id').html(data).selectpicker('refresh');
            }
         });
   });



   $('#flex_course_session_id').change(function(){
      var fee = $('#getRegistrationFeeValue').val();
      var price = $('option:selected', this).attr('data-val');

      if(fee == '')
      {
        fee = 0;
      }
      var total = parseFloat(price) + parseFloat(fee);
      $('#getTotal').html(total);
      $('#getPayableAmount').val(total);

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






             });

</script>
