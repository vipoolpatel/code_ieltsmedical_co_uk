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
                   <li><a> Introductions</a></li>
               </ul>
               <div class="page-title">
                   <h2><span class="fa fa-arrow-circle-o-left"></span> Introductions List</h2>
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
                           <a href="<?=base_url()?>panel/introductions/add_introductions" class="btn btn-primary" title="Add New Introductions"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Introductions</span></a>
                              <a href="<?=base_url()?>panel/introductions/trust_list" class="btn btn-primary" title="Add New Trust"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Trust</span></a>

                              <br><br>


                            <div class="panel panel-default" style="font-size:14px;">
                                 <div class="panel-body">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Interested</th>
                                                <th>Introduced</th>
                                                <th>Hired</th>
                                                <th>Rejected</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <td><?=!empty($Interest) ? $Interest : '0'?></td>
                                              <td><?=!empty($Introduced) ? $Introduced : '0'?></td>
                                              <td><?=!empty($Hired) ? $Hired : '0'?></td>
                                              <td><?=!empty($Reject) ? $Reject : '0'?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>




                         <div class="panel panel-default">
                               <div class="panel-heading">
                                   <h3 class="panel-title">Search</h3>
                               </div>


                          <div class="panel-body">

                            <form action="" method = "get">
                              <div class="col-md-2">
                               <label>ID</label>
                               <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                               </div>
                               <div class="col-md-2">
                               <label>Candidate Name</label>
                               <input type="text" class="form-control" value="<?=!empty($this->input->get('first_name')) ? $this->input->get('first_name') : ''?>" placeholder="Candidate Name" name="first_name"/>
                               </div>
                               <div class="col-md-2">
                               <label>Candidate Email</label>
                               <input type="text" class="form-control" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" placeholder="Candidate Email" name="email"/>
                               </div>

                               <div class="col-md-2">
                               <label>Status</label>
                                  <select class="form-control" name="status_id">
                                      <option value="">Select</option>
                                      <?php
$status_id = !empty($this->input->get('status_id')) ? $this->input->get('status_id') : '';
foreach ($introductions_status_get as $value) {
	?>
  <option <?=($status_id == $value->id) ? 'selected' : ''?> value="<?=$value->id?>"><?=$value->status_name?></option>
<?php
}
?>
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
                                   <a href="<?=base_url()?>panel/introductions/introductions_list" class="btn btn-success">Reset</a>
                               </div>
                               </form>
                           </div>
                       </div>
                           <div class="panel panel-default">
                               <div class="panel-heading">
                                   <h3 class="panel-title">Introductions List</h3>
                               </div>



                               <div class="panel-body" style="overflow: auto;">

                                   <table  class="table table-striped table-bordered table-hover" >
                                       <thead>
                                           <tr>
                                               <th>#</th>
                                               <th>Executive</th>
                                               <th>Candidate Name</th>
                                               <th>Candidate Email</th>
                                               <th>Candidate Phone</th>
                                               <th>Current Location</th>
                                               <th>Subject</th>
                                               <th>Gender</th>

                                               <th>Profession </th>
                                               <th>Stage </th>
                                               <th>Trained in</th>

                                               <th>Name of Trust</th>
                                               <th>Name of Contact</th>
                                               <th>Email address of contact</th>
                                               <th>Phone number of contact</th>
                                               <th>Status</th>
                                               <th>Create Date</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php
if (!empty($getIntroductions)) {
	foreach ($getIntroductions as $value) {
		?>
                       <tr>
                           <td><?=$value->id?></td>
                           <td><?=$value->account_name?></td>
                           <td><?=$value->first_name?></td>
                           <td><?=$value->email?></td>
                           <td><?=$value->phone?></td>

                           <td><?=$value->current_location?></td>
                           <td><?=$value->subject?></td>

                           <td><?php
if ($value->gender == 'His') {
			echo "Male";
		} else if ($value->gender == 'Her') {
			echo "Female";
		}
		?></td>

                           <td><?=$value->profession_name?></td>
                           <td><?=$value->profession_stage_name?></td>
                           <td><?=$value->country_name?></td>

                           <td><?=$value->name_of_trust?></td>
                           <td><?=$value->name_of_contact?></td>
                           <td><?=$value->contact_of_email?></td>
                           <td><?=$value->contact_of_phone?></td>
                           <td><?=$value->status_name?></td>
                           <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                           <td>
                           <a class="btn btn-primary" href="<?=base_url()?>panel/introductions/view_introductions/<?=$value->id?>" ><span class="fa fa-eye"></span></a>

  <a class="btn btn-success" href="<?=base_url()?>panel/introductions/printintroductions/<?=$value->id?>" ><span class="fa fa-print"></span>Print</a>

                               <a class="btn btn-primary" href="<?=base_url()?>panel/introductions/edit_introductions/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>

<a class="btn btn-success copy_introductions" id="<?=$value->id?>">Copy</a>

                               <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/introductions/delete_introductions/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Copy Introductions</h4>
        </div>
        <form action="<?=base_url()?>panel/introductions/copy_introductions/" method="post">
        <input type="hidden" name="id" value="" id="getIntroductionID">
        <div class="modal-body">
           <div class="col-md-12">
           <label>
             Trust
           </label>
            <select name="trust_id" required class="form-control select" data-live-search="true">
                 <option value="">Select Trust</option>
                 <?php
                foreach ($trust_get as $row) {
                	?>
                 <option value="<?=$row->id?>"><?=$row->name_of_trust?> (<?=$row->name?>)</option>
                 <?php }?>
              </select>
           </div>
           <div style="clear:both"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>


   </body>
</html>




<script type="text/javascript" src="<?=base_url()?>front/bootstrap-datepicker.min.js"></script>

<script>
$(document).ready(function() {
     $('.datepicker_new').datepicker({
       format: 'dd-mm-yyyy',
   });


     $('.copy_introductions').click(function(){
        var id = $(this).attr('id');
        $('#getIntroductionID').val(id);
        $('#myModal').modal('show');
     });


});

</script>
