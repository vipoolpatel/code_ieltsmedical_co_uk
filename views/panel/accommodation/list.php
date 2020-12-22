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
                    <li><a>Accommodation Booking List</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Accommodation Booking List</h2>
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

                               <a href="<?=base_url()?>panel/accommodation/add" class="btn btn-primary" title="Add New Accommodation Booking"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Accommodation Booking</span></a>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                               <form action="" method = "get">

                               <div class="col-md-3">
                                <label>ID</label>
                                <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>

                                 <div class="col-md-3">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('first_name')) ? $this->input->get('first_name') : ''?>" placeholder="First Name" name="first_name"/>
                                </div>
                                 <div class="col-md-3">
                                <label>Email ID</label>
                                <input type="text" class="form-control" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" placeholder="Email ID" name="email"/>
                                </div>





                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/accommodation/accommodation_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Accommodation Booking List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Reference No</th>
                                                <th>Address</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Accommodation Near</th>
                                                <th>Check in date</th>
                                                <th>Check out date</th>
                                                <th>Number of nights </th>
                                                <th>Room</th>
                                                <th>Total</th>
                                                <th>Payment Status</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getBook)) {
	foreach ($getBook as $value) {
		?>
                                                    <tr>
                                                        <td><?=$value->id?></td>
                                                        <td><?=$value->reference_number?></td>

                                                        <td><?=$value->tracking_no?></td>
                                                        <td><?=$value->first_name?></td>
                                                        <td><?=$value->last_name?></td>
                                                        <td><?=$value->email?></td>
                                                        <td><?=$value->location?> <br />
                                                        <?=$value->venue_name?>
                                                        </td>
                                                        <td><?=date('d-m-Y', strtotime($value->check_in_date));?></td>
                                                        <td><?=date('d-m-Y', strtotime($value->check_out_date));?></td>
                                                        <td><?=$value->number_of_night?></td>
                                                        <td><?=($value->price == '44') ? 'Single room: &pound;44' : 'Shared room: &pound;27'?></td>
                                                        <td><?=$value->total?></td>

  <td>
<?php
if ($this->session->userdata('user_account_role') == '1') {?>
<select style="width:100px;" class="form-control ChangePaymentStatus" data-table="accommodation_book" id="<?=$value->id?>"  >
    <option value="1" <?=($value->payment == '1') ? 'selected' : ''?>>Paid</option>
    <option value="0" <?=($value->payment == '0') ? 'selected' : ''?>>Unpaid</option>
</select>
<?php } else {
			?>
<?=($value->payment == '0') ? 'Paid' : 'Unpaid'?>
    <?php
}
		?>
</td>


                                                        <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                                                        <td>
                                                             <button type="button" id="<?=$value->id?>" class="btn btn-primary AddTracking">Add Address</button>
<a class="btn btn-primary" href="<?=base_url()?>panel/accommodation/print_accommodation/<?=$value->id?>">Print</a>
<a class="btn btn-success" href="<?=base_url()?>panel/accommodation/view_accommodation/<?=$value->id?>" ><span class="fa fa-eye"></span></a>
                                                            <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/accommodation/delete/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <form method="post" action="<?=base_url()?>panel/accommodation/add_tracking">
            <input type="hidden" id="order_no" name="order_no" class="form-control">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Address</h4>
        </div>
        <div class="modal-body">
            <div class="col-md-2">Address</div>
            <div class="col-md-6"><input type="text" required="" name="tracking_no" class="form-control"></div>
            <div style="clear: both;"></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
        </form>
    </div>
  </div>






<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>

<script>

     $('table').delegate('.AddTracking','click',function(){
        var id = $(this).attr('id');
        $('#order_no').val(id);
         $('#myModal').modal('show');
    });
    $(document).ready(function() {

   $('.datepicker_new').datepicker({
        format: 'dd-mm-yyyy',
    });

});

</script>

