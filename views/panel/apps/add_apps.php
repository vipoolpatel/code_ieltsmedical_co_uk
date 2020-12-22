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
                    <li><a>Apps</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Apps</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Apps</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">App Store</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="app_store" type="text" placeholder="App Store" class="form-control" value="<?= set_value('app_store'); ?>" />
                                                    <div class="error"><?php echo form_error('app_store'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Google Play</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="google_play" type="text" placeholder="Google Play" class="form-control" value="<?= set_value('google_play'); ?>" />
                                                    <div class="error"><?php echo form_error('google_play'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

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
                                            <label class="col-md-3 col-xs-12 control-label">Status <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <select name="user_status" required class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
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





