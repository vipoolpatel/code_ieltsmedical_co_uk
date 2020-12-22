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
            <li><a>Add Licence
               </a>
            </li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Create Add Licence</h2>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                 <?php if ($this->session->flashdata('SUCCESS')) {?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                    <?=$this->session->flashdata('SUCCESS')?>
                                </div>
                            <?php }?>


                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title">Create Add Licence
                        </h3>
                     </div>
                     <div class="panel-body">
                        <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/book/upload_licence_excel" enctype="multipart/form-data">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">File</label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                 <input name="book_id" type="hidden" value="<?=$book_id?>" />
                                    <input type="file" name="result_file" required>
                                    <a href="<?=base_url()?>public/CBT_licence.xlsx">Demo Download</a>
                                    <div class="error"><?php echo form_error('result_file'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label"></label>
                              <div class="col-md-6 col-xs-12">
                                 <button class="btn btn-primary">Save</button>
                              </div>
                           </div>
                        </form>
                        <hr />


                        <form class="form-horizontal" id="add_app" method="post" action="<?=base_url()?>panel/book/upload_licence_individual" enctype="multipart/form-data">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Licence </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">

                                    <input name="book_id" type="hidden" value="<?=$book_id?>" />
                                    <input required name="licence_key_name" type="text" placeholder="Licence" class="form-control" value="<?=set_value('licence_key_name');?>" />
                                    <div class="error"><?php echo form_error('licence_key_name'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label"></label>
                              <div class="col-md-6 col-xs-12">
                                 <button class="btn btn-primary">Save</button>
                              </div>
                           </div>
                        </form>


                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Licence Key List
                           </h3>
                        </div>
                        <div class="panel-body" style="overflow: auto;">
                           <table  class="table table-striped table-bordered table-hover" >
                              <thead>
                                 <tr>

                                    <th>Licence Key</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
if (!empty($getLicence)) {
	foreach ($getLicence as $value) {
		?>
                                 <tr>
                                    <td><?=$value->licence_key_name?></td>
                                    <td><?=!empty($value->status) ? 'Sold' : '-'?></td>
                                    <td><a href="<?=base_url()?>panel/book/delete_licence/<?=$value->book_id?>/<?=$value->id?>" class="btn btn-danger">Delete</a></td>
                                 </tr>
                                 <?php }
} else {?>
                                 <tr>
                                    <td colspan="100%">No record found.</td>

                                 </tr>
                                 <?php }
?>
                              </tbody>
                           </table>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                        <div class="panel-footer">
                           <a href="<?=base_url();?>panel/book/book_list" class="btn btn-primary pull-right">Back</a>
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
