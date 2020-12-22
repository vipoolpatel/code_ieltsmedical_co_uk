<?php
$this->load->view('header/header');
?>

          <section class="generic-banner relative">
           <div class="overlay overlay-bg"></div>
            <div class="container">
               <div class="row height align-items-center justify-content-center">
                  <div class="col-lg-10">
                     <div class="generic-banner-content">
                        <h2 class="text-white">Special Guest Stars</h2>

                     </div>
                  </div>
               </div>
            </div>
         </section>


         <!-- Start about Area -->
         <section class="about-area" id="about" style="margin-top: 50px;margin-right: 50px; margin-bottom: 50px; margin-left: 50px">
            <div class="container-fluid">
               <div class="row d-flex justify-content-end align-items-center">
                  <div class="col-lg-6 col-md-12" >
                     <p>Here at IELTS Medical, we believe in having the most up-to-date information about the exams our healthcare professionals need to take. For this reason, we frequently host sessions with experts in the industry. <br><br>

                     For <a href="https://ielts.britishcouncil.org/">IELTS Academic</a>, we host Ex-British Council Examiner <a href="https://www.ielts-simon.com/">IELTS Simon‘s</a> (<i>pictured</i>) workshops for:
                     <ul>
                        <li>•IELTS Reading</li>
                        <li>•IELTS Reading and Writing</li>
                        <li>•IELTS Speaking and Listening</li>
                        <li>•IELTS Writing</li>
                     </ul><br><br>
                     For more information about our Special Guest events, contact the IELTS Medical team on  <strong>02036376722.</strong>

                             </p>

                  </div>
                  <div class="col-lg-6 col-md-12 about-right no-padding">
                     <img class="img-fluid" src="<?=base_url()?>file/img/Guest-star.jpg">
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