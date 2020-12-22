 <?php if ($this->session->flashdata('SUCCESS')) {?>
<div role="alert" class="alert alert-success">
<?=$this->session->flashdata('SUCCESS')?>
</div>
<?php }?>
<?php if ($this->session->flashdata('ERROR')) {?>
<div role="alert" class="alert alert-danger">
<?=$this->session->flashdata('ERROR')?>
</div>
<?php }?>
