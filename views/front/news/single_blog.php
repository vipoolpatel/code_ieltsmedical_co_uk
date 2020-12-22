
<?php
$this->load->view('header/header');
?>

<link rel="stylesheet" href="<?=base_url()?>file/css/single_blog.css">

			  <!-- <div id="post-header" class="page-header" style="margin-top: 100px;">
				<div class="background-img" style="background-image: url('<?=base_url()?>img/blog/<?=$getBlog->photo_image?>');"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<span class="post-date"><?=date('d M Y', strtotime($getBlog->created_date))?></span>
							</div>
							<h1><?=$getBlog->title?></h1>
						</div>
					</div>
				</div>
			</div> -->


			<!-- Start faq Area -->
			<section class="faq-area section-gap" id="faq">
				<div class="container">
					<div class="row">
                     <div class="col-lg-12  col-md-12">
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-row sticky-container">
							<div class="main-post">
<br /><br />

<h1><?=$getBlog->title?></h1>
<hr />
<br />
<div class="col-md-12" style="text-align: center;">
<img src="<?=base_url()?>img/blog/<?=$getBlog->photo_image?>" style="max-width: 100%;" alt="<?=$getBlog->title?>" title="<?=$getBlog->title?>" />
</div>
<br />
<br />

								<?=$getBlog->description?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

					</div>
					</div>
				</div>
			</section>
			<!-- End faq Area -->
<?php
$this->load->view('header/common_book');
?>

<?php
$this->load->view('header/footer');
?>