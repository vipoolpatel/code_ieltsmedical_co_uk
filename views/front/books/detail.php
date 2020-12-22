
<?php
$this->load->view('header/header');
?>
<style type="text/css">
	.about-left p{
		padding-top: 0px;
padding-bottom: 0px;
	}
	.about-left {
	    padding-right: 0%;
    	padding-left: 10%;
	}

</style>
<section class="about-area" id="about" style="margin-top: 180px;">
				<div class="container-fluid">
					<div class="row d-flex justify-content-end align-items-center">
					<div style="clear:both;"></div>
					<div class="container">
				<div class=" col-lg-12 col-md-12">
						<h1><?=$getDetail->name?></h1>
					</div>
					</div>

						<div class="col-lg-6 col-md-12 about-left">



							<p><?=$getDetail->description?> </p>



									<br><br>
									<?php
if ($getDetail->book_video_type == 'License Key') {
	?>
	<button type="button" class="genric-btn info-border"><b style="color: #3e87d9;">£<?=$getDetail->price?></b></button>
	<a href="<?=base_url()?>book-license-key/<?=$getDetail->id?>" class="genric-btn info" style="width: 60%;">Buy Now</a>

		<?php
} else {?>
									<form action="<?=base_url();?>home/addtocart" method="post" >
									<input type="hidden" name="qty" value="1" >
<input type="hidden" name="id" value="<?=$getDetail->id?>" >
<input type="hidden" name="name" value="<?=$getDetail->name?>" >
<input type="hidden" name="price" value="<?=$getDetail->price?>" >
							<button type="button" class="genric-btn info-border"><b style="color: #3e87d9;">£<?=$getDetail->price?></b></button><button class="genric-btn info" style="width: 60%;">Add to Cart</button>	</form>
							<?php }
?>
							<br /><br /><br />

						</div>
						<div class="col-lg-6 col-md-12 about-right no-padding">

							<img class="img-fluid" src="<?=base_url()?>img/book/<?=$getDetail->photo_image?>" alt="">

						</div>
					</div>
				</div>
			</section>
<?php
$this->load->view('header/footer');
?>
