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
                    <li><a>Client</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Client List</h2>
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
                            <a href="<?=base_url()?>panel/client/add_client" class="btn btn-primary" title="Add New Client"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Client</span></a>

                             <a href="<?=base_url()?>panel/client/upload_excel" class="btn btn-primary" title="Upload Excel"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Upload Excel</span></a>

                             <a href="<?=base_url()?>panel/client/email_template" class="btn btn-primary" title="Email Template"><span class="bold">Email Template</span></a>

                         <a href="<?=base_url()?>panel/client/send_email" class="btn btn-primary" title="Send Email"><span class="bold">Send Email</span></a>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Client List Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-2">
                                    <label>ID</label>
                                    <input type="text" value="<?=!empty($this->input->get('id')) ? $this->input->get('id') : ''?>" class="form-control" placeholder="ID" name="id"/>
                                </div>

                            <div class="col-md-3">
                                <label>First Name</label>
                                <input type="text" value="<?=!empty($this->input->get('username')) ? $this->input->get('username') : ''?>" class="form-control" placeholder="First Name" name="username"/>
                                </div>

                                <div class="col-md-3">
                                <label>Email</label>
                                <input type="text" value="<?=!empty($this->input->get('email')) ? $this->input->get('email') : ''?>" class="form-control" placeholder="Email" name="email"/>
                                </div>
                               <div class="col-md-2">
                                <label>Start Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('start_date')) ? $this->input->get('start_date') : ''?>" placeholder="Start Date" name="start_date"/>
                                </div>

                                <div class="col-md-2">
                                   <label>End Date</label>
                                <input type="text" class="form-control datepicker_new" value="<?=!empty($this->input->get('end_date')) ? $this->input->get('end_date') : ''?>" placeholder="End Date" name="end_date"/>
                                </div>





                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-2">
                                    <label>Phone</label>
                                    <input type="text" value="<?=!empty($this->input->get('phone')) ? $this->input->get('phone') : ''?>" class="form-control" placeholder="Phone" name="phone"/>
                                </div>

                                 <div class="col-md-2">
                                    <label>Tag Status</label>
                                    <input type="text" value="<?=!empty($this->input->get('tags_status')) ? $this->input->get('tags_status') : ''?>" class="form-control" placeholder="Tag Status" name="tags_status"/>
                                </div>



                                      <div class="col-md-3">
                            <label>Profession </label>
                                         <?php
$profession = !empty($this->input->get('profession')) ? $this->input->get('profession') : '';
?>
                                  <select class="form-control" name="profession">
                                      <option value="">Select Profession </option>

             <option <?=($profession == 'Doctor') ? 'selected' : ''?> value="Doctor">Doctor</option>
             <option <?=($profession == 'Nurse') ? 'selected' : ''?> value="Nurse">Nurse</option>
             <option <?=($profession == 'Allied Health Professional') ? 'selected' : ''?> value="Allied Health Professional">Allied Health Professional</option>
                                      <!-- <option value="">Doctor</option>
                                      <option value="Nurse">Nurse</option>
                                        <option value="Allied Health Professional">Allied Health Professional</option> -->
                                  </select>

                            </div>
                              <div style="clear: both;"></div>
                                <br />


                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="<?=base_url()?>panel/client/client_list" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Client List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Tag Status</th>
                                                 <th>Note</th>
                                                  <th>Profession</th>
                                                <th>Create Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if (!empty($getClient)) {
	foreach ($getClient as $value) {
		?>
                        <tr>
                            <td><?=$value->id?></td>

                            <td><?=$value->username?></td>
                            <td><?=$value->lastname?></td>
                              <td><?=$value->email?></td>
                              <td><?=$value->address?></td>
                              <td><?=$value->phone?></td>
                              <td><?=$value->tags_status?></td>
                               <td><?=$value->note?></td>
                                <td><?=$value->profession?></td>

                            <td><?=date('d-m-Y h:i A', strtotime($value->created_date));?></td>
                            <td>

                              <a class="btn btn-success" href="<?=base_url()?>panel/introductions/introductions_list?client_id=<?=$value->id?>" >View</a>

                                <a class="btn btn-primary" href="<?=base_url()?>panel/client/edit_client/<?=$value->id?>" ><span class="fa fa-pencil"></span></a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure that you want to delete this record?')" href="<?=base_url()?>panel/client/delete_client/<?=$value->id?>"  ><span class="fa fa-trash-o"></span></a>
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
