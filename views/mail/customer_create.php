<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($username);?>,</p>
	<p>We thought you should know:  </p>
	<p>Username: <?=$email?></p>
	<p>Password: <?=$password?></p>
	<p><a href="<?=base_url()?>my-account" target="_blank">Login</a></p>
	<p>Thanks</p>
</div>
<?php
$this->load->view('mail/footer');
?>