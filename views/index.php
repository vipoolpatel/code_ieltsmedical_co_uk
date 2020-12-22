<?php
$this->load->view('header/header');
?>

     <style type="text/css">
    /*#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=30);
-moz-opacity:0.3;
-khtml-opacity: 0.3;
opacity: 0.3;
z-index: 100;
display: none;
}*/

.cnt223 a{
text-decoration: none;
}
.popup{
width: 100%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 101;
left:33%;
top: 41%;

}
.cnt223{
min-width: 400px;
width: 400px;
min-height: 80px;
margin: 100px auto;
background: #fff;
/*position: relative;*/
z-index: 103;
padding: 15px 35px;
border-radius: 5px;
-webkit-box-shadow: 0px 0px 21px -4px rgba(0,0,0,0.35);
-moz-box-shadow: 0px 0px 21px -4px rgba(0,0,0,0.35);
box-shadow: 0px 0px 21px -4px rgba(0,0,0,0.35);
}
.cnt223 p{
/*clear: both;*/
font-size: 15px;
}
.cnt223 .close{
color: #3e87d9;
font-weight: bold;
}

.cnt223 .x:hover{
cursor: pointer;
}

.scale-up-bottom {
  -webkit-animation: scale-up-bottom 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
          animation: scale-up-bottom 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
}

@-webkit-keyframes scale-up-bottom {
  0% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
    -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
  }
}
@keyframes scale-up-bottom {
  0% {
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
    -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
    -webkit-transform-origin: 50% 100%;
            transform-origin: 50% 100%;
  }
}

@media (max-width: 480px) {
    .cnt223{
     display: none;
    }

}

@media (max-width: 768px) {
  .popup{

left:20%;
top: 30%;

}
  .cnt223{
min-width: 300px;
width: 300px;
min-height: 50px;

  }

 .cnt223 p{
  font-size: 10px;
 }
 .cnt223 h3{
  font-size: 20px;
 }

}
  </style>

      <!-- #header -->
      <!-- start banner Area -->
      <div class="header-video">
         <div class="overlay-video"></div>
         <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="<?=base_url();?>file/video/videoplayback.mp4" type="video/mp4">
         </video>
         <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
               <div class="w-100 text-white">

<?php
$this->load->view('message');
?>
                  <h1 class="display-3" style="color: #fff; margin-top: 100px; font-weight: 500;">IELTS Medical London</h1>
                  <br>
                  <p class="lead mb-0">Medical and Nursing Education for International Doctors and Nurses
                  <br><br>
                     <a class="genric-btn info-border" style="background: none;" href="<?=base_url();?>file/video/videoplayback.mp4" target="_blank">Watch Video</a> &nbsp;
                     <a class="genric-btn info" href="#plan">Learn more</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- End banner Area -->

<!-- model Start -->
      <div class='popup scale-up-bottom' id="">
        <div class="row">
           <div class='cnt223'>
             <a href="" class='close'><i class="fa fa-close"></i></a><br><br>
                <h3 align="center">Welcome to IELTS Medical</h3><br>
                   <p align="center">
                 Click the Book Now button to let us know the best way we can assist you.
               <br/><br>
              <button type="submit" class="genric-btn info BookNow">Book Now</a></button>
             <br/>
         </p>
      </div>
   </div>
</div>


 <!--  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" align="center">
                <h5>Welcome to IELTS Medical</h5><br>
                <p>Click the Book Now button to let us know the best way we can assist you...</p>
                <button type="submit" class="btn btn-primary BookNow" >Book Now</button>
            </div>
        </div>
    </div>
 </div>

 -->


