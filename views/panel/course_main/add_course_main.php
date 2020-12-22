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
                    <li><a>Course Main</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Course Main</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Course Main</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Course Main <span style="color :red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="course_main" required type="text" placeholder="Course Main" class="form-control" value="<?= set_value('course_main'); ?>" />
                                                    <div class="error"><?php echo form_error('course_main'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Image Upload </label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input type="file" name="photo_image" value="<?=set_value('photo_image');?>">

                                                    <div class="error"><?php echo form_error('photo_image'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Main Title</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="main_title" type="text" placeholder="Main Title" class="form-control" value="<?=set_value('main_title');?>" />
                                                    <div class="error"><?php echo form_error('main_title'); ?></div>
                                                </div>
                                            </div>
                                        </div>


                                            <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Video URL</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="url" type="text" placeholder="Video URL" class="form-control" value="<?=set_value('url');?>" />
                                                    <div class="error"><?php echo form_error('url'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sub Title</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="sub_title" type="text" placeholder="Sub Title" class="form-control" value="<?=set_value('sub_title');?>" />
                                                    <div class="error"><?php echo form_error('sub_title'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Sub Title Description</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="sub_title_description" rows="5" type="text" placeholder="Sub Title Description" class="form-control" value="<?= set_value('sub_title_description'); ?>" /></textarea> 
                                                    <div class="error"><?php echo form_error('sub_title_description'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Testimonials</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="testimonials" rows="5" type="text" placeholder="Testimonials" class="form-control" value="<?= set_value('testimonials'); ?>" /></textarea> 
                                                    <div class="error"><?php echo form_error('testimonials'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                      <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Work</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="work" rows="5" type="text" placeholder="Work" class="form-control" value="<?= set_value('work'); ?>" /></textarea> 
                                                    <div class="error"><?php echo form_error('work'); ?></div>
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





