<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($firstname);?>,</p>
	<p>Thank you for your order. Your licence key is below: </p>
	<p><b><?=$license_key?></b></p>

	<p>Visit <a href="https://www.ieltsmedical.org/learner/login/learnerlogin">learn.ieltsmedical.org</a> and select CBT Licence.
</p>
</div>
<?php
$this->load->view('mail/footer');
?>