<!-- model End -->

      <!-- Start brand Area -->
      <section class="brand-area pt-40">
         <div class="container">
            <div class="row logo-wrap">
               <a class="col single-img" href="#">
               <img class="d-block mx-auto" src="<?=base_url();?>file/img/NHS-Approved-Supplier-IELTS-Medical.png" >
               </a>
               <a class="col single-img" href="#">
               <img class="d-block mx-auto" src="<?=base_url();?>file/img/cpd.jpg" >
               </a>
            </div>
         </div>
      </section>
      <!-- End brand Area -->
      <!-- Start details Area -->
      <section class="details-area pt-50">
         <div class="container">
            <div class="details-section">
               <div class="row align-items-center">
                  <div class="col-lg-2 detials-left">
                     <h5>Mrs. M. Skinner</h5>
                     <h5 class="text-uppercase">PRACTICE DEVELOPMENT MANAGER</h5>
                     <p>
                        Multinational Clinic
                     </p>
                  </div>
                  <div class="col-lg-9 detials-right">
                     <p>
                        "Our staff have appreciated and praised the support from day one and we know that our success rates would have not been as good as they were without their assistance, guidance and continuous monitoring of our candidates."
                     </p>
                  </div>
               </div>

               <div class="row align-items-center">
                  <div class="col-lg-2 detials-left">
                     <h5>Ms. E. Webber</h5>
                     <h5 class="text-uppercase">LINE MANAGER</h5>
                     <p>
                        NHS Trust
                     </p>
                  </div>
                  <div class="col-lg-9 detials-right">
                     <p>
                       "Thank you for your team for the help they have given our recruits – so far 100%*!!" <br />
                       * First time pass rate.
                     </p>
                  </div>
               </div>


            </div>
         </div>
      </section>
      <!-- End details Area -->
      <!-- Start price Area -->
      <section class="price-area section-gap" id="plan">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="menu-content pb-60 col-lg-8">
                  <div class="title text-center">
                     <h1 class="mb-10">Doctors and Nurses - Which Exams Are You Taking?</h1>
                     <p>Choose Your Pathway</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4">
                  <div class="single-price">
                     <div class="end-sec">
                        <a href="<?=base_url()?>i-am-a-doctor">
                        <img class="img-fluid" src="<?=base_url();?>file/img/3bF.png">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="single-price">
                     <div class="end-sec">
                        <a href="<?=base_url()?>i-am-a-nurse">
                        <img  class="img-fluid" src="<?=base_url();?>file/img/3bS.png">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="single-price">
                     <div class="end-sec">
                        <a href="<?=base_url()?>i-am-an-ahp">
                        <img  class="img-fluid" src="<?=base_url();?>file/img/3bQ.png">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End price Area -->
      <!-- Start about Area -->
      <section class="about-area" id="about">
         <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
               <div class="col-lg-6 col-md-12 about-left">
                  <h1>You deserve the best</h1>
                  <p>
                     Our mission is to help you register and practice in the UK by assisting you with the examinations that you need to pass in order to work. Our Nurse and Medical Education Teams are committed to seeing you through as quickly and as efficiently as possible.
                  </p>
                  <a href="#service" class="primary-btn header-btn text-uppercase">See Details</a>
               </div>
               <div class="col-lg-6 col-md-12 about-right no-padding">
                  <img class="img-fluid" src="<?=base_url();?>file/img/lvn-certification-class.jpg" alt="">
               </div>
            </div>
         </div>
      </section>
      <!-- End about Area -->
      <!-- Start service Area -->
      <section class="service-area section-gap" id="service">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="col-md-8 pb-40 header-text">
                  <h1>The Requirements</h1>
                  <p>
                     Set by UK Regulators
                  </p>
               </div>
            </div>
            <div class="row">
             <div class="col-lg-4 col-md-6">
                  <div class="single-service">
                     <h4><span class="lnr lnr-license"></span>CURRENT GMC (2018)</h4>
                     <p>
                     <ul>
                        <li><b>Regulatory body:</b> GMC (Doctors)</li>
                        <li><b>IELTS Academic:</b> Overall 7.5</li>
                        <li><b>Minimum scores required:</b> 7.0</li>
                        <li><b>OET (Medicine):</b> B in each skill.One sitting</li>
                        <li><b>Next steps (non-EU):</b> Plab 1 & 2</li>
                     </ul>
                     </p>
                  </div>
               </div>

                <div class="col-lg-4 col-md-6">
                  <div class="single-service">
                     <h4><span class="lnr lnr-license"></span>CURRENT NMC (2019)</h4>
                     <p>
                     <ul>
                        <li><b>Regulatory body:</b> NMC (Nurses)</li>
                        <li><b>IELTS Academic:</b> Overall 7.0</li>
                        <li><b>Minimum scores required:</b> 7.0</li>
                        <li><b>OET (Nursing): </b> From 28/01/20 a C+ in OET writing is permitted</li>
                        <!-- <li><b>OET (Nursing): </b> B in each skill. Two sittings allowed. No score lower than 6.5 IELTS / C+ OET</li> -->
                        <li><b>Next steps:</b> CBT exam</li>
                     </ul>
                     </p>
                  </div>
               </div>


               <div class="col-lg-4 col-md-6">
                  <div class="single-service">
                     <h4><span class="lnr lnr-license"></span>CURRENT GPHC (2016)</h4>
                     <p>
                     <ul>
                        <li><b>Regulatory body:</b> GPhC (Pharmacists)</li>
                        <li><b>IELTS Academic:</b> Overall 7.0</li>
                        <li><b>Minimum scores required:</b> 7.0</li>
                        <li><b>Next steps:</b> Proceed to Statutory Membership Exam</li>
                        <br>
                        <li></li>
                     </ul>
                     </p>
                  </div>
               </div>`

               <div class="col-lg-4 col-md-6">
                  <div class="single-service">
                     <h4><span class="lnr lnr-license"></span>CURRENT GDC (2018)</h4>
                     <p>
                     <ul>
                        <li><b>Regulatory body:</b> GDC (Dentists)</li>
                        <li><b>IELTS Academic:</b> Overall 7.0</li>
                        <li><b>Minimum scores required:</b> 6.5</li>
                        <li><b>OET (Medicine):</b> B in each skill. One sitting</li>
                        <li><b>Next steps:</b> ORE Exam</li>
                     </ul>
                     </p>
                  </div>
               </div>

               <div class="col-lg-4 col-md-6">
                  <div class="single-service">
                     <h4><span class="lnr lnr-license"></span>CURRENT RCVS (2019)</h4>
                     <p>
                     <ul>
                        <li><b>Regulatory body:</b> RCVS (Vets)</li>
                        <li><b>IELTS Academic:</b> Overall 7.0</li>
                        <li><b>Minimum scores required:</b> 7.0</li>
                        <li><b>OET (Veterinary Science):</b> B in each skill</li>
                        <li><b>Next steps:</b> Proceed to Statutory Membership Exam</li>
                     </ul>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End service Area -->
      <!-- Start info Area -->
      <section class="info-area relative section-gap">
         <div class="overlay overlay-bg"></div>
         <div class="container">
            <div class="row justify-content-start">
               <div class="col-lg-5">
                  <h1 class="text-white">Excellent <br>
                     Pass Rates
                  </h1>
                  <p class="pt-20 pb-20">
                     Our service begins from the start of your journey to the UK. Our team includes trained English language professionals who are ready and willing to assist you with your IELTS and OET either online or from our London centres. Then, if you're a nurse who has qualified outside of the EU, our Nurse Education Team of Senior Nurses are on hand to assist you with the NMC CBT and NMC OSCE. If you're a doctor who has qualified outside of the EU, then our Medical Education Team of Practicing UK Doctors are on hand to assist you with the Plab 1 and Plab 2 exams.
                  </p>
                  <a id="my7" data-toggle="modal" data-target="#id07" class="primary-btn header-btn text-uppercase" href="#">Speak to us Today</a>
               </div>
            </div>
         </div>
      </section>
      <!-- End info Area -->
      <!-- Start faq Area -->
      <section class="faq-area section-gap" id="faq">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="menu-content pb-60 col-lg-8">
                  <div class="title text-center">
                     <h1 class="mb-10">Why IELTS Medical?</h1>
                     <p></p>
                  </div>
               </div>
            </div>
            <div class="row d-flex align-items-center">
               <div class="counter-left col-lg-3 col-md-3">
                  <div class="single-facts">
                     <h2><span class="counter">1800</span>+</h2>
                     <p>Trained</p>
                  </div>
                  <div class="single-facts">
                     <h2><span class="counter">100</span>%</h2>
                     <p>Pass rate</p>
                  </div>
                  <div class="single-facts">
                     <h2><span class="counter">90</span>+</h2>
                     <p>Courses</p>
                  </div>
                  <div class="single-facts">
                     <h2><span class="counter">20</span>+</h2>
                     <p>Trusts</p>
                  </div>
               </div>
               <div class="faq-content col-lg-9 col-md-9">
                  <div class="single-faq">
                     <h2>
                        How many healthcare professionals trained?
                     </h2>
                     <p>
                        Over 1800 healthcare professionals have trained with us since 2017
                     </p>
                  </div>
                  <div class="single-faq">
                     <h2>
                        What about pass rates?
                     </h2>
                     <p>We have really great pass rates eg.</p>
                     <p>
                        100% pass rate for 4-day CBT Courses and 97% pass rate for 5-day OSCE Course
                     </p>
                  </div>
                  <div class="single-faq">
                     <h2>
                        How many courses are you providing?
                     </h2>
                     <p>
                        There are 90+ Courses for IELTS, OET, CBT, OSCE and Plab
                     </p>
                  </div>
                  <div class="single-faq">
                     <h2>
                        What is the recognition?
                     </h2>
                     <p>
                     We are an approved supplier of educational services (including CPD training) to 20+ NHS Trusts
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End faq Area -->
      <!-- Start book Area -->
      <section class="faq-area section-gap" id="books" style="padding-bottom: 0px; padding-top:  0px;">
         <a href="<?=base_url()?>services-category/books-and-ebooks"><img src="<?=base_url();?>file/img/books.png" class="img-fluid" style="-webkit-box-shadow: 0px 0px 27px -4px rgba(0,0,0,0.42);
            -moz-box-shadow: 0px 0px 27px -4px rgba(0,0,0,0.42);
            box-shadow: 0px 0px 27px -4px rgba(0,0,0,0.42);"></a>
      </section>
      <section class="testomial-area section-gap">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="menu-content pb-60 col-lg-8">
                  <div class="title text-center">
                     <h1 class="mb-10">Testimonials from our Clients</h1>
                     <p>Who are all now either registered and practising nursing or medicine within the UK or one step closer</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="active-testimonials-slider">
                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial1-ieltsmedical.png" alt="Nurse Pramkila, Qualified in India">
                     <p class="desc">
                        Choosing the IELTS Medical was no doubt one of the best decisions I made in my life!
                        I passed my Osce on my first attempt!!
                        This 3-day intensive course I did with them was just brilliant!! All thanks to Nonny and Claire!!
                        I couldn’t have asked for any better trainer than the amazing, Claire..She was always upto date with her knowledge..ever so respectful and calm and patient with us all. Great study and practice materials too!! I would definitely recommend this institute to the overseas nurses looking for osce training. You won’t regret it guys!!
                     </p>
                     <h4>Nurse Pramkila, Qualified in India</h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial2-ieltsmedical.png" alt="Petros, Doctor, Qualified in Greece">
                     <p class="desc">
                     As a doctor from Greece who was about to come to London, I tried to find a school that could combine an effective way of teaching English to health professionals as well as handling the problems doctors usually face in this process. That is how I came up with IELTS Medical LTD. I enrolled in the course to gain a 7.5 overall IELTS score. The team consists of experiemced teachers specialized in IELTS exams. Now, I have completed the course, gained GMC registration and I am now working as a doctor in my field. They also help me to find accommodation as well as to settle out in London. It is my pleasure to write this review. IELTS Medical's work is of high quality and I would highly recommend them.
                     </p>
                     <h4>Petros, Doctor, Qualified in Greece</h4>
                  </div>


                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial3-ieltsmedical.png" alt="Nurse Linda, Qualified in Nigeria">
                     <p class="desc">
                        Having battled with IELTS for years, spending a whole lot in various training institutes not to mention the time, stress and emotional difficulties encountered. I decided to try OET after much encouragement from friends.
                        The educational, psychological and odd hours academic support provided by IELTS Medicals in a friendly and learning promoting environment is just more than SUPERB. A training institution which believes in individualised uniqueness and speed which has definitely paid off. Above all, God made it happen.
                        I strongly recommend IELTS Medicals, could have given more than 5 star if available.
                     </p>
                     <h4>Nurse Linda, Qualified in Nigeria</h4>
                  </div>
                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial4-ieltsmedical.png" alt="Larisa, Doctor, Qualified in Romania">
                     <p class="desc">
                        As a young doctor having recently graduated, IELTS medical helped me achieve my career goal of working for the NHS in London through their vital support in OET exam. The courses were incredibly well delivered and tailored to my needs, I have been given the guidance, feedback and tips that helped me get the scores. I cannot thank Nonny enough for her kindness and ongoing support throughout this journey, as well as to the dedicated tutor Janet offering her support with dedication and professionalism. Thank you! Larisa
                     </p>
                     <h4>Larisa, Doctor, Qualified in Romania</h4>
                  </div>


                   <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial5-ieltsmedical.png" alt="Nurse May, Qualified in Japan">
                     <p class="desc">
                        I attended advanced writing class for IELTS. The class itself was very good most of the times. The teacher would give me a topic to write for task 1 and 2, and expanded on the views of the topic to give me ideas to write. She also helped me understand what the examiners were looking for and how to construct an essay for different pattern of questions. Moreover, she would mark my homework while I was writing about the topic she gave me. It was a 1:1 private class which meant the class matched my needs. For example, I was also worried about my speaking, so she helped me with that too. I have passed the score I needed, and I appreciate the help and dedication. There were a few things that I thought could be improved, but this has been dealt with and has been promised it will change. Overall, I am satisfied with this school and the price I payed. Thank you very much!
                     </p>
                     <h4>Nurse May, Qualified in Japan </h4>
                  </div>

                     <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial6-ieltsmedical.png" alt="Khadega, Doctor, Qualified in Yemen">
                     <p class="desc">
                        The best place ever. I was advised one year ago by a friend of mine to take an OET course in this place, but I didn’t. I took an online course instead. Finally I took a remedy course with an amazing lady (Nonny). I would like to thank her for everything she has done for me. I finally got my desired score after many unsuccessful attempts in the past three years for IELTS and two times for OET. It was a one to one course for the writing subtext and in each session, she told me my mistakes and gave me the grammar lessons that I really needed to improve my writing. On top of that, I could ask any questions even if it was not related to the writing part.
                     </p>
                     <h4>Khadega, Doctor, Qualified in Yemen </h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial7-ieltsmedical.png" alt="Nurse Rawinkal, Qualified in India">
                     <p class="desc">
                       IELTS Medical is an amazing institute. Very focused on providing the students what they need to get qualified / pass the various exams. Truly a caring environment. I was fortunate to be taught by Kristen - she was wonderful and the reason I passed my exam the first time.
                     </p>
                     <h4>Nurse Rawinkal, Qualified in India </h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial8-ieltsmedical.png" alt="Samuel, Doctor, Qualified in Pakistan">
                     <p class="desc">
                       One of the best institute for medics. Had a great and valuable time while preparing with them for three weeks. Really appreciate their hard work ,sincerity and feedbacks.
                     </p>
                     <h4>Samuel, Doctor, Qualified in Pakistan  </h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial9-ieltsmedical.png" alt="Nurse Marie, Qualified in France">
                     <p class="desc">
                       Amazing experience with IELTS medical! I started my classes for IELTS and finally changed it for OET. Thanks to all their support and English classes, I finally pass my exam. They are really professional and they really care about you. Nonny is amazing, nice and supportive. I definitely not regret to put a litlle bit of my money in these classes! I recommend it to everyone !
                     </p>
                     <h4>Nurse Marie, Qualified in France </h4>
                  </div>


                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial10-ieltsmedical.png" alt="Amr, Doctor, Qualified in Egypt">
                     <p class="desc">
                       Finally cleared IELTS: Listening 8 Reading 8.5 Writing 7 Speaking 8 In the light of that, I'd like to thank lovely nony for her great help and kindness. Also, i highly recommend this place for both ielts course and exam.
                     </p>
                     <h4>Amr, Doctor, Qualified in Egypt</h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial11-ieltsmedical.png" alt="Nurse Meg, Qualified in the Philippines">
                     <p class="desc">
                       the course was informative and staff was very supportive 😊 I will recommend, as it helped me passed my OSCE! big thanks to clare and nonny 👍😊
                     </p>
                     <h4>Nurse Meg, Qualified in the Philippines</h4>
                  </div>

                   <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial12-ieltsmedical.png" alt=" Ece, Doctor, Qualified in Turkey">
                     <p class="desc">
                       Through out my IELTS journey IELTS Medical Ltd. was always with me and always helpful. Finally I obtained sufficient score: Listening:8 Reading:8.5 Speaking:7.5 Writing:7.5 Overall:8 Speacially i had problem with writing and with the help from well trained tutors in IELTS Medical my score has increased. My lessons were mostly one to one and it helped me a lot. All my essays were checked very quickly and i had the chance to discuss my mistakes with the tutors. I want to thank to Nonny for all her support. I definitely recommend this course for IELTS and also OET.
                     </p>
                     <h4>Ece, Doctor, Qualified in Turkey</h4>
                  </div>

                       <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial13-ieltsmedical.png" alt=" Nurse Ana, Qualified in the Philippines


">
                     <p class="desc">
                      Thank you to Claire and Nonny for all the guidance and help! I passed the OSCE in one seating. Everything taught to us were on point! I highly recommend Claire as she definitely knows what the assessors expect from the examinees. Thank you once again!
                     </p>
                     <h4> Nurse Ana, Qualified in the Philippines </h4>
                  </div>

                     <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial14-ieltsmedical.png" alt="Pharmacist Malika, Qualified in France ">
                     <p class="desc">
                      I highly recommend this centre to get a high IELTS score. The teachers are just amazing, helpful, nice and efficient. The great value of IELTS Mdical is based on Nonny who is very professional, attentive to the students and very reactive. Thanks to those courses I was able to deal with the IELTS with less stress, Nonny even invited a yoga teacher during the mock test so we can learn to manage our stress. The latter was really unnexpected and innovatieve. I want to take this opportunity to thanks Nonny for all her help, support and mostly for her nice smile. I have now passed the exam and I have found a job as a pharmacist. Many thanks again.
                     </p>
                     <h4>Pharmacist Malika, Qualified in France </h4>
                  </div>

                   <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial15-ieltsmedical.png" alt="Nurse Alysha, Qualified in Canada">
                     <p class="desc">
                      Thank God for this OSCE course!! I did the 3 day intensive OSCE course and I passed my OSCE on my first attempt. A huge thank you to Claire and Nonny! They were very supportive and helpful during this OSCE preparation. I would definitely recommend this to other international nurses looking to prepare for the OSCE.
                     </p>
                     <h4>Nurse Alysha, Qualified in Canada</h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial16-ieltsmedical.png" alt="Nurse Krista, Qualified in Canada">
                     <p class="desc">
                       Thank you so, so much again Claire and Nonny,  I'm absolutely grateful for all the support!! Xx
                     </p>
                     <h4>Nurse Krista, Qualified in Canada</h4>
                  </div>

                  <div class="single-testimonial item">
                     <img class="mx-auto" src="<?=base_url();?>file/img/testimonial17-ieltsmedical.png" alt="Nurse Krista, Qualified in Canada">
                     <p class="desc">
                       I have passed OET exam in my first attempt on the 9th of November. I did OET MEDICINE COURSE at IELTS MEDICAL LONDON for 3 weeks duration.It helped me a lot to pass this exam and also I did the mock test conducted by them...It helped me to find out my weak points before the exam.Nonny was my teacher and her teaching is excellent. THANK YOU for IELTS MEDICAL LONDON.
                     </p>
                     <h4>Gayani, Doctor, Qualified in Sri Lanka</h4>
                  </div>




               </div>
            </div>
         </div>
      </section>
      <!-- Start latest-blog Area -->
      <section class="latest-blog-area section-gap" id="blog">
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="menu-content pb-60 col-lg-8">
                  <div class="title text-center">
                     <h1 class="mb-10">Latest News from our Blog</h1>
                     <!-- <p>Who are in extremely love with eco friendly system.</p> -->
                  </div>
               </div>
            </div>
            <div class="row">
               <?php
foreach ($getBlog as $value) {
	?>
               <div class="col-lg-6 single-blog">
              <img  style="width:100%;" class="img-fluid" src="<?=base_url()?>img/blog/<?=$value->photo_image?>" alt="<?=$value->title?>">
              <br /><br />
              <a href="<?=base_url($value->slug);?>"><h4><?=$value->title?></h4></a><br>
              <p>
               <?=strip_tags(strtolower(substr($value->description, 0, 200)))?>... <a href="<?=base_url($value->slug);?>">Read More </a>
              </p>
              <p class="post-date"><?=date('d-m-Y h:i A', strtotime($value->created_date));?></p>
            </div>
               <?php
}
?>
            </div>
         </div>
      </section>
      <!-- End latest-blog Area -->
      <!-- Start call-action Area -->
      <section class="call-action-area section-gap">
         <div class="container">
            <div class="row align-items-center justify-content-center">
               <div class="col-lg-9">
                  <h1 class="text-white">Looking for More Details?</h1>
                  <p class="text-white pt-20 pb-20">
                     Reach out to us - we can help you!
                  </p>
                  <a id="my8" data-toggle="modal" data-target="#id08" class="primary-btn header-btn text-uppercase" href="#">REQUEST A FREE CONSULTATION</a>
               </div>
            </div>
         </div>
      </section>
      <!-- End call-action Area -->

<!-- start footer Area -->
 <div class="modal fade" id="id07" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" >Call Us  </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <h1>+442036376722</h1>
            <hr>
        <a class="btn btn-primary btn-user btn-block" href="+442036376722">Call Now</a>
        </div>


      </div>
    </div>
  </div>


   <div class="modal fade" id="id08" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Request Free Consultation</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="user" method="post" action="<?=base_url()?>home/request_free_consultation">
                <div class="form-group">
                  <input type="text" required="" name="name" class="form-control form-control-user" id="exampleInputid" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="email" required="" name="email" class="form-control form-control-user" id="exampleInputid" placeholder="Your E-mail Address">
                </div>
                <div class="form-group">
                  <input type="text" required="" name="phone" class="form-control form-control-user" id="exampleInputid" placeholder="Your Contact Number">
                </div>




                <div class="form-group">
<?php
$firstNumber = mt_rand(0, 9);
$SecondNumber = mt_rand(0, 9);
echo $firstNumber . '+' . $SecondNumber;
?>
     <input type="hidden"  name="current_captcha"  value="<?=$firstNumber + $SecondNumber?>">
      <input type="text" name="captcha" required  class="form-control" value="" placeholder="Verification Code" >

                </div>


                 <div class="mt-10" >
                    <input type="checkbox" required=""> By clicking register, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
                    <br><br>
                  </div>



                <button class="btn btn-primary btn-user btn-block" type="submit">Request</button>
                <hr>


              </form>
        </div>

      </div>
    </div>
  </div>




 <div class="modal fade" id="id02" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Account</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
         <h5 align="center">Welcome back</h5>
         <p  align="center">Register or log in to access your account</p> <br>
          <form class="user" method="POST" action="<?=base_url()?>login/login">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user" required id="exampleInputid" placeholder="Your Username *">
                </div>
                <div class="form-group">
                  <input type="text" name="email" class="form-control form-control-user" required id="exampleInputid" placeholder="Your Email *">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" required id="exampleInputid" placeholder="Your Password *">
                </div>
                <div class="form-group">
                  <input type="password" name="confirm_password" class="form-control form-control-user" required id="exampleInputid" placeholder="Your Confirm Password *">
                </div>

                    <div class="form-group">
<?php
$firstNumber_acc = mt_rand(0, 9);
$SecondNumber_acc = mt_rand(0, 9);
echo $firstNumber_acc . '+' . $SecondNumber_acc;
?>
     <input type="hidden"  name="current_captcha"  value="<?=$firstNumber_acc + $SecondNumber_acc?>">
      <input type="text" name="captcha" required  class="form-control" value="" placeholder="Verification Code" >

                </div>


                 <div class="mt-10" >
                    <input type="checkbox" required=""> By clicking register, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
                    <br><br>
                  </div>

                <button class="btn btn-primary btn-user btn-block" type="submit"> Register</button>
                <hr>


              </form>
        </div>

      </div>
    </div>
  </div>




      <!-- The Modal  -->
 <div class="modal fade" id="id04" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send us your document</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
               <form class="user" method="POST" action="<?=base_url()?>home/document" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="file" name="photo_image" class="form-control form-control-user" id="exampleInputid">
                </div>
                <div class="form-group">
                  <input type="text" required name="document" class="form-control form-control-user" id="exampleInputid" placeholder="Document Title">
                </div>
                <div class="form-group">
                  <textarea class="form-control form-control-user" name="message" id="exampleInputid" required placeholder="Message"></textarea>
                </div>
                <hr>
                <p>Contact Informtion</p>
                <div class="form-group">
                  <input type="email" name="email" required class="form-control form-control-user" id="exampleInputid" placeholder="Your Email">
                </div>
                 <div class="form-group">
                  <input type="text" name="firstname" required class="form-control form-control-user" id="exampleInputid" placeholder="First Name">
                </div>
                 <div class="form-group">
                  <input type="text" name="lastname" class="form-control form-control-user" id="exampleInputid" placeholder="Last name">
                </div>
               <div class="form-group">
                  <input type="text" name="phone" class="form-control form-control-user" id="exampleInputid" placeholder="Phone">
                </div>

                 <div class="form-group">
<?php
$firstNumber_doc = mt_rand(0, 9);
$SecondNumber_doc = mt_rand(0, 9);
echo $firstNumber_doc . '+' . $SecondNumber_doc;
?>
     <input type="hidden"  name="current_captcha"  value="<?=$firstNumber_doc + $SecondNumber_doc?>">
      <input type="text" name="captcha" required  class="form-control" value="" placeholder="Verification Code" >

                </div>

                 <div class="mt-10" >
                    <input type="checkbox" required=""> By clicking send now, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
                    <br><br>
                  </div>


                 <button class="btn btn-primary btn-user btn-block" type="submit"> Send Now</button>

              </form>
        </div>

      </div>
    </div>
  </div>

   <!-- The Modal  -->
 <div class="modal fade" id="id06" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" >Our Head Office  </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9931.195145742277!2d-0.1563661!3d51.5169074!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce80dd3358b96558!2sIELTS%20Medical%20London!5e0!3m2!1sen!2slk!4v1566895754779!5m2!1sen!2slk" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            <hr>
            <p align="center">22-25 Portman Cl, Marylebone, London W1H 6BS, UK</p>
        </div>


      </div>
    </div>
  </div>



   <div class="modal fade" id="id03" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="accordion" id="accordionExample">

            <?php
foreach ($getCalender as $value) {

	?>
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?=$value->id?>" aria-expanded="true" aria-controls="collapseOne<?=$value->id?>">
        <?=$value->main_title?>

        </button>
      </h2>
    </div>

    <div id="collapseOne<?=$value->id?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

         <div class="row">

         <div class="col-sm-2">
                <img src="<?=base_url()?>img/calender/<?=$value->photo_image?>" height="100px;" width="100px;"  alt="" title="" />
         </div>

            <div class="col-sm-7">
                  <b><?=$value->sub_title?></b>
                  <p><?=$value->description?></p>
            </div>
             <div class="col-sm-1">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <p><b>Free</b></p>
            </div>

            <div class="col-sm-2">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <p><b><?=$value->time?></b><p>
                    <button data-val="<?=$value->main_title?>" id="<?=$value->id?>" class="btn btn-primary BookSession" type="button">Book</button>
            </div>
         </div>



    </div>
  </div>
</div>
 <?php }
?>

      </div>

        </div>

      </div>
    </div>
  </div>


<style type="text/css">
    .modal { overflow: auto !important; }
</style>

      <!-- The Modal  -->
 <div class="modal fade" id="BookSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title getCalendarTitle" id="exampleModalLabel" >Book Calendar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
               <form class="user" method="POST" action="<?=base_url()?>home/submit_calendar" enctype="multipart/form-data">
               <input type="hidden" name="calendar_id" id="calendar_id" required >
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" required class="form-control form-control-user" placeholder="First Name">
                </div>
                 <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" required class="form-control form-control-user"  placeholder="Last Name">
                </div>
                 <div class="form-group">
                  <label>Email</label>
                  <input type="email" required name="email" class="form-control form-control-user"  placeholder="Email Address">
                </div>

                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" required name="phone_number" class="form-control form-control-user"  placeholder="Phone Number">
                </div>

                <div class="form-group">
                  <label>Date</label>
                  <input type="date" required name="book_date" class="form-control form-control-user"  placeholder="Date">
                </div>

                <div class="form-group">
                  <label>Time</label>
                  <input type="time" required name="book_time" class="form-control form-control-user"  placeholder="Time">
                </div>

                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control"  name="address" required placeholder="Address"></textarea>
                </div>

                <div class="form-group">
                  <label>Notes</label>
                  <textarea class="form-control" name="notes" required placeholder="Notes"></textarea>
                </div>

                <div class="form-group">
<?php
$firstNumber_Book = mt_rand(0, 9);
$SecondNumber_Book = mt_rand(0, 9);
echo $firstNumber_Book . '+' . $SecondNumber_Book;
?>
     <input type="hidden"  name="current_captcha"  value="<?=$firstNumber_Book + $SecondNumber_Book?>">
      <input type="text" name="captcha" required  class="form-control" value="" placeholder="Verification Code" >

                </div>

                  <div class="mt-10" >
                    <input type="checkbox" required=""> By clicking submit, you agree to our <a target="_blank" href="<?=base_url()?>about/terms-and-conditions">Terms of Use</a> and <a href="<?=base_url()?>about/terms-and-conditions/privacy-policy" target="_blank">Privacy Policy</a>
                    <br>
                  </div>


                 <button class="btn btn-primary btn-user btn-block" type="submit"> Submit</button>
              </form>
        </div>

      </div>
    </div>
  </div>




 <!--  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" align="center">
                <h5>Welcome to IELTS Medical</h5><br>
                <p>Click the Book Now button to let us know the best way we can assist you...</p>
                <button type="submit" class="btn btn-primary BookNow" >Book Now</button>
            </div>
        </div>
    </div>
 </div>

 -->

<?php
$this->load->view('header/footer');
?>

<!--  <script type="text/javascript" src="file/js/jquery-1.8.2.js"></script> -->




   <script type="text/javascript">
    $(document).ready(function(){

         $("#myModal").modal('show');

        $('.BookNow').click(function(){
            $("#myModal").modal('hide');
            $("#id03").modal('show');
        });

        $('.BookSession').click(function(){
            $('#calendar_id').val($(this).attr('id'));
            $('.getCalendarTitle').html($(this).attr('data-val'));
            $("#id03").modal('hide');
            $("#BookSession").modal('show');

        });



    });


</script>
  <script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});




$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>



<!-- End footer Area -->



