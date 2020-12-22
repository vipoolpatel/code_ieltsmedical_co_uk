<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($flex_course_booking->first_name);?>,</p>
	<p>We thought you should know:  </p>
	<p>Your tracking number</p>
	<p>Courier: <?=$flex_course_booking->courier_name?></p>
	<p>Website: <a href="<?=$flex_course_booking->courier_website?>"><?=$flex_course_booking->courier_website?></a></p>
	<p>Tracking number: <?=$flex_course_booking->tracking_no?></p>
	<p>Thanks</p>
</div>
<?php
$this->load->view('mail/footer');
?>