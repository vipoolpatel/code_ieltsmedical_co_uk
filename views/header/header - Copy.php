<!DOCTYPE html>
<html lang="zxx" class="no-js">
   <head>
      <title><?=!empty($meta_title) ? $meta_title : 'IELTS Medical'?></title>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="<?=base_url();?>file/favicon.png">
      <meta name="author" content="codepixer">
      <?php
if (!empty($meta_description)) {
	?>
<meta name="description" content="<?=$meta_description?>">
      <?php }
?>
<meta charset="UTF-8">
      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
      <link rel="stylesheet" href="<?=base_url();?>file/css/linearicons.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/bootstrap.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/magnific-popup.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/nice-select.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/animate.min.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/owl.carousel.css">
      <link rel="stylesheet" href="<?=base_url();?>file/css/main.css">
   </head>
   <body>
      <?php
if ($this->uri->segment(1) == '') {
	?>
      <div class="sidenav">
         <a  id="my1" data-toggle="modal" data-target="#id02" class="text-uppercase top-head-btn"><i class="fa fa-user"></i></a><br>
            <!--  <a  id="my2" data-toggle="modal" data-target="#id03" class="text-uppercase top-head-btn"><i class="fa fa-calendar"></i></a><br> -->
         <a  id="my3" data-toggle="modal" data-target="#id04" class="text-uppercase top-head-btn"><i class="fa fa-file"></i></a><br>
         <a  id="my4" data-toggle="modal" data-target="#id07" class="text-uppercase top-head-btn"><i class="fa fa-phone"></i></a><br>
         <a id="my5" data-toggle="modal" data-target="#id06" class="text-uppercase top-head-btn"><i class="fa fa-map-marker"></i></a><br>
      </div>
   <?php }
