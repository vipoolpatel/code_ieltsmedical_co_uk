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
            <li><a>Introductions</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Create Introductions</h2>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Create Introductions</h3>
                        </div>
                        <div class="panel-body">
                           <!--       <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Admin Name <span style="color: red;"> *</span></label>
                               <div class="col-md-6 col-xs-12">
                                  <div class="">
                                     <select name="admin_id" required class="form-control">
                                         <option value="">Select Admin Name</option>
                                             <?php
foreach ($user_accounts_get as $row) {
	?>
                                               <option value="<?=$row->user_id?>"><?=$row->account_name?></option>
                                             <?php }?>
                                     </select>
                                  </div>
                                </div>
                              </div>
                              -->
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Client <span style="color: red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="customer_id" id="getCustomerDetail"  class="form-control select" data-live-search="true">
                                       <option value="">Select Client</option>
                                       <?php
foreach ($customer_get as $row) {
	?>
                                       <option value="<?=$row->id?>"><?=$row->username?> <?=$row->lastname?> (<?=$row->email?>)</option>
                                       <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label"></label>
                              <div class="col-md-6 col-xs-12">
                                 Or
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Candidate Name <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="first_name" type="text" id="getFirstName" placeholder="Candidate Name" class="form-control" value="<?=set_value('first_name');?>" />
                                    <div class="error"><?php echo form_error('first_name'); ?></div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Candidate Email <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="email" type="email" id="getEmail" placeholder="Candidate Email" class="form-control" value="<?=set_value('email');?>" />
                                    <div class="error"><?php echo form_error('email'); ?></div>
                                 </div>
                              </div>
                           </div>



                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Candidate Phone <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="phone" type="text" id="getPhone" placeholder="Candidate Phone" class="form-control" value="<?=set_value('phone');?>" />
                                    <div class="error"><?php echo form_error('phone'); ?></div>
                                 </div>
                              </div>
                           </div>

                            <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Current Location <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="current_location" type="text" placeholder="Current Location" class="form-control" value="<?=set_value('current_location');?>" />
                                    <div class="error"><?php echo form_error('current_location'); ?></div>
                                 </div>
                              </div>
                           </div>

                         <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Subject <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="subject" type="text" placeholder="Subject" class="form-control" value="<?=set_value('subject');?>" />
                                    <div class="error"><?php echo form_error('subject'); ?></div>
                                 </div>
                              </div>
                           </div>

                         <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">URL <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="url" type="text" placeholder="URL" class="form-control" value="<?=set_value('url');?>" />
                                    <div class="error"><?php echo form_error('url'); ?></div>
                                 </div>
                              </div>
                           </div>



                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Gender <span style="color :red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select class="form-control" name="gender" required>
                                       <option value="">Select</option>
                                       <option value="His">Male</option>
                                       <option value="Her">Female</option>
                                    </select>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Profession  <span style="color: red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="profession_id" id="profession_id" required class="form-control">
                                       <option value="">Select Profession</option>
                                       <?php
                                       foreach ($introductions_profession as $row) {
                                       ?>
                                       <option value="<?=$row->id?>"><?=$row->profession_name?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Stage  <span style="color: red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="profession_stage_id" id="profession_stage_id" required class="form-control">
                                       <option value="">Select Stage</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Trained in <span style="color: red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="country_id" required class="form-control select" data-live-search="true">
                                       <option value="">Select Trained in</option>
                                       <?php
                                       foreach ($country_list as $row) {
                                       	?>
                                       <option value="<?=$row->id?>"><?=$row->country_name?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Trust <span style="color: red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="trust_id" required class="form-control select" data-live-search="true">
                                       <option value="">Select Trust</option>
                                       <?php
foreach ($trust_get as $row) {
	?>
                                       <option value="<?=$row->id?>"><?=$row->name_of_trust?> (<?=$row->name?>)</option>
                                       <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Status  <span style="color: red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <select name="status_id" required class="form-control Select_Trust_Status">
                                       <option value="">Select Status</option>
                                       <?php
foreach ($introductions_status_get as $row) {
	?>
                                       <option value="<?=$row->id?>"><?=$row->status_name?></option>
                                       <?php }?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <hr />














                           
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Recent Work Experience</label>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role 1</label>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Job Title <span style="color :red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role1_job_title" type="text" placeholder="Job Title" class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Name of Employer <span style="color :red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role1_name_of_employer" type="text" placeholder="Name of Employer" class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Start Date <span style="color :red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role1_start_date" type="text" placeholder="Start Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">End Date </label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role1_end_date" type="text" placeholder="End Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Description  <span style="color :red;">*</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <textarea name="role1_description" placeholder="Description" class="form-control editor"></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role 2</label>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Job Title <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role2_job_title" type="text" placeholder="Job Title" class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Name of Employer <span style="color :red;"></span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role2_name_of_employer" type="text" placeholder="Name of Employer" class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Start Date <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role2_start_date" type="text" placeholder="Start Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">End Date <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role2_end_date" type="text" placeholder="End Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Description  <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <textarea name="role2_description" placeholder="Description" class="form-control editor"></textarea>
                                 </div>
                              </div>
                           </div>



                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role 3</label>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Job Title <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role3_job_title" type="text" placeholder="Job Title" class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Name of Employer <span style="color :red;"></span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role3_name_of_employer" type="text" placeholder="Name of Employer" class="form-control" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Start Date <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role3_start_date" type="text" placeholder="Start Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">End Date <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input name="role3_end_date" type="text" placeholder="End Date" class="form-control datepicker_new" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Description <span style="color :red;"> </span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <textarea name="role3_description" placeholder="Description" class="form-control editor"></textarea>
                                 </div>
                              </div>
                           </div>

                            <div id="getJob"></div>


                            <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">
                                <button class="btn btn-primary" type="button" id="AddNewJob">Add New Job</button>
                              </label>
                           </div>








                           <hr />
                           <div class="form-group email_candidate" style="display:none">
                              <label class="col-md-3 col-xs-12 control-label">Email Candidate </label>
                              <div class="col-md-6 col-xs-12">
                                 <div style="margin-top: 6px;">
                                    <input type="checkbox" name="email_candidate">
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

var item_row = 4;
   $('#AddNewJob').click(function(){

    html  ='<div class="form-group">\n\
   <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role '+item_row+'</label>\n\
</div>\n\
<div class="form-group">\n\
   <label class="col-md-3 col-xs-12 control-label">Job Title </label>\n\
   <div class="col-md-6 col-xs-12">\n\
      <div class="">\n\
         <input name="jobs['+item_row+'][job_title]" type="text" placeholder="Job Title" class="form-control" />\n\
      </div>\n\
   </div>\n\
</div>\n\
<div class="form-group">\n\
   <label class="col-md-3 col-xs-12 control-label">Name of Employer</label>\n\
   <div class="col-md-6 col-xs-12">\n\
      <div class="">\n\
         <input name="jobs['+item_row+'][name_of_employer]" type="text" placeholder="Name of Employer" class="form-control" />\n\
      </div>\n\
   </div>\n\
</div>\n\
<div class="form-group">\n\
   <label class="col-md-3 col-xs-12 control-label">Start Date </label>\n\
   <div class="col-md-6 col-xs-12">\n\
      <div class="">\n\
         <input name="jobs['+item_row+'][start_date]"  type="text" placeholder="Start Date" class="form-control datepicker_new" />\n\
      </div>\n\
   </div>\n\
</div>\n\
<div class="form-group">\n\
   <label class="col-md-3 col-xs-12 control-label">End Date </label>\n\
   <div class="col-md-6 col-xs-12">\n\
      <div class="">\n\
         <input name="jobs['+item_row+'][end_date]" type="text" placeholder="End Date" class="form-control datepicker_new" />\n\
      </div>\n\
   </div>\n\
</div>\n\
<div class="form-group">\n\
   <label class="col-md-3 col-xs-12 control-label">Description </label>\n\
   <div class="col-md-6 col-xs-12">\n\
      <div class="">\n\
         <textarea name="jobs['+item_row+'][description]"  placeholder="Description" class="form-control editor"></textarea>\n\
      </div>\n\
   </div>\n\
</div>';

    $("#getJob").before(html);
    item_row++;

      tinymce.init({
            selector:'.editor',
            plugins:'link code image textcolor advlist',
            toolbar: [
            "fontselect | bullist numlist outdent indent | fontsizeselect | undo redo | styleselect | bold italic | link image",
            "alignleft aligncenter alignright Justify | forecolor backcolor",
            "fullscreen"
            ],
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
        });



   $('.datepicker_new').datepicker({
       format: 'dd-mm-yyyy',
   });


   });



   $('.Select_Trust_Status').change(function(){
       var value = $(this).val();
       if(value != '1')
       {
           $('.email_candidate').show();
       }
       else
       {
          $('.email_candidate').hide();
       }
   });

   $('#profession_id').change(function(){
       var profession_id = $(this).val();
       $.ajax({
         type:'POST',
         url:"<?=base_url()?>panel/introductions/get_stage_profession",
         data: {profession_id: profession_id},
         dataType: 'JSON',
         success:function(data){
             $('#profession_stage_id').html(data.success);
         }
        });
   });

   });

</script>
