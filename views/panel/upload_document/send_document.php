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
                    <li><a>Send Document</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span>  Send Document</h2>
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
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> Send Document</h3>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                         <label class="col-md-3 col-xs-12 control-label">Client <span style="color: red;"> *</span></label>
                                          <div class="col-md-6 col-xs-12">
                                             <div>
                                                <select name="customer_id" required class="form-control select" data-live-search="true">
                                                    <option value="">Select Client</option>
                                                        <?php
foreach ($customer_email as $row) {
	?>
                                                          <option value="<?=$row->id?>"><?=$row->username?>  ( <?=$row->email?> )</option>
                                                        <?php }?>
                                                </select>
                                             </div>
                                           </div>
                                       </div>





                                      <div class="form-group">
                                         <label class="col-md-3 col-xs-12 control-label">Document Title<span style="color: red;"> *</span></label>
                                          <div class="col-md-6 col-xs-12">
                                             <div class="">
                                                <select name="upload_document_id" required class="form-control">
                                                    <option value="">Select Document Title</option>
                                                        <?php
foreach ($upload_document_title as $row) {
	?>
                                                          <option value="<?=$row->id?>"><?=$row->title?></option>
                                                        <?php }?>
                                                </select>
                                             </div>
                                           </div>
                                       </div>







                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Send</button>
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





