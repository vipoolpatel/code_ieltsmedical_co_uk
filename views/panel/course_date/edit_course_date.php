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
                    <li><a>Course Date</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Course Date</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Course Date</h3>
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
                                                <input name="id" required type="hidden" value="<?=$apps->id?>" />
                                                <select name="course_id" class="form-control">

                                                    <option value="">Select Course Name</option>
                                                        <?php
                                                                foreach ($course_datetime as $row) {
                                                                    ?>
                                                          <option <?=($row->id == $apps->course_id) ? 'selected' : ''?>  value="<?=$row->id?>"><?=$row->course_name?></option>
                                                        <?php }?>
                                                </select>
                                             </div>                                          
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Location Name<span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                <input name="id" required type="hidden" value="<?=$apps->id?>" />
                                                <select name="location_id" class="form-control">

                                                    <option value="">Select Location Name</option>
                                                        <?php
                                                                foreach ($course_datlocation as $row) {
                                                                    ?>
                                                          <option <?=($row->id == $apps->location_id) ? 'selected' : ''?>  value="<?=$row->id?>"><?=$row->location?></option>
                                                        <?php }?>
                                                </select>
                                             </div>                                          
                                            </div>
                                        </div>



                                          
                                      

                                 


                                            <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Start Date </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="start_date" type="text"  placeholder="Start Date" class="form-control datepicker" value="<?= set_value('start_date',$apps->start_date); ?>" />
                                                    <div class="error"><?php echo form_error('start_date'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>


                                            <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">End Date </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="end_date" type="text"  placeholder="End Date" class="form-control datepicker" value="<?= set_value('end_date',$apps->end_date); ?>" />
                                                    <div class="error"><?php echo form_error('end_date'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
 <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Time </label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="time" type="text"  placeholder="Time" class="form-control" value="<?= set_value('time',$apps->time); ?>" />
                                                    <div class="error"><?php echo form_error('time'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        
                                       
                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label"> Description</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="decription"  rows="6" type="text"  placeholder="Description" class="form-control" value="" /><?= set_value('decription',$apps->decription); ?></textarea>
                                                    <div class="error"><?php echo form_error('decription'); ?></div>
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

   $( ".datepicker" ).datepicker();
  

});

</script>




