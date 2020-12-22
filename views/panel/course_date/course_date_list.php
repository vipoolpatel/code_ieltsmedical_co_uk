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
                    <li><a>Course Date</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Course Date List</h2>
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
                             <a href="<?=base_url()?>panel/coursedate/add_course_date" class="btn btn-primary" title="Add New Course Date"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Course Date</span></a>
                            


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Course Date Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-1">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                                   <div class="col-md-2">
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

                                  <div class="col-md-2">
                                <label>Course Name</label>
                                <?php
                                    $course_id = !empty($this->input->get('course_id')) ? $this->input->get('course_id') : '';
                                    ?>
                                <select name="course_id" class="form-control">
                                        <option value="">Select Course Name</option>
                                            <?php
                                        foreach ($course_datetime as $row) {
                                            ?>
                                              <option <?=($course_id == $row->id) ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->course_name?></option>
                                            <?php }?>
                                    </select>
                                </div>

                                  <div class="col-md-3">
                                <label>Location Name</label>
                                <?php
                                    $location_id = !empty($this->input->get('location_id')) ? $this->input->get('location_id') : '';
                                    ?>
                                <select name="location_id" class="form-control">
                                        <option value="">Select Location Name</option>
                                            <?php
                                        foreach ($course_datlocation as $row) {
                                            ?>
                                              <option <?=($location_id == $row->id) ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->location?></option>
                                            <?php }?>
                                    </select>
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
                                    <a href="<?=base_url()?>panel/coursedate/course_date_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Course Date List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Course Main Name</th>
                                                <th>Course Name</th>
                                                <th>Location</th>
                                                
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Time</th>
                                                
                                                <th>Description</th>
                                                <th>Created Date</th>


                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        if (!empty($getCoursedate)) {
                                        	foreach ($getCoursedate as $value) {
                                        		?>
                                        <tr>
                                            <td><?=$value->id?></td>
                                            <td><?=$value->course_main?></td>
                                            <td><?=$value->course_name?></td>
                                            <td><?=$value->location?></td>
                                           
                                            <td><?=date('d-m-Y', strtotime($value->start_date));?></td>
                                            <td><?=date('d-m-Y', strtotime($value->end_date));?></td>
                                            <td><?=$value->time?></td>
                                            <td><?=$value->decription?></td>
                                            <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>

                                            <td>
                                                 
                                <a class="btn btn-primary" href="<?=base_url()?>panel/coursedate/edit_course_date/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/coursedate/delete_course_date/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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
