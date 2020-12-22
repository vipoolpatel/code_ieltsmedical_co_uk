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
                    <li><a>Live Course Booking</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Live Course Booking List</h2>
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
                                <div class="panel-heading">
                                    <h3 class="panel-title">Course Live Course Booking Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-1">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>


                                  <div class="col-md-3">
                                <label>Customer Name</label>
                                <?php
$customer_id = !empty($this->input->get('customer_id')) ? $this->input->get('customer_id') : '';
?>
                                <select name="customer_id" class="form-control">
                                        <option value="">Select Customer Name</option>
                                            <?php
foreach ($course_datetime as $row) {
	?>
                                              <option <?=($customer_id == $row->id) ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->username?></option>
                                            <?php }?>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                <label>First Name</label>
                                <input type="text" value="<?=!empty($this->input->get('first_name')) ? $this->input->get('first_name') : ''?>" class="form-control" placeholder="First Name" name="first_name"/>
                                </div>

                                <div class="col-md-2">
                                <label>Last Name</label>
                                <input type="text" value="<?=!empty($this->input->get('last_name')) ? $this->input->get('last_name') : ''?>" class="form-control" placeholder="Last Name" name="last_name"/>
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
                                    <a href="<?=base_url()?>panel/livecourse/live_course_booking_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Live Course Booking List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Customer Name</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Exam</th>
                                                <th>Availability/Notify</th>
                                                <th>Session</th>
                                                <th>Registration Fee</th>
                                                <th>Fee</th>
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
                                            <td><?=$value->username?></td>
                                            <td><?=$value->first_name?></td>
                                            <td><?=$value->last_name?></td>
                                            <td><?=$value->phone?></td>
                                            <td><?=$value->email?></td>
                                            <td><?=$value->name?></td>
                                            <td><?=$value->avail_notify?>
                                                <br />
                                            <?=$value->availability_date_time?>
                                            </td>
                                            <td><?=$value->flex_name?></td>
                                            <td><?=$value->registration_fee?></td>
                                            <td><?=$value->price?></td>



                                            <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>

                                            <td>


                                <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/livecourse/delete_live_course_booking/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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
