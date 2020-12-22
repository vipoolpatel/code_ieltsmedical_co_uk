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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Blog</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Blog</h3>
                                    </div>

                                    <div class="panel-body">

                                         <div class="form-group">
                                         <label class="col-md-3 col-xs-12 control-label">Author <span style="color: red;"> *</span></label>
                                          <div class="col-md-6 col-xs-12">
                                             <div class="">
                                                <input name="id" required type="hidden" value="<?=$apps->id?>" />
                                                <select name="author_user_id" class="form-control">

                                                    <option value="">Select Author</option>
                                                        <?php
                                                                foreach ($course_date as $row) {
                                                                	?>
                                                          <option <?=($row->user_id == $apps->author_user_id) ? 'selected' : ''?>  value="<?=$row->user_id?>"><?=$row->account_name?></option>
                                                        <?php }?>
                                                </select>
                                             </div>
                                           </div>
                                       </div>


                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Title <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">

                                                    <input name="title" required type="text" placeholder="Title" class="form-control" value="<?=set_value('title', $apps->title);?>" />
                                                    <div class="error"><?php echo form_error('title'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Slug <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="slug" required type="text" placeholder="Slug" class="form-control" value="<?=set_value('slug', $apps->slug);?>" />
                                                    <div class="error"><?php echo form_error('slug'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="description" type="text" rows="5" placeholder="Description" class="form-control editor"/><?=set_value('description', $apps->description);?></textarea>
                                                    <div class="error"><?php echo form_error('description'); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <textarea name="meta_description" type="text" rows="5" placeholder="Meta Description" class="form-control"/><?=set_value('meta_description', $apps->meta_description);?></textarea>
                                                    <div class="error"><?php echo form_error('meta_description'); ?></div>
                                                </div>
                                            </div>
                                        </div>



                                           <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Image  <span style="color: #ff0000"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                        <input type="file" name="photo_image" >
                                                        <?php
if (!empty($apps->photo_image)) {
	?>
                                                        <img  width="70" height="70"  src="<?=base_url()?>img/blog/<?=$apps->photo_image?>">
                                                         <?php
}
?>
                                                         <input type="hidden" value="<?=$apps->photo_image?>" name="old_imagename">
                                                    <div class="error"><?php echo form_error('photo_image'); ?></div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Status <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
<select name="user_status" class="form-control">
    <option <?=($apps->user_status == '1') ? 'selected' : ''?> value="1">Active</option>
    <option <?=($apps->user_status == '0') ? 'selected' : ''?> value="0">Inactive</option>
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






