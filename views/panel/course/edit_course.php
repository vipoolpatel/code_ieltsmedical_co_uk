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
                    <li><a>Course</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Course</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Course</h3>
                                    </div>

                                    <div class="panel-body">


                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Course Mani Name<span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                <input name="id" required type="hidden" value="<?=$apps->id?>" />
                                                <select name="course_main_id" class="form-control">

<option value="">Select Course Mani Name</option>
    <?php
foreach ($course_date as $row) {
?>
      <option <?=($row->id == $apps->course_main_id) ? 'selected' : ''?>  value="<?=$row->id?>"><?=$row->course_main?></option>
    <?php }?>
</select>
</div>
</div>
</div>



                                           <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Course Name<span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
             <input name="course_name" required type="text"  placeholder="Course Name" class="form-control" value="<?=set_value('course_name', $apps->course_name);?>" />
                                                    <div class="error"><?php echo form_error('course_name'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                     <!--  <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Day</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="day" type="text"  placeholder="Day Name" class="form-control" value="<?=set_value('day', $apps->day);?>" />
                                                    <div class="error"><?php echo form_error('day'); ?></div>
                                                </div>
                                            </div>
                                        </div> -->





                                       <!--     <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Available Date </label>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="">
                                                    <input name="start_date" type="text"  placeholder="Start Date" class="form-control datepicker" value="<?=set_value('start_date', $apps->start_date);?>" />
                                                    <div class="error"><?php echo form_error('start_date'); ?></div>
                                                </div>
                                            </div>
                                             <div class="col-md-3 col-xs-6">
                                                <div class="">
                                                    <input name="end_date" type="text"  placeholder="End Date" class="form-control datepicker" value="<?=set_value('end_date', $apps->end_date);?>" />
                                                    <div class="error"><?php echo form_error('end_date'); ?></div>
                                                </div>
                                            </div>
                                        </div>  -->


                                      <!--   <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <textarea name="description"  rows="6" type="text"  placeholder="Description" class="form-control" value="" /><?=set_value('description', $apps->description);?></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>
                                            </div>
                                        </div> -->

         <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Start Date </label>
        <div class="col-md-6 col-xs-12">
            <div class="">
                <input name="start_date" type="text"  placeholder="Start Date" class="form-control datepicker_new" value="<?=set_value('start_date', date('d-m-Y', strtotime($apps->start_date)));?>" />
                <div class="error"><?php echo form_error('start_date'); ?></div>
            </div>
        </div>
    </div>


        <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">End Date </label>
        <div class="col-md-6 col-xs-12">
            <div class="">
            <?php
$end_date = '';
if ($apps->end_date != '0000-00-00') {
	$end_date = date('d-m-Y', strtotime($apps->end_date));
}
?>
                <input name="end_date" type="text"  placeholder="End Date" class="form-control datepicker_new" value="<?=$end_date?>" />
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Time </label>
        <div class="col-md-6 col-xs-12">
            <div class="">
                <input name="time"  type="text" placeholder="10:00 - 15:00" class="form-control" value="<?=$apps->time?>" />
            </div>
        </div>
        </div>


     <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Price </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="price" type="text"  placeholder="Price" class="form-control" value="<?=set_value('price', $apps->price);?>" />
                                                    <div class="error"><?php echo form_error('price'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                       <!--
                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Subtitle Extra 1</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="extra" type="text"  placeholder="Subtitle Extra 1" class="form-control" value="<?=set_value('extra', $apps->extra);?>" />
                                                    <div class="error"><?php echo form_error('extra'); ?></div>
                                                </div>
                                            </div>
                                        </div> -->
                                    <!--     <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Subtitle Extra 2</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="extra2" type="text"  placeholder="Subtitle Extra 2" class="form-control" value="<?=set_value('extra2', $apps->extra2);?>" />
                                                    <div class="error"><?php echo form_error('extra2'); ?></div>
                                                </div>
                                            </div>
                                        </div> -->
                                       <!--   <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Extra Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="description2"  rows="6" type="text"  placeholder="Extra Description" class="form-control" value="" /><?=set_value('description2', $apps->description2);?></textarea>
                                                    <div class="error"><?php echo form_error('description2'); ?></div>
                                                </div>
                                            </div>
                                        </div> -->


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



