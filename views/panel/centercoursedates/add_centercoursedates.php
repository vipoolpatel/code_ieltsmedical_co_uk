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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Center Course Dates</h2>
                </div>

                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Center Course Dates</h3>
                                    </div>

                                    <div class="panel-body">

                                     <!--                 <div class="form-group">
                                         <label class="col-md-3 col-xs-12 control-label">Course Main <span style="color: red;"> *</span></label>
                                          <div class="col-md-6 col-xs-12">
                                             <div class="">
                                                <select name="course_main_id" required class="form-control">
                                                    <option value="">Select Course Main</option>
                                                        <?php
foreach ($course_get as $row) {
	?>
                                                          <option value="<?=$row->id?>"><?=$row->course_main?></option>
                                                        <?php }?>
                                                </select>
                                             </div>
                                           </div>
                                       </div>
 -->



                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Course Name <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="course" type="text" required placeholder="Course Name" class="form-control" value="<?=set_value('course');?>" />
                                                    <div class="error"><?php echo form_error('course'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="description" rows="5" type="text" placeholder="Description" class="form-control" value="<?=set_value('description');?>" /></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Start Date <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="start_date" required type="text" placeholder="  Start Date" class="form-control datepicker_new" value="<?=set_value('start_date');?>" />
                                                    <div class="error"><?php echo form_error('start_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">    End Date</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="end_date" type="text" placeholder="End Date" class="form-control datepicker_new" value="<?=set_value('end_date');?>" />
                                                    <div class="error"><?php echo form_error('end_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Result Date</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="result_date" type="text" placeholder="Result Date" class="form-control datepicker_new" value="<?=set_value('result_date');?>" />
                                                    <div class="error"><?php echo form_error('result_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Time</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="time" type="text" placeholder="Time" class="form-control" value="<?=set_value('time');?>" />
                                                    <div class="error"><?php echo form_error('time'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Venue</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="venue" type="text" placeholder="Venue" class="form-control" value="<?=set_value('venue');?>" />
                                                    <div class="error"><?php echo form_error('venue'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Fee</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="fee" type="text" placeholder="Fee" class="form-control" value="<?=set_value('fee');?>" />
                                                    <div class="error"><?php echo form_error('fee'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Type <span style="color: red;"> *</span></label>
                                <div class="col-md-6 col-xs-12">
                                  <select class="form-control" required="" name="type">
                                      <option value="">Select</option>
                                      <option value="OET">OET</option>
                                      <option value="OSCE">OSCE</option>
                                      <option value="NMC CBT">NMC CBT</option>
                                      <option value="GMC Plab">GMC Plab</option>
                                      <option value="IELTS">IELTS</option>
                                      <option value="Other">Other</option>
                                  </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Location Type  <span style="color: red;"> *</span></label>
                                <div class="col-md-6 col-xs-12">
                                  <select class="form-control" required="" name="location_type">
                                      <option value="">Select</option>
                                      <option value="Course">Course</option>
                                      <option value="Exam">Exam</option>
                                  </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Mock </label>
                                <div class="col-md-6 col-xs-12" style="margin-top:6px;">
                                     <input type="checkbox" name="mock_test">
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
});

</script>
