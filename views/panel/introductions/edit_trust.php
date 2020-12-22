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
                   <li><a>Trust</a></li>
               </ul>
               <div class="page-title">
                   <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Trust</h2>
               </div>
                 <div class="page-content-wrap">
                   <div class="row">
                       <div class="col-md-12">
                           <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                               <div class="panel panel-default">
                                   <div class="panel-heading">
                                       <h3 class="panel-title">Edit Trust</h3>
                                   </div>

                                   <div class="panel-body">




                <div class="form-group">
                 <label class="col-md-3 col-xs-12 control-label">Name of Trust <span style="color: red;"> *</span></label>
                 <div class="col-md-6 col-xs-12">
                     <div class="">
                          <input name="id" type="hidden" value="<?=$apps->id?>" />
                         <input name="name_of_trust" type="text"  placeholder="Name of Trust" class="form-control" required value="<?=set_value('name_of_trust', $apps->name_of_trust);?>" />
                         <div class="error"><?php echo form_error('name_of_trust'); ?></div>
                     </div>
                 </div>
             </div>
             <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Name of Contact <span style="color: red;">*</span></label>
              <div class="col-md-6 col-xs-12">
                  <div class="">
                      <input name="name" required type="text"  placeholder="Name of Contact" class="form-control" value="<?=set_value('name', $apps->name);?>" />
                      <div class="error"><?php echo form_error('name'); ?></div>
                  </div>
              </div>
          </div>

             <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Email address of contact<span style="color: red;">*</span></label>
              <div class="col-md-6 col-xs-12">
                  <div class="">
                      <input name="email" required type="email"  placeholder="Email address of contact" class="form-control" value="<?=set_value('email', $apps->email);?>" />
                      <div class="error"><?php echo form_error('email'); ?></div>
                  </div>
              </div>
           </div>

           <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Phone number of contact<span style="color: red;"> </span></label>
            <div class="col-md-6 col-xs-12">
                <div class="">
                    <input name="phone" type="text"  placeholder="Phone number of contact" class="form-control" value="<?=set_value('phone', $apps->phone);?>" />
                    <div class="error"><?php echo form_error('phone'); ?></div>
                </div>
            </div>
         </div>
          <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label"> Type<span style="color :red;"> *</span></label>
              <div class="col-md-6 col-xs-12">
                  <select class="form-control" required="" name="type">
    <option <?=($apps->type == 'Nurses') ? 'selected' : ''?> value="Nurses">Nurses</option>
     <option <?=($apps->type == 'Doctors') ? 'selected' : ''?> value="Doctors">Doctors</option>
                     
                  </select>
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
