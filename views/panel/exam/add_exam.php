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
?>
         <ul class="breadcrumb">
            <li><a>Exam Booking</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Create Exam Booking</h2>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Create Exam Booking</h3>
                        </div>
                        <div class="panel-body">
<div class="form-group OETExam">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="font-size:15px;">
        <p>Thank you for booking as part of our next Official OET Exam group.</p>
        <p>If you have taken the OET Exam before and already have a Candidate Number (which does not change), you may go directly to <b>step 3.</b></p>
        <p> If this is your first time booking the OET Exam, for this booking to be valid, please visit: <a target="_blank" href="https://www.occupationalenglishtest.org/apply-oet/">https://www.occupationalenglishtest.org/apply-oet/</a></p>
        <p>1) Choose Apply and complete the steps required by the OET.</p>
        <p>2) Once you have completed the initial stage, you will automatically receive an email from OET with your Candidate Number.</p>
        <p>3) Return to this page and enter your:</p>
      </div>
      <div class="col-md-2"></div>
</div>

                            <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Exam <span style="color :red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                  <select class="form-control" id="getPrice" name="exam_type" required="">
                                    <option data-val="OET" value="299">OET</option>
                                    <option data-val="OSCE" value="804">OSCE</option>
                                  </select>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Exam Date <span style="color :red;"> *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="exam_date" required type="text" placeholder="Exam Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>

                           <hr >

                            <div class="form-group OETExam">
                              <label class="col-md-3 col-xs-12 control-label">Candidate Number</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="candidate_number"  type="text" placeholder="Candidate Number" class="form-control" />

                                 </div>
                              </div>
                           </div>


                           <div class="form-group OSCExam" style="display:none;">
                              <label class="col-md-3 col-xs-12 control-label">NMC Number</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                   <input type="text" name="nmc_id_number" placeholder="NMC Number *"  class="form-control">

                                 </div>
                              </div>
                           </div>

                            <div class="form-group OSCExam" style="display:none;">
                              <label class="col-md-3 col-xs-12 control-label">Nurse's DOB</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                   <input type="text" placeholder="Nurse's DOB" name="dob"  class="form-control datepicker_new">

                                 </div>
                              </div>
                           </div>



                            <div class="form-group OSCExam" style="display:none;">
                              <label class="col-md-3 col-xs-12 control-label">Country of Study</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                 <input type="text" name="country_of_study" placeholder="Country of Study*"  class="form-control">
                                 </div>
                              </div>
                           </div>


                          <div class="form-group OSCExam" style="display:none;">
                              <label class="col-md-3 col-xs-12 control-label">Nationality</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                 <input type="text" name="nationality" placeholder="Nationality *"  class="form-control">
                                 </div>
                              </div>
                           </div>


                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Preferred test location?</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="location_id" id="location_id" required class="form-control select" data-live-search="true">
                                       <option value="">Select Preferred test location</option>
                                       <?php
foreach ($course_datlocation as $row) {
	?>
                                       <option value="<?=$row->id?>"><?=$row->location?> - <?=$row->venue_name?></option>
                                       <?php }?>
                                    </select>
                                 </div>
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
                              <label class="col-md-3 col-xs-12 control-label">First Name </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="first_name" id="getFirstName" type="text"  placeholder="First Name" class="form-control"  />

                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Last Name </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="last_name" type="text" id="getLastName" placeholder="Last Name" class="form-control"  />

                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Email Address </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="email" type="text" id="getEmail" placeholder="Email Address" class="form-control" />
                                 </div>
                              </div>
                           </div>


                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Phone Number </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="phone" type="text" id="getPhone" placeholder="Phone Number" class="form-control"  />
                                 </div>
                              </div>
                           </div>


                           <hr />


                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Have you taken the  exam before? </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input  value="Yes" class="exam_before"  required name="exam_before" type="radio" /> Yes
                                    <input style="margin-left:20px;margin-top:5px;" type="radio" class="exam_before" value="No" name="exam_before" required  /> No
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Do you have an upcoming exam? </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input value="Yes"  class="exam_upcoming"  required name="exam_upcoming" type="radio" /> Yes
                                    <input style="margin-left:20px;margin-top:5px;" type="radio" class="exam_upcoming" value="No" name="exam_upcoming" required /> No
                                 </div>
                              </div>
                           </div>

                           <div class="form-group showExamdate" style="display: none;">
                              <label class="col-md-3 col-xs-12 control-label">Your Exam Date?</label>
                              <div class="col-md-6 col-xs-12">
                                 <input type="text" name="upcoming_exam_date" placeholder="Exam Date"  class="form-control datepicker_new upcoming_exam_date">
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Would you like accommodation at &pound;44 per night. </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                   <input type="radio" value="Yes" class="accommodation_need" name="accommodation_need" required >&nbsp;Yes &nbsp;&nbsp;
    <input type="radio" value="No" class="accommodation_need" name="accommodation_need" required style=" margin-left: 25px;">&nbsp;No
                                 </div>
                              </div>
                           </div>
                           <div class="form-group number_of_nights_show" style="display:none">
                              <label class="col-md-3 col-xs-12 control-label">Number of Nights? </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                           <input type="text" id="keyAccomodation" placeholder="eg. 1" value="" name="number_of_nights" class="form-control number_of_nights">

                           <input type="hidden" class="single-input-primary" id="getAccomodation" readonly="" name="total_accomodation">
                                 </div>
                              </div>
                           </div>




                        <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Total Payable </label>
                              <div class="col-md-6 col-xs-12" style="margin-top:7px;">
                                 <b>&pound;<span id="getFinalTotal">0</span></b>
                                 <input type="hidden" id="getPayableAmount" name="final_total" value="0">
                              </div>
                        </div>

                      <div class="form-group">
                         <label class="col-md-3 col-xs-12 control-label">Send Payment Link </label>
                         <div class="col-md-6 col-xs-12">
                            <div style="margin-top: 6px;">
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
<script>
$(document).ready(function() {
   $('.datepicker_new').datepicker({
     format: 'dd-mm-yyyy',
   });

  $('.exam_upcoming').change(function(){
      var value = $(this).val();
      if(value == 'Yes')
      {
          $('.showExamdate').show();
      }
      else
      {
        $('.upcoming_exam_date').val('');
        $('.showExamdate').hide();
      }

    });



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


$('#getPrice').change(function(){
    var value = $('#getPrice option:selected').attr('data-val');
    if(value == 'OET')
    {
      $('.OSCExam').hide();
      $('.OETExam').show();
    }
    else
    {
      $('.OETExam').hide();
      $('.OSCExam').show();
    }

    $.ajax({
      type:'POST',
      url:"<?=base_url()?>panel/exam/getlocation",
      data: {type: value},
      dataType: 'JSON',
      success:function(data){
        $('#location_id').html(data.success).selectpicker('refresh');

      }
   });


    keyAccomodation();
    caltotal();
});




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

  function caltotal(){
      var total = 0;
      var getAccomodation         = $('#getAccomodation').val();
      var getPrice                = $('#getPrice').val();
      if(getAccomodation == 0 || getAccomodation == '')
      {
        getAccomodation = 0;
      }
      total  = parseFloat(getPrice)+parseFloat(getAccomodation);
      $('#getFinalTotal').html(total.toFixed(2));
      $('#getPayableAmount').val(total.toFixed(2));
  }

  caltotal();

});

</script>
