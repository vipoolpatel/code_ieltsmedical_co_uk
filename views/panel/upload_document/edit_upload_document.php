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
            <li><a> Document Library</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Document Library</h2>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Edit Document Library</h3>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Title</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="id" type="hidden" value="<?=$document->id?>" />
                                    <input name="title" type="text" placeholder="Title" class="form-control" value="<?=set_value('title', $document->title);?>" />
                                    <div class="error"><?php echo form_error('title'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Description</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <textarea name="description" type="text" placeholder="Description" rows="7" class="form-control" value="" /><?=set_value('description', $document->description);?></textarea>
                                    <div class="error"><?php echo form_error('description'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Upload File </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="file" name="upload_file" ><br>
                                    <?php
if (!empty($document->upload_file)) {
	?>
                                    <a target="_blank" href="<?=base_url()?>img/document/<?=$document->upload_file?>">
                                    Download File
                                    </a>
                                    <?php
}
?>
                                    <input type="hidden" value="<?=$document->upload_file?>" name="old_imagename">
                                    <div class="error"><?php echo form_error('upload_file'); ?></div>
                                 </div>
                              </div>
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