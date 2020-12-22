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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Exam Booking</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Exam Booking</h3>
                                    </div>

                                    <div class="panel-body">
                                    <div  class="form-horizontal">
                                     <!--  <?=$row->course_main?> -->

 <div class="form-group">
              <label class="col-md-3 control-label">
                     Exam Booking ID  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->id?>
              </div>
            </div>


              <div class="form-group">
              <label class="col-md-3 control-label">
                   Tracking No  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->tracking_no?>
              </div>
            </div>

              <div class="form-group">
              <label class="col-md-3 control-label">
                   Exam Type  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->exam_type?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">
                      Exam Date  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                <?=date('d-m-Y', strtotime($upcomming->exam_date));?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">Customer Name  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">

                <?=$upcomming->username?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">NMC Number  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->nmc_id_number?>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-3 control-label">DOB  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->dob?>
              </div>
            </div>
             <div class="form-group">
              <label class="col-md-3 control-label">Country Of Study  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->country_of_study?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">Nationality  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->nationality?>
              </div>
            </div>


             <div class="form-group">
              <label class="col-md-3 control-label">Candidate Number  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->candidate_number?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">Location  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->location?>
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
              <label class="col-md-3 control-label">Exam Before  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->exam_before?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">Exam Upcoming  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->exam_upcoming?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Upcoming Exam Date  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">

                    <?=date('d-m-Y', strtotime($upcomming->upcoming_exam_date));?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"> Accommodation Need : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->accommodation_need?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Number Of Nights  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->number_of_nights?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Total Accomodation  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->total_accomodation?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Final Total  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->final_total?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Created Date  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">

                    <?=date('d-m-Y h:i A', strtotime($upcomming->created_date));?>
              </div>
            </div>


                                     </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/exam/exam_list">Back</a>
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




