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
<style type="text/css">
   .btn
   {
      padding: 12px;font-size: 18px;
   }

</style>
         <ul class="breadcrumb">
            <li><a >Dashboard</a></li>
         </ul>
         <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Dashboard</h2>
         </div>
         <div class="page-content-wrap">
            <div class="row">
               <div class="col-md-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h3 class="panel-title">Dashboard</h3>
                     </div>
                     <div class="panel-body" style="overflow: auto;">
                        <div class="col-md-12">
                           <div class="col-md-12" style="text-align: center;">
                           <br /><br />

                              <a href="https://www.ieltsmedical.org/panel/login/userlogin" target="_blank" class="btn btn-primary">Learners Portal</a>

                              <button class="btn btn-primary doctor-nurse" data-val="nurse" id="doctor">For Doctors</button>

                              <button class="btn btn-primary doctor-nurse" data-val="doctor" id="nurse">For Nurses</button>

                              <br /><br /><br />
                              <div class="show-doctor" style="display:none;">
                                 <a class="" target="_blank" href="https://www.oetdoctors.co.uk/panel/booking/add_booking"><img src="<?=base_url()?>img/dashboard/Button 2.png"></a>
                                 <a class="" target="_blank" href="https://www.plablondon.com/"><img src="<?=base_url()?>img/dashboard/Button 1.png"></a>
                              </div>

                              <div class="show-nurse" style="display:none;">
                                 <a class="" target="_blank" href="https://www.oetnurses.co.uk/panel/booking/add_booking"><img src="<?=base_url()?>img/dashboard/Button 2.png"></a>
                                 <a class="" target="_blank" href="https://www.cbtnurses.com/panel/booking/add_booking"><img src="<?=base_url()?>img/dashboard/Button 3.png"></a>
                                 <a class="" target="_blank" href="https://www.oscenurses.com/panel/booking/add_booking"><img src="<?=base_url()?>img/dashboard/Button 5.png"></a>
                              </div>

                           </div>

                        </div>
                     </div>
                  </div>
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
<script>
   $(document).ready(function(){

     $(".doctor-nurse").click(function(){
        var id = $(this).attr('id');
        var data_val = $(this).attr('data-val');
            $('.show-'+id).show();
            $('.show-'+data_val).hide();
     });
   });

</script>
