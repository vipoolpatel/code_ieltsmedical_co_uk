<?php
$this->load->view('header/header');
?>
     
           <section class="generic-banner relative">
           <div class="overlay overlay-bg"></div>  
            <div class="container">
               <div class="row height align-items-center justify-content-center">
                  <div class="col-lg-10">
                     <div class="generic-banner-content">
                        <h2 class="text-white">Class Times</h2>
                        
                     </div>                     
                  </div>
               </div>
            </div>
         </section>  
         

         <!-- Start faq Area -->
         <section class="faq-area section-gap" id="faq">
            <div class="container">
               <div class="row">
                     <div class="col-lg-12  col-md-12">
                        <img src="<?=base_url()?>file/img/Class-times.png" class="img-fluid" style="width: 100%;">
                      

                     <!-- Type here -->




               </div>
               </div>
            </div>
         </section>
         <!-- End faq Area -->

         <!-- Start book Area -->
  



<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>