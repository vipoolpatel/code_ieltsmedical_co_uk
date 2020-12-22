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
                    <li><a>CenterCourse Dates</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Center Course Dates List</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ($this->session->flashdata('SUCCESS')) {?>
                                <div role="alert" class="alert alert-success">
                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only"><?=$this->config->item('Close')?></span></button>
                                    <?=$this->session->flashdata('SUCCESS')?>
                                </div>
                            <?php }?>
                             <a href="<?=base_url()?>panel/centercoursedates/add_centercoursedates" class="btn btn-primary" title="Add New Center Course Dates"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Center Course Dates</span></a>

                              <a href="<?=base_url()?>panel/centercoursedates/add_centre_course_upload_excel" class="btn btn-primary" title="Add New Center Course Dates Upload Excel"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Center Course Dates Upload Excel</span></a>

                              <a href="<?=base_url()?>panel/centercoursedates/list_centre_course_dates_booked" class="btn btn-info" title="Center Course Dates Booked"><span class="bold">Center Course Dates Booked</span></a>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Center Course Dates Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">
                                <input type="hidden" value="<?=!empty($this->input->get('ctype')) ? $this->input->get('ctype') : 'Course'?>" name="ctype"/>

                               <div class="col-md-1">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>

                                <div class="col-md-3">
                                <label>Course Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('course')) ? $this->input->get('course') : ''?>" placeholder="Course Name" name="course"/>
                                </div>
                                     <div class="col-sm-2">
            <?php
$type = !empty($this->input->get('type')) ? $this->input->get('type') : '';
?>

                                 <label>Type</label>
                                   <select class="form-control" name="type">
                                      <option value="">Select Type</option>
                                      <option <?=($type == 'OET') ? 'selected' : ''?> value="OET">OET</option>
                                      <option <?=($type == 'OSCE') ? 'selected' : ''?> value="OSCE">OSCE</option>
                                      <option <?=($type == 'NMC CBT') ? 'selected' : ''?>  value="NMC CBT">NMC CBT</option>
                                      <option <?=($type == 'GMC Plab') ? 'selected' : ''?> value="GMC Plab">GMC Plab</option>
                                      <option <?=($type == 'IELTS') ? 'selected' : ''?> value="GMC Plab">IELTS</option>
                                      <option <?=($type == 'Other') ? 'selected' : ''?> value="Other">Other</option>
                                  </select>
                          </select>

                        </div>
                                 <div class="col-md-3">
                                <label>Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                  <div class="col-md-3">
                                <label>End Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>



                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/centercoursedates/centercoursedates_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Center Course Dates List</h3>

                 <form action="<?=base_url()?>panel/centercoursedates/export_excel" method="get">

 <input type="hidden" value="<?=!empty($this->input->get('ctype')) ? $this->input->get('ctype') : 'Course'?>" name="ctype"/>

<input type="hidden"  value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" name="start_date"/>

<input type="hidden" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>"  name="end_date"/>

<input type="hidden" value="<?=$type?>" name="type">


                        <button class="btn btn-primary pull-right"  style="margin-left:10px;">CSV Download Excel</button>

                  </form>


                                    <a href="?ctype=Exam" style="margin-left:10px;" class="btn btn-primary pull-right">Exams</a>
                                    <a href="?ctype=Course"  class="btn btn-primary pull-right">Courses</a>

                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Course Name</th>
                                                <th>Description</th>
                                                <th>Mock</th>
                                                <th>Start Date</th>
                                                <th>
<?php
if (!empty($this->input->get('ctype')) && $this->input->get('ctype') == 'Exam') {
	echo 'Registration Closing Date';
} else {
	echo 'End Date';
}
?>

                                                </th>
                                                <th>Result Date</th>

                                                <th>Time</th>
                                                <th>Venue</th>
                                                <th>Fee</th>
                                                <th>Type</th>
                                                <th>LocationType</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getCentercoursedates)) {
	foreach ($getCentercoursedates as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                         <td><?=$value->course?></td>
                                                        <td><?=$value->description?></td>
                                                        <td><?=$value->mock_test?></td>
                                                        <td><?=date('d-m-Y', strtotime($value->start_date));?></td>
                                                        <td>
                                                        <?php
if ($value->end_date != '0000-00-00') {
			echo date('d-m-Y', strtotime($value->end_date));
		}
		?>
                                                        </td>
                                                           <td>
                                                        <?php
if ($value->result_date != '0000-00-00') {
			echo date('d-m-Y', strtotime($value->result_date));
		}
		?>
                                                        </td>


                                                        <td><?=$value->time?></td>
                                                        <td><?=$value->venue?></td>
                                                        <td><?=$value->fee?></td>
                                                        <td><?=$value->type?></td>
                                                        <td><?=$value->location_type?></td>
                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?=base_url()?>panel/centercoursedates/edit_centercoursedates/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/centercoursedates/delete_centercoursedates/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
                                                        </td>
                                                    </tr>

                                            <?php }
} else {?>
                                            <tr><td colspan="100%">No record found.</td></tr>
                                             <?php }
?>
                                        </tbody>
                                    </table>
                                       <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
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
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>
