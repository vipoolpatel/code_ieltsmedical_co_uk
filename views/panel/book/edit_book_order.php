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
                    <li><a>Book Order</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Book Order</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Book Order</h3>
                                    </div>

                                    <div class="panel-body">


                                     




                                    
<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">First Name </label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="id" required type="hidden" value="<?=$book->id?>" />
            <input name="first_name" type="text"  placeholder="First Name" class="form-control" value="<?=set_value('first_name', $book->first_name);?>" />
            <div class="error"><?php echo form_error('first_name'); ?></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Last Name </label>
    <div class="col-md-6 col-xs-12">
        <div class="">
         
            <input name="last_name" type="text"  placeholder="Last Name" class="form-control" value="<?=set_value('last_name', $book->last_name);?>" />
            <div class="error"><?php echo form_error('last_name'); ?></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Email </label>
    <div class="col-md-6 col-xs-12">
        <div class="">
         
            <input name="email" type="email"  placeholder="Email" class="form-control" value="<?=set_value('email', $book->email);?>" />
            <div class="error"><?php echo form_error('email'); ?></div>
        </div>
    </div>
</div>



        <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Address</label>
            <div class="col-md-6 col-xs-12">
                <div class="">

                    <textarea name="address"  rows="6" type="text"  placeholder="Description" class="form-control" value="" /><?=set_value('address', $book->address);?></textarea>
                    <div class="error"><?php echo form_error('address'); ?></div>
                </div>
            </div>
        </div>

                                          
<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Country </label>
    <div class="col-md-6 col-xs-12">
        <div class="">
         
            <input name="country" type="text"  placeholder="Country" class="form-control" value="<?=set_value('country', $book->country);?>" />
            <div class="error"><?php echo form_error('country'); ?></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Post Code </label>
    <div class="col-md-6 col-xs-12">
        <div class="">
         
            <input name="zip_code" type="text"  placeholder="Post Code" class="form-control" value="<?=set_value('zip_code', $book->zip_code);?>" />
            <div class="error"><?php echo form_error('zip_code'); ?></div>
        </div>
    </div>
</div>

    

     <div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Phone </label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="phone" type="text"  placeholder="Phone" class="form-control" value="<?=set_value('phone', $book->phone);?>" />
            <div class="error"><?php echo form_error('phone'); ?></div>
        </div>
    </div>
</div>

 <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Message</label>
            <div class="col-md-6 col-xs-12">
                <div class="">

                    <textarea name="message"  rows="6" type="text"  placeholder="Message" class="form-control" value="" /><?=set_value('message', $book->message);?></textarea>
                    <div class="error"><?php echo form_error('message'); ?></div>
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

    $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });

});

</script>



