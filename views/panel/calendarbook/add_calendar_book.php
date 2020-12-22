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
                    <li><a>Calendar Book</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Create Calendar Book</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Calendar Book</h3>
                                    </div>

<div class="panel-body">  
    
    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Calendar Name <span style="color: red;"> *</span></label>
        <div class="col-md-6 col-xs-12">
     <div class="">
        <select name="course_main_id" required class="form-control">
            <option value="">Select Calendar Name</option>
                <?php
                    foreach ($calender_get as $row) {
                        ?>
                  <option value="<?=$row->id?>"><?=$row->main_title?></option>
                <?php }?>
        </select>
     </div>
   </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">First Name</label>
        <div class="col-md-6 col-xs-12">                                            
            <div class="">
                <input name="first_name" type="text" placeholder="First Name" class="form-control" value="<?= set_value('first_name'); ?>" />
                <div class="error"><?php echo form_error('first_name'); ?></div>
            </div>                                            
        </div>
    </div>

  <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
        <div class="col-md-6 col-xs-12">                                            
            <div class="">
                <input name="last_name" type="text" placeholder="Last Name" class="form-control" value="<?= set_value('last_name'); ?>" />
                <div class="error"><?php echo form_error('last_name'); ?></div>
            </div>                                            
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Email</label>
        <div class="col-md-6 col-xs-12">                                            
            <div class="">
                <input name="email" type="text" placeholder="Email" class="form-control" value="<?= set_value('email'); ?>" />
                <div class="error"><?php echo form_error('email'); ?></div>
            </div>                                            
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Phone Number</label>
        <div class="col-md-6 col-xs-12">                                            
            <div class="">
                <input name="phone_number" type="text" placeholder="Phone Number" class="form-control" value="<?= set_value('phone_number'); ?>" />
                <div class="error"><?php echo form_error('phone_number'); ?></div>
            </div>                                            
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Book Date</label>
        <div class="col-md-6 col-xs-12">                                            
            <div class="">
                <input name="book_date" type="text" placeholder="Book Date" class="form-control datepicker_new" value="<?= set_value('book_date'); ?>" />
                <div class="error"><?php echo form_error('book_date'); ?></div>
            </div>                                            
        </div>
    </div>

     <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Book Time</label>
        <div class="col-md-6 col-xs-12">                                            
            <div class="">
                <input name="book_time" type="time" placeholder="Book Time" class="form-control" value="<?= set_value('book_time'); ?>" />
                <div class="error"><?php echo form_error('book_time'); ?></div>
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






<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>


