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
                    <li><a>Send Email</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Send Email</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Send Email</h3>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Email Template <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <select name="id" required="" class="form-control">
                                                        <option value="">Select Email Template</option>
                                                        <?php
foreach ($email_template as $value) {?>
   <option value="<?=$value->id?>"><?=$value->subject?></option>
<?php }
?>
                                                     </select>
                                                </div>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Tag Status <span style="color: #ff0000">*</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                     <select name="tags_status" required="" class="form-control">
                                                         <option value="">Select Tag</option>
<?php
foreach ($client as $value) {?>
   <option value="<?=$value->tags_status?>"><?=$value->tags_status?></option>
<?php }
?>
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






