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
                    <li><a>Blog</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Blog</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Blog</h3>
                                    </div>

                                    <div class="panel-body">


                                        <div class="form-group">
                                         <label class="col-md-3 col-xs-12 control-label">Author <span style="color: red;"> *</span></label>
                                          <div class="col-md-6 col-xs-12">
                                             <div class="">
                                                <select name="author_user_id" required class="form-control">
                                                    <option value="">Select Author</option>
                                                        <?php
foreach ($course_date as $row) {
	?>
                                                          <option value="<?=$row->user_id?>"><?=$row->account_name?></option>
                                                        <?php }?>
                                                </select>
                                             </div>
                                           </div>
                                       </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="title" type="text" required placeholder="Title" class="form-control" value="<?=set_value('title');?>" />
                                                    <div class="error"><?php echo form_error('title'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Slug <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="slug" type="text" required placeholder="Slug" class="form-control" value="<?=set_value('slug');?>" />
                                                    <div class="error"><?php echo form_error('slug'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="description" rows="5" type="text" placeholder="Description" class="form-control editor" value="<?=set_value('description');?>" /></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="meta_description" rows="5" type="text" placeholder="Meta Description" class="form-control" value="<?=set_value('meta_description');?>" /></textarea>
                                                    <div class="error"><?php echo form_error('meta_description'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Image <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input type="file" required name="photo_image" value="<?=set_value('photo_image');?>">

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





