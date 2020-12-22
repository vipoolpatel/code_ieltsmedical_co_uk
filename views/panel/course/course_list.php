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
                    <li><a>Course</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Course List</h2>
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
                             <a href="<?=base_url()?>panel/course/add_course" class="btn btn-primary" title="Add New Course"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Course</span></a>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Course Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-2">
                                <label>Course  ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="Course ID" name="id"/>
                                </div>
                                   <div class="col-md-3">
                                <label>Course Main Name</label>
                                <?php
$course_main_id = !empty($this->input->get('course_main_id')) ? $this->input->get('course_main_id') : '';
?>
                                <select name="course_main_id" class="form-control">
                                        <option value="">Select Course Main Name</option>
                                            <?php
foreach ($course_date as $row) {
	?>
                                              <option <?=($course_main_id == $row->id) ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->course_main?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                <label>Course Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('name')) ? $this->input->get('name') : ''?>" placeholder="Course Name" name="name"/>
                                </div>
                                  <div class="col-md-2">
                                <label>Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>
                                <div class="col-md-2">
                                <label>End Date</label>
                                <input type="text" class="form-control datepicker_new"  value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>




                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/course/course_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Course List</h3>
                            <form action="<?=base_url()?>panel/course/export_excel" method="get">
<input type="hidden" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" name="id"/>
<input type="hidden" value="<?=!empty($this->input->get('course_main_id')) ? $this->input->get('course_main_id') : ''?>" name="course_main_id"/>
<input type="hidden" value="<?=!empty($this->input->get('name')) ? $this->input->get('name') : ''?>" name="name"/>
<input type="hidden" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" name="start_date"/>
<input type="hidden" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" name="end_date"/>
                               <button style="display:none;" class="btn btn-primary pull-right" href="">Excel Download</button>
                            </form>


                                </div>

                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Course Main Name</th>
                                                <th>Course Name</th>
                                              <!--   <th>Day</th> -->
                                                <!-- <th>Description</th> -->

                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Time</th>

                                                 <th>Price</th>
                                              <!--   <th>Subtitle Extra 1</th>
                                                <th>Subtitle Extra 2</th>
                                                <th>Extra Description</th> -->
                                                <th>Created Date</th>


                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getCourse)) {
	foreach ($getCourse as $value) {
		?>
                                        <tr>
                                            <td><?=$value->id?></td>
                                            <td><?=$value->course_main?></td>
                                            <td><?=$value->course_name?></td>
                                          <!--   <td><?=$value->day?></td>
                                            <td><?=$value->description?></td> -->

                                           <td><?=date('d-m-Y', strtotime($value->start_date));?></td>
                                            <td>
<?php
if ($value->end_date != '0000-00-00') {
			echo $end_date = date('d-m-Y', strtotime($value->end_date));
		}
		?>


                                            </td>
                                            <td><?=$value->time?></td>
                                             <td><?=$value->price?></td>
                                           <!--  <td><?=$value->extra?></td>
                                            <td><?=$value->extra2?></td>
                                            <td><?=$value->description2?></td> -->
                                            <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>

                                            <td>
                                                 <a class="btn btn-success" href="<?=base_url()?>panel/course/view_course/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
                                <a class="btn btn-primary" href="<?=base_url()?>panel/course/edit_course/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/course/delete_course/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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
