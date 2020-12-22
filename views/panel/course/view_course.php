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
                    <li><a>Course</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Course</h2>
                </div>                                              
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data"> 
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Course</h3>
                                    </div>

                                    <div class="panel-body">
                                    <div  class="form-horizontal">  
                                     <!--  <?= $row->course_main?> -->

 <div class="form-group">
              <label class="col-md-3 control-label">
                     Course ID  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?= $upcomming->id?> 
              </div>
            </div>

                                <div class="form-group">
              <label class="col-md-3 control-label">
                     Course Main Name  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?= $upcomming->course_main?> 
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">
                      Course Name  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$upcomming->course_name?>
              </div>
            </div>
          
           <!--  <div class="form-group">
              <label class="col-md-3 control-label">Day  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->day?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Description  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->description?>
              </div>
            </div> -->
           
            <div class="form-group">
              <label class="col-md-3 control-label">Start Date  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  
                    <?=date('d-m-Y', strtotime($upcomming->start_date));?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">End Date  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    
                    <?=date('d-m-Y', strtotime($upcomming->end_date));?>
              </div>
            </div> 
             <div class="form-group">
              <label class="col-md-3 control-label">Price  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->price?>
              </div>
            </div>
            <!-- <div class="form-group">
              <label class="col-md-3 control-label">Subtitle Extra 1  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->extra?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Subtitle Extra 2  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->extra2?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Extra Description  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                    <?=$upcomming->description2?>
              </div>
            </div> -->
            <div class="form-group">
              <label class="col-md-3 control-label">Created Date  : </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                 
                    <?=date('d-m-Y h:i A', strtotime($upcomming->created_date));?>
              </div>
            </div>
          
                                   
                                     </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/course/course_list">Back</a>
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




