 
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
                    <li><a>Calendar</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Calendar</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Calendar</h3>
                                    </div>

                                    <div class="panel-body">

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Image <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input type="file" required name="photo_image" value="<?= set_value('photo_image'); ?>">
                                                  
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
                                            <label class="col-md-3 col-xs-12 control-label">Sub Title</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="sub_title" type="text" placeholder="Sub Title" class="form-control" value="<?=set_value('sub_title');?>" />
                                                    <div class="error"><?php echo form_error('sub_title'); ?></div>
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
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="description" rows="10" type="text" placeholder="Description" class="form-control" value="<?=set_value('description');?>" /></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
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
