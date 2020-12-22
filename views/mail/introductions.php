<?php
$this->load->view('mail/header');
?>

<div class="col-12" style="margin-top: 20px;">
	<p>We thought you should know:  </p>
	<p><?=$article?></p>
</div>

<p><b>Recent Work Experience</b></p>

<p style="color:blue">Role 1</p>
<p>Job Title : <?=$role1_job_title?></p>
<p>Name of Employer : <?=$role1_name_of_employer?></p>
<p>Start Date : <?=$role1_start_date?></p>
<p>End Date : <?=$role1_end_date?></p>
<p>Description : <?=$role1_description?></p>
<hr />
<p style="color:blue">Role 2</p>
<p>Job Title : <?=$role2_job_title?></p>
<p>Name of Employer : <?=$role2_name_of_employer?></p>
<p>Start Date : <?=$role2_start_date?></p>
<p>End Date : <?=$role2_end_date?></p>
<p>Description : <?=$role2_description?></p>
<hr />
<p style="color:blue">Role 3</p>
<p>Job Title : <?=$role3_job_title?></p>
<p>Name of Employer : <?=$role3_name_of_employer?></p>
<p>Start Date : <?=$role3_start_date?></p>
<p>End Date : <?=$role3_end_date?></p>
<p>Description : <?=$role3_description?></p>
<?php
if (!empty($more_jobs)) {
	$i = 4;
	foreach ($more_jobs as $value) {
		?>
		<hr />
<p style="color:blue">Role <?=$i?></p>
<p>Job Title : <?=$value->job_title?></p>
<p>Name of Employer : <?=$value->name_of_employer?></p>
<p>Start Date : <?=$value->start_date?></p>
<p>End Date : <?=$value->end_date?></p>
<p>Description : <?=$value->description?></p>
<?php
$i++;
	}
}
?>

<?php
$this->load->view('mail/footer');
?>

