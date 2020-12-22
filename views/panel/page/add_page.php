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
                    <li><a>Page</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Page</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Page</h3>
                                    </div>

                                    <div class="panel-body">  
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Page Slug</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="slug" type="text" placeholder="Page Slug" class="form-control" value="<?= set_value('slug'); ?>" />
                                                    <div class="error"><?php echo form_error('slug'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Page Title</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="title" type="text" placeholder="Page Title" class="form-control" value="<?= set_value('title'); ?>" />
                                                    <div class="error"><?php echo form_error('title'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <input name="meta_description" type="text" placeholder="Meta Description" class="form-control" value="<?= set_value('meta_description'); ?>" />
                                                    <div class="error"><?php echo form_error('meta_description'); ?></div>
                                                </div>                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="">
                                                    <textarea name="description" rows="10" type="text" placeholder="Description" class="form-control" value="<?= set_value('description'); ?>" /></textarea> 
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





