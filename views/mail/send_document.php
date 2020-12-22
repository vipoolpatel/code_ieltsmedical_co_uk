<?php
$this->load->view('mail/header');
?>
<div class="col-12" style="margin-top: 20px;">
	<p>Hi <?php print_r($first_name);?>,</p>
	<p>We thought you should know:  </p>
	<p>Your requested document: </p>
	<p><?=$title?></p>
	<p><?=$description?></p>
	<p>Download here: <a href="<?=base_url()?>img/document/<?=$upload_file?>" target="_blank">Link</a></p>

	<p>If there are any issues, please let your team know by replying to this email or calling 02036376722.</p>
	<p>Thanks</p>

</div>
<?php
$this->load->view('mail/footer');
?>