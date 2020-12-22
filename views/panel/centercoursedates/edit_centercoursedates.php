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
                    <li><a>Center Course Dates</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Center Course Dates</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Center Course Dates</h3>
                                    </div>

                                    <div class="panel-body">

                            <!--               <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Course Mani Name<span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                <select name="course_main_id" class="form-control">

                                                    <option value="">Select Course Mani Name</option>
                                                        <?php
foreach ($course_get as $row) {
	?>
                                                          <option <?=($row->id == $page->course_main_id) ? 'selected' : ''?>  value="<?=$row->id?>"><?=$row->course_main?></option>
                                                        <?php }?>
                                                </select>
                                             </div>
                                            </div>
                                        </div>
 -->

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Course Name</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="id" type="hidden" value="<?=$page->id?>" />
                                                    <input name="course" type="text" placeholder="Course Name" class="form-control" value="<?=set_value('course', $page->course);?>">
                                                    <div class="error"><?php echo form_error('course'); ?></div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <textarea name="description" rows="5" type="text" placeholder="Description" class="form-control"><?=set_value('description', $page->description);?></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Start Date</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
   <?php
$start_date = '';
if ($page->start_date != '0000-00-00') {
	$start_date = date('d-m-Y', strtotime($page->start_date));
}
?>
                                                    <input name="start_date" type="text" placeholder="Start Date" class="form-control datepicker_new" value="<?=set_value('start_date', $start_date);?>">
                                                    <div class="error"><?php echo form_error('start_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                             <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"><?=($page->location_type == 'Exam') ? 'Registration Closing Date' : 'End Date'?></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                          <?php
$end_date = '';
if ($page->end_date != '0000-00-00') {
	$end_date = date('d-m-Y', strtotime($page->end_date));
}
?>
                                                    <input name="end_date" type="text" placeholder="End Date" class="form-control datepicker_new" value="<?=set_value('end_date', $end_date);?>">
                                                    <div class="error"><?php echo form_error('end_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                       <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Result Date</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class=""><?php
$result_date = '';
if ($page->result_date != '0000-00-00') {
	$result_date = date('d-m-Y', strtotime($page->result_date));
}
?>
                                                    <input name="result_date" type="text" placeholder="Result Date" class="form-control datepicker_new" value="<?=set_value('result_date', $result_date);?>" />
                                                    <div class="error"><?php echo form_error('result_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Time</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <input name="time" type="text" placeholder="Time" class="form-control" value="<?=set_value('time', $page->time);?>">
                                                    <div class="error"><?php echo form_error('time'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Venue</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <input name="venue" type="text" placeholder="Venue" class="form-control" value="<?=set_value('venue', $page->venue);?>">
                                                    <div class="error"><?php echo form_error('venue'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Fee</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <input name="fee" type="text" placeholder="Fee" class="form-control" value="<?=set_value('fee', $page->fee);?>">
                                                    <div class="error"><?php echo form_error('fee'); ?></div>
                                                </div>
                                            </div>
                                        </div>




 <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Type <span style="color: red;"> *</span></label>
          <div class="col-md-6 col-xs-12">
              <select class="form-control" required="" name="type">
                  <option value="">Select</option>
                  <option <?=($page->type == 'OET') ? 'selected' : ''?> value="OET">OET</option>
                  <option <?=($page->type == 'OSCE') ? 'selected' : ''?> value="OSCE">OSCE</option>
                  <option  <?=($page->type == 'NMC CBT') ? 'selected' : ''?> value="NMC CBT">NMC CBT</option>
                  <option <?=($page->type == 'GMC Plab') ? 'selected' : ''?> value="GMC Plab">GMC Plab</option>
                   <option <?=($page->type == 'IELTS') ? 'selected' : ''?> value="IELTS">IELTS</option>
                  <option <?=($page->type == 'Other') ? 'selected' : ''?> value="Other">Other</option>
              </select>
            </div>
          </div>


          <div class="form-group">
                <label class="col-md-3 col-xs-12 control-label">Location Type  <span style="color: red;"> *</span></label>
                <div class="col-md-6 col-xs-12">
                  <select class="form-control" required="" name="location_type">
                      <option value="">Select</option>
                      <option <?=($page->location_type == 'Course') ? 'selected' : ''?> value="Course">Course</option>
                      <option  <?=($page->location_type == 'Exam') ? 'selected' : ''?> value="Exam">Exam</option>
                  </select>
                </div>
            </div>


              <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mock </label>
                                <div class="col-md-6 col-xs-12" style="margin-top:6px;">
                                     <input <?=($page->mock_test == 'Yes') ? 'checked' : ''?> type="checkbox" name="mock_test">
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
<script type='text/javascript' src='<?=base_url()?>front/js/bootstrap-datepicker.min.js'></script>


<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>



<script>
$(document).ready(function() {
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>

