<?php
$this->load->view('panel/header/header');
?>
<body>
<div class="page-container">
<?php
$this->load->view('panel/header/sidebar');
?>
<div class="page-content">
<?php
$this->load->view('panel/header/top_header');
?>
<ul class="breadcrumb">
<li><a>Exam</a></li>
</ul>
<div class="page-title">
<h2><span class="fa fa-arrow-circle-o-left"></span> Edit Exam</h2>
</div>
<div class="page-content-wrap">
<div class="row">
<div class="col-md-12">
<form class="form-horizontal" id="add_app" method="post" action="" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">Edit Exam</h3>
</div>

<div class="panel-body">

    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Candidate Number <span style="color :red;"> *</span> </label>
        <div class="col-md-6 col-xs-12">
            <div class="">
                <input name="text" type="text"  placeholder="Candidate Number" class="form-control" value="<?=set_value('candidate_number');?>" />
                <div class="error"><?php echo form_error('candidate_number'); ?></div>
            </div>
        </div>
    </div>



     <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Preferred test location?<span style="color: red;"> *</span></label>
        <div class="col-md-6 col-xs-12">
            <div class="">
            <!-- <input name="id" required type="hidden" value="<?=$apps->id?>" /> -->
            <select name="course_main_id" class="form-control">

                <option value="">Select Preferred test location</option>
                    <?php
foreach ($course_date as $row) {
	?>
                      <option <?=($row->id == $apps->course_main_id) ? 'selected' : ''?>  value="<?=$row->id?>"><?=$row->course_main?></option>
                    <?php }?>
            </select>
         </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">First Name <span style="color :red;"> *</span> </label>
        <div class="col-md-6 col-xs-12">
            <div class="">
                <input name="text" type="text"  placeholder="First Name" class="form-control" value="<?=set_value('first_name');?>" />
                <div class="error"><?php echo form_error('first_name'); ?></div>
            </div>
        </div>
    </div>

<div class="form-group">
        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
        <div class="col-md-6 col-xs-12">
            <div class="">
                <input name="text" type="text"  placeholder="Last Name" class="form-control" value="<?=set_value('last_name');?>" />
                <div class="error"><?php echo form_error('last_name'); ?></div>
            </div>
        </div>
    </div>




</div>
<div class="panel-footer">
    <button class="btn btn-primary pull-right">Submit</button>
</div>
</div>
</form>

</div>
</div>

</div>
</div>
</div>
<?php
$this->load->view('panel/header/footer');
?>


</body>
</html>




<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {

$( ".datepicker" ).datepicker();


});

</script>




