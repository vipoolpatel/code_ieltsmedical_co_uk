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
                    <li><a>Introduction</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Introduction</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Introduction</h3>
                                        <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/introductions/introductions_list">Back</a>
                                    </div>

                                    <div class="panel-body">
                                    <div  class="form-horizontal">

            <div class="form-group">
              <label class="col-md-3 control-label">
                     ID  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$getIntroductions->id?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                     Executive :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$getIntroductions->account_name?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">
                      Candidate Name :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->first_name?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                      Candidate Email :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->email?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">
                      Candidate Phone :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->phone?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                      Profession :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->profession_name?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                      Stage :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->profession_stage_name?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                      Trained in :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->country_name?>
              </div>
            </div>

              <div class="form-group">
              <label class="col-md-3 control-label">
                      URL :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->url?>
              </div>
            </div>

<hr />
            <div class="form-group">
              <label class="col-md-3 control-label">
                      Name of Trust :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->name_of_trust?>
              </div>
            </div>

                <div class="form-group">
              <label class="col-md-3 control-label">
                      Name of Contact :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->name_of_contact?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">
                      Email address of contact :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->contact_of_email?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-3 control-label">
                      Phone number of contact :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->contact_of_phone?>
              </div>
            </div>
<hr />
             <div class="form-group">
              <label class="col-md-3 control-label">
                      Status :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$getIntroductions->status_name?>
              </div>
            </div>

              <div class="form-group">
              <label class="col-md-3 control-label">
                      Create Date :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=date('d-m-Y h:i A', strtotime($getIntroductions->created_date));?>
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
              <label class="col-md-3 col-xs-12 control-label">Job Title :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role1_job_title?>
              </div>
        </div>

         <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Name of Employer :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role1_name_of_employer?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Start Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role1_start_date?>
              </div>
        </div>

         <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">End Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$getIntroductions->role1_end_date?>
              </div>
        </div>


           <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$getIntroductions->role1_description?>
              </div>
        </div>


        <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role 2</label>
      </div>

              <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Job Title :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role2_job_title?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Name of Employer :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role2_name_of_employer?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Start Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role2_start_date?>
              </div>
        </div>

         <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">End Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$getIntroductions->role2_end_date?>
              </div>
        </div>


           <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$getIntroductions->role2_description?>
              </div>
        </div>



        <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role 3</label>
      </div>

              <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Job Title :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role3_job_title?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Name of Employer :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role3_name_of_employer?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Start Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$getIntroductions->role3_start_date?>
              </div>
        </div>

         <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">End Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$getIntroductions->role3_end_date?>
              </div>
        </div>


           <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$getIntroductions->role3_description?>
              </div>
        </div>




<?php
if (!empty($more_jobs)) {
	$i = 4;
	foreach ($more_jobs as $value) {
		?>

     <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label" style="color:blue">Role <?=$i?></label>
      </div>

              <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Job Title :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$value->job_title?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Name of Employer :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$value->name_of_employer?>
              </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Start Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                  <?=$value->start_date?>
              </div>
        </div>

         <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">End Date :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$value->end_date?>
              </div>
        </div>


           <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description :</label>
              <div class="col-md-6 col-xs-12" style="margin-top: 8px;">
                   <?=$value->description?>
              </div>
        </div>



<?php
$i++;
	}
}
?>









                                     </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/introductions/introductions_list">Back</a>
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

   $( ".datepicker" ).datepicker();


});

</script>




