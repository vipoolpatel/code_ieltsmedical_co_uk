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
                   <li><a>Accommodation</a></li>
               </ul>
               <div class="page-title">
                   <h2><span class="fa fa-arrow-circle-o-left"></span> View Accommodation</h2>
               </div>
                 <div class="page-content-wrap">
                   <div class="row">
                       <div class="col-md-12">
                           <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h3 class="panel-title">View Accommodation</h3>
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

   <div class="form-group">
             <label class="col-md-3 control-label">
                Reference Number  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                 <?=$upcomming->reference_number?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
                  Customer Name  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->username?>
             </div>
           </div>
             <div class="form-group">
             <label class="col-md-3 control-label">
                 First Name  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->first_name?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
                  Last Name  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                 <?=$upcomming->last_name?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
                  Email  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                 <?=$upcomming->email?>
             </div>
           </div>

                <div class="form-group">
             <label class="col-md-3 control-label">
                  Address  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$upcomming->tracking_no?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
              Accommodation Near :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                 <?=$upcomming->location?>  <?=$upcomming->venue_name?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
              Check In Date  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">

                      <?php
if ($upcomming->check_in_date != '0000-00-00') {
	echo date('d-m-Y', strtotime($upcomming->check_in_date));
}
?>

             </div>
           </div>


           <div class="form-group">
             <label class="col-md-3 control-label">
              Check Out Date :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                          <?php
if ($upcomming->check_out_date != '0000-00-00') {
	echo date('d-m-Y', strtotime($upcomming->check_out_date));
}
?>

             </div>
           </div>





           <div class="form-group">
             <label class="col-md-3 control-label">
            Number of Night :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                 <?=$upcomming->number_of_night?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
	 Room :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
             <?=($upcomming->price == '44') ? 'Single room: &pound;44' : 'Shared room: &pound;27'?>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-3 control-label">
  Total  :
              </label>
             <div class="col-sm-5" style="margin-top: 8px;">
                 &pound;<?=$upcomming->total?>
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
                                       <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/accommodation/accommodation_list">Back</a>
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
