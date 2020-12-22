<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($firstname);?>,</p>
	<p>We thought you should know:  </p>
	<p>Username: <?=$username?></p>
	<p>Password: <?=$newpasdsword?></p>
	<p>Thanks</p>
</div>
<?php
$this->load->view('mail/footer');
?>
