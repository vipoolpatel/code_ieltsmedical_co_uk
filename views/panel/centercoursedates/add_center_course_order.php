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
                    <li><a>Center Course Order</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Center Course Order</h2>
                </div>

                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Center Course Order</h3>
                                    </div>

                                    <div class="panel-body">


<div class="form-group">
<label class="col-md-3 col-xs-12 control-label">Customer Name<span style="color: red;"> *</span></label>
<div class="col-md-6 col-xs-12">
 <div class="">
    <select name="customer_id" required class="form-control">
        <option value="">Select Customer Name</option>
            <?php
            foreach ($customer_get as $row) {
            ?>
              <option value="<?=$row->id?>"><?=$row->username?></option>
            <?php }?>
    </select>
 </div>
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-xs-12 control-label">Centre Course Name<span style="color: red;"> *</span></label>
<div class="col-md-6 col-xs-12">
 <div class="">
    <select name="centre_course_id" required class="form-control">
        <option value="">Select Centre Course Name</option>
            <?php
            foreach ($centre_course_get as $row) {
            ?>
              <option value="<?=$row->id?>"><?=$row->course?></option>
            <?php }?>
    </select>
 </div>
</div>
</div>

<div class="form-group">
<label class="col-md-3 col-xs-12 control-label">Location Name<span style="color: red;"> *</span></label>
<div class="col-md-6 col-xs-12">
 <div class="">
    <select name="location_id" required class="form-control">
        <option value="">Select Location Name</option>
            <?php
            foreach ($location_get as $row) {
            ?>
              <option value="<?=$row->id?>"><?=$row->location?></option>
            <?php }?>
    </select>
 </div>
</div>
</div>


                                 <!--   <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Location Type  <span style="color: red;"> *</span></label>
                                <div class="col-md-6 col-xs-12">
                                  <select class="form-control" required="" name="location_type">
                                      <option value="">Select</option>
                                      <option value="Course">Course</option>
                                      <option value="Exam">Exam</option>
                                  </select>
                                </div>
                            </div> -->

<div class="form-group">
  <label class="col-md-3 col-xs-12 control-label">Candidate Number </label>
  <div class="col-md-6 col-xs-12">
      <div class="">
          <input name="candidate_number" type="text" placeholder="Candidate Number" class="form-control" value="<?=set_value('candidate_number');?>" />
          <div class="error"><?php echo form_error('candidate_number'); ?></div>
      </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 col-xs-12 control-label">NMC ID Number </label>
  <div class="col-md-6 col-xs-12">
      <div class="">
          <input name="nmc_id_number" type="text" placeholder="NMC ID Number" class="form-control" value="<?=set_value('nmc_id_number');?>" />
          <div class="error"><?php echo form_error('nmc_id_number'); ?></div>
      </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 col-xs-12 control-label">DOB </label>
  <div class="col-md-6 col-xs-12">
      <div class="">
          <input name="dob" type="text" placeholder="DOB" class="form-control" value="<?=set_value('dob');?>" />
          <div class="error"><?php echo form_error('dob'); ?></div>
      </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 col-xs-12 control-label">Country Of Study</label>
  <div class="col-md-6 col-xs-12">
      <div class="">
          <input name="country_of_study" type="text" placeholder="Country Of Study" class="form-control" value="<?=set_value('country_of_study');?>" />
          <div class="error"><?php echo form_error('country_of_study'); ?></div>
      </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-3 col-xs-12 control-label">Nationality</label>
  <div class="col-md-6 col-xs-12">
      <div class="">
          <input name="nationality" type="text" placeholder="Nationality" class="form-control" value="<?=set_value('nationality');?>" />
          <div class="error"><?php echo form_error('nationality'); ?></div>
      </div>
  </div>
</div>




                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">First Name <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="first_name" type="text" required placeholder="First Name" class="form-control" value="<?=set_value('first_name');?>" />
                                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                              <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Last Name </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="last_name" type="text" placeholder="Last Name" class="form-control" value="<?=set_value('last_name');?>" />
                                                    <div class="error"><?php echo form_error('last_name'); ?></div>
                                                </div>
                                            </div>
                                        </div>

      <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Phone </label>
          <div class="col-md-6 col-xs-12">
              <div class="">
                  <input name="phone" type="text" placeholder="Phone" class="form-control" value="<?=set_value('phone');?>" />
                  <div class="error"><?php echo form_error('phone'); ?></div>
              </div>
          </div>
      </div>

       <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Email </label>
          <div class="col-md-6 col-xs-12">
              <div class="">
                  <input name="email" type="text" placeholder="Email" class="form-control" value="<?=set_value('email');?>" />
                  <div class="error"><?php echo form_error('email'); ?></div>
              </div>
          </div>
      </div>

          <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Have you taken the IELTS exam before?  <span style="color: #ff0000">*</span></label>
                  <div class="col-md-6 col-xs-12">
              <input type="radio" name="exam_before" required value="Yes" class="exam_before"> Yes &nbsp; &nbsp;
              <input type="radio" name="exam_before" required value="No" class="exam_before"> No<br>
          </div>
      </div>

      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Do you have an upcoming IELTS exam?</label>

          <div class="col-md-6 col-xs-12">
              <input type="radio" name="exam_upcoming" required value="Yes" class="exam_upcoming"> Yes &nbsp; &nbsp;
              <input type="radio" name="exam_upcoming" required value="No" class="exam_upcoming"> No<br>
          </div>
      </div>

        <div class="form-group showExamdate">
        <label class="col-md-3 col-xs-12 control-label">Your Exam Date?  <span style="color: #ff0000">*</span></label>

          <div class="col-md-6 col-xs-12">
              <input type="text" name="exam_date" required placeholder="Exam Date" class="form-control datepicker_new">
          </div>
      </div>



      <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Would you like accommodation at &pound;44 per night.</label>

          <div class="col-md-6 col-xs-12">
              <input type="radio" name="accommodation_need" required value="Yes" class="accommodation_need"> Yes &nbsp; &nbsp;
              <input type="radio" name="accommodation_need" required value="No" class="accommodation_need"> No<br>
          </div>
      </div>

  <div class="form-group number_of_nights_show">
        <label class="col-md-3 col-xs-12 control-label">Number of Nights?</label>

          <div class="col-md-6 col-xs-12">
              <input type="text" id="keyAccomodation" placeholder="eg. 1" value="1" name="number_of_nights" class="form-control number_of_nights">
                                     <input type="hidden" class="single-input-primary" id="getAccomodation" readonly="" name="total_accomodation">

             
          </div>
      </div>


       <div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Company Code</label>
    <div class="col-md-6 col-xs-12">
    
              <input placeholder="Company Code" type="text" name="company_code" class="form-control" id="getDiscountCode" style=" width: 200px;display: initial;">
        <button type="button" class="btn btn-info ApplyDiscount">Apply</button>
        <input type="hidden" id="company_price" name="company_price" value="0">
        <input type="hidden" id="company_type" name="company_type" value="0">
        <input type="hidden" id="getPrice" name="price" value="">
                                </div>
                             </div> 


                             <div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Total Payable  &pound;<span id="getFinalTotal"></span></label>
    <div class="col-md-6 col-xs-12">
      <input type="hidden" id="getPayableAmount" name="final_total" value="">
   </div>  </div>





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
});

</script>

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

keyAccomodation();

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