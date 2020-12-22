<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($course_book->first_name);?>,</p>
	<p>We thought you should know:  </p>
	<p>Your tracking number</p>
	<p>Courier: <?=$course_book->courier_name?></p>
	<p>Website: <a href="<?=$course_book->courier_website?>"><?=$course_book->courier_website?></a></p>
	<p>Tracking number: <?=$course_book->tracking_no?></p>
	<p>Thanks</p>
</div>
<?php
$this->load->view('mail/footer');
?>