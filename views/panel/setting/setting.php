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
            <li><a>Setting</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Setting</h2>
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

                  <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Setting</h3>
                        </div>
                        <input type="hidden" name="id" value="<?= $setting->id?>">
                        <div class="panel-body">
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Live Courses Price<span style="color: red;">   *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="text" required=""  value="<?=$setting->live_courses_price?>"   name="live_courses_price" class="form-control"/>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Live Courses</label>
                              <div class="col-md-6 col-xs-12">
                                 <input type="radio" name="live_courses_on_off" required value="1"<?= ($setting->live_courses_on_off == '1') ? 'checked' : '' ?> class=""> Yes &nbsp; &nbsp;
                                 <input type="radio" name="live_courses_on_off" required value="0"<?= ($setting->live_courses_on_off == '0') ? 'checked' : '' ?> class=""> No<br>
                              </div>
                           </div>

                              <hr/>

                               <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Flex Courses Price<span style="color: red;">   *</span></label>
                              <div class="col-md-6 col-xs-12">
                                 <div class="">
                                    <input type="text" required=""  value="<?=$setting->flex_courses_price?>"   name="flex_courses_price" class="form-control"/>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 col-xs-12 control-label">Flex Courses</label>
                              <div class="col-md-6 col-xs-12">
                                 <input type="radio" name="flex_courses_on_off" required value="1"<?= ($setting->flex_courses_on_off == '1') ? 'checked' : '' ?> class=""> Yes &nbsp; &nbsp;
                                 <input type="radio" name="flex_courses_on_off" required value="0"<?= ($setting->flex_courses_on_off == '0') ? 'checked' : '' ?> class=""> No<br>
                              </div>
                           </div>

                        </div>

                        <div class="panel-footer">
                           <button class="btn btn-primary pull-right">Update</button>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
   $(document).ready(function() {
   
   $('.datepicker_new').datepicker({
       format: 'dd-mm-yyyy',
   });
   
   });
   
</script>
