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
                    <li><a>Calendar Book</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Calendar Book List</h2>
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
                            <!--  <a href="<?=base_url()?>panel/calendarbook/add_calendar_book" class="btn btn-primary" title="Add New Calendar Book"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Calendar Book</span></a> -->
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Calendar Book Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">

                               <div class="col-md-2">
                                <label> ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>
                         
  <div class="col-md-3">
<label>Calendar Name</label>
<input type="text" class="form-control" value="<?=!empty($this->input->get('main_title')) ? $this->input->get('main_title') : ''?>" placeholder="Calendar Name" name="main_title"/>
</div>
    

    <!-- <div class="col-md-3">
<label> First Name</label>
<input type="text" class="form-control" value="<?=!empty($this->input->get('first_name')) ? $this->input->get('first_name') : ''?>" placeholder="First Name" name="first_name"/>
</div>
 -->
 <div class="col-md-3">
<label> Email</label>
<input type="text" class="form-control" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" placeholder="Email" name="email"/>
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
                                    <a href="<?=base_url()?>panel/calendarbook/calendar_book_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Calendar Book List</h3>
                                </div>
                                    <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Calendar Name</th>
                                                <th>First Name </th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Book Date</th>
                                                <th>Book Time</th>
                                                <th>Address</th>
                                                <th>Notes</th>
                                                

                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getCalendarBook)) {
	foreach ($getCalendarBook as $value) {
		?>
    <tr>
        <td><?=$value->id?></td>
        <td><?=$value->main_title?></td>
        <td><?=$value->first_name?></td>

        <td><?=$value->last_name?></td>
        <td><?=$value->email?></td>
        <td><?=$value->phone_number?></td>
        <td>
            <?=date('d-m-Y', strtotime($value->book_date));?>
        </td>
        <td>  <?=date('h:i A', strtotime($value->book_time));?></td>
        <td><?=$value->address?></td>
        <td><?=$value->notes?></td>
        <td><?=date('d-m-Y h:i A', strtotime($value->created_at));?></td>
        <td>
  <!--   <a class="btn btn-primary" href="<?=base_url()?>panel/calendarbook/edit_calendar_book/<?=$value->id?>" ><span class="fa fa-pencil"></span></a> -->
    <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/calendarbook/delete_calendar_book/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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