?>

      <header id="header" id="home">
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-sm-8 col-4 header-top-left no-padding">
                     <ul>
                        <li><a><span class="text" style=" color: #3e87d9;">From the UK: 02036376722  |  From outside of the UK +442036376722</span></a></li>
                        <li>

                           <a>
                              <div id="google_translate_element"></div>
                           </a>

                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-8 header-top-right no-padding">
                     <a class="text-uppercase top-head-btn" href="<?=base_url()?>my-account">My Account</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
               <div id="logo">
                  <a href="<?=base_url()?>"><img src="<?=base_url();?>file/img/logo1.png" alt="" title="" /></a>
               </div>
               <div class="menu-container">
                  <div class="menu">
                     <ul>
                        <li>
                           <a href="#">About</a>
                           <ul>
                              <li>
                                 <a href="#">About Us</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>about-us">-Who we are</a></li>
                                    <li><a href="<?=base_url()?>about/our-story">-Our Journey So Far</a></li>
                                    <li><a href="<?=base_url()?>about/closed-examinations">-Private Exams</a></li>
                                     <li><a href="<?=base_url()?>about/results">-Our Results</a></li>
                                     <li><a href="<?=base_url()?>about-us/alumni">-Our Alumni</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">Medical and Nursing Education Team</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>about-us/lead-nmc-cbt-trainer-nurse-maria">-Lead CBT Trainer - Maria</a></li>
                                    <li><a href="<?=base_url()?>about-us/nmc-osce-trainer-claire">-Lead OSCE Trainer - Claire</a></li>
                                    <!-- <li><a href="<?=base_url()?>about-us/uk-nursing-careers-adviser-nurse-maria">-Nursing Careers Advisor - Maria</a></li> -->

                                    <li><a href="<?=base_url()?>about-us/lead-children-nursing-trainer-dee">-Lead Childrens Nursing OSCE Trainer - Dee</a></li>


                                    <li><a href="<?=base_url()?>about-us/lead-midwifery-trainer-natalija">-Lead Midwifery OSCE Trainer - Natalija</a></li>


                                     <li>

                                 <a style="font-size: 14px;border-bottom: 1px solid #3e87d9;" href="#">Communications Team</a>
                                 <ul>
                                    <li><a href="">-Christina</a></li>
                                    <li style="margin-top: 7px;"><a  href="">-Melissa</a></li>
                                 </ul>



                                    </li>

                                 </ul>
                              </li>

                              <li>
                                 <a href="#">UK Immigration</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>about-us/uk-immigration">-UK Immigration</a></li>
                                    <li>

                                 <a style="font-size: 14px;border-bottom: 1px solid #3e87d9;" href="#">NHS</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>about-us/nhs-approved-supplier">-NHS Approved Supplier</a></li>
                                 </ul>



                                    </li>
                                 </ul>
                              </li>


                              <li>
                                 <a href="#">Terms and Conditions</a>
                                 <ul>

                                 <li><a href="<?=base_url()?>about/terms-and-conditions">-General Terms and Conditions</a></li>

                                    <li><a href="<?=base_url()?>about/terms-and-conditions/privacy-policy">-Privacy Policy</a></li>
                                    <li><a href="<?=base_url()?>about/terms-and-conditions/terms-and-conditions-affiliates">-Terms and Conditions (Affiliates)</a></li>
                                    <li><a href="<?=base_url()?>about/terms-and-conditions/nmc-osce-pass-guarantee-terms-conditions">-NMC OSCE Pass Guarantee Terms and Conditions</a></li>
                                    <li><a href="<?=base_url()?>about/terms-and-conditions/ielts-medial-competition-terms-and-conditions">-IELTS Medical Competition Terms and Conditions</a></li>

                                    <li><a href="<?=base_url()?>about/terms-and-conditions/returns-policy-media-goods">-Returns policy for media goods</a></li>

                                  <!--   <li><a href="<?=base_url()?>about/ta-profile-sarah">-T/A Profile:Sarah</a></li> -->

                                 </ul>
                              </li>





                           <div style="clear:both"></div>



                              <li>
                                 <a href="#">English Department</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>about-us/english-department-ielts-and-oet">-IELTS and OET</a></li>
                                     <li><a href="<?=base_url()?>about/special-guest-stars">-Special Guest Stars</a></li>
                                      <li><a href="<?=base_url()?>about/class-times">-Class Times</a></li>
                                 </ul>
                              </li>





                           </ul>
                        </li>
                        <li>
                           <a href="#">Courses</a>
                           <ul>
                              <li>
                                 <a href="#">IELTS</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>ielts">-IELTS Courses</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">OET Courses</a>
                                 <ul>
                                        <li><a href="<?=base_url()?>oet-for-nurses">-OET For Nurses</a></li>
                                      <li><a href="<?=base_url()?>oet-for-doctors">-OET For Doctors</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">NMC CBT Nurses</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>nmc-cbt-for-nurses">-NMC CBT for Nurses</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">NMC OSCE</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>nmc-osce-for-nurses">-NMC OSCE for Nurses</a></li>
                                    <li><a href="<?=base_url()?>nmc-osce-for-midwives">-NMC OSCE for Midwives</a></li>
                                    <li><a href="<?=base_url()?>nmc-osce-for-paediatrics">-NMC OSCE for Paediatrics</a></li>
                                    <li><a href="<?=base_url()?>nmc-osce-for-mental-health">-NMC OSCE for Mental Health</a></li>



                                 </ul>
                              </li>
                              <li>
                                 <a href="#">Plab Courses</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>gmc-plab-for-doctors">-Plab Course</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">Online Courses</a>
                                 <ul>


                                    <li><a href="<?=base_url()?>services-category/online-courses">-Video Courses</a></li>
                                    <li><a href="<?=base_url()?>services-category/online-live-courses">-Live Courses</a></li>


                                 </ul>
                              </li>
                              <li>
                                 <a href="#">Professional Development</a>
                                 <ul>
                                    <li><a target="_blank" href="https://www.medicalcpdpoints.com/">-Professional Development CPD Courses</a></li>
                                 </ul>
                              </li>
                              <li>
                                 <a href="#">Apps</a>
                                 <ul>
                                    <li><a href="<?=base_url()?>about-us/apple-ios-and-google-play-android-apps">-Android and IOS Apps</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </li>
                        <li><a href="<?=base_url()?>locations">Locations</a></li>
                        <li><a href="<?=base_url()?>news">News</a></li>
                        <li><a href="<?=base_url()?>locations/accommodation">Accommodation</a></li>
                        <li><a href="<?=base_url()?>centre-course-dates">Course and Exam Dates</a></li>
                        <li><a href="<?=base_url()?>services-category/books-and-ebooks">Books</a></li>
                        <li><a href="<?=base_url()?>contact-form">Contact us</a></li>
                    <!--     <li>
                           <form style="width: 50px;" action="#"><input type="text" name="" style="border:none; border-bottom: 1px solid #eeeeee; margin-top: 10px; margin-left: 50px;" placeholder="Search"></form>
                        </li> -->
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>