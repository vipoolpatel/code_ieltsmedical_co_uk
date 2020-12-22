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
                    <li><a>Knowledge Base</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> View Knowledge Base</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Knowledge Base</h3>
                                        <a class="btn btn-primary pull-right" href="<?=base_url()?>panel/knowledge_base/knowledge_base_list">Back</a>
                                    </div>

                                    <div class="panel-body">
                                    <div  class="form-horizontal">

            <div class="form-group">
              <label class="col-md-3 control-label">
                     ID  :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$viewKnowledgeBase->id?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">
                     Question :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                   <?=$viewKnowledgeBase->question?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-3 control-label">
                      Answer :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=$viewKnowledgeBase->answer?>
              </div>
            </div>

         


          

        

              <div class="form-group">
              <label class="col-md-3 control-label">
                      Create Date :
               </label>
              <div class="col-sm-5" style="margin-top: 8px;">
                  <?=date('d-m-Y h:i A', strtotime($viewKnowledgeBase->created_date));?>
              </div>
            </div>

     


                                     </div>
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




