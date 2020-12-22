 <footer class="footer-area section-gap">
         <div class="container">
            <div class="row">
               <div class="col-lg-3  col-md-12" style="border-right: 1px solid #fff;">
                  <div class="single-footer-widget">
                     <h6>Top Courses</h6>
                     <ul class="footer-nav">
                        <li><a href="<?=base_url()?>oet-for-doctors">OET for Doctors</a></li>
                        <li><a href="<?=base_url()?>oet-for-nurses">OET for Nurses</a></li>
                        <li><a href="<?=base_url()?>nmc-cbt-for-nurses">NMC CBT for Nurses</a></li>
                        <li><a href="<?=base_url()?>ielts">IELTS</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-6  col-md-12" style="border-right: 1px solid #fff;">
                  <div class="single-footer-widget newsletter">
                     <h6>Newsletter</h6>
                     <p>Weekly Updates About Exams and Qualifying in the UK</p>
                     <div id="">
                        <form   action="<?=base_url()?>home/email_subscribe" method="post" class="form-inline">
                           <div class="form-group row" style="width: 100%">
                              <div class="col-lg-8 col-md-12">
                                 <input name="email" placeholder="Enter Email" required="" type="email">
                              </div>
                              <div class="col-lg-4 col-md-12">
                                 <button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
                              </div>
                           </div>
                           <div class="info"></div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3  col-md-12">
                  <div class="single-footer-widget mail-chimp">
                     <div class="single-footer-widget">
                        <h6>Top Learning Materials</h6>
                        <ul class="footer-nav">
                           <li><a href="<?=base_url()?>services-category/books-and-ebooks?type=Doctor">Books for Doctors</a></li>
                           <li><a href="<?=base_url()?>services-category/books-and-ebooks?type=Nurse">Books for Nurses</a></li>
                           <li><a href="<?=base_url()?>about-us/apple-ios-and-google-play-android-apps">Apps</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <br><br>
            <hr style="color: #fff;">
            <div class="row">
               <div class="col-lg-3  col-md-12">
               </div>
               <div class="col-lg-6  col-md-12" align="center">
                  <img src="<?=base_url();?>file/img/pay.png" class="img-fluid"><br><br>
               </div>
               <div class="col-lg-3  col-md-12">
               </div>
            </div>
            <div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
            <p class="col-lg-12 col-sm-12 footer-text m-0 text-white">
            IELTS Medical LTD trading as ieltsmedical.co.uk - Company Registration No: 10358705 - Company Registered in England Registered Address: 17 Highgate High Street, London, N6 5JT.
            <br /><br />
            </p>


                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">&copy; IELTS Medical LTD <script>document.write(new Date().getFullYear());</script>. All Rights Reserved.</a>
                  <br>
                  <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy"><u style="color: #fff; font-size: 10px; font-weight: 200;">Privacy Policy</u></a>&nbsp;&nbsp;
                  <a href="<?=base_url()?>about/terms-and-conditions"><u style="color: #fff; font-size: 10px; font-weight: 200;">Terms & Conditions</u></a>&nbsp;&nbsp;<a href="<?=base_url()?>careers"><u style="color: #fff; font-size: 10px; font-weight: 200;">Careers</u>
                  </a>
               </p>
               <div class="footer-social d-flex align-items-center">
               <a href="http://youtube.com/c/ieltsmedicalltd" target="_blank"><i class="fa fa-youtube"></i></a>
                  <a href="https://www.facebook.com/IELTSMedical" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
               </div>
            </div>
         </div>
      </footer>

      </div>
</div>

<?php
$this->load->view('header/link');
?>
