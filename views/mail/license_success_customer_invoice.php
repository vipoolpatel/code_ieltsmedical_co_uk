<?php
$this->load->view('mail/header');
?>

<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($firstname);?>,</p>
	<p>We thought you should know: </p>
	<p>This is your licence key order invoice.</p>
	<p>Here is your payment link: <a href="<?=$link?>" target="_blank"><?=$link?></a></p>
	<p>(Please note that you can only access this link by web ie. on a PC/Laptop - not mobile)</p>

	<p>Alternatively, you may pay by bank transfer to:</p>

<p>Bank: Barclays <br />
Name: IELTS Medical <br />
Sort: 20-45-45 <br />
Account Number: 13304175 <br />
The last 6 digits of the following number: <br />
Ref: <?=$reference_number?></p>


	<p>If there are any issues, please let your team know by replying to this email or calling 02036376722.</p>
	<p>Thank you for choosing IELTS Medical.</p>
</div>

<?php
$this->load->view('mail/footer');
?>
