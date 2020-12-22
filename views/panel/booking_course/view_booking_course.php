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
                    <li><a>Booking Course</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Booking Course</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Booking Course</h3>
                                    </div>

                                    <div class="panel-body">
                                    <div  class="form-horizontal">
                                     <!--  <?=$row->course_main?> -->

 <div class="form-group">
              <label class="col-md-3 control-label">
                    ID  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->id?>
              </div>
            </div>

<?php
if (!empty($upcomming->username)) {
	?>
            <div class="form-group">
              <label class="col-md-3 control-label">
                     Customer Name  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->username?>
              </div>
            </div>
            <?php }
?>


            <div class="form-group">
              <label class="col-md-3 control-label">
                      Course Name  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->course_name?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                      Course Start Date  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?php
if ($upcomming->start_date != '0000-00-00') {
	echo $start_date = date('d-m-Y', strtotime($upcomming->start_date));
}
?>

              </div>
            </div>
              <div class="form-group">
              <label class="col-md-3 control-label">
                      Course End Date  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?php
if ($upcomming->end_date != '0000-00-00') {
	echo $end_date = date('d-m-Y', strtotime($upcomming->end_date));
}
?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">First Name  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->first_name?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Last Name  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->last_name?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Phone  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">

                  <?=$upcomming->phone?>

              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Email  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                     <?=$upcomming->email?>

              </div>
            </div>

 <div class="form-group">
              <label class="col-md-3 control-label">Do you have an upcoming exam? </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->upcoming_exam?>
              </div>
            </div>
          <?php
if ($upcomming->upcoming_exam == 'Yes') {
	?>
            <div class="form-group">
              <label class="col-md-3 control-label">Exam date: </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->exam_date?>
              </div>
            </div>
          <?php }
?>



            <div class="form-group">
              <label class="col-md-3 control-label">Taken the OET exam before? </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->osce_exam_before?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Fee: </label>
              <div class="col-sm-5" style="margin-top: 8px;">
              &pound;<?=$upcomming->price?>
              </div>
            </div>



            <div class="form-group">
              <label class="col-md-3 control-label">Shared accommodation required: </label>
              <div class="col-sm-9" >
                  <div class="col-sm-1" style="margin-top: 6px; padding: 0px;">   <?=($upcomming->accomodation == '0') ? 'No' : 'Yes'?></div>
                  <?php
if ($upcomming->accomodation == 1) {
	?>
                  <div class="col-sm-1" style="padding: 0px;margin-top: 6px;">
                      <?=$upcomming->accomodation_qty?>
                  </div>
                  <div class="col-sm-3" style="margin-top: 6px;">at &pound;27 per night</div>
                  <div class="col-sm-2" style="margin-top: 6px;">
                      &pound;<?=$upcomming->total_accomodation?>
                  </div>
                  <?php }
?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Private accommodation required: </label>
              <div class="col-sm-9" >
                  <div class="col-sm-1" style="margin-top: 6px; padding: 0px;">   <?=($upcomming->private_accomodation == '0') ? 'No' : 'Yes'?></div>
                  <?php
if ($upcomming->private_accomodation == 1) {
	?>
                  <div class="col-sm-1" style="padding: 0px;margin-top: 6px;">
                      <?=$upcomming->private_accomodation_qty?>
                  </div>
                  <div class="col-sm-3" style="margin-top: 6px;">at &pound;44 per night</div>
                  <div class="col-sm-2" style="margin-top: 6px;">
                      &pound;<?=$upcomming->total_private_accomodation?>
                  </div>
                  <?php }
?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Meals required: </label>
              <div class="col-sm-9" >
                  <div class="col-sm-1" style="margin-top: 6px; padding: 0px;">   <?=($upcomming->meals == '0') ? 'No' : 'Yes'?></div>
                  <?php
if ($upcomming->meals == 1) {
	?>
                  <div class="col-sm-1" style="padding: 0px;margin-top: 6px;">
                      <?=$upcomming->meals_qty?>
                  </div>
                  <div class="col-sm-3" style="margin-top: 6px;">at &pound;4.95 per day</div>
                  <div class="col-sm-2" style="margin-top: 6px;">
                      &pound;<?=$upcomming->total_meals?>
                  </div>
                  <?php }
?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Company Code: </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->company_code?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Company <?=($upcomming->company_type == '0') ? '%' : 'Amount'?>: </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->company_price?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Total: </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  &pound;<?=$upcomming->final_total?>
              </div>
            </div>



                                     </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/bookingcourse/booking_course_list">Back</a>
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

   $( ".datepicker" ).datepicker();


});

</script>
