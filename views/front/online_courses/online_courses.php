<?php
$this->load->view('header/header');

?>
   
             <section class="generic-banner relative">
          <div class="overlay overlay-bg"></div>  
        <div class="container">
          <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
              <div class="generic-banner-content">
                <h2 class="text-white">Online Courses</h2>
                
              </div>              
            </div>
          </div>
        </div>
      </section>


          <!-- Start service Area -->
      <section class="service-area section-gap" id="service">
        <div class="container">
<a href="?type=Doctor" class="genric-btn info">For Doctors</a>
<a href="?type=Nurse" class="genric-btn info ">For Nurses</a>
<a href="?type=Allied Health" class="genric-btn info ">For Allied Health</a>
<br /><br />
          <div class="row">
            <?php
foreach ($getBook as $value) {
  ?>
            <div class="col-lg-4 col-md-6">
              <div class="single-service">

 <!--  Youtube Start -->
               <!--   <iframe src="https://www.youtube.com/embed/<?=$value->url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
 <!-- Youtube End -->
 <!-- Vimeo Start -->
             <!-- <iframe src="https://player.vimeo.com/video/<?php echo $value->url;?>" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->

              <img height="216px;" width="250px" src="<?=base_url()?>img/book/<?=$value->photo_image?>" class="img-fluid">
 <!-- Vimeo End -->
<!--  Title Start -->
                <h4><?=$value->name?></h4>
<!-- Title End -->
               <form action="<?=base_url();?>home/addtocart" method="post" >
              <input type="hidden" name="qty" value="1" >
              <input type="hidden" name="id" value="<?=$value->id?>" >
              <input type="hidden" name="name" value="<?=$value->name?>" >
              <input type="hidden" name="price" value="<?=$value->price?>" >
              <button type="button" class="genric-btn info-border"><b style="color: #3e87d9;">£<?=$value->price?></b></button>
              <button class="genric-btn info" style="width: 60%;">Add to Cart</button>
              </form>


              </div>
            </div>
            <?php
}
?>


          </div>
        </div>
      </section>
      <!-- End service Area -->


 


<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>