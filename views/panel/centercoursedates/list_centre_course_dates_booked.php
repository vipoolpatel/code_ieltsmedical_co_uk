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
                    <li><a>Center Course Dates Booked</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Center Course Dates Booked</h2>
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
                             <div class="panel panel-default">
                   <!--             <a href="<?=base_url()?>panel/centercoursedates/add_center_course_order" class="btn btn-primary" title="Add New Center Course Order"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Center Course Order</span></a> -->
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
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
                                <label>Centre Course Name</label>
                                 <?php
$centre_course_id = !empty($this->input->get('centre_course_id')) ? $this->input->get('centre_course_id') : '';
?>
                                <select name="centre_course_id" class="form-control">
                                        <option value="">Select Centre Course Name</option>
                                            <?php
foreach ($course_date as $row) {
	?>
                                              <option <?=($centre_course_id == $row->id) ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->course?></option>
                                            <?php }?>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('first_name')) ? $this->input->get('first_name') : ''?>" placeholder="First Name" name="first_name"/>
                                </div>
                                 <div class="col-md-2">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('last_name')) ? $this->input->get('last_name') : ''?>" placeholder="Last Name" name="last_name"/>
                                </div>
                                      <div class="col-md-2">
                                <label> Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                 <div class="col-md-2">
                                <label> End Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>

                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/centercoursedates/list_centre_course_dates_booked" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Center Course Dates Booked</h3>

                                         <a href="?ctype=Exam" style="margin-left:10px;" class="btn btn-primary pull-right">Exams</a>
                                    <a href="?ctype=Course" class="btn btn-primary pull-right">Courses</a>

                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Centre Course Name</th>
                                                <th>Exam Date</th>
                                                <th>Exam Type / Profession</th>
                                                <th>Candidate Number</th>
                                                <th>NMC</th>
                                                <th>DOB</th>
                                                <th>Country Study</th>
                                                <th>Nationality</th>
                                                <th>Location</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Exam Before</th>
                                                <th>Exam Upcoming</th>
                                                <th>Upcoming Exam Date</th>
                                                <th>Accommodation Needed</th>
                                                <th>Number of Nights</th>
                                                <th>Company Code</th>
                                                <th>Fee</th>
                                                <th>Created Date</th>
                                                  <th>PDF Download</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getRecord)) {
	foreach ($getRecord as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->course?></td>
                                                        <td>
                                                        <?php
if (!empty($value->start_date) && $value->location_type == 'Exam' && $value->start_date != '0000-00-00') {
			?>
                                                        <?=date('d-m-Y', strtotime($value->start_date))?>
                                                            <?php
}
		?>
                                                        </td>
                                 <td><?=$value->exam_type_name?></td>
                                                        <td><?=$value->candidate_number?></td>
                                                        <td><?=$value->nmc_id_number?></td>
                                                        <td><?=$value->dob?></td>
                                                        <td><?=$value->country_of_study?></td>
                                                        <td><?=$value->nationality?></td>
                                                        <td><?=!empty($value->location) ? $value->location : $value->venue?></td>
                                                        <td><?=$value->first_name?></td>
                                                        <td><?=$value->last_name?></td>
                                                        <td><?=$value->phone?></td>
                                                        <td><?=$value->email?></td>
                                                        <td><?=$value->exam_before?></td>
                                                        <td><?=$value->exam_upcoming?></td>
                                                        <td>
<?php
if (!empty($value->exam_date)) {
			?>
                                                        <?=date('d-m-Y', strtotime($value->exam_date));?>
                                                            <?php }
		?>
                                                        </td>
                                                        <td><?=$value->accommodation_need?></td>
                                                        <td><?=$value->number_of_nights?></td>
                                                        <td>


              <label>Company Code: </label><?=$value->company_code?>


              <label>Company <?=($value->company_type == '0') ? '%' : 'Amount'?>: </label><?=$value->company_price?>


                                                        </td>
                                                        <td><?=$value->final_total?></td>
             <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                   <td>
                    <?php
if ($value->pdf_name != "") {?>
                    <a target="_blank" href="<?=base_url()?>public/booking_pdf/<?=$value->pdf_name?>">Download</a>
                    <?php }
		?>
                </td>

<td>
<?php
if ($value->location_type == 'Course') {
			?>
    <a href="<?=base_url()?>panel/centercoursedates/joining_instruction_booking/<?=$value->id?>" class="btn btn-primary">Joining Instruction</a>
    <?php }
		?>
 <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/centercoursedates/delete_list_centre_course_dates_booked/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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





<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {
      $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });
});

</script>
