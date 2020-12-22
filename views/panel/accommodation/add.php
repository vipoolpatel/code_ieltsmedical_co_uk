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
            <li><a>Booking Accommodation</a></li>
          </ul>
       <div class="page-title">
          <h2><span class="fa fa-arrow-circle-o-left"></span> Create Accommodation Booking </h2>
       </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/accommodation/submit" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Create Accommodation Booking </h3>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Client </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="customer_id" id="getCustomerDetail" class="form-control select" data-live-search="true">
                                       <option value="">Select Client</option>
                                       <?php
foreach ($customer as $row) {?>
  <option value="<?=$row->id?>"><?=$row->username?> <?=$row->lastname?> (<?=$row->email?>)</option>
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
                                    <input name="first_name" type="text"  id="getFirstName" placeholder="First Name" class="form-control" value="<?=set_value('first_name');?>" />
                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Last Name </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="last_name" type="text" id="getLastName"  placeholder="Last Name" class="form-control" value="<?=set_value('last_name');?>" />
                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Email address </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="email" type="text"  id="getEmail" placeholder="Email address " class="form-control" value="<?=set_value('email');?>" />
                                    <div class="error"><?php echo form_error('email'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <hr />


                             <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Accommodation Near </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="location_id" id="location_id" required class="form-control">
                                       <option value="">Select Accommodation Near</option>
                                       <?php
foreach ($location as $loca) {?>
  <option value="<?=$loca->id?>"><?=$loca->location?> (<?=$loca->venue_name?>)</option>
  <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>



                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Check in date </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="check_in_date" type="text" required  placeholder="Check in date" class="form-control datepicker_new check_in_date" value="<?=set_value('check_in_date');?>" />
                                    <div class="error"><?php echo form_error('check_in_date'); ?></div>
                                 </div>
                              </div>
                           </div>


                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Check out date </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="check_out_date" type="text" required  placeholder="Check out date" class="form-control datepicker_new check_out_date" value="<?=set_value('check_out_date');?>" />
                                    <div class="error"><?php echo form_error('check_out_date'); ?></div>
                                 </div>
                              </div>
                           </div>


                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Number of nights </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                     <div style="margin-top: 7px;" class="get_number_of_night">0</div>
                                    <input name="number_of_night" type="hidden" class="number_of_night" value="0" />
                                   <input name="price" type="hidden" class="price"  value="0" />
                                   <input name="payabletotal" type="hidden" class="payabletotal" value="0" />


                                 </div>
                              </div>
                           </div>

                            <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Room </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input  class="room"  required name="room" type="radio" value="44" /> Single room: &pound;44
                                    <input style="margin-left:20px;margin-top:5px;" type="radio" class="room" name="room" required value="27" /> Shared room: &pound;27
                                 </div>
                              </div>
                           </div>

                             <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Total Payable </label>
                              <div class="col-md-6 col-xs-12">
                                 <div  style="margin-top: 6px;">&pound;<span class="finaltotal">0</span></div>
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

       $('.datepicker_new').datepicker({
           format: 'dd-mm-yyyy',
       });

       $('.check_in_date').change(function(){
            datecal();
       });

       $('.check_out_date').change(function(){
            datecal();
       });

       $('.room').change(function(){
            $('.price').val($(this).val());
            maincal();
       });


       function maincal(){
          var number_of_night = $('.number_of_night').val();
          var price = $('.price').val();;
          if(number_of_night == '0' || number_of_night == ''){
            number_of_night = 0;
          }
          if(price == '0' || price == ''){
            price = 0;
          }

          var finaltotal =  parseFloat(price) * parseFloat(number_of_night);
          $('.finaltotal').html(finaltotal.toFixed(2));
          $('.payabletotal').val(finaltotal.toFixed(2));
       }



       function datecal(){
          var check_in_date = $('.check_in_date').val();
          var check_out_date = $('.check_out_date').val();
          $.ajax({
              type:'POST',
              url:"<?=base_url()?>panel/accommodation/datecal",
              data: {check_in_date: check_in_date,check_out_date:check_out_date},
              dataType: 'JSON',
              success:function(data){
                $('.number_of_night').val(data.success);
                $('.get_number_of_night').html(data.success);
                maincal();
              }
           });
       }

  });


</script>